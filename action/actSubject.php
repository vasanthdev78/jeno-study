<?php
include("../class.php");


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];




    //---get course --------------------------

    // Handle fetching university details for editing
if (isset($_POST['universitySub']) && $_POST['universitySub'] != '') {
    
    $universitySub = $_POST['universitySub'];

    $universitySubQuery = "SELECT `cou_id`, `cou_name` FROM `jeno_course` WHERE cou_uni_id = $universitySub;";
    $universitySubResult = mysqli_query($conn, $universitySubQuery);

    if ($universitySubResult) {
        while ($subRow = mysqli_fetch_assoc($universitySubResult)) {
            // Push each course as an object into the courses array
            $courseSub = array(
                'cou_id' => $subRow['cou_id'],
                'cou_name' => $subRow['cou_name']
            );
            $coursesSub[] = $courseSub;
        }

        echo json_encode($coursesSub);
    } else {
        $response['message'] = "Error fetching Course Name details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }

    //-----get elective pepar -------------------------------
// Handle fetching university details for editing
if (isset($_POST['electiveSub']) && $_POST['electiveSub'] != '') {
    $electiveSub = $_POST['electiveSub'];

    // Query to fetch course details
    $courseQuery = "SELECT `cou_id`, `cou_name`, `cou_exam_type`, `cou_duration` FROM `jeno_course` WHERE cou_id = $electiveSub;";
    $courseResult = mysqli_query($conn, $courseQuery);

    // Query to fetch elective details
    $electiveQuery = "SELECT `ele_id`, `ele_elective` FROM `jeno_elective` WHERE ele_cou_id = $electiveSub AND ele_lag_elec = 'E' AND ele_status = 'Active';";
    $electiveResult = mysqli_query($conn, $electiveQuery);

    // Initialize response array
    $response = array(
        'course' => null,
        'electives' => array()
    );

    // Fetch course details
    if ($courseResult && mysqli_num_rows($courseResult) > 0) {
        $response['course'] = mysqli_fetch_assoc($courseResult);
    } else {
        $response['message'] = "Error fetching course details: " . mysqli_error($conn);
        echo json_encode($response);
        exit();
    }

    // Fetch elective details
    if ($electiveResult) {
        while ($elecRow = mysqli_fetch_assoc($electiveResult)) {
            $electSub = array(
                'ele_id' => $elecRow['ele_id'],
                'ele_elective' => $elecRow['ele_elective']
            );
            $response['electives'][] = $electSub;
        }
    } else {
        $response['message'] = "Error fetching elective details: " . mysqli_error($conn);
        echo json_encode($response);
        exit();
    }

    // Send response as JSON
    echo json_encode($response);
    exit(); 
}




// Handle adding a university
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addSubject') {
    $university = $_POST['university'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $subType = $_POST['subType'];
    
    $newInputSubjectCode = $_POST['newInputSubjectCode'];
    $newInputSubjectName = $_POST['newInputSubjectName'];

    $uniCenterId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];

    $subjectCode =json_encode($newInputSubjectCode);
    $subjectName =json_encode($newInputSubjectName);
     // Other fields
     $uniCenterId = $_SESSION['centerId'];
     $createdBy = $_SESSION['userId'];

        if($subType === "Elective"){
            $elective = $_POST['elective'];
            $newInputElectiveSubjectCode = $_POST['newInputElectiveSubjectCode'];
            $newInputElectiveSubjectName = $_POST['newInputElectiveSubjectName'];

            $ElectiveSubjectCode =json_encode($newInputElectiveSubjectCode);
            $ElectiveSubjectName =json_encode($newInputElectiveSubjectName);

            $university_sql = "INSERT INTO `jeno_subject`
            ( `sub_uni_id`
            , `sub_cou_id`
            , `sub_ele_id`
            , `sub_exam_patten`
            , `sub_subject_code`
            , `sub_subject_name`
            , `sub_addition_sub_code`
            , `sub_addition_sub_name`
            , `sub_type`
            , `sub_center_id`    
            , `sub_created_by`) VALUES 
        
            ('$university'
            ,'$course'
            ,'$elective'
            ,'$year'
            ,'$subjectCode'
            ,'$subjectName'
            ,'$ElectiveSubjectCode'
            ,'$ElectiveSubjectName'
            ,'$subType'
            ,'$uniCenterId'
            ,'$createdBy')";
        

        } if($subType === "language"){
    $newInputLanguageSubjectCode = $_POST['newInputLanguageSubjectCode'];
    $newInputLanguageSubjectName = $_POST['newInputLanguageSubjectName'];
    $newInputLanguageSubjectType = $_POST['newInputLanguageSubjectType'];

    $LanguageSubjectCode =json_encode($newInputLanguageSubjectCode);
    $LanguageSubjectName =json_encode($newInputLanguageSubjectName);
    $LanguageSubjectType =json_encode($newInputLanguageSubjectType);
    

    $university_sql = "INSERT INTO `jeno_subject`
    ( `sub_uni_id`
    , `sub_cou_id`
    , `sub_exam_patten`
    , `sub_subject_code`
    , `sub_subject_name`
    , `sub_addition_lag_name`
    , `sub_addition_sub_code`
    , `sub_addition_sub_name`
    , `sub_type`
    , `sub_center_id`    
    , `sub_created_by`) VALUES 

    ('$university'
    ,'$course'
    ,'$year'
    ,'$subjectCode'
    ,'$subjectName'
    ,'$LanguageSubjectCode'
    ,'$LanguageSubjectName'
    ,'$LanguageSubjectType'
    ,'$subType'
    ,'$uniCenterId'
    ,'$createdBy')";
            
            }
        



    if ($conn->query($university_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Subject added successfully!";
    } else {
        $response['message'] = "Error adding Subject: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}


// Handle fetching university details for editing
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $editId = $_POST['editId'];

    $selQuery = "SELECT 
    `sub_id`
    , `sub_uni_id`
    , `sub_cou_id`
    , `sub_ele_id`
    , `sub_exam_patten`
    , `sub_subject_code`
    , `sub_subject_name`
    , `sub_addition_lag_name`
    , `sub_addition_sub_code`
    , `sub_addition_sub_name`
    , `sub_type`
     FROM `jeno_subject`
      WHERE sub_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        

        $courseDetails = [
            'sub_id' => $row['sub_id'],
            'sub_uni_id' => $row['sub_uni_id'],
            'sub_cou_id' => $row['sub_cou_id'],
            'sub_ele_id' => $row['sub_ele_id'], // Course ID for pre-selecting the course in the dropdown
            'sub_exam_patten' => $row['sub_exam_patten'],
            'sub_subject_code' => $row['sub_subject_code'],
            'sub_subject_name' => $row['sub_subject_name'],
            'sub_addition_lag_name' => $row['sub_addition_lag_name'],
            'sub_addition_sub_code' => $row['sub_addition_sub_code'],
            'sub_addition_sub_name' => $row['sub_addition_sub_name'],
            'sub_type' => $row['sub_type'],
            
        ];

        echo json_encode($courseDetails);
    } else {
        $response['message'] = "Error fetching Sunbject details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit();
}


    // Handle updating student details
        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editEnquiry') {
            $editEnquiryId = $_POST['editEnquiryId'];
            $editName = $_POST['editName'];
            $editGender = $_POST['editGender'];
            $editDob = $_POST['editDob'];
            $editMobile = $_POST['editMobile'];
            $editEmail = $_POST['editEmail'];
            $editAddress = $_POST['editAddress'];
            $editUniversity = $_POST['editUniversity'];
            $editCourse = $_POST['editCourse'];
            $editMedium = $_POST['editMedium'];
            // Other fields
            
            $updatedBy = $_SESSION['userId'];
    
 
            $editUniversity ="UPDATE `jeno_enquiry`
             SET 
             `enq_uni_id`='$editUniversity'
             ,`enq_cou_id`='$editCourse'
             ,`enq_stu_name`='$editName'
             ,`enq_email`='$editEmail'
             ,`enq_dob`='$editDob'
             ,`enq_gender`='$editGender'
             ,`enq_mobile`='$editMobile'
             ,`enq_address`='$editAddress'
             ,`enq_medium`='$editMedium'
             ,`enq_updated_by`='$updatedBy'
              WHERE enq_id = $editEnquiryId";
            
            $universityres = mysqli_query($conn, $editUniversity);

                if ($universityres) {
                    $_SESSION['message'] = "Enquiry details Updated successfully!";
                    $response['success'] = true;
                    $response['message'] = "Enquiry details Updated successfully!";
                } 
                else {
                $response['message'] = "Error: " . mysqli_error($conn);
            }
            
            echo json_encode($response);
            exit();
        }


        // // Handle deleting a client
            if (isset($_POST['deleteId'])) {
                $id = $_POST['deleteId'];
                $updatedBy = $_SESSION['userId'];

                $queryDel = "UPDATE `jeno_enquiry` SET `enq_updated_by`='$updatedBy',`enq_status`='Inactive' WHERE enq_id = $id;";
                $reDel = mysqli_query($conn, $queryDel);

                if ($reDel) {
                    
                    $_SESSION['message'] = "Enquiry details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "Enquiry details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting Enquiry details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }



            // Check if employee id is provided
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];

                // Prepare and execute the SQL query
                $selQuery = "SELECT  
                `enq_uni_id`
                , `enq_cou_id`
                , `enq_stu_name`
                , `enq_email`
                , `enq_dob`
                , `enq_gender`
                , `enq_mobile`
                , `enq_address`
                , `enq_medium`
                , `enq_adminsion_status`
                 FROM `jeno_enquiry`
                  WHERE enq_id = $uniId;";
                
                $result1 = $conn->query($selQuery);

                if($result1) {
                    $row = mysqli_fetch_assoc($result1);

             // Prepare university details array
        $enquiryDetails = [
            'enq_uni_id' => universityName($row['enq_uni_id']),
            'enq_cou_id' => courseNameOnly($row['enq_cou_id']),
            'enq_stu_name' => $row['enq_stu_name'],
            'enq_email' => $row['enq_email'],
            'enq_dob' => $row['enq_dob'],
            'enq_gender' => $row['enq_gender'],
            'enq_mobile' => $row['enq_mobile'],
            'enq_address' => $row['enq_address'],
            'enq_medium' => $row['enq_medium'],
            'enq_adminsion_status' => $row['enq_adminsion_status'],
            
        ];

          echo json_encode($enquiryDetails);
          exit();
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }





            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();

