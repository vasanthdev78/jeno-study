<?php
include "../db/dbConnection.php";


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];

// Handle adding ledger data -------------------------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addLedger') {
    
    $ledgertype = htmlspecialchars($_POST['ledgertype'], ENT_QUOTES, 'UTF-8');

    $createdBy = $_SESSION['userId'];
    $centerId = $_SESSION['centerId'];

    // First, check if the ledger already exists with the same name and center ID
    $check_sql = "SELECT * FROM `jeno_ledger` WHERE `led_type` = '$ledgertype' AND `led_center_id` = '$centerId'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Ledger already exists, show an error message
        $response['success'] = false;
        $response['message'] = "Error: This ledger already exists for the selected center.";
    } else {
        // Ledger does not exist, proceed with insertion
        $insert_sql = "INSERT INTO `jeno_ledger` (`led_type`, `led_center_id`, `led_created_by`) VALUES ('$ledgertype', '$centerId', '$createdBy')";

        if ($conn->query($insert_sql) === TRUE) {
            $response['success'] = true;
            $response['message'] = "Ledger added successfully!";
        } else {
            $response['success'] = false;
            $response['message'] = "Error adding Ledger: " . $conn->error;
        }
    }

    echo json_encode($response);
    exit();
}


//----Handle adding a Ledger data add -- end ------------------------




// Handle fetching ledger details for editing
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    
    $editId = $_POST['editId'];

    $selQuery = "SELECT `led_id`, `led_type`FROM `jeno_ledger` WHERE led_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Prepare ledger details array
        $ledgerDetails = [
            'led_id' => $row['led_id'],
            'led_type' => $row['led_type'],
            
        ];

        echo json_encode($ledgerDetails);
    } else {
        $response['message'] = "Error fetching ledger details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }
    //----handle ledger select detais load --end ---------------------

    // Handle updating ledger  details----------------------------------------
        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editLedger') {
            $editid = htmlspecialchars($_POST['editid'], ENT_QUOTES, 'UTF-8');
            $editLedgertype = htmlspecialchars($_POST['editLedgertype'], ENT_QUOTES, 'UTF-8');
            
            
            $updatedBy = $_SESSION['userId'];
          
            $editElective ="UPDATE `jeno_ledger` SET `led_type`='$editLedgertype',`led_updated_by`='$updatedBy' WHERE led_id = $editid";
            
            $editElectiveRes = mysqli_query($conn, $editElective);

                if ($editElectiveRes) {
                    $_SESSION['message'] = "Ledger details Updated successfully!";
                    $response['success'] = true;
                    $response['message'] = "Ledger details Updated successfully!";
                } 
                else {
                $response['message'] = "Error: " . mysqli_error($conn);
            }
            
            echo json_encode($response);
            exit();
        }

        //--Handle updating ledger  details--end --------------------------------


        // // Handle deleting a elective -------------------------------
            if (isset($_POST['deleteId'])) {
                $id = $_POST['deleteId'];
                $updatedBy = $_SESSION['userId'];

                $queryDel = "UPDATE `jeno_ledger` SET `led_updated_by`='$updatedBy',`led_status`='Inactive' WHERE led_id= $id;";
                $reDel = mysqli_query($conn, $queryDel);

                if ($reDel) {
                    
                    $_SESSION['message'] = "Ledger Type details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "Ledger Type details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting Ledger Type details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }

//----Handle deleting a elective --end -----------------------------------------------------------------


            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();

