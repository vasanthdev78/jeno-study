<?php
include("../db/dbConnection.php");


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Handle adding a university
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addElective') {
    $courseName = $_POST['courseName'];
    $electiveName = $_POST['electiveName'];
    $createdBy = $_SESSION['userId'];
    

    $elective_sql = "INSERT INTO `jeno_elective`(`ele_cou_id`,`ele_elective`,`ele_created_by`) VALUES ('$courseName','$electiveName','$createdBy')";

    if ($conn->query($elective_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Elective Subject added successfully!";
    } else {
        $response['message'] = "Error adding Elective Subject: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

// Handle fetching university details for editing
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    
    $editId = $_POST['editId'];

    $selQuery = "SELECT `ele_id`, `ele_cou_id`, `ele_elective` FROM `jeno_elective` WHERE ele_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Prepare university details array
        $electiveDetails = [
            'ele_id' => $row['ele_id'],
            'ele_cou_id' => $row['ele_cou_id'],
            'ele_elective' => $row['ele_elective']
            
        ];

        echo json_encode($electiveDetails);
    } else {
        $response['message'] = "Error fetching university details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }


    // Handle updating student details
        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editElective') {
            $editid = $_POST['editid'];
            $editCourseName = $_POST['editCourseName'];
            $editElectiveName = $_POST['editElectiveName'];
            
            $updatedBy = $_SESSION['userId'];
          
            $editElective ="UPDATE `jeno_elective` 
            SET `ele_cou_id`='$editCourseName',`ele_elective`='$editElectiveName',`ele_updated_by`='$updatedBy' WHERE ele_id = $editid";
            
            $editElectiveRes = mysqli_query($conn, $editElective);

                if ($editElectiveRes) {
                    $_SESSION['message'] = "Elective Subject details Updated successfully!";
                    $response['success'] = true;
                    $response['message'] = "Elective Subject details Updated successfully!";
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

                $queryDel = "UPDATE `jeno_elective` SET `ele_updated_by`='$updatedBy',`ele_status`='Inactive' WHERE ele_id= $id;";
                $reDel = mysqli_query($conn, $queryDel);

                if ($reDel) {
                    
                    $_SESSION['message'] = "Elective Subject details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "Elective Subject details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting Elective Subject details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }




            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();

