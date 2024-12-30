<?php
include "../class.php";
include "../db/dbConnection.php";

session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

    // Handle adding a fees details -----------------------------------------
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addFees') {
        $feesid = htmlspecialchars($_POST['feesid'], ENT_QUOTES, 'UTF-8');
        $studentId = htmlspecialchars($_POST['studentId'], ENT_QUOTES, 'UTF-8');
        $admissionId = htmlspecialchars($_POST['admissionId'], ENT_QUOTES, 'UTF-8');
        $studentName = htmlspecialchars($_POST['studentName'], ENT_QUOTES, 'UTF-8');
        $paidMethod = htmlspecialchars($_POST['paidMethod'], ENT_QUOTES, 'UTF-8');
        $paidDate = htmlspecialchars($_POST['paidDate'], ENT_QUOTES, 'UTF-8');
        $year = htmlspecialchars($_POST['year'], ENT_QUOTES, 'UTF-8');
        $feesType = htmlspecialchars($_POST['feesType'], ENT_QUOTES, 'UTF-8');
        $transactionId = htmlspecialchars($_POST['transactionId'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $universityPaid = htmlspecialchars($_POST['universityPaid'], ENT_QUOTES, 'UTF-8');
        $studyPaid = htmlspecialchars($_POST['studyPaid'], ENT_QUOTES, 'UTF-8');
        $actualBalance = htmlspecialchars($_POST['actualBalance'], ENT_QUOTES, 'UTF-8');

        $centerId = $_SESSION['centerId'];
    
        $totalFees = $universityPaid + $studyPaid;
        $payYear = $year . ' ' . $feesType;
    
        $fees_select = "SELECT 
            `fee_id`,
            `fee_stu_id`,
            `fee_uni_fee_total`, 
            `fee_sdy_fee_total`, 
            `fee_uni_fee`,
            `fee_sty_fee`
            FROM `jeno_fees` 
            WHERE fee_id = $feesid AND fee_center_id =$centerId;";
    
        $fees_res = mysqli_query($conn, $fees_select);
        $fees = mysqli_fetch_array($fees_res, MYSQLI_ASSOC);
    
        $fee_id = $fees['fee_id'];
        $fee_uni_fee = $fees['fee_uni_fee'];
        $fee_sty_fee = $fees['fee_sty_fee'];
        $stu_id = $fees['fee_stu_id'];
    
        if (empty($actualBalance)) {
            $actualBalance = 0;
        }
        // Calculate updated fees
        $uni_fees = $fee_uni_fee + $actualBalance;
        $sty_fees = $fee_sty_fee + $studyPaid;

        // Query to fetch loc_short_name and stu_uni_id
        $location_student_query = "
        SELECT 
            l.loc_short_name,
            s.stu_uni_id
        FROM 
            jeno_location l
        JOIN 
            jeno_student s ON s.stu_id = $stu_id
        WHERE 
            l.loc_id = $centerId;
        ";

        $location_student_res = mysqli_query($conn, $location_student_query);
        $location_student = mysqli_fetch_array($location_student_res, MYSQLI_ASSOC);

        $loc_short_name = $location_student['loc_short_name'];
        $stu_uni_id = $location_student['stu_uni_id'];

        // Query to fetch university name and get first two characters
        $university_query = "
        SELECT 
            LEFT(uni_name, 2) AS uni_short_name
        FROM 
            jeno_university 
        WHERE 
            uni_id = $stu_uni_id;
        ";

        $university_res = mysqli_query($conn, $university_query);
        $university_data = mysqli_fetch_array($university_res, MYSQLI_ASSOC);

        $uni_short_name = $university_data['uni_short_name'];

        // Get the current year and last two digits
        $current_year = date('y');

        // Query to get the last sequence number for this center, university, and year
        $bill_no_select = "
           SELECT 
                MAX(CAST(SUBSTRING(pay_bill_no, 8) AS UNSIGNED)) AS last_sequence 
            FROM 
                jeno_payment_history 
            WHERE 
                pay_center_id = $centerId  
                AND SUBSTRING(pay_bill_no, 1, 3) = '$loc_short_name' 
                AND SUBSTRING(pay_bill_no, 4, 2) = '$uni_short_name' 
                AND SUBSTRING(pay_bill_no, 6, 2) = '$current_year'; 
        ";

        $bill_no_res = mysqli_query($conn, $bill_no_select);
        $bill_no_data = mysqli_fetch_array($bill_no_res, MYSQLI_ASSOC);

        // Determine the last sequence number and increment
        $last_sequence = isset($bill_no_data['last_sequence']) ? $bill_no_data['last_sequence'] : 0;
        $next_sequence = $last_sequence + 1;

        $bill_no_sql="SELECT MAX(pay_bill_no) + 1 AS next_bill_number
                        FROM jeno_payment_history;";

        $bill_no_sql_res = mysqli_query($conn, $bill_no_sql);
        $bill_no_sql_data = mysqli_fetch_array($bill_no_sql_res, MYSQLI_ASSOC);
        $next_bill_number = $bill_no_sql_data['next_bill_number'];

        // Generate the bill number
        // $billNo = $loc_short_name . $uni_short_name . $current_year . $next_sequence;

        // Other fields
        $createdBy = $_SESSION['userId'];
    
        // Insert into payment history
        $history_sql = "INSERT INTO `jeno_payment_history`
        ( `pay_bill_no`
        , `pay_admission_id`
        , `pay_student_name`
        , `pay_year`
        , `pay_paid_method`
        , `pay_transaction_id`
        , `pay_description`
        , `pay_university_fees`
        , `pay_study_fees`
        , `pay_total_amount`
        , `pay_date`
        , `pay_center_id`
        , `pay_created_by`)
        VALUES 
        ( '$next_bill_number'
        , '$admissionId'
        , '$studentName'
        , '$payYear'
        , '$paidMethod'
        , '$transactionId'
        , '$description'
        ,'$universityPaid'
        , '$studyPaid'
        , '$totalFees'
        , '$paidDate'
        , '$centerId'
        , '$createdBy')";
    
        if ($conn->query($history_sql) === TRUE) {
            // Conditionally update fees if they are not disabled
            $updateFields = [];
            
            // Only add fields to update if they are not disabled
            if (!isset($_POST['universityPaid_disabled'])) {
                $updateFields[] = "`fee_uni_fee` = '$uni_fees'";
            }
            if (!isset($_POST['studyPaid_disabled'])) {
                $updateFields[] = "`fee_sty_fee` = '$sty_fees'";
            }
    
            if (!empty($updateFields)) {
                $course_sql = "UPDATE `jeno_fees`
                SET " . implode(', ', $updateFields) . ",
                    `fee_updated_by` = '$createdBy'
                WHERE `fee_admision_id` = '$admissionId'
                  AND `fee_id` = '$feesid'";
    
                if ($conn->query($course_sql) === TRUE) {


                    $select_fees ="SELECT 
            `fee_id`,
            `fee_stu_id`,
            `fee_uni_fee_total`, 
            `fee_sdy_fee_total`, 
            `fee_uni_fee`,
            `fee_sty_fee`
            FROM `jeno_fees` 
            WHERE fee_id = $feesid AND fee_center_id =$centerId;";

                    $select_fees_res = mysqli_query($conn, $select_fees);
        $fees1 = mysqli_fetch_array($select_fees_res, MYSQLI_ASSOC);
    
        $fee_id1 = $fees1['fee_id'];
        $fee_uni_fee1 = $fees1['fee_uni_fee'];
        $fee_sty_fee1 = $fees1['fee_sty_fee'];
        $stu_id1 = $fees1['fee_stu_id'];

        $total_fess_select ="SELECT 
        a.fee_id,
        a.fee_admision_id,
        a.fee_stu_id,
        a.fee_uni_fee_total,
        a.fee_uni_fee,
        a.fee_sdy_fee_total,
        a.fee_sty_fee,
        a.fee_stu_year,
        b.stu_id,
        b.stu_name,
        c.cou_id,
        c.cou_duration,
        c.cou_fees_type,
        c.cou_university_fess,
        c.cou_study_fees,
        c.cou_total_fees
    FROM jeno_fees AS a 
    LEFT JOIN jeno_student AS b 
        ON a.fee_stu_id = b.stu_id 
    LEFT JOIN jeno_course AS c 
        ON b.stu_cou_id = c.cou_id 
    WHERE a.fee_id = $feesid AND a.fee_center_id = $centerId";

    $total_fess_select_res = mysqli_query($conn, $total_fess_select);

    if ($total_fess_select_res && $row_course = $total_fess_select_res->fetch_assoc()) {
    // Decode JSON fields if they exist
    //  $cou_uni_fess = isset($row_course['cou_university_fess']) ? json_decode($row_course['cou_university_fess']) : null;
    $academicYear =$row_course['fee_stu_year'];
    $uni_tataol =$row_course['fee_uni_fee_total'];
    // $cou_study_fees = isset($row_course['cou_study_fees']) ? json_decode($row_course['cou_study_fees']) : null;
    

    }
    
        if($uni_tataol == $fee_uni_fee1){

                          // Insert into book table
        $book_sql = "INSERT INTO `jeno_book`
        (`book_stu_id`
        , `book_year`
        , `book_center_id`
        , `book_created_by`) 
        VALUES 
        ('$studentId'
        , '$academicYear'
        , '$centerId'
        , '$createdBy')"; // Modify as per your requirements

        $conn->query($book_sql);
          
        }

      
                    $response['success'] = true;
                    $response['message'] = "Fees added and updated successfully!";
                } else {
                    $response['message'] = "Error updating Fees: " . $conn->error;
                }
            } else {
                $response['success'] = true;
                $response['message'] = "Fees added successfully, no updates to existing fees.";
            }
        } else {
            $response['message'] = "Error Payment History: " . $conn->error;
        }
    
        echo json_encode($response);
        exit();
    }
    //-- Handle adding a fees details--end----------------------------------------------------
    

    //--Handle get student details and course details and fess details -------------------------------------
if (isset($_POST['addGetId']) && $_POST['addGetId'] != '') {
    $addGetId = $_POST['addGetId'];
    $centerId = $_SESSION['centerId'];

    $selQuery = "SELECT 
        a.fee_id,
        a.fee_admision_id,
        a.fee_stu_id,
        a.fee_uni_fee_total,
        a.fee_uni_fee,
        a.fee_sdy_fee_total,
        a.fee_sty_fee,
        a.fee_stu_year,
        b.stu_id,
        b.stu_name,
        c.cou_id,
        c.cou_duration,
        c.cou_fees_type,
        c.cou_university_fess,
        c.cou_study_fees,
        c.cou_total_fees
    FROM jeno_fees AS a 
    LEFT JOIN jeno_student AS b 
        ON a.fee_stu_id = b.stu_id 
    LEFT JOIN jeno_course AS c 
        ON b.stu_cou_id = c.cou_id 
    WHERE a.fee_id = $addGetId AND a.fee_center_id = $centerId";

    $result = mysqli_query($conn, $selQuery);

    if ($result && $row = $result->fetch_assoc()) {
        // Decode JSON fields if they exist
        $cou_university_fess = isset($row['cou_university_fess']) ? json_decode($row['cou_university_fess']) : null;
        $cou_study_fees = isset($row['cou_study_fees']) ? json_decode($row['cou_study_fees']) : null;

        $courseDetails = [
            'fee_id' => $row['fee_id'],
            'fee_admision_id' => $row['fee_admision_id'],
            'stu_id' => $row['stu_id'],
            'stu_name' => $row['stu_name'],
            'fee_uni_fee_total' => $row['fee_uni_fee_total'],
            'fee_uni_fee' => $row['fee_uni_fee'],
            'fee_sdy_fee_total' => $row['fee_sdy_fee_total'],
            'fee_sty_fee' => $row['fee_sty_fee'],
            'stu_study_year' => $row['fee_stu_year'],
            'cou_duration' => $row['cou_duration'],
            'cou_fees_type' => $row['cou_fees_type'],
            'cou_university_fess' => $cou_university_fess,
            'cou_study_fees' => $cou_study_fees
        ];

        echo json_encode($courseDetails);
    } else {
        // Handle case when no result is found
        $response = ['message' => "No records found or error fetching Fees details"];
        echo json_encode($response);
    }


    exit(); 
}

//---Handle get student details and course details and fess details --end---------------------------------------------



//---Handle fetching student details ---------------------------------
    if (isset($_POST['studentId']) && $_POST['studentId'] != '') {
        $studentId = $_POST['studentId'];
        $centerId = $_SESSION['centerId'];
        // Fetch payment history from the database
        $payment_history_sql = "SELECT
    a.pay_id,
    a.pay_admission_id,
    a.pay_student_name,
    a.pay_year,
    a.pay_paid_method,
    a.pay_transaction_id,
    a.pay_description,
    a.pay_university_fees,
    a.pay_study_fees,
    a.pay_total_amount,
    a.pay_balance,
    a.pay_date,
    b.fee_uni_fee_total,
    b.fee_sdy_fee_total,
    b.fee_uni_fee,
    c.stu_addmision_new,
    b.fee_sty_fee
FROM
    `jeno_payment_history` AS a
LEFT JOIN jeno_fees AS b
ON
    a.pay_admission_id = b.fee_admision_id
LEFT JOIN jeno_student AS c
ON
    b.fee_stu_id = c.stu_id
WHERE
    b.fee_admision_id = '$studentId' AND b.fee_created_at =(
    SELECT
        MAX(a2.fee_created_at)
    FROM
        `jeno_fees` AS a2
    WHERE
        a2.fee_stu_id = b.fee_stu_id AND a2.fee_status = 'Active'
) AND a.pay_status = 'Active' AND a.pay_center_id = $centerId AND b.fee_status = 'Active';";

        $payment_history_res = mysqli_query($conn, $payment_history_sql);

        $history = "SELECT 
        `pay_id`
        , `pay_admission_id`
        , `pay_student_name`
        , `pay_year`
        , `pay_paid_method`
        , `pay_transaction_id`
        , `pay_university_fees`
        , `pay_study_fees`
        , `pay_total_amount`
        , `pay_balance`
        , `pay_date` 
        FROM `jeno_payment_history`
         WHERE pay_admission_id = '$studentId' AND pay_status = 'Active' AND pay_center_id = $centerId;";

        $payment_res = mysqli_query($conn, $history);

            if($payment_res){
                while ($pay_row = mysqli_fetch_assoc($payment_res)) {
                // $pay_row = mysqli_fetch_assoc($payment_res);

                $history = [

                'pay_id' => $pay_row['pay_id'],
                'pay_admission_id' => $pay_row['pay_admission_id'],
                'pay_student_name' => $pay_row['pay_student_name'],
                'pay_year' => $pay_row['pay_year'],
                'pay_paid_method' => $pay_row['pay_paid_method'],
                'pay_transaction_id' => $pay_row['pay_transaction_id'],
                'pay_university_fees' => $pay_row['pay_university_fees'],
                'pay_study_fees' => $pay_row['pay_study_fees'],
                'pay_total_amount' => $pay_row['pay_total_amount'],
                'pay_balance' => $pay_row['pay_balance'],
                'pay_date' => $pay_row['pay_date'],
                ];
                $historys[] = $history;
            }
            }
    
        if ($payment_history_res) {
            $row = mysqli_fetch_assoc($payment_history_res);
            $totalPaid = $row['fee_uni_fee'] + $row['fee_sty_fee'] ;
            $totalAmount = $row['fee_uni_fee_total'] + $row['fee_sdy_fee_total'] ;
            $balance = $totalAmount - $totalPaid ;
            $currentYear = end($historys)['pay_year'];
            // Prepare university details array
            $courseDetails = [
                'pay_id' => $row['pay_id'],
                'pay_admission_id' => $row['pay_admission_id'],
                'stu_addmision_new' => $row['stu_addmision_new'],
                'pay_student_name' => $row['pay_student_name'],
                'pay_year' => $currentYear,
                'pay_paid_method' => $row['pay_paid_method'],
                'pay_transaction_id' => $row['pay_transaction_id'],
                'pay_description' => $row['pay_description'],
                'fee_uni_fee_total' => $row['fee_uni_fee_total'],
                'fee_sdy_fee_total' => $row['fee_sdy_fee_total'],
                'fee_uni_fee' => $row['fee_uni_fee'],
                'fee_sty_fee' => $row['fee_sty_fee'],
                'totalAmount' => $totalAmount,
                'totalPaid' => $totalPaid,
                'pay_university_fees' => $row['pay_university_fees'],
                'pay_study_fees' => $row['pay_study_fees'],
                'pay_total_amount' => $row['pay_total_amount'],
                'balance' => $balance,
                'hostory_table' => $historys,
                'pay_date' => $row['pay_date'],
            
            ];
    
            echo json_encode($courseDetails);
        } else {
            $response['message'] = "Error fetching Fees details: " . mysqli_error($conn);
            echo json_encode($response);
        }
        exit();
    }

//---Handle fetching student details --end--------------------------------------------------------

           // Handle deleting a fees detaile ------------------------
            if (isset($_POST['deleteId'])) {
                $id = $_POST['deleteId'];
                $updatedBy = $_SESSION['userId'];

                $deleteAmuont = "SELECT a.*, b.*
                                FROM jeno_payment_history AS a
                                LEFT JOIN jeno_fees AS b
                                ON a.pay_admission_id = b.fee_admision_id
                                WHERE a.pay_id  = $id
                                AND b.fee_updated_at = (
                                    SELECT MAX(fee_updated_at)
                                    FROM jeno_fees
                                    WHERE fee_admision_id = a.pay_admission_id
                                )";

               if(  $deleteAmuont_res = mysqli_query($conn, $deleteAmuont)){
                  $fee_row = mysqli_fetch_assoc($deleteAmuont_res);
                  $feeId = $fee_row['fee_id'];
                  $admision = $fee_row['pay_admission_id'];
                  $pay_university_fees = $fee_row['pay_university_fees'];
                  $pay_study_fees = $fee_row['pay_study_fees'];
                  $fee_uni_fee_total = $fee_row['fee_uni_fee'];
                  $fee_sdy_fee_total = $fee_row['fee_sty_fee'];
                  
                $updateUniFees = $fee_uni_fee_total - $pay_university_fees ;
                $updateStyFees = $fee_sdy_fee_total - $pay_study_fees ;

                  $updateSql = "UPDATE `jeno_fees` 
                  SET `fee_uni_fee`='$updateUniFees'
                  , `fee_sty_fee`='$updateStyFees'
                  , `fee_updated_by`='$updatedBy' 
                  WHERE `fee_id` = '$feeId'";

                  if($updateSql_res = mysqli_query($conn, $updateSql)){

                $queryDel = "UPDATE `jeno_payment_history` 
                SET `pay_updated_by`='$updatedBy'
                ,`pay_status`='Inactive' WHERE pay_id =$id;";
                $reDel = mysqli_query($conn, $queryDel);
            }
        }

                if ($reDel) {
                    
                    $_SESSION['message'] = "Payment Details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "Payment Details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting Course details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }

            //--Handle deleting a fees detaile--end---------------------



            // Handle fetching fees details and show view page --------------------------------
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];
                $centerId = $_SESSION['centerId'];

                // Prepare and execute the SQL query
                $selQuery = "SELECT `cou_id`
                , `cou_uni_id`
                , `cou_name`
                , `cou_medium`
                , `cou_exam_type`
                , `cou_fees_type`
                , `cou_duration`
                , `cou_university_fess`
                , `cou_study_fees`
                , `cou_total_fees` 
                FROM `jeno_course` WHERE cou_id = $uniId AND cou_center_id = $centerId";
                
                $result1 = $conn->query($selQuery);

                if($result1) {
                    $row = mysqli_fetch_assoc($result1);
                    
           // Prepare university details array
        $courseViewDetails = [
            'cou_id' => $row['cou_id'],
            'cou_uni_id' => universityName($row['cou_uni_id']),
            'cou_name' => $row['cou_name'],
            'cou_medium' => $row['cou_medium'],
            'cou_exam_type' => $row['cou_exam_type'],
            'cou_fees_type' => $row['cou_fees_type'],
            'cou_duration' => $row['cou_duration'],
            'cou_university_fess' => json_decode($row['cou_university_fess']), // Decode JSON string to array
            'cou_study_fees' => json_decode($row['cou_study_fees']), // Decode JSON string to array
            'cou_total_fees' => json_decode($row['cou_total_fees']), // Decode JSON string to array
        ];

          echo json_encode($courseViewDetails);
          exit();
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }
            //--Handle fetching fees details and show view page--end--------------------------------



        // Handle fetching fees  details for editing------------------------
    if (isset($_POST['editId']) && $_POST['editId'] != '') {
    
    $editId = $_POST['editId'];
    $centerId = $_SESSION['centerId'];
    $selQuery = "SELECT 
    a.fee_id
    , a.fee_admision_id
    , a.fee_stu_id
    , a.fee_uni_fee_total
    , a.fee_uni_fee
    , a.fee_sdy_fee_total
    , a.fee_sty_fee
    , a.fee_paid_date
    , a.fee_method
    , a.fee_trans_id
    , a.fee_description
    , b.stu_id
    , b.stu_name
    , c.cou_id
    , c.cou_study_fees 
    , c.cou_university_fess
    , c.cou_total_fees
    , b.stu_enroll
    , b.stu_study_year 
    FROM jeno_fees AS a 
    LEFT JOIN jeno_student AS b 
    ON a.fee_stu_id = b.stu_id 
    LEFT JOIN jeno_course AS c 
    ON b.stu_cou_id = c.cou_id 
    WHERE a.fee_id= $editId AND a.fee_center_id = $centerId ";

    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Prepare university details array
        $courseDetails = [
            'fee_id' => $row['fee_id'],
            'fee_admision_id' => $row['fee_admision_id'],
            'stu_id' => $row['stu_id'],
            'stu_name' => $row['stu_name'],
            'fee_uni_fee_total' => $row['fee_uni_fee_total'],
            'fee_uni_fee' => $row['fee_uni_fee'],
            'fee_sdy_fee_total' => $row['fee_sdy_fee_total'],
            'fee_sty_fee' => $row['fee_sty_fee'],
            'stu_study_year' => $row['stu_study_year'],
            'cou_university_fess' => json_decode($row['cou_university_fess']), // Decode JSON string to array
            'cou_study_fees' => json_decode($row['cou_study_fees']), // Decode JSON string to array
        
        ];

        echo json_encode($courseDetails);
    } else {
        $response['message'] = "Error fetching Fees details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }

//-----Handle fetching fees  details for editing--end-----------------------------------




            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();


    
    
