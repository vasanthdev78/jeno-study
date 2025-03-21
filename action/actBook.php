<?php
include "../class.php"; // function page 
include "../db/dbConnection.php"; // database connection 


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Check if it's an AJAX request
if (isset($_GET['book_centerId'])) {

    // Get the filters from the frontend (if set)
    $university = isset($_GET['university']) ? $_GET['university'] : '';
    $course = isset($_GET['course']) ? $_GET['course'] : '';
    $year = isset($_GET['year']) ? $_GET['year'] : '';
    $centerId = $_GET['book_centerId']; // The center ID passed from frontend

    // Get other parameters (pagination, search, sorting)
    $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    $length = isset($_GET['length']) ? (int)$_GET['length'] : 10;
    $search = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Search value
    $orderColumn = isset($_GET['order'][0]['column']) ? (int)$_GET['order'][0]['column'] : 0; // Column to order by
    $orderDir = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc'; // Sort direction

    // Column names corresponding to the order
    $columns = ['book_id', 'stu_apply_no', 'uni_name', 'cou_name', 'stu_name', 'book_received', 'book_id_card', 'stu_phone'];

    // Build the SQL query with dynamic filters
    $selQuery = "
    SELECT 
        b.book_id,
        b.book_stu_id,
        b.book_received,
        b.book_id_card,
        b.book_status,
        c.stu_name,
        c.stu_apply_no,
        c.stu_addmision_new,
        c.stu_phone,
        d.uni_name,
        e.cou_name
    FROM jeno_book b
    JOIN (SELECT 
            book_stu_id, 
            MAX(book_id) AS max_book_id 
         FROM jeno_book 
         GROUP BY book_stu_id) sub 
    ON b.book_id = sub.max_book_id
    LEFT JOIN jeno_student AS c ON b.book_stu_id = c.stu_id
    LEFT JOIN jeno_university AS d ON c.stu_uni_id = d.uni_id
    LEFT JOIN jeno_course AS e ON c.stu_cou_id = e.cou_id
    WHERE b.book_status = 'Active' 
      AND b.book_center_id = '$centerId'
      AND (c.stu_name LIKE '%$search%' OR c.stu_apply_no LIKE '%$search%' OR d.uni_name LIKE '%$search%' OR e.cou_name LIKE '%$search%')
    ";

    // Add dynamic filters to the SQL query
    if ($university != '') {
        $selQuery .= " AND d.uni_name = '$university'";
    }
    if ($course != '') {
        $selQuery .= " AND e.cou_name = '$course'";
    }
    if ($year != '') {
        $selQuery .= " AND c.stu_addmision_new LIKE '%$year%'"; // Assuming you have a `book_year` field for year filtering
    }

    // Sorting and Pagination
    // $selQuery .= " ORDER BY {$columns[$orderColumn]} $orderDir LIMIT $start, $length";
    $selQuery .= " ORDER BY b.book_id DESC LIMIT $start, $length";

    // Execute the query for filtered data
    $resQuery = mysqli_query($conn, $selQuery);

    // Count total records (without filters)
    $countQuery = "SELECT 
       COUNT(c.stu_id)
    FROM jeno_book b
    JOIN (SELECT 
            book_stu_id, 
            MAX(book_id) AS max_book_id 
         FROM jeno_book 
         GROUP BY book_stu_id) sub 
    ON b.book_id = sub.max_book_id
    LEFT JOIN jeno_student AS c ON b.book_stu_id = c.stu_id
    LEFT JOIN jeno_university AS d ON c.stu_uni_id = d.uni_id
    LEFT JOIN jeno_course AS e ON c.stu_cou_id = e.cou_id
    WHERE b.book_status = 'Active' 
      AND b.book_center_id = '$centerId'";

    // Add filters to the count query for total records
    if ($university != '') {
        $countQuery .= " AND d.uni_name = '$university'";
    }
    if ($course != '') {
        $countQuery .= " AND e.cou_name = '$course'";
    }
    if ($year != '') {
        $countQuery .= " AND c.stu_addmision_new LIKE '%$year%'";
    }

    // Execute count query
    $countResult = mysqli_query($conn, $countQuery);
    $totalRecords = mysqli_fetch_row($countResult)[0];

    // Prepare data for DataTable response
    $data = [];
    $serial = $start + 1;
    while ($row = mysqli_fetch_assoc($resQuery)) {
        $data[] = [
            'serial_number' => $serial++,  // For serial number, increment based on page
            'stu_apply_no' => !empty($row['stu_apply_no']) ? $row['stu_apply_no'] : '---',
            'uni_name' => $row['uni_name'],
            'cou_name' => $row['cou_name'],
            'stu_name' => $row['stu_name'],
            'stu_addmision_new' => $row['stu_addmision_new'],
            'book_received' => $row['book_received'],
            'book_id_card' => $row['book_id_card'],
            'stu_phone' => $row['stu_phone'],
            'action' => '
                <button type="button" onclick="goAddBook(\'' . $row['stu_apply_no'] . '\');" class="btn btn-circle btn-warning text-white modalBtn" data-bs-toggle="modal" data-bs-target="#addBookIssueModal" data-bs-toggle="tooltip" title="Add Book Issue">
                    <i class="bi bi-journal-plus"></i>
                </button>
                
                <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewBook(' . $row['book_stu_id'] . ');" data-bs-toggle="tooltip" title="View Book">
                    <i class="bi bi-eye-fill"></i>
                </button>
            '
        ];
    }

    // Return the response in JSON format for DataTable
    echo json_encode([
        'draw' => $_GET['draw'],
        'recordsTotal' => $totalRecords,
        'recordsFiltered' => $totalRecords, // Filtered records should be same as total records for now
        'data' => $data
    ]);

    exit;
}


// Handle adding a book issue ---------------------------------------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addBookissue') {
    

    // Retrieve POST data
    $studentId = htmlspecialchars($_POST['studentId'], ENT_QUOTES, 'UTF-8');
    $bookReceived = htmlspecialchars($_POST['bookReceived'], ENT_QUOTES, 'UTF-8');
    $bookUniReceived = $_POST['bookUniReceived'] ?? [];
    $bookIssue = $_POST['bookIssue'] ?? [];
    $idCard = htmlspecialchars($_POST['idCard'], ENT_QUOTES, 'UTF-8');
    $bookId = htmlspecialchars($_POST['bookId'], ENT_QUOTES, 'UTF-8');
    $courseyear = htmlspecialchars($_POST['courseyear'], ENT_QUOTES, 'UTF-8');

    $bookIssueUni = json_encode($bookUniReceived);
    $bookIssueAll = json_encode($bookIssue);

    $createdBy = $_SESSION['userId'];

    // Validate inputs (basic validation, more checks may be needed)
    if (empty($studentId) || empty($bookReceived) || empty($idCard) || empty($courseyear)) {
        $response['success'] = false;
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit();
    }

    $history_sql = "UPDATE `jeno_book`
                            SET `book_received` = '$bookReceived',
                                `book_uni_received` = '$bookIssueUni',
                                `book_issued` = '$bookIssueAll',
                                `book_id_card` = '$idCard',
                                `book_updated_by` = '$createdBy'
                            WHERE `book_stu_id` = '$studentId' AND `book_year` = '$courseyear'";

            if (mysqli_query($conn, $history_sql)) {
                $response['success'] = true;
                $response['message'] = "Book Issue added/updated successfully!";
            } else {
                $response['success'] = false;
                $response['message'] = "Error adding/updating Book Issue: " . mysqli_error($conn);
            }
    
    // // Fetch current book issue data
    // $select_book = "SELECT 
    // `book_id`
    // , `book_issued`
    // , `book_uni_received` 
    // FROM `jeno_book` 
    // WHERE book_stu_id = '$studentId' 
    // AND book_year = '$courseyear'"; //select book issue list
    // $result_select_book = mysqli_query($conn, $select_book);
    
    // if ($result_select_book) {
    //     $book_count = mysqli_fetch_assoc($result_select_book);

    //     if ($book_count) {
    //          // Decode JSON values, or initialize as empty arrays if null
    //          $book_uni_received = json_decode($book_count['book_uni_received'], true) ?? [];
    //          $book_issued = json_decode($book_count['book_issued'], true) ?? [];
 
    //          // Ensure POST data is also an array
    //          $bookUniReceived = is_array($bookUniReceived) ? $bookUniReceived : [];
    //          $bookIssue = is_array($bookIssue) ? $bookIssue : [];
 
    //          // Merge arrays
    //          $book_count_uni_received = array_merge($book_uni_received, $bookUniReceived);
    //          $book_count_book_received = array_merge($book_issued, $bookIssue);
 
    //          // Encode back to JSON
    //          $bookIssueUni = json_encode($book_count_uni_received);
    //          $bookIssueAll = json_encode($book_count_book_received);

    //         // Update record
    //         $history_sql = "UPDATE `jeno_book`
    //                         SET `book_received` = '$bookReceived',
    //                             `book_uni_received` = '$bookIssueUni',
    //                             `book_issued` = '$bookIssueAll',
    //                             `book_id_card` = '$idCard',
    //                             `book_updated_by` = '$createdBy'
    //                         WHERE `book_stu_id` = '$studentId' AND `book_year` = '$courseyear'";

    //         if (mysqli_query($conn, $history_sql)) {
    //             $response['success'] = true;
    //             $response['message'] = "Book Issue added/updated successfully!";
    //         } else {
    //             $response['success'] = false;
    //             $response['message'] = "Error adding/updating Book Issue: " . mysqli_error($conn);
    //         }
    //     } else {
    //         $response['success'] = false;
    //         $response['message'] = "No record found for the given student and year.";
    //     }
    // } else {
    //     $response['success'] = false;
    //     $response['message'] = "Error fetching book data: " . mysqli_error($conn);
    // }

    // Close connection
    mysqli_close($conn);

    echo json_encode($response);
    exit();
}
//-----------function end -------------------------------------------------


    // Handle fetching book details for editing----------------------------------
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
        , a.stu_join_year  
        , b.cou_fees_type
        , b.cou_exam_type
        , b.cou_id 
        , b.cou_name 
        , b.cou_duration
        , c.fee_sdy_fee_total
        , c.fee_sty_fee
        , d.add_language
        FROM `jeno_student` AS a 
        LEFT JOIN jeno_course AS b 
        ON a.stu_cou_id = b.cou_id
        LEFT JOIN jeno_fees AS c ON a.stu_id = c.fee_stu_id
        LEFT JOIN jeno_stu_additional as d on a.stu_id =add_stu_id
        WHERE a.stu_apply_no ='$addGetId' 
        AND a.stu_status ='Active';";

   

    $result = mysqli_query($conn, $selQuery);


    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $student = $row['stu_id'];
        $payId_sql ="SELECT `book_id`,`book_received` ,`book_issued`,`book_id_card`,`book_uni_received` FROM `jeno_book` WHERE book_stu_id = $student";
        $result1 = mysqli_query($conn, $payId_sql);
        $pay = mysqli_fetch_assoc($result1);
        $total_received_books =json_decode($pay['book_issued']);
        $total_uni_books =json_decode($pay['book_uni_received']);

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
            'stu_join_year' => $row['stu_join_year'],
            'cou_fees_type' => $row['cou_fees_type'],
            'cou_exam_type' => $row['cou_exam_type'],
            'cou_id' => $row['cou_id'],
            'cou_name' => $row['cou_name'],
            'cou_duration' => $row['cou_duration'],
            'book_id' => $pay['book_id'],
            'total_book' => $total_received_books,
            'total_uni_books' => $total_uni_books,
            'fee_sdy_fee_total' => $row['fee_sdy_fee_total'],
            'fee_sty_fee' => $row['fee_sty_fee'],
            'book_received' => $pay['book_received'],
            'book_id_card' => $pay['book_id_card'],
            'add_language' => $row['add_language']
        
        ];

        echo json_encode($courseDetails);
    } else {
        $response['message'] = "Error fetching Book details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }

//----------function end ----------------------------------------

    
// Handle insert new  details for Year change -----------------------
if (isset($_POST['year']) && $_POST['year'] != '' &&
    isset($_POST['admissionId']) && $_POST['admissionId'] != '' &&
    isset($_POST['typeExam']) && $_POST['typeExam'] != '') {

    $year = $_POST['year'];
    $admissionId = $_POST['admissionId'];
    $typeExam = $_POST['typeExam'];
    $add_language = $_POST['add_language'];



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
        c.cou_exam_type,
        c.cou_duration,
        d.add_language
        FROM `jeno_student` AS a
        LEFT JOIN jeno_subject AS b ON a.stu_cou_id = b.sub_cou_id
        LEFT JOIN jeno_course AS c ON a.stu_cou_id = c.cou_id
        LEFT JOIN jeno_stu_additional AS d ON a.stu_id = d.add_stu_id
        WHERE a.stu_apply_no='$admissionId'
            AND c.cou_exam_type = '$typeExam'
            AND b.sub_ele_id  = '$add_language' AND d.add_language = '$add_language'";

    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $student = $row['stu_id'];
        $payId_sql = "SELECT `book_id`, `book_issued` ,`book_uni_received` FROM `jeno_book` WHERE book_stu_id = '$student' AND book_year = '$year'";
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
        // Ensure that the variables are initialized as arrays
            $sub_subject_name = is_array($sub_subject_name) ? $sub_subject_name : [];
            $sub_addition_sub_name = is_array($sub_addition_sub_name) ? $sub_addition_sub_name : [];
            $sub_addition_lag_name = is_array($sub_addition_lag_name) ? $sub_addition_lag_name : [];

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
            //if (!in_array($subjectName, $total_books)) {
                $final_subjects[] = $subjectName;
            //}
        }

        // Add filtered addition subjects to the final subjects array
        foreach ($sub_addition_sub_name_filtered as $additionalSubject) {
            //if (!in_array($additionalSubject, $total_books)) {
                $final_subjects[] = $additionalSubject;
            //}
        }

        // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
        if (!empty($sub_ele_id)) {
            foreach ($sub_addition_sub_name as $index => $additionalSubject) {
                //if (!in_array($additionalSubject, $total_books)) {
                    $final_subjects[] = $additionalSubject;
                //}
            }
        }


        // ----------------------------------------------------------------------------
         
          // Decode JSON fields
          $uni_sub_subject_name = json_decode($row['sub_subject_name'], true);
          $uni_sub_addition_sub_name = json_decode($row['sub_addition_sub_name'], true);
          $uni_sub_addition_lag_name = json_decode($row['sub_addition_lag_name'], true);

          // Ensure that the variables are initialized as arrays
            $uni_sub_subject_name = is_array($uni_sub_subject_name) ? $uni_sub_subject_name : [];
            $uni_sub_addition_sub_name = is_array($uni_sub_addition_sub_name) ? $uni_sub_addition_sub_name : [];
            $uni_sub_addition_lag_name = is_array($uni_sub_addition_lag_name) ? $uni_sub_addition_lag_name : [];

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
             //if (!in_array($subjectName, $total_Uni_books)) {
                 $Uni_final_subjects[] = $subjectName;
             //}
         }
 
         // Add filtered addition subjects to the final subjects array
         foreach ($Uni_sub_addition_sub_name_filtered as $additionalSubject) {
             //if (!in_array($additionalSubject, $total_Uni_books)) {
                 $Uni_final_subjects[] = $additionalSubject;
             //}
         }
 
         // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
         if (!empty($uni_sub_ele_id)) {
             foreach ($uni_sub_addition_sub_name as $index => $additionalSubject) {
                // if (!in_array($additionalSubject, $total_Uni_books)) {
                     $Uni_final_subjects[] = $additionalSubject;
                 //}
             }
         }

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
            'Uni_final_subjects' => $Uni_final_subjects,
            'total_books_issue' => $total_books,
            'total_books_receive' => $total_Uni_books
        ];

        echo json_encode($courseDetails);
        exit();
    } else {
        $response = ['message' => "Error fetching details: " . mysqli_error($conn)];
        echo json_encode($response);
    }
    
    } 

// -------function end --------------------------------------------------



    
  
// Handle Next year Move student shhow book details ------------------------------------
if (isset($_POST['addyear']) && $_POST['addyear'] != '' &&
    isset($_POST['addadmissionId']) && $_POST['addadmissionId'] != '' &&
    isset($_POST['addtypeExam']) && $_POST['addtypeExam'] != '' &&
    isset($_POST['addstudentId']) && $_POST['addstudentId'] != '') {

        $year = $_POST['addyear'];
        $admissionId = $_POST['addadmissionId'];
        $typeExam = $_POST['addtypeExam'];
        $addstudentId = $_POST['addstudentId'];

    $createdBy = $_SESSION['userId'];
    $centerId = $_SESSION['centerId'];

    // Check the number of books for the given year
    $select_year = "SELECT COUNT(book_id) AS total_books
                    FROM `jeno_book`
                    WHERE `book_year` = '$year' AND book_stu_id = '$addstudentId' AND book_status ='Active';";
    $select_year_result = mysqli_query($conn, $select_year);

    if ($select_year_result) {
        $count_row = mysqli_fetch_assoc($select_year_result);
        $total_books_count = $count_row['total_books'];

        // Check if there are no books for the specified year
        if ($total_books_count == 0) {
            // Insert a new record into `jeno_book` table
            $book_insert = "INSERT INTO `jeno_book`
            (`book_stu_id`
            , `book_year`
            , `book_center_id`
            , `book_created_by`) 
            VALUES 
            ('$addstudentId'
            , '$year'
            , '$centerId'
            , '$createdBy')";

            $book_insert_result = mysqli_query($conn, $book_insert);

            if (!$book_insert_result) {
                // Output error message if the insertion fails
                echo "Error inserting book record: " . mysqli_error($conn);
                exit();
            } else {
                // echo "Book record inserted successfully.";
            }
        } else {
            // echo "Books already found for year $year.";
        }
    } else {
        echo "Error checking book records: " . mysqli_error($conn);
        exit();
    }

    
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
            AND c.cou_exam_type = '$typeExam'
            AND b.sub_exam_patten = '$year'";

    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            $response = ['message' => "No data found for the selected year."];
            echo json_encode($response);
            exit();
        }

        $student = $row['stu_id'];
        $payId_sql = "SELECT `book_id`, `book_issued` ,`book_uni_received` FROM `jeno_book` WHERE book_stu_id = '$student' AND book_year = '$year'";
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
            //if (!in_array($subjectName, $total_books)) {
                $final_subjects[] = $subjectName;
            //}
        }

        // Add filtered addition subjects to the final subjects array
        foreach ($sub_addition_sub_name_filtered as $additionalSubject) {
            //if (!in_array($additionalSubject, $total_books)) {
                $final_subjects[] = $additionalSubject;
           // }
        }

        // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
        if (!empty($sub_ele_id)) {
            foreach ($sub_addition_sub_name as $index => $additionalSubject) {
                //if (!in_array($additionalSubject, $total_books)) {
                    $final_subjects[] = $additionalSubject;
               // }
            }
        }

         
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
             //if (!in_array($subjectName, $total_Uni_books)) {
                 $Uni_final_subjects[] = $subjectName;
             //}
         }
 
         // Add filtered addition subjects to the final subjects array
         foreach ($Uni_sub_addition_sub_name_filtered as $additionalSubject) {
             //if (!in_array($additionalSubject, $total_Uni_books)) {
                 $Uni_final_subjects[] = $additionalSubject;
             //}
         }
 
         // Include sub_addition_sub_name and sub_addition_lag_name in the final subjects array if sub_ele_id is present
         if (!empty($uni_sub_ele_id)) {
             foreach ($uni_sub_addition_sub_name as $index => $additionalSubject) {
                 //if (!in_array($additionalSubject, $total_Uni_books)) {
                     $Uni_final_subjects[] = $additionalSubject;
                 //}
             }
         }



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
            'Uni_final_subjects' => $Uni_final_subjects,
            'total_books_issue' => $total_books,
            'total_books_receive' => $total_Uni_books
        ];

        echo json_encode($courseDetails);
        exit();
    } else {
        $response = ['message' => "Error fetching details: " . mysqli_error($conn)];
        echo json_encode($response);
    }
    } 


    
    //-----------FUNCTION END --------------------------------------


    // Fetching book details SHOW view page ---------------------------
    if (isset($_POST['id']) && $_POST['id'] != '') {
    $uniId = $_POST['id'];

    // Prepare and execute the SQL query
    $selQuery = "SELECT 
                a.book_id,
                a.book_stu_id,
                a.book_received,
                a.book_uni_received,
                a.book_issued,
                a.book_id_card,
                a.book_year,
                b.stu_name,
                b.stu_apply_no
                FROM `jeno_book` AS a
                LEFT JOIN jeno_student AS b
                ON a.book_stu_id = b.stu_id  
                WHERE a.book_stu_id = '$uniId'";

    $result1 = $conn->query($selQuery);

    if ($result1) {
        $courseViewDetail = [];

        // Fetch all rows
        while ($row = mysqli_fetch_assoc($result1)) {
            // Prepare book details array
            $courseViewDetails = array(
                'book_id' => $row['book_id'],
                'stu_name' => $row['stu_name'],
                'book_issued' => json_decode($row['book_issued'], true) ?? [], // Ensure it's an array
                'book_uni_received' => json_decode($row['book_uni_received'], true) ?? [], // Ensure it's an array
                'book_received' => $row['book_received'],
                'book_id_card' => $row['book_id_card'],
                'book_year' => $row['book_year'],
                'stu_apply_no' => $row['stu_apply_no'],
            );
            $courseViewDetail[] = $courseViewDetails;
        }

        echo json_encode($courseViewDetail);
        exit();
    } else {
        echo "Error executing query: " . $conn->error;
    }
    }

    //----function end -----------------------------------------------


            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();


    
    
