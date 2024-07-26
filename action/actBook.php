<?php
include "../class.php";


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

    // Handle adding a university
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addBookissue') {
        $studentId = $_POST['studentId'];
        $bookReceived = $_POST['bookReceived'];
        $bookUniReceived = $_POST['bookUniReceived'];
        $bookIssue = $_POST['bookIssue'];
        $idCard = $_POST['idCard'];
        $bookId = $_POST['bookId'];
        
        $bookIssueAll =json_encode($bookIssue);
        $bookIssueUni =json_encode($bookUniReceived);
        
        

    // Other fields
    // $centerId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];


    if($bookUniReceived){
          // Insert into payment history
     $history_sql = "UPDATE `jeno_book`
     SET 
         `book_stu_id` = '$studentId',
         `book_received` = '$bookReceived',
         `book_uni_received` ='$bookIssueUni',
         `book_issued` = '$bookIssueAll',
         `book_id_card` = '$idCard',
         `book_updated_by` = '$createdBy'
     WHERE `book_id` = '$bookId';";
    } else {

          // Insert into payment history
     $history_sql = "UPDATE `jeno_book`
     SET 
         `book_stu_id` = '$studentId',
         `book_received` = '$bookReceived',
         `book_uni_received` ='$bookIssueUni',
         `book_issued` = '$bookIssueAll',
         `book_id_card` = '$idCard',
         `book_updated_by` = '$createdBy'
     WHERE `book_id` = '$bookId';";

    }

   

    if ($conn->query($history_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Book Issue added successfully!";
    } else {
        $response['message'] = "Error adding Book Issue: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

    // Handle fetching university details for editing
    if (isset($_POST['addGetId']) && $_POST['addGetId'] != '') {
    
    $addGetId = $_POST['addGetId'];

    $selQuery = "SELECT 
    a.stu_id
    , a.stu_name
    , a.stu_phone
    , a.stu_email
    , a.stu_uni_id
    , a.stu_cou_id
    , a.stu_medium_id
    , a.stu_apply_no
    , a.stu_enroll
    , a.stu_study_year
    , a.stu_aca_year 
    , b.cou_fees_type
    , b.cou_id 
    , b.cou_name 
    , b.cou_duration 
    FROM `jeno_student` AS a 
    LEFT JOIN jeno_course AS b 
    ON a.stu_cou_id = b.cou_id 
    WHERE a.stu_apply_no ='$addGetId' 
    AND a.stu_status ='Active';";

   

    $result = mysqli_query($conn, $selQuery);


    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $student = $row['stu_id'];
        $payId_sql ="SELECT `book_id`,`book_issued` FROM `jeno_book` WHERE book_stu_id = $student";
        $result1 = mysqli_query($conn, $payId_sql);
        $pay = mysqli_fetch_assoc($result1);
        $totall_books =json_decode($pay['book_issued']);

        // Prepare university details array
        $courseDetails = [
            'stu_id' => $row['stu_id'],
            'stu_name' => $row['stu_name'],
            'stu_phone' => $row['stu_phone'],
            'stu_email' => $row['stu_email'],
            'stu_uni_id' => $row['stu_uni_id'],
            'stu_cou_id' => $row['stu_cou_id'],
            'stu_medium_id' => $row['stu_medium_id'],
            'stu_apply_no' => $row['stu_apply_no'],
            'stu_enroll' => $row['stu_enroll'],
            'stu_study_year' => $row['stu_study_year'],
            'stu_aca_year' => $row['stu_aca_year'],
            'cou_fees_type' => $row['cou_fees_type'],
            'cou_id' => $row['cou_id'],
            'cou_name' => $row['cou_name'],
            'cou_duration' => $row['cou_duration'],
            'book_id' => $pay['book_id'],
            'total_book' => $totall_books,
        
        ];

        echo json_encode($courseDetails);
    } else {
        $response['message'] = "Error fetching Book details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }



    
// Check if necessary POST parameters are set
if (isset($_POST['year']) && $_POST['year'] != '' &&
    isset($_POST['admissionId']) && $_POST['admissionId'] != '' &&
    isset($_POST['typeExam']) && $_POST['typeExam'] != '') {

    $year = $_POST['year'];
    $admissionId = $_POST['admissionId'];
    $typeExam = $_POST['typeExam'];

    // Prepare SQL query to fetch student and subject details
    $selQuery = "SELECT 
        a.stu_id,
        a.stu_name,
        a.stu_cou_id,
        a.stu_apply_no,
        b.sub_exam_patten,
        b.sub_subject_code,
        b.sub_ele_id,
        b.sub_subject_name,
        b.sub_addition_lag_name,
        b.sub_addition_sub_code,
        b.sub_addition_sub_name,
        b.sub_type,
        c.cou_medium,
        c.cou_fees_type,
        c.cou_duration,
        d.add_language
        FROM `jeno_student` AS a
        LEFT JOIN jeno_subject AS b ON a.stu_cou_id = b.sub_cou_id
        LEFT JOIN jeno_course AS c ON a.stu_cou_id = c.cou_id
        LEFT JOIN jeno_stu_additional AS d ON a.stu_id = d.add_stu_id
        WHERE a.stu_apply_no='$admissionId'
            AND c.cou_fees_type = '$typeExam'
            AND b.sub_exam_patten = '$year'";

    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $student = $row['stu_id'];
        $payId_sql = "SELECT `book_id`, `book_issued` ,`book_uni_received` FROM `jeno_book` WHERE book_stu_id = $student";
        $result1 = mysqli_query($conn, $payId_sql);
        $pay = mysqli_fetch_assoc($result1);
        $total_books = json_decode($pay['book_issued'], true);
        $total_Uni_books = json_decode($pay['book_uni_received'], true);
        if (!is_array($total_books)) {
            $total_books = []; // Ensure it's an array
        }
        if (!is_array($total_Uni_books)) {
            $total_Uni_books = []; // Ensure it's an array
        }

        // Decode JSON fields
        $sub_subject_name = json_decode($row['sub_subject_name'], true);
        $sub_addition_sub_name = json_decode($row['sub_addition_sub_name'], true);
        $sub_addition_lag_name = json_decode($row['sub_addition_lag_name'], true);
        $add_language = $row['add_language'];
        $sub_ele_id = $row['sub_ele_id'];

        // Initialize arrays for final response
        $final_subjects = [];
        $sub_addition_sub_name_filtered = [];

        // Check if add_language is true and sub_ele_id is empty
        if ($add_language && empty($sub_ele_id)) {
            // Check if add_language exists in sub_addition_lag_name
            if (in_array($add_language, $sub_addition_lag_name)) {
                // Find index of add_language in sub_addition_lag_name
                $index = array_search($add_language, $sub_addition_lag_name);

                // Get corresponding sub_addition_sub_name based on index
                if ($index !== false && isset($sub_addition_sub_name[$index])) {
                    $sub_addition_sub_name_filtered[] = $sub_addition_sub_name[$index];
                }
            }
        }

        // Prepare final subject array excluding books already issued
        foreach ($sub_subject_name as $index => $subjectName) {
            if (!in_array($subjectName, $total_books)) {
                $final_subjects[] = $subjectName;
            }
        }

        // Add filtered addition subjects to the final subjects array
        foreach ($sub_addition_sub_name_filtered as $additionalSubject) {
            if (!in_array($additionalSubject, $total_books)) {
                $final_subjects[] = $additionalSubject;
            }
        }

        // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
        if (!empty($sub_ele_id)) {
            foreach ($sub_addition_sub_name as $index => $additionalSubject) {
                if (!in_array($additionalSubject, $total_books)) {
                    $final_subjects[] = $additionalSubject;
                }
            }
        }


        // ----------------------------------------------------------------------------
         
          // Decode JSON fields
          $uni_sub_subject_name = json_decode($row['sub_subject_name'], true);
          $uni_sub_addition_sub_name = json_decode($row['sub_addition_sub_name'], true);
          $uni_sub_addition_lag_name = json_decode($row['sub_addition_lag_name'], true);
          $uni_add_language = $row['add_language'];
          $uni_sub_ele_id = $row['sub_ele_id'];
 
         // Initialize arrays for final response
         $Uni_final_subjects = [];
         $Uni_sub_addition_sub_name_filtered = [];
 
         // Check if add_language is true and sub_ele_id is empty
         if ($uni_add_language && empty($uni_sub_ele_id)) {
             // Check if add_language exists in sub_addition_lag_name
             if (in_array($uni_add_language, $uni_sub_addition_lag_name)) {
                 // Find index of add_language in sub_addition_lag_name
                 $index = array_search($uni_add_language, $uni_sub_addition_lag_name);
 
                 // Get corresponding sub_addition_sub_name based on index
                 if ($index !== false && isset($uni_sub_addition_sub_name[$index])) {
                     $Uni_sub_addition_sub_name_filtered[] = $uni_sub_addition_sub_name[$index];
                 }
             }
         }
 
         // Prepare final subject array excluding books already issued
         foreach ($uni_sub_subject_name as $index => $subjectName) {
             if (!in_array($subjectName, $total_Uni_books)) {
                 $Uni_final_subjects[] = $subjectName;
             }
         }
 
         // Add filtered addition subjects to the final subjects array
         foreach ($Uni_sub_addition_sub_name_filtered as $additionalSubject) {
             if (!in_array($additionalSubject, $total_Uni_books)) {
                 $Uni_final_subjects[] = $additionalSubject;
             }
         }
 
         // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
         if (!empty($uni_sub_ele_id)) {
             foreach ($uni_sub_addition_sub_name as $index => $additionalSubject) {
                 if (!in_array($additionalSubject, $total_Uni_books)) {
                     $Uni_final_subjects[] = $additionalSubject;
                 }
             }
         }




        // ___________________________---------------------------------------------------------


        // Prepare response array
        $courseDetails = [
            'stu_id' => $row['stu_id'],
            'stu_name' => $row['stu_name'],
            'sub_ele_id' => $row['sub_ele_id'],
            'stu_cou_id' => $row['stu_cou_id'],
            'stu_apply_no' => $row['stu_apply_no'],
            'sub_exam_patten' => $row['sub_exam_patten'],
            'sub_subject_name' => $sub_subject_name,
            'sub_addition_lag_name' => $sub_addition_lag_name,
            'sub_addition_sub_name' => $sub_addition_sub_name,
            'sub_type' => $row['sub_type'],
            'cou_medium' => $row['cou_medium'],
            'cou_fees_type' => $row['cou_fees_type'],
            'cou_duration' => $row['cou_duration'],
            'add_language' => $row['add_language'],
            'final_subjects' => $final_subjects,
            'Uni_final_subjects' => $Uni_final_subjects
        ];

        echo json_encode($courseDetails);
    } else {
        $response = ['message' => "Error fetching details: " . mysqli_error($conn)];
        echo json_encode($response);
    }
    exit();
} else {
    $response = ['message' => 'Required parameters are missing.'];
    echo json_encode($response);
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


    
    
