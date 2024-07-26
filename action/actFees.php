<?php
include "../class.php";


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

    // Handle adding a university
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addFees') {
        $feesid = $_POST['feesid'];
        $studentId = $_POST['studentId'];
        $admissionId = $_POST['admissionId'];
        $studentName = $_POST['studentName'];
        $paidMethod = $_POST['paidMethod'];
        $paidDate = $_POST['paidDate'];
        $year = $_POST['year'];
        $transactionId = $_POST['transactionId'];
        $description = $_POST['description'];
        $universityPaid = $_POST['universityPaid'];
        $studyPaid = $_POST['studyPaid'];

        $totalFees = $universityPaid + $studyPaid ;

        $fees_select ="SELECT 
        `fee_id`
        ,  `fee_uni_fee_total` 
        , `fee_sdy_fee_total` 
        , `fee_uni_fee`
        , `fee_sty_fee` 
        FROM `jeno_fees` 
        WHERE fee_id = $feesid;";

        $fees_res = mysqli_query($conn , $fees_select);
        $fees = mysqli_fetch_array($fees_res , MYSQLI_ASSOC);
        $fee_id =$fees['fee_id'];
        $fee_uni_fee =$fees['fee_uni_fee'];
        $fee_sty_fee =$fees['fee_sty_fee'];
    

  

    $uni_fees = $fee_uni_fee + $universityPaid ;
    $sty_fees = $fee_sty_fee + $studyPaid ;
    
    // Other fields
    // $centerId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];

     // Insert into payment history
     $history_sql = "INSERT INTO `jeno_payment_history`
     (`pay_admission_id`
     , `pay-student_name`
     , `pay_year`
     , `pay_paid_method`
     , `pay_transaction_id`
     , `pay_description`
     , `pay_university_fees`
     , `pay_study_fees`
     , `pay_total_amount`
     , `pay_date`
     , `pay_created_by`)
      VALUES 
      ('$admissionId'
      ,'$studentName'
      ,'$year'
      ,'$paidMethod'
      ,'$transactionId'
      ,'$description'
      ,'$universityPaid'
      ,'$studyPaid'
      ,'$totalFees'
      ,'$paidDate'
      ,'$createdBy')";

if ($conn->query($history_sql) === TRUE) {


    $course_sql = "UPDATE `jeno_fees`
    SET `fee_uni_fee` = '$uni_fees',
        `fee_sty_fee` = '$sty_fees',
        `fee_paid_date` = '$paidDate',
        `fee_updated_by` = '$createdBy'
    WHERE `fee_admision_id` = '$admissionId'
      AND `fee_stu_id` = '$studentId'";
   
    } else {
        $response['message'] = "Error Payment History: " . $conn->error;
    }


    if ($conn->query($course_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Fees added successfully!";
    } else {
        $response['message'] = "Error adding Fees: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

// Handle fetching university details for editing
if (isset($_POST['addGetId']) && $_POST['addGetId'] != '') {
    
    $addGetId = $_POST['addGetId'];

    $selQuery = "SELECT 
    a.fee_id
    , a.fee_admision_id
    , a.fee_stu_id
    , a.fee_uni_fee_total
    , a.fee_uni_fee
    , a.fee_sdy_fee_total
    , a.fee_sty_fee
    , a.fee_stu_year
    , b.stu_id
    , b.stu_name
    , c.cou_id
    , c.cou_study_fees 
    , c.cou_university_fess
    , c.cou_total_fees
    , b.stu_enroll
    , b.stu_aca_year 
    FROM jeno_fees AS a 
    LEFT JOIN jeno_student AS b 
    ON a.fee_stu_id = b.stu_id 
    LEFT JOIN jeno_course AS c 
    ON b.stu_cou_id = c.cou_id 
    WHERE a.fee_id= $addGetId";

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
            'stu_study_year' => $row['stu_aca_year'],
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




    if (isset($_GET['studentId'])) {
        $studentId = $_GET['studentId'];
    
        // Fetch payment history from the database
        $payment_history_sql = "SELECT 
        a.pay_id
        , a.pay_admission_id 
        , a.pay_student_name 
        , a.pay_year 
        , a.pay_paid_method 
        , a.pay_transaction_id 
        , a.pay_description 
        , a.pay_university_fees 
        , a.pay_study_fees 
        , a.pay_total_amount 
        , a.pay_balance 
        , a.pay_date 
        , b.fee_uni_fee_total 
        ,b.fee_sdy_fee_total 
        , b.fee_uni_fee 
        ,b.fee_sty_fee 
         FROM `jeno_payment_history` AS a 
         LEFT JOIN jeno_fees AS b 
         ON a.pay_admission_id = b.fee_admision_id 
         WHERE b.fee_admision_id = '$studentId' 
         AND a.pay_status ='Active' 
         AND b.fee_status = 'Active';";
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
         WHERE pay_admission_id = '$studentId' AND pay_status = 'Active';";

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
            // Prepare university details array
            $courseDetails = [
                'pay_id' => $row['pay_id'],
                'pay_admission_id' => $row['pay_admission_id'],
                'pay_student_name' => $row['pay_student_name'],
                'pay_year' => $row['pay_year'],
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

    


    

        // // Handle deleting a client
            if (isset($_POST['deleteId'])) {
                $id = $_POST['deleteId'];
                $updatedBy = $_SESSION['userId'];

                $deleteAmuont = "SELECT 
                    a.pay_admission_id   
                 , a.pay_university_fees 
                 , a.pay_study_fees
                 , a.pay_total_amount 
                 , b.fee_uni_fee 
                 , b.fee_sty_fee 
                  FROM `jeno_payment_history` AS a 
                  LEFT JOIN jeno_fees AS b 
                  ON a.pay_admission_id = b.fee_admision_id 
                  WHERE pay_id = $id;";

               if(  $deleteAmuont_res = mysqli_query($conn, $deleteAmuont)){
                  $fee_row = mysqli_fetch_assoc($deleteAmuont_res);
                  $admision = $fee_row['pay_admission_id'];
                  $pay_university_fees = $fee_row['pay_university_fees'];
                  $pay_study_fees = $fee_row['pay_study_fees'];
                  $fee_uni_fee_total = $fee_row['fee_uni_fee'];
                  $fee_sdy_fee_total = $fee_row['fee_sty_fee'];
                  
                $updateUniFees = $fee_uni_fee_total - $pay_university_fees ;
                $updateStyFees = $fee_sdy_fee_total - $pay_study_fees ;

                  $updateSql = "UPDATE `jeno_fees` 
                  SET `fee_uni_fee_total`='$updateUniFees'
                  , `fee_sdy_fee_total`='$updateStyFees'
                  , `fee_updated_by`='$updatedBy' 
                  WHERE `fee_admision_id` = '$admision'";

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



            // Check if employee id is provided
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];

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
                FROM `jeno_course` WHERE cou_id = $uniId";
                
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



            // Handle fetching university details for editing
    if (isset($_POST['editId']) && $_POST['editId'] != '') {
    
    $editId = $_POST['editId'];

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
    WHERE a.fee_id= $editId";

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






            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();


    
    
