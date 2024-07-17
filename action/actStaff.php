<?php
include "../db/dbConnection.php";
session_start();

$userId = $_SESSION['userId'];

// Handle adding a client
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addStaffId' && $_POST['staffName'] != '') {

    $targetDir = "../assets/images/staff/";

    if (!empty($_FILES["aadhar"]["name"])) {
        $fileName = $_FILES["aadhar"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        }

        // Get current date and time
        $currentDateTime = date("Ymd_His");
        $newFileName = $currentDateTime . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;

        // Upload file to server
        if (move_uploaded_file($_FILES["aadhar"]["tmp_name"], $targetFilePath)) {
            // File uploaded successfully
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $name = $_POST['staffName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $dateofjoin = $_POST['dateofjoin'];
    $salary = $_POST['salary'];
    $role = $_POST['designation'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $aadhar = $newFileName;
    $username = $_POST['username'];
    $password = $_POST['password'];

        $staff_insert = "INSERT INTO jeno_staff (stf_name, stf_birth, stf_mobile, stf_email, stf_address, stf_gender, stf_role, stf_salary, stf_joining_date, stf_image, stf_username, stf_password, stf_created_by) 
        VALUES ('$name', '$dob', '$mobile', '$email', '$address', '$gender', '$role', '$salary', '$dateofjoin', '$aadhar', '$username', '$password', '$userId')";

        if ($conn->query($staff_insert) === TRUE) {
            $_SESSION['message'] = "Staff details added successfully!";
            $response['success'] = true;
            $response['message'] = "Staff details added successfully!";
        } else {
            $response['message'] = "Error: " . $staff_insert . "<br>" . $conn->error;
        }

    echo json_encode($response);
    exit();
}




if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $editId = $_POST['editId'];

    $selQuery = "SELECT * FROM `jeno_staff` WHERE stf_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        $staffDetails = array(
            'stfId' => $row['stf_id'],
            'name' => $row['stf_name'],
            'birth' => $row['stf_birth'],
            'mobile' => $row['stf_mobile'],
            'email' => $row['stf_email'],
            'address' => $row['stf_address'],
            'gender' => $row['stf_gender'],
            'role' => $row['stf_role'],
            'salary' => $row['stf_salary'],
            'joining_date' => $row['stf_joining_date'],
            'username' => $row['stf_username'],
            'password' => $row['stf_password'],
        );

        echo json_encode($staffDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}


// Handle updating staff details
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEditId' && $_POST['hdnStaffId'] != '') {

    $targetDir = "../assets/images/staff/";
    $newFileName = '';

    if (!empty($_FILES["aadharEdit"]["name"])) {
        $fileName = $_FILES["aadharEdit"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
            exit();
        }

        // Get current date and time
        $currentDateTime = date("Ymd_His");
        $newFileName = $currentDateTime . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;

        // Upload file to server
        if (!move_uploaded_file($_FILES["aadharEdit"]["tmp_name"], $targetFilePath)) {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    $name = $_POST['staffNameEdit'];
    $dob = $_POST['dobEdit'];
    $gender = $_POST['genderEdit'];
    $mobile = $_POST['mobileEdit'];
    $dateofjoin = $_POST['dateofjoinEdit'];
    $salary = $_POST['salaryEdit'];
    $role = $_POST['designationEdit'];
    $email = $_POST['emailEdit'];
    $address = $_POST['addressEdit'];
    $username = $_POST['usernameEdit'];
    $password = $_POST['passwordEdit'];
    $staffId = $_POST['hdnStaffId']; // Assuming staffId is passed in the form

    // Base query
    $editQuery = "UPDATE `jeno_staff` SET
        `stf_name` = '$name',
        `stf_birth` = '$dob',
        `stf_gender` = '$gender',
        `stf_mobile` = '$mobile',
        `stf_joining_date` = '$dateofjoin',
        `stf_salary` = '$salary',
        `stf_role` = '$role',
        `stf_email` = '$email',
        `stf_address` = '$address',
        `stf_username` = '$username',
        `stf_password` = '$password',
        `stf_updated_by` = '$userId'";

    // Add aadhar to the query if a new file was uploaded
    if (!empty($newFileName)) {
        $editQuery .= ", `stf_image` = '$newFileName'";
    }

    $editQuery .= " WHERE `stf_id` = $staffId";

    $editRes = mysqli_query($conn, $editQuery);

    if ($editRes) {
        $_SESSION['message'] = "Staff details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Staff details updated successfully!";
    } else {
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}
