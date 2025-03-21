<?php
include "../class.php";
include "../db/dbConnection.php";
session_start();

$userId = $_SESSION['userId'];

// Handle adding a staff details-------------------------------------------------------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addStaffId' && $_POST['staffName'] != '') {

    $targetDir = "../assets/images/staff/";

    $newFileName = '';
    if (!empty($_FILES["aadhar"]["name"])) {
        $fileName = $_FILES["aadhar"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(["success" => false, "message" => "Sorry, only JPG, JPEG, and PNG files are allowed."]);
            exit();
        }

        // Get current date and time
        $currentDateTime = date("Ymd_His");
        $newFileName = $currentDateTime . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;

        // Upload file to server
        if (!move_uploaded_file($_FILES["aadhar"]["tmp_name"], $targetFilePath)) {
            echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
            exit();
        }
    }

    $name = htmlspecialchars($_POST['staffName'], ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($_POST['dob'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
    $mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES, 'UTF-8');
    $dateofjoin = htmlspecialchars($_POST['dateofjoin'], ENT_QUOTES, 'UTF-8');
    $salary = htmlspecialchars($_POST['salary'], ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars($_POST['designation'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $location = htmlspecialchars($_POST['location'], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $userId = $_SESSION['userId'];

    $response = ["success" => false, "message" => ""];

    // Insert the username and password into the jeno_user table
    $user_insert = "INSERT INTO jeno_user 
                    (user_name
                    , user_username
                    , user_password
                    , user_role
                    , user_center_id 
                    , user_created_by) 
                    VALUES 
                    ('$name'
                    , '$username'
                    , '$password'
                    , 'Staff'
                    , '$location' 
                    , '$userId')";

    if ($conn->query($user_insert) === TRUE) {
        // Get the last inserted ID
        $last_user_id = $conn->insert_id;

        // Insert the remaining data into the jeno_staff table
        $staff_insert = "INSERT INTO jeno_staff 
        (stf_name
        , stf_birth
        , stf_mobile
        , stf_email
        , stf_address
        , stf_gender
        , stf_role
        , stf_salary
        , stf_joining_date
        , stf_image
        , sft_center_id
        , stf_userId
        , stf_created_by) 
        VALUES 
        ('$name'
        , '$dob'
        , '$mobile'
        , '$email'
        , '$address'
        , '$gender'
        , '$role'
        , '$salary'
        , '$dateofjoin'
        , '$newFileName'
        , '$location'
        , '$last_user_id'
        , '$userId')";

        if ($conn->query($staff_insert) === TRUE) {
            $_SESSION['message'] = "Staff details added successfully!";
            $response['success'] = true;
            $response['message'] = "Staff details added successfully!";
        } else {
            $response['message'] = "Error: " . $staff_insert . "<br>" . $conn->error;
        }
    } else {
        $response['message'] = "Error: " . $user_insert . "<br>" . $conn->error;
    }

    echo json_encode($response);
    exit();
    } 

    //--Handle adding a staff details--end-------------------------------------------------


    //---Handle edit data fetching ------------------------------------------------------------

if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $editId = $_POST['editId'];

    $selQuery = "SELECT a.*
                    , b.* 
                    FROM `jeno_staff` AS a 
                    LEFT JOIN `jeno_user` AS b ON a.stf_userId = b.user_id 
                    WHERE a.stf_id = $editId";
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
            'stf_leave_date' => $row['stf_leave_date'],
            'sft_center_id' => $row['sft_center_id'],
            'username' => $row['user_username'],
            'password' => $row['user_password'],
        );

        echo json_encode($staffDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}

//---Handle edit data fetching--end-----------------------------------------------------


// Handle updating staff details-------------------------------------------------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEditId' && $_POST['hdnStaffId'] != '') {

    $targetDir = "../assets/images/staff/";
    $newFileName = '';

    if (!empty($_FILES["aadharEdit"]["name"])) {
        $fileName = $_FILES["aadharEdit"]["name"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo json_encode(["success" => false, "message" => "Sorry, only JPG, JPEG, and PNG files are allowed."]);
            exit();
        }

        // Get current date and time
        $currentDateTime = date("Ymd_His");
        $newFileName = $currentDateTime . '.' . $fileExtension;
        $targetFilePath = $targetDir . $newFileName;

        // Upload file to server
        if (!move_uploaded_file($_FILES["aadharEdit"]["tmp_name"], $targetFilePath)) {
            echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
            exit();
        }
    }

    $name = htmlspecialchars($_POST['staffNameEdit'], ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($_POST['dobEdit'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['genderEdit'], ENT_QUOTES, 'UTF-8');
    $mobile = htmlspecialchars($_POST['mobileEdit'], ENT_QUOTES, 'UTF-8');
    $dateofjoin = htmlspecialchars($_POST['dateofjoinEdit'], ENT_QUOTES, 'UTF-8');
    $quitDate = htmlspecialchars($_POST['quitDate'], ENT_QUOTES, 'UTF-8');
    $salary = htmlspecialchars($_POST['salaryEdit'], ENT_QUOTES, 'UTF-8');
    $role = htmlspecialchars($_POST['designationEdit'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['emailEdit'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['addressEdit'], ENT_QUOTES, 'UTF-8');
    $editLocation = htmlspecialchars($_POST['editLocation'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['passwordEdit'], ENT_QUOTES, 'UTF-8');
    $staffId = htmlspecialchars($_POST['hdnStaffId'], ENT_QUOTES, 'UTF-8'); // Assuming staffId is passed in the form

    // Base query
    $updateQuery = "UPDATE jeno_user AS u
    JOIN jeno_staff AS s ON u.user_id = s.stf_userId
    SET 
        u.user_name = '$name',
        u.user_password = '$password',
        u.user_role = 'Staff',
        u.user_updated_by = '$userId',
        s.stf_name = '$name',
        s.stf_birth = '$dob',
        s.stf_gender = '$gender',
        s.stf_mobile = '$mobile',
        s.stf_joining_date = '$dateofjoin',
        s.stf_leave_date = '$quitDate',
        s.stf_salary = '$salary',
        s.stf_role = '$role',
        s.stf_email = '$email',
        s.stf_address = '$address',
        s.sft_center_id = '$editLocation',
        s.stf_updated_by = '$userId'";

    if (!empty($newFileName)) {
        $updateQuery .= ", s.stf_image = '$newFileName'";
    }

    $updateQuery .= " WHERE s.stf_id = $staffId";

    if ($conn->query($updateQuery) === TRUE) {
        $_SESSION['message'] = "Staff details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Staff details updated successfully!";
    } else {
        $response['message'] = "Error: " . $updateQuery . "<br>" . $conn->error;
    }
    
    echo json_encode($response);
    exit();
}

//-------Handle updating staff details--end--------------------------------------------


//---Handle delete staff------------------------------------------------------------------
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `jeno_staff` AS a 
                 LEFT JOIN `jeno_user` AS b ON a.stf_userId = b.user_id 
                 SET a.stf_status = 'Inactive', b.user_status = 'Inactive'
                 WHERE `stf_id` = $id;";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Staff details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Staff details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Staff details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}

//--Handle delete staff--endd----------------------------------------


//--Handle staff fetching data --------------------------------------------------

if(isset($_POST['id']) && $_POST['id'] != '') {
    $staffId = $_POST['id'];

    // Prepare and execute the SQL query
    $selQuery1 = "SELECT 
                a.*
                , b.* 
                FROM `jeno_staff` AS a 
                LEFT JOIN `jeno_user` AS b ON a.stf_userId = b.user_id 
                WHERE a.stf_id = $staffId";
    
    $result1 = $conn->query($selQuery1);

    if($result1) {
        $row = mysqli_fetch_assoc($result1);
        $stf_birth = date('d-m-Y', strtotime($row['stf_birth']));
        $joiningDate = date('d-m-Y', strtotime($row['stf_joining_date']));

    // Prepare university details array
    $staffDetails = [
           
            'nameView' => $row['stf_name'],
            'birthView' => $stf_birth,
            'mobileView' => $row['stf_mobile'],
            'emailView' => $row['stf_email'],
            'addressView' => $row['stf_address'],
            'genderView' => $row['stf_gender'],
            'roleView' => $row['stf_role'],
            'salaryView' => $row['stf_salary'],
            'joining_dateView' => $joiningDate, 
            'aadharView' => $row['stf_image'],
            'center_name' => locationName($row['sft_center_id']),
            'usernameView' => $row['user_username'],
            'passwordView' => $row['user_password'],
    ];

    echo json_encode($staffDetails);
    exit();
          
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
//--Handle staff fetching data--end-------------------------------------------------------
