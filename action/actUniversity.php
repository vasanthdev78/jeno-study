<?php
include("../db/dbConnection.php");


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Handle adding a university
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addUniversity') {
    $universityName = $_POST['universityName'];
    $studyCode = $_POST['studyCode'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    // Other fields
    $uniCenterId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];

    // JSON encode arrays
    $dep = json_encode($department);
    $con = json_encode($contact);

    $university_sql = "INSERT INTO `jeno_university`
        (`uni_study_code`, `uni_name`, `uni_department`, `uni_contact`, `uni_center_id`, `uni_created_by`) 
        VALUES 
        ('$studyCode', '$universityName', '$dep', '$con', '$uniCenterId', '$createdBy')";

    if ($conn->query($university_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "University added successfully!";
    } else {
        $response['message'] = "Error adding university: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

// Handle fetching university details for editing
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    
    $editId = $_POST['editId'];

    $selQuery = "SELECT `uni_id`, `uni_study_code`, `uni_name`, `uni_department`, `uni_contact` FROM `jeno_university` WHERE uni_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Prepare university details array
        $universityDetails = [
            'uni_id' => $row['uni_id'],
            'uni_study_code' => $row['uni_study_code'],
            'uni_name' => $row['uni_name'],
            'uni_department' => json_decode($row['uni_department']), // Decode JSON string to array
            'uni_contact' => json_decode($row['uni_contact']) // Decode JSON string to array
        ];

        echo json_encode($universityDetails);
    } else {
        $response['message'] = "Error fetching university details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }


    // Handle updating student details
        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editUniversity') {
            $editid = $_POST['editid'];
            $editUniversityName = $_POST['editUniversityName'];
            $editStudyCode = $_POST['editStudyCode'];
            $editdepartment = $_POST['editdepartment'];
            $editcontact = $_POST['editcontact'];
            // Other fields
            
            $updatedBy = $_SESSION['userId'];
        
            // JSON encode arrays
            $editdep = json_encode($editdepartment);
            $editcon = json_encode($editcontact);
            
            
            $editUniversity ="UPDATE `jeno_university`
             SET 
             `uni_study_code`='$editStudyCode'
             ,`uni_name`='$editUniversityName'
             ,`uni_department`='$editdep'
             ,`uni_contact`='$editcon'
             ,`uni_updated_by`='$updatedBy' 
             WHERE uni_id = $editid";
            
            $universityres = mysqli_query($conn, $editUniversity);

                if ($universityres) {
                    $_SESSION['message'] = "University details Updated successfully!";
                    $response['success'] = true;
                    $response['message'] = "University details Updated successfully!";
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

                $queryDel = "UPDATE `jeno_university` SET `uni_updated_by`='$updatedBy',`uni_status`='Inactive' WHERE uni_id = $id;";
                $reDel = mysqli_query($conn, $queryDel);

                if ($reDel) {
                    
                    $_SESSION['message'] = "University details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "University details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting University details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }



            // Check if employee id is provided
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];

                // Prepare and execute the SQL query
                $selQuery = "SELECT `uni_id`, `uni_study_code`, `uni_name`, `uni_department`, `uni_contact` FROM `jeno_university` WHERE uni_id = $uniId;";
                
                $result1 = $conn->query($selQuery);

                if($result1) {
                    $row = mysqli_fetch_assoc($result1);

             // Prepare university details array
        $universityDetails = [
            'uni_id' => $row['uni_id'],
            'uni_study_code' => $row['uni_study_code'],
            'uni_name' => $row['uni_name'],
            'uni_department' => json_decode($row['uni_department']), // Decode JSON string to array
            'uni_contact' => json_decode($row['uni_contact']) // Decode JSON string to array
        ];

          echo json_encode($universityDetails);
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }





// Default response if no action specified
$response['message'] = "Invalid action specified.";
echo json_encode($response);
exit();


// // Handle updating student details
// if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editStudent') {
//     $editid = $_POST['editid'];
//     $editFName = $_POST['editFname'];
//     $editLName = $_POST['editLname'];
//     $editCourse = $_POST['editCourse'];
//     $editdob = $_POST['editDob'];
//     $editLocation = $_POST['editLocation'];
//     $editMobile = $_POST['editMobile'];
//     $editEmail = $_POST['editEmail'];
//     $editAadhar = $_POST['editAadhar'];
    
    
//     $editQuery1 =" UPDATE `student_tbl` st
//     JOIN `additional_details_tbl` adt ON st.`stu_id` = adt.`stu_id`
//     SET st.`first_name` = '$editFName',
//         st.`last_name` = '$editLName',
//         adt.`dob` = '$editdob',
//         adt.`email` = '$editEmail',
//         adt.`phone` = '$editMobile',
//         adt.`address` = '$editLocation',
//         adt.`aadhar` = '$editAadhar'
//     WHERE st.`stu_id` = $editid;";
    
//     $editRes = mysqli_query($conn, $editQuery1);

//         if ($editRes) {
//             $_SESSION['message'] = "Student details Updated successfully!";
//             $response['success'] = true;
//             $response['message'] = "Student details Updated successfully!";
//         } 
//         else {
//          $response['message'] = "Error: " . mysqli_error($conn);
//     }
    
//     echo json_encode($response);
//     exit();
// }

// // Handle deleting a client
// if (isset($_POST['deleteId'])) {
//     $id = $_POST['deleteId'];
//     $queryDel = "UPDATE `student_tbl` st
//     LEFT JOIN `additional_details_tbl` adt ON st.`stu_id` = adt.`stu_id`
//     LEFT JOIN `admin_tbl` ad ON st.`user_id` = ad.`user_id`
//     LEFT JOIN `payment_tbl` pt ON st.`stu_id` = pt.`stu_id`
//     SET st.stu_status = 'Inactive',
//         adt.`aditional_status` = 'Inactive',
//         ad.status = 'Inactive',
//         pt.payment_status = 'Inactive'
//     WHERE st.`stu_id` = $id;";
//     $reDel = mysqli_query($conn, $queryDel);

//     if ($reDel) {
//         $_SESSION['message'] = "Student details have been deleted successfully!";
//         $response['success'] = true;
//         $response['message'] = "Student details have been deleted successfully!";
//     } else {
//         $_SESSION['message'] = "Unexpected error in deleting Student details!";
//         $response['message'] = "Error: " . mysqli_error($conn);
//     }

//     echo json_encode($response);
//     exit();
// }


// // Upload Documents
// if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'docStudent') {
//     if (!isset($_POST['stuDocId']) || empty($_POST['stuDocId']) || !isset($_POST['userName']) || empty($_POST['userName'])) {
//         $response['message'] = 'Student ID and Username are required.';
//         echo json_encode($response);
//         exit;
//     }

//     $empId = $_POST['stuDocId'];
//     $username = $_POST['userName'];
//     $aadharFileName = null;
//     $marksheetFileName = null;
//    // $bankFileName = null;

//     function uploadFile($file, $fileName) {
//         $targetDir = "../document/students/";
//         $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
//         $targetFile = $targetDir . basename($fileName . '.' . $fileExt);

//         if (!file_exists($targetDir)) {
//             if (!mkdir($targetDir, 0777, true)) {
//                 return ['success' => false, 'message' => 'Failed to create directory: ' . $targetDir];
//             }
//         }

//         if (move_uploaded_file($file["tmp_name"], $targetFile)) {
//             return ['success' => true, 'file' => basename($targetFile)];
//         } else {
//             return ['success' => false, 'message' => 'Failed to move uploaded file from ' . $file["tmp_name"] . ' to ' . $targetFile];
//         }
//     }

//     if (isset($_FILES['aadhar']) && $_FILES['aadhar']['error'] === UPLOAD_ERR_OK) {
//         $result = uploadFile($_FILES['aadhar'], $username . '_aadhar');
//         if ($result['success'] === false) {
//             $response['message'] = $result['message'];
//             echo json_encode($response);
//             exit;
//         }
//         $aadharFileName = $result['file'];
//     }

//     if (isset($_FILES['marksheet']) && $_FILES['marksheet']['error'] === UPLOAD_ERR_OK) {
//         $result = uploadFile($_FILES['marksheet'], $username . '_marksheet');
//         if ($result['success'] === false) {
//             $response['message'] = $result['message'];
//             echo json_encode($response);
//             exit;
//         }
//         $marksheetFileName = $result['file'];
//     }

//     // if (isset($_FILES['bank']) && $_FILES['bank']['error'] === UPLOAD_ERR_OK) {
//     //     $result = uploadFile($_FILES['bank'], $username . '_bank');
//     //     if ($result['success'] === false) {
//     //         $response['message'] = $result['message'];
//     //         echo json_encode($response);
//     //         exit;
//     //     }
//     //     $bankFileName = $result['file'];
//     // }

//     if ($aadharFileName || $marksheetFileName) {
//         $sql = "UPDATE student_tbl SET ";
//         $params = [];
//         if ($aadharFileName) {
//             $sql .= "stu_aadhar = ?, ";
//             $params[] = $aadharFileName;
//         }
//         if ($marksheetFileName) {
//             $sql .= "stu_marksheet = ?, ";
//             $params[] = $marksheetFileName;
//         }
//         // if ($bankFileName) {
//         //     $sql .= "emp_bank = ?, ";
//         //     $params[] = $bankFileName;
//         // }
//         $sql = rtrim($sql, ", ");
//         $sql .= " WHERE stu_id = ?";

//         $params[] = $empId;

//         if ($stmt = $conn->prepare($sql)) {
//             $types = str_repeat('s', count($params) - 1) . 'i';
//             $stmt->bind_param($types, ...$params);

//             if ($stmt->execute()) {
//                 $response['success'] = true;
//                 $response['message'] = 'Student documents uploaded successfully!';
//             } else {
//                 $response['message'] = 'Failed to update Student documents.';
//             }

//             $stmt->close();
//         } else {
//             $response['message'] = 'Failed to prepare statement: ' . $conn->error;
//         }
//     } else {
//         $response['message'] = 'No documents uploaded.';
//     }
// }


// echo json_encode($response);
// exit();


    
    
