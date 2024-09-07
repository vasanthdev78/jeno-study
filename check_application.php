<?php
include "db/dbConnection.php";
session_start();
$centerId = $_SESSION['centerId'];

if (isset($_POST['applicationNo']) && $_POST['applicationNo'] !='') {
    $applicationNo = $_POST['applicationNo'];
    // Check if application number exists
    $sql = "SELECT stu_addmision_new FROM jeno_student WHERE stu_addmision_new = '$applicationNo' AND stu_center_id = '$centerId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not exists";
    }
}

//Check applicationNoEdit input value was already exists or not 
if (isset($_POST['applicationNoEdit']) && $_POST['applicationNoEdit'] !='') {
    $applicationNoEdit = $_POST['applicationNoEdit'];
    $editId = $_POST['editId'];

    $sql = "SELECT stu_addmision_new FROM jeno_student 
            WHERE stu_addmision_new = '$applicationNoEdit' 
            AND stu_center_id = '$centerId' 
            AND stu_id != '$editId'"; // Exclude the current ID from the query
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not exists";
    }
}

$conn->close();
?>