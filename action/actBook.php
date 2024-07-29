<?php
include "../class.php";


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Handle adding a book issue
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addBookissue') {
    $studentId = $_POST['studentId'];
    $bookReceived = $_POST['bookReceived'];
    $bookUniReceived = $_POST['bookUniReceived'];
    $bookIssue = $_POST['bookIssue'];
    $idCard = $_POST['idCard'];
    $bookId = $_POST['bookId'];
    $courseyear = $_POST['courseyear'];
    $bookIssueAll = json_encode($bookIssue);
    $bookIssueUni = json_encode($bookUniReceived);
    $createdBy = $_SESSION['userId'];

    // Check if a row already exists for the given studentId and courseyear
    $check_sql = "SELECT * FROM `jeno_book` WHERE `book_stu_id` = '$studentId' AND `courseyear` = '$courseyear'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Row exists, update it
        $history_sql = "UPDATE `jeno_book`
                        SET 
                            `book_received` = '$bookReceived',
                            `book_uni_received` ='$bookIssueUni',
                            `book_issued` = '$bookIssueAll',
                            `book_id_card` = '$idCard',
                            `book_updated_by` = '$createdBy'
                        WHERE `book_stu_id` = '$studentId' AND `courseyear` = '$courseyear'";
    } else {
        // Row does not exist, insert a new row
        $history_sql = "INSERT INTO `jeno_book` (
                            `book_stu_id`, 
                            `book_received`, 
                            `book_uni_received`, 
                            `book_issued`, 
                            `book_id_card`, 
                            `courseyear`, 
                            `book_created_by`
                        ) VALUES (
                            '$studentId', 
                            '$bookReceived', 
                            '$bookIssueUni', 
                            '$bookIssueAll', 
                            '$idCard', 
                            '$courseyear', 
                            '$createdBy'
                        )";
    }

    if ($conn->query($history_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Book Issue added/updated successfully!";
    } else {
        $response['message'] = "Error adding/updating Book Issue: " . $conn->error;
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
        exit();
    } else {
        $response = ['message' => "Error fetching details: " . mysqli_error($conn)];
        echo json_encode($response);
    }
    
    } 



          
            // Check if employee id is provided
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];

                // Prepare and execute the SQL query
                $selQuery = "SELECT 
                            a.book_id
                            , a.book_stu_id
                            , a.book_received
                            , a.book_uni_received
                            , a.book_issued
                            , a.book_id_card
                            , a.book_year
                            ,b.stu_name 
                            , b.stu_apply_no
                            FROM `jeno_book` AS a
                            LEFT JOIN jeno_student AS b
                            ON a.book_stu_id = b.stu_id  
                            WHERE book_id = $uniId";
                
                $result1 = $conn->query($selQuery);

                if($result1) {
                    $row = mysqli_fetch_assoc($result1);
                    
           // Prepare university details array
        $courseViewDetails = [
            'book_id' => $row['book_id'],
            'stu_name' => $row['stu_name'],
            'book_issued' => json_decode($row['book_issued']),
            'book_uni_received' => json_decode($row['book_uni_received']),
            'book_received' => $row['book_received'],
            'book_id_card' => $row['book_id_card'],
            'book_year' => $row['book_year'],
            'stu_apply_no' => $row['stu_apply_no'],
           
        ];

          echo json_encode($courseViewDetails);
          exit();
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }



            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();


    
    
