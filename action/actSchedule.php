<?php
include "../db/dbConnection.php"; // database connection 

session_start();
$userId = $_SESSION['userId'];

//--Hadnle get subjects--------------------------------
if(isset($_POST['course_id'])) {
    $courseId = $_POST['course_id'];
    $subQuery = "SELECT * FROM `jeno_subject` WHERE `sub_cou_id` = '$courseId' AND `sub_status`='Active'";
    $subject_result = mysqli_query($conn, $subQuery);
    
    $options = '<option value="">--Select the Subject--</option>';
    while ($row = $subject_result->fetch_assoc()) {
        $sub_exam_patten = $row['sub_exam_patten'];
        $sub_subject_codes = json_decode($row['sub_subject_code'], true);
        $sub_subject_names = json_decode($row['sub_subject_name'], true);
        $sub_addition_lag_names = json_decode($row['sub_addition_lag_name'], true);
        $sub_addition_sub_codes = json_decode($row['sub_addition_sub_code'], true);
        $sub_addition_sub_names = json_decode($row['sub_addition_sub_name'], true);
        $sub_type = $row['sub_type'];
        
        if ($sub_subject_codes && $sub_subject_names) {
            foreach ($sub_subject_codes as $index => $code) {
                $name = $sub_subject_names[$index];
                $options .= '<option value="' . $name . '">' . $name . '</option>';
            }
        }

        if ($sub_addition_sub_codes && $sub_addition_sub_names) {
            foreach ($sub_addition_sub_codes as $index => $code) {
                $name = $sub_addition_sub_names[$index];
                $options .= '<option value="' . $name . '">' . $name . '</option>';
            }
        }
    }
    
    echo $options;
}

//-----------Hadnle get subjects--end--------------------------------------------------------------



//--Handle shedule date add------------------------------------------------

if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addScheduleId' && $_POST['facultyName'] != '') {

    $name = htmlspecialchars($_POST['facultyName'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($_POST['fromDate'], ENT_QUOTES, 'UTF-8');
    $session = htmlspecialchars($_POST['session'], ENT_QUOTES, 'UTF-8');
    $timing = htmlspecialchars($_POST['timing'], ENT_QUOTES, 'UTF-8');
    $university = htmlspecialchars($_POST['university'], ENT_QUOTES, 'UTF-8');
    $course = htmlspecialchars($_POST['course'], ENT_QUOTES, 'UTF-8');
    $subject = json_encode($_POST['subject']); // Converting subject array to JSON
    $centerId = $_SESSION['centerId'];
        
            $schedule_insert = "INSERT INTO jeno_schedule 
            (sch_fac_id
            , sch_date
            , sch_session
            , sch_timing
            , sch_uni_id
            , sch_cou_id
            , sch_sub_id
            , sch_center_id
            , sch_created_by) 
             VALUES 
             ('$name'
             , '$date'
             , '$session'
             , '$timing'
             , '$university'
             , '$course'
             , '$subject'
             , '$centerId'
             , '$userId')";
            
            if ($conn->query($schedule_insert) === TRUE) {
                $_SESSION['message'] = "Schedule details added successfully!";
                $response['success'] = true;
                $response['message'] = "Schedule details added successfully!";
            } else {
                $response['message'] = "Error: " . $schedule_insert . "<br>" . $conn->error;
            }

    echo json_encode($response);
    exit();
}

//---Handle shedule date add--end---------------------------------------------------


//--handle edit date load----------------------------------------------------

if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $editId = $_POST['editId'];

    $selQuery = "SELECT * FROM `jeno_schedule` WHERE sch_id = $editId";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        $scheduleDetails = array(
            'schId' => $row['sch_id'],
            'name' => $row['sch_fac_id'],
            'date' => $row['sch_date'],
            'session' => $row['sch_session'],
            'timing' => $row['sch_timing'],
            'uniId' => $row['sch_uni_id'],
            'couId' => $row['sch_cou_id'],
            'subId' => $row['sch_sub_id'],
        );

        echo json_encode($scheduleDetails);
    } else {
        $response['message'] = "Error executing query: " . mysqli_error($conn);
        echo json_encode($response);
    }
    exit();
}

//---handle edit date load--end ------------------------------------------



//---Handle delete schedule opration ----------------------------------------

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `jeno_schedule` 
                 SET sch_status = 'Inactive'
                 WHERE `sch_id` = $id;";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Schedule details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Schedule details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Schedule details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}

if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editScheduleId' && $_POST['hdnScheduleId'] != '') {

    $schId = htmlspecialchars($_POST['hdnScheduleId'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['facultyNameEdit'], ENT_QUOTES, 'UTF-8');
    $date = htmlspecialchars($_POST['fromDateEdit'], ENT_QUOTES, 'UTF-8');
    $session = htmlspecialchars($_POST['sessionEdit'], ENT_QUOTES, 'UTF-8');
    $timing = htmlspecialchars($_POST['timingEdit'], ENT_QUOTES, 'UTF-8');
    $university = htmlspecialchars($_POST['universityEdit'], ENT_QUOTES, 'UTF-8');
    $course = htmlspecialchars($_POST['courseEdit'], ENT_QUOTES, 'UTF-8');
    $subject = json_encode($_POST['subjectEdit']);

    // Base query
    $updateQuery = "UPDATE jeno_schedule 
    SET 
        sch_fac_id = '$name',
        sch_date = '$date',
        sch_session = '$session',
        sch_timing = '$timing',
        sch_uni_id = '$university',
        sch_cou_id = '$course',
        sch_sub_id = '$subject',
        sch_updated_by = '$userId'
    WHERE sch_id = $schId";

    if ($conn->query($updateQuery) === TRUE) {
        $_SESSION['message'] = "Schedule details updated successfully!";
        $response['success'] = true;
        $response['message'] = "Schedule details updated successfully!";
    } else {
        $response['message'] = "Error: " . $updateQuery . "<br>" . $conn->error;
    }
    
    echo json_encode($response);
    exit();
}

//-----Handle delete schedule opration--end ----------------------------------------------

?>
