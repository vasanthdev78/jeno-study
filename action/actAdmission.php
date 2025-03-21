<?php
include "../db/dbConnection.php";


session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];


if (isset($_GET['admissionTable']) && $_GET['admissionTable'] === 'AdmissionTable') {
    $start = $_GET['start'];
    $length = $_GET['length'];
    $searchValue = $_GET['search']['value'];

    $university = $_GET['university'] ?? '';
    $course = $_GET['course'] ?? '';
    $year = $_GET['year'] ?? '';
    $location = $_GET['location'] ?? 0;

    $query = "SELECT a.*, b.*, c.*
              FROM `jeno_student` AS a
              LEFT JOIN jeno_university AS b ON a.stu_uni_id = b.uni_id
              LEFT JOIN jeno_course AS c ON a.stu_cou_id = c.cou_id
              WHERE a.stu_status = 'Active' AND a.stu_center_id = '$location'";

    if (!empty($searchValue)) {
        $query .= " AND (stu_name LIKE '%$searchValue%' OR uni_name LIKE '%$searchValue%' OR cou_name LIKE '%$searchValue%')";
    }
    if (!empty($university)) {
        $query .= " AND uni_name = '$university'";
    }
    if (!empty($course)) {
        $query .= " AND cou_name = '$course'";
    }
    if (!empty($year)) {
        $query .= " AND stu_addmision_new LIKE '$year%'";
    }

    $totalQuery = mysqli_query($conn, $query);
    $totalRecords = ($totalQuery) ? mysqli_num_rows($totalQuery) : 0;

    // $query .= " ORDER BY c.cou_name DESC, a.stu_id DESC LIMIT $start, $length";
    $query .= " ORDER BY a.stu_id DESC LIMIT $start, $length";
    $dataQuery = mysqli_query($conn, $query);

    if (!$dataQuery) {
        echo json_encode([
            "draw" => intval($_GET['draw']),
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => [],
            "error" => "Query failed: " . mysqli_error($conn)
        ]);
        exit();
    }

    $data = [];
    $serial = $start + 1;
    while ($row = mysqli_fetch_assoc($dataQuery)) {
        $serialNumber = $serial++;
        $id = $row['stu_id'];
        $name = $row['stu_name'];
        $phone = $row['stu_phone'];
        $university = $row['uni_name'];
        $course = $row['cou_name'];
        $enroll = $row['stu_enroll'];
        $apply = $row['stu_addmision_new'];
        $stu_created_at = $row['stu_created_at'];
        $dateOnly = date('Y-m-d', strtotime($stu_created_at));

        $actions = "
            <button class='btn btn-warning text-white' onclick='goEditAdmission($id);'><i class='bi bi-pencil-square'></i></button>
            <button class='btn btn-success text-white' onclick='goViewAdmission($id);'><i class='bi bi-eye-fill'></i></button>
            <button class='btn btn-danger text-white' onclick='goDeleteAdmission($id);'><i class='bi bi-trash'></i></button>";
        if ($row['stu_enroll']) {
            $actions .= "<a href='courseDoing.php?payment_id=$id' target='_blank'><button class='btn btn-primary text-white ms-1'><i class='bi bi-download'></i></button></a>";
        }

        $data[] = [
            $serialNumber,
            $dateOnly,
            !empty($apply) ? $apply : '---',
            $name,
            $university,
            $course,
            $phone,
            !empty($enroll) ? $enroll : 'Pending',
            $actions
        ];
    }

    echo json_encode([
        "draw" => intval($_GET['draw']),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalRecords,
        "data" => $data
    ]);

    exit();
}

// Admission data add Start-----------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addAdmission' && $_POST['stuName'] != '') {

    $stuName = htmlspecialchars($_POST['stuName'], ENT_QUOTES, 'UTF-8');
    $mobileNo = htmlspecialchars($_POST['mobileNo'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $university = htmlspecialchars($_POST['university'], ENT_QUOTES, 'UTF-8');
    $courseName = htmlspecialchars($_POST['courseName'], ENT_QUOTES, 'UTF-8');
    $medium = htmlspecialchars($_POST['medium'], ENT_QUOTES, 'UTF-8');
    $academicYear = htmlspecialchars($_POST['academicYear'], ENT_QUOTES, 'UTF-8');
    $applicationNo = htmlspecialchars($_POST['applicationNo'], ENT_QUOTES, 'UTF-8');
    $applicationYear = htmlspecialchars($_POST['applicationYear'], ENT_QUOTES, 'UTF-8');
    $applicationType = htmlspecialchars($_POST['applicationType'], ENT_QUOTES, 'UTF-8');
    $yearType = htmlspecialchars($_POST['yearType'], ENT_QUOTES, 'UTF-8');
    $language = htmlspecialchars($_POST['language'], ENT_QUOTES, 'UTF-8');
    $digilocker = htmlspecialchars($_POST['digilocker'], ENT_QUOTES, 'UTF-8');
    $admitDate = htmlspecialchars($_POST['admitDate'], ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($_POST['dob'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $pincode = htmlspecialchars($_POST['pincode'], ENT_QUOTES, 'UTF-8');
    $fathername = htmlspecialchars($_POST['fathername'], ENT_QUOTES, 'UTF-8');
    $mothername = htmlspecialchars($_POST['mothername'], ENT_QUOTES, 'UTF-8');
    $aadharNumber = htmlspecialchars($_POST['aadharNumber'], ENT_QUOTES, 'UTF-8');
    $nationality = htmlspecialchars($_POST['nationality'], ENT_QUOTES, 'UTF-8');
    $motherTongue = htmlspecialchars($_POST['motherTongue'], ENT_QUOTES, 'UTF-8');
    $religion = htmlspecialchars($_POST['religion'], ENT_QUOTES, 'UTF-8');
    $caste = htmlspecialchars($_POST['caste'], ENT_QUOTES, 'UTF-8');
    $community = htmlspecialchars($_POST['community'], ENT_QUOTES, 'UTF-8');
    $marital = htmlspecialchars($_POST['marital'], ENT_QUOTES, 'UTF-8');
    $employed = htmlspecialchars($_POST['employed'], ENT_QUOTES, 'UTF-8');
    $qualification = htmlspecialchars($_POST['qualification'], ENT_QUOTES, 'UTF-8');
    $previous = htmlspecialchars($_POST['previous'], ENT_QUOTES, 'UTF-8');
    $completed = htmlspecialchars($_POST['completed'], ENT_QUOTES, 'UTF-8');
    $study = htmlspecialchars($_POST['study'], ENT_QUOTES, 'UTF-8');
    $grade = htmlspecialchars($_POST['grade'], ENT_QUOTES, 'UTF-8');
    $enroll = htmlspecialchars($_POST['enroll'], ENT_QUOTES, 'UTF-8');


    $createdBy = $_SESSION['userId'];
    $centerId = $_SESSION['centerId'];

    $uploadDir = '../assets/images/student/';
    $sslcName = '';
    $hscName = '';
    $communityName = '';
    $tcName = '';
    $aadharName = '';
    $photoName = '';

    if (!empty($_FILES['sslc']['name'])) {
        $sslcName = basename($_FILES['sslc']['name']);
        move_uploaded_file($_FILES['sslc']['tmp_name'], $uploadDir . $sslcName);
    }

    if (!empty($_FILES['hsc']['name'])) {
        $hscName = basename($_FILES['hsc']['name']);
        move_uploaded_file($_FILES['hsc']['tmp_name'], $uploadDir . $hscName);
    }

    if (!empty($_FILES['community']['name'])) {
        $communityName = basename($_FILES['community']['name']);
        move_uploaded_file($_FILES['community']['tmp_name'], $uploadDir . $communityName);
    }

    if (!empty($_FILES['tc']['name'])) {
        $tcName = basename($_FILES['tc']['name']);
        move_uploaded_file($_FILES['tc']['tmp_name'], $uploadDir . $tcName);
    }

    if (!empty($_FILES['aadhar']['name'])) {
        $aadharName = basename($_FILES['aadhar']['name']);
        move_uploaded_file($_FILES['aadhar']['tmp_name'], $uploadDir . $aadharName);
    }

    if (!empty($_FILES['photo']['name'])) {
        $photoName = basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photoName);
    }
    
    // Check if the name and phone number exist in the enquiry table
    $enquiry_check_sql = "SELECT * FROM `jeno_enquiry` 
    WHERE `enq_stu_name` = '$stuName' 
    AND `enq_mobile` = '$mobileNo' 
    AND `enq_center_id` = '$centerId' 
    AND `enq_adminsion_status` = 'Pending'";
    $enquiry_check_result = $conn->query($enquiry_check_sql);

    if ($enquiry_check_result->num_rows > 0) {
        // Update enquiry status to complete
        $update_enquiry_sql = "UPDATE `jeno_enquiry` 
        SET `enq_adminsion_status` = 'Complete' 
        WHERE `enq_stu_name` = '$stuName' 
        AND `enq_mobile` = '$mobileNo'";
        $conn->query($update_enquiry_sql);
    }
    

    $student_sql = "INSERT INTO `jeno_student`
    (stu_addmision_new
    , `stu_name`
    , `stu_phone`
    , `stu_email`
    , `stu_uni_id`
    , `stu_cou_id`
    , `stu_medium_id`
    , `stu_aca_year`
    , `stu_join_year`
    , `stu_enroll`
    , `stu_center_id`
    , `stu_created_by`) 
     VALUES
      ('$applicationNo'
      , '$stuName'
      , '$mobileNo'
      , '$email'
      , '$university'
      , '$courseName'
      , '$medium'
      , '$academicYear'
      , '$academicYear'
      , '$enroll'
      , '$centerId'
      , '$createdBy')";

    if ($conn->query($student_sql) === TRUE) {
        $studentId = $conn->insert_id;

         // Construct the value for stu_apply column
        $applicationNo = $applicationYear . $applicationType . $studentId;

        // Update the inserted row with the constructed value
        $update_sql = "UPDATE `jeno_student` SET `stu_apply_no` = '$applicationNo' WHERE `stu_id` = $studentId";

        $conn->query($update_sql);

        // Insert into additional table
        $additional_sql = "INSERT INTO `jeno_stu_additional`
        (`add_stu_id`
        , `add_year_type`
        , `add_language`
        , `add_digilocker`
        , `add_admit_date`
        , `add_dob`
        , `add_gender`
        , `add_address`
        , `add_pincode`
        , `add_father_name`
        , `add_mother_name`
        , `add_aadhar_no`
        , `add_nationality`
        , `add_mother_tongue`
        , `add_religion`
        , `add_caste`
        , `add_community`
        , `add_marital_status`
        , `add_employed`
        , `add_qualifiaction`
        , `add_institute`
        , `add_comp_year`
        , `add_study_field`
        , `add_grade`
        , `add_center_id`
        , `add_created_by`) 
        VALUES 
        ('$studentId'
        , '$yearType'
        , '$language'
        , '$digilocker'
        , '$admitDate'
        , '$dob'
        , '$gender'
        , '$address'
        , '$pincode'
        , '$fathername'
        , '$mothername'
        , '$aadharNumber'
        , '$nationality'
        , '$motherTongue'
        , '$religion'
        , '$caste'
        , '$community'
        , '$marital'
        , '$employed'
        , '$qualification'
        , '$previous'
        , '$completed'
        , '$study'
        , '$grade'
        , '$centerId'
        , '$createdBy')";

        $conn->query($additional_sql);

        // Insert into documents table
        $documents_sql = "INSERT INTO `jeno_document`
        (`doc_stu_id`
        , `doc_sslc`
        , `doc_hsc`
        , `doc_community`
        , `doc_tc`
        , `doc_aadhar`
        , `doc_photo`
        , `doc_center_id`
        , `doc_created_by`) 
        VALUES 
        ('$studentId'
        , '$sslcName'
        , '$hscName'
        , '$communityName'
        , '$tcName'
        , '$aadharName'
        , '$photoName'
        , '$centerId'
        , '$createdBy')";

        $conn->query($documents_sql);

        // Retrieve course details including fees arrays
            $courseQuery = "SELECT 
            `cou_university_fess`
            , `cou_study_fees` 
            FROM `jeno_course` 
            WHERE `cou_id` = '$courseName' 
            AND cou_center_id =$centerId";

        $courseResult = $conn->query($courseQuery);

        if ($courseResult && $courseResult->num_rows > 0) {
        $courseRow = $courseResult->fetch_assoc();
        $universityFeesArray = json_decode($courseRow['cou_university_fess'], true);
        $studyFeesArray = json_decode($courseRow['cou_study_fees'], true);

        // Determine the fees based on the academic year
        $academicYearIndex = intval($academicYear) - 1;
        $universityFee = isset($universityFeesArray[$academicYearIndex]) ? $universityFeesArray[$academicYearIndex] : 0;
        $studyFee = isset($studyFeesArray[$academicYearIndex]) ? $studyFeesArray[$academicYearIndex] : 0;
        } else {
        $universityFee = 0;
        $studyFee = 0;
        }

        // Insert into fees table
        $fees_sql = "INSERT INTO `jeno_fees`
        (`fee_admision_id`
        , `fee_stu_id`
        , `fee_uni_fee_total`
        , `fee_sdy_fee_total`
        , `fee_stu_year`
        , `fee_center_id`
        , `fee_created_by`) 
        VALUES 
        ('$applicationNo'
        , '$studentId'
        , '$universityFee'
        , '$studyFee'
        , '$academicYear'
        , '$centerId'
        , '$createdBy')";

        $conn->query($fees_sql);

        // Insert into book table
        // $book_sql = "INSERT INTO `jeno_book`
        // (`book_stu_id`
        // , `book_year`
        // , `book_center_id`
        // , `book_created_by`) 
        // VALUES 
        // ('$studentId'
        // , '$academicYear'
        // , '$centerId'
        // , '$createdBy')"; // Modify as per your requirements

        // $conn->query($book_sql);

        $response['success'] = true;
        $response['message'] = "Student details added successfully!";
    } else {
        $response['message'] = "Error adding student: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

//---end --admission add function -----------------------------


//----University select this function trigger----------------

if (isset($_POST['university']) && $_POST['university'] != '') {
    
    $universityId = $_POST['university'];
    $centerId = $_SESSION['centerId'];

    $courseQuery = "SELECT 
    `cou_id`
    , `cou_name` 
    FROM `jeno_course` 
    WHERE 
    cou_status = 'Active' 
    AND cou_uni_id = $universityId 
    AND cou_center_id = $centerId;";
    $courseResult = mysqli_query($conn, $courseQuery);

    if ($courseResult) {
        while ($row = mysqli_fetch_assoc($courseResult)) {
            // Push each course as an object into the courses array
            $course = array(
                'cou_id' => $row['cou_id'],
                'cou_name' => $row['cou_name']
            );
            $courses[] = $course;
        }

        echo json_encode($courses);
    } else {
        $response['message'] = "Error fetching Course Name details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }

    //---end function -----------------------


    //----course select Durarion and elective or language show this function ------------------
    
    if (isset($_POST['courseId']) && $_POST['courseId'] != '') 
    {
        $courseId = $_POST['courseId'];
        $centerId = $_SESSION['centerId'];
    
        // Fetch course details
        $courseQuery = "SELECT 
        cou_duration
        , cou_fees_type 
        FROM `jeno_course` 
        WHERE cou_id = '$courseId' 
        AND cou_center_id = $centerId";
        $courseResult = mysqli_query($conn, $courseQuery);
    
        if ($courseResult) {
            $course = mysqli_fetch_assoc($courseResult);
            $courseDuration = $course['cou_duration'];
            $feesPattern = $course['cou_fees_type'];
        } else {
            $response['message'] = "Error fetching Course details: " . mysqli_error($conn);
            echo json_encode($response);
            exit();
        }
    
        // Fetch electives based on course_id
        $eleQuery = "SELECT 
        `ele_id`
        , `ele_elective` 
        FROM `jeno_elective` 
        WHERE ele_status = 'Active' 
        AND ele_cou_id = $courseId 
        AND ele_center_id = $centerId";
        $eleResult = mysqli_query($conn, $eleQuery);
    
        if ($eleResult) {
            $electives = [];
            while ($row = mysqli_fetch_assoc($eleResult)) {
                $elective = array(
                    'ele_id' => $row['ele_id'],
                    'ele_elective' => $row['ele_elective']
                );
                $electives[] = $elective;
            }
    
            $response = [
                'courseDuration' => $courseDuration,
                'feesPattern' => $feesPattern,
                'electives' => $electives
            ];
    
            echo json_encode($response);
        } else {
            $response['message'] = "Error fetching Elective details: " . mysqli_error($conn);
            echo json_encode($response);
        }
    
        exit();
    }

    //------function end----------------


    
    //--edit click edit data load this function ----------

    if (isset($_POST['editId']) && $_POST['editId'] != '') {
            $editId = $_POST['editId'];
            $centerId = $_SESSION['centerId'];
        
            $selQuery = "SELECT a.*, b.*  
                         FROM `jeno_student` AS a 
                         LEFT JOIN `jeno_stu_additional` AS b ON a.stu_id = b.add_stu_id 
                         WHERE a.stu_id = $editId 
                         AND a.stu_center_id = $centerId";
            $result = mysqli_query($conn, $selQuery);
        
            if ($result) {
                $row = mysqli_fetch_assoc($result);
        
                $studentDetails = array(
                    'stuId' => $row['stu_id'],
                    'name' => $row['stu_name'],
                    'phone' => $row['stu_phone'],
                    'email' => $row['stu_email'],
                    'uni_id' => $row['stu_uni_id'],
                    'cou_id' => $row['stu_cou_id'],
                    'stu_addmision_new' => $row['stu_addmision_new'],
                    'medium_id' => $row['stu_medium_id'],
                    'acaYear' => $row['stu_aca_year'],
                    'enroll' => $row['stu_enroll'],
                    'year_type' => $row['add_year_type'],
                    'language' => $row['add_language'],
                    'digilocker' => $row['add_digilocker'],
                    'admit_date' => $row['add_admit_date'],
                    'dob' => $row['add_dob'],
                    'gender' => $row['add_gender'],
                    'address' => $row['add_address'],
                    'pincode' => $row['add_pincode'],
                    'father_name' => $row['add_father_name'],
                    'mother_name' => $row['add_mother_name'],
                    'aadhar_no' => $row['add_aadhar_no'],
                    'nationality' => $row['add_nationality'],
                    'mother_tongue' => $row['add_mother_tongue'],
                    'religion' => $row['add_religion'],
                    'caste' => $row['add_caste'],
                    'community' => $row['add_community'],
                    'marital_status' => $row['add_marital_status'],
                    'employed' => $row['add_employed'],
                    'qualification' => $row['add_qualifiaction'],
                    'institute' => $row['add_institute'],
                    'comp_year' => $row['add_comp_year'],
                    'study_field' => $row['add_study_field'],
                    'grade' => $row['add_grade'],

                );
        
                echo json_encode($studentDetails);
            } else {
                $response['message'] = "Error executing query: " . mysqli_error($conn);
                echo json_encode($response);
            }
            exit();
        }


        //---function end-----------------


// Handle updating student details update student details ---------------

if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editAdmission' && $_POST['hdnAdmissionId'] != '') {
    $admissionId = htmlspecialchars($_POST['hdnAdmissionId'], ENT_QUOTES, 'UTF-8');
    $stuName = htmlspecialchars($_POST['stuNameEdit'], ENT_QUOTES, 'UTF-8');
    $mobileNo = htmlspecialchars($_POST['mobileNoEdit'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['emailEdit'], ENT_QUOTES, 'UTF-8');
    $university = htmlspecialchars($_POST['universityEdit'], ENT_QUOTES, 'UTF-8');
    $courseName = htmlspecialchars($_POST['courseNameEdit'], ENT_QUOTES, 'UTF-8');
    $applicationNoEdit = htmlspecialchars($_POST['applicationNoEdit'], ENT_QUOTES, 'UTF-8');
    $medium = htmlspecialchars($_POST['mediumEdit'], ENT_QUOTES, 'UTF-8');
    $acaYear = htmlspecialchars($_POST['academicYearEdit'], ENT_QUOTES, 'UTF-8');
    $yearType = htmlspecialchars($_POST['yearTypeEdit'], ENT_QUOTES, 'UTF-8');
    $language = htmlspecialchars($_POST['languageEdit'], ENT_QUOTES, 'UTF-8');
    $digilocker = htmlspecialchars($_POST['digilockerEdit'], ENT_QUOTES, 'UTF-8');
    $admitDate = htmlspecialchars($_POST['admitDateEdit'], ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($_POST['dobEdit'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['genderEdit'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['addressEdit'], ENT_QUOTES, 'UTF-8');
    $pincode = htmlspecialchars($_POST['pincodeEdit'], ENT_QUOTES, 'UTF-8');
    $fathername = htmlspecialchars($_POST['fathernameEdit'], ENT_QUOTES, 'UTF-8');
    $mothername = htmlspecialchars($_POST['mothernameEdit'], ENT_QUOTES, 'UTF-8');
    $aadharNumber = htmlspecialchars($_POST['aadharNumberEdit'], ENT_QUOTES, 'UTF-8');
    $nationality = htmlspecialchars($_POST['nationalityEdit'], ENT_QUOTES, 'UTF-8');
    $motherTongue = htmlspecialchars($_POST['motherTongueEdit'], ENT_QUOTES, 'UTF-8');
    $religion = htmlspecialchars($_POST['religionEdit'], ENT_QUOTES, 'UTF-8');
    $caste = htmlspecialchars($_POST['casteEdit'], ENT_QUOTES, 'UTF-8');
    $community = htmlspecialchars($_POST['communityEdit'], ENT_QUOTES, 'UTF-8');
    $marital = htmlspecialchars($_POST['maritalEdit'], ENT_QUOTES, 'UTF-8');
    $employed = htmlspecialchars($_POST['employedEdit'], ENT_QUOTES, 'UTF-8');
    $qualification = htmlspecialchars($_POST['qualificationEdit'], ENT_QUOTES, 'UTF-8');
    $previous = htmlspecialchars($_POST['previousEdit'], ENT_QUOTES, 'UTF-8');
    $completed = htmlspecialchars($_POST['completedEdit'], ENT_QUOTES, 'UTF-8');
    $study = htmlspecialchars($_POST['studyEdit'], ENT_QUOTES, 'UTF-8');
    $grade = htmlspecialchars($_POST['gradeEdit'], ENT_QUOTES, 'UTF-8');
    $enroll = htmlspecialchars($_POST['enrollEdit'], ENT_QUOTES, 'UTF-8');

    $updatedBy = $_SESSION['userId'];

    $uploadDir = '../assets/images/student/';
    $sslcName = '';
    $hscName = '';
    $communityName = '';
    $tcName = '';
    $aadharName = '';
    $photoName = '';

    // Initialize the SQL part for document updates
    $updateDocSql = '';

    // Handle file uploads and construct SQL parts conditionally
    if (!empty($_FILES['sslcEdit']['name'])) {
        $sslcName = basename($_FILES['sslcEdit']['name']);
        move_uploaded_file($_FILES['sslcEdit']['tmp_name'], $uploadDir . $sslcName);
        $updateDocSql .= "c.doc_sslc = '$sslcName', ";
    }

    if (!empty($_FILES['hscEdit']['name'])) {
        $hscName = basename($_FILES['hscEdit']['name']);
        move_uploaded_file($_FILES['hscEdit']['tmp_name'], $uploadDir . $hscName);
        $updateDocSql .= "c.doc_hsc = '$hscName', ";
    }

    if (!empty($_FILES['communityEdit']['name'])) {
        $communityName = basename($_FILES['communityEdit']['name']);
        move_uploaded_file($_FILES['communityEdit']['tmp_name'], $uploadDir . $communityName);
        $updateDocSql .= "c.doc_community = '$communityName', ";
    }

    if (!empty($_FILES['tcEdit']['name'])) {
        $tcName = basename($_FILES['tcEdit']['name']);
        move_uploaded_file($_FILES['tcEdit']['tmp_name'], $uploadDir . $tcName);
        $updateDocSql .= "c.doc_tc = '$tcName', ";
    }

    if (!empty($_FILES['aadharEdit']['name'])) {
        $aadharName = basename($_FILES['aadharEdit']['name']);
        move_uploaded_file($_FILES['aadharEdit']['tmp_name'], $uploadDir . $aadharName);
        $updateDocSql .= "c.doc_aadhar = '$aadharName', ";
    }

    if (!empty($_FILES['photoEdit']['name'])) {
        $photoName = basename($_FILES['photoEdit']['name']);
        move_uploaded_file($_FILES['photoEdit']['tmp_name'], $uploadDir . $photoName);
        $updateDocSql .= "c.doc_photo = '$photoName', ";
    }

    // Append the updated_by field if there are document updates
    if (!empty($updateDocSql)) {
        $updateDocSql .= "c.doc_updated_by = '$updatedBy', ";
    }

    // Remove the trailing comma and space from the SQL part
    $updateDocSql = rtrim($updateDocSql, ', ');

    // Construct the final SQL query
    $combined_sql = "
        UPDATE `jeno_student` AS a
        LEFT JOIN `jeno_stu_additional` AS b ON a.stu_id = b.add_stu_id
        LEFT JOIN `jeno_document` AS c ON a.stu_id = c.doc_stu_id
        SET 
            a.stu_name = '$stuName', 
            a.stu_phone = '$mobileNo', 
            a.stu_email = '$email', 
            a.stu_uni_id = '$university', 
            a.stu_cou_id = '$courseName', 
            a.stu_medium_id = '$medium', 
            a.stu_aca_year = '$acaYear',
            a.stu_addmision_new = '$applicationNoEdit', 
            a.stu_enroll = '$enroll', 
            a.stu_updated_by = '$updatedBy',
            
            b.add_year_type = '$yearType', 
            b.add_language = '$language', 
            b.add_digilocker = '$digilocker', 
            b.add_admit_date = '$admitDate', 
            b.add_dob = '$dob', 
            b.add_gender = '$gender', 
            b.add_address = '$address', 
            b.add_pincode = '$pincode', 
            b.add_father_name = '$fathername', 
            b.add_mother_name = '$mothername', 
            b.add_aadhar_no = '$aadharNumber', 
            b.add_nationality = '$nationality', 
            b.add_mother_tongue = '$motherTongue', 
            b.add_religion = '$religion', 
            b.add_caste = '$caste', 
            b.add_community = '$community', 
            b.add_marital_status = '$marital', 
            b.add_employed = '$employed', 
            b.add_qualifiaction = '$qualification', 
            b.add_institute = '$previous', 
            b.add_comp_year = '$completed', 
            b.add_study_field = '$study', 
            b.add_grade = '$grade', 
            b.add_updated_by = '$updatedBy'";

    // Append document updates if there are any
    if (!empty($updateDocSql)) {
        $combined_sql .= ", " . $updateDocSql;
    }

    $combined_sql .= " WHERE a.stu_id = '$admissionId'";

    if ($conn->query($combined_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Student details updated successfully!";
    } else {
        $response['message'] = "Error updating student: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

//----function end -------------------------------------------------------------------------------------




// Handle deleting a student opration of delete----------------------------------------
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    $queryDel = "UPDATE `jeno_student` AS a
        LEFT JOIN `jeno_stu_additional` AS b ON a.stu_id = b.add_stu_id
        LEFT JOIN `jeno_document` AS c ON a.stu_id = c.doc_stu_id
        LEFT JOIN `jeno_book` AS d ON a.stu_id = d.book_stu_id
        LEFT JOIN `jeno_fees` AS e ON a.stu_id = e.fee_stu_id
        SET 
            a.stu_status = 'Inactive',
            b.add_status = 'Inactive',
            c.doc_status = 'Inactive',
            d.book_status = 'Inactive',
            e.fee_status = 'Inactive'
        WHERE a.stu_id = $id;";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $_SESSION['message'] = "Student details have been deleted successfully!";
        $response['success'] = true;
        $response['message'] = "Student details have been deleted successfully!";
    } else {
        $_SESSION['message'] = "Unexpected error in deleting Student details!";
        $response['message'] = "Error: " . mysqli_error($conn);
    }

    echo json_encode($response);
    exit();
}

//----function end --------------------------------------------------------------------------


//---view function get student all data get -------------------------------------------------

if(isset($_POST['viewId']) && $_POST['viewId'] != '') {
    $studentId = $_POST['viewId'];
    $centerId = $_SESSION['centerId'];

    // Prepare and execute the SQL query
    $selQuery1 = "SELECT a.*, b.*, c.*, d.*, e.*, f.*  
                         FROM `jeno_student` AS a 
                         LEFT JOIN `jeno_stu_additional` AS b ON a.stu_id = b.add_stu_id 
                         LEFT JOIN `jeno_document` AS c ON a.stu_id = c.doc_stu_id
                         LEFT JOIN `jeno_university` AS d ON a.stu_uni_id = d.uni_id 
                         LEFT JOIN `jeno_course` AS e ON a.stu_cou_id = e.cou_id
                         LEFT JOIN `jeno_elective` AS f ON b.add_language = f.ele_id
                         WHERE a.stu_id = $studentId AND a.stu_center_id = $centerId";
    
    $result1 = $conn->query($selQuery1);

    if($result1) {
        $row = mysqli_fetch_assoc($result1);


        $app_no="SELECT  `fee_admision_id` FROM `jeno_fees` WHERE fee_stu_id = $studentId  AND fee_status='Active';";
        $app_no_res = $conn->query($app_no);
        $app = mysqli_fetch_assoc($app_no_res);

        $app_id = $app['fee_admision_id'];


        $select_fees_sql ="SELECT
    `pay_id`,
    `pay_bill_no`,
    `pay_admission_id`,
    `pay_student_name`,
    `pay_year`,
    `pay_paid_method`,
    `pay_transaction_id`,
    `pay_description`,
    `pay_university_fees`,
    `pay_study_fees`,
    `pay_total_amount`,
    `pay_date`
FROM
    `jeno_payment_history`
WHERE
    pay_center_id = $centerId AND pay_admission_id = '$app_id' AND pay_status = 'Active';";
         
    $result2 = $conn->query($select_fees_sql);


   
    

    $stu_fess = [];
    while ($fees = mysqli_fetch_assoc($result2)) {
        $stu_fess = array(
            'pay_id' => $fees['pay_id'],
            'pay_bill_no' => $fees['pay_bill_no'],
            'pay_admission_id' => $fees['pay_admission_id'],
            'pay_student_name' => $fees['pay_student_name'],
            'pay_year' => $fees['pay_year'],
            'pay_paid_method' => $fees['pay_paid_method'],
            'pay_transaction_id' => $fees['pay_transaction_id'],
            'pay_description' => $fees['pay_description'],
            'pay_university_fees' => $fees['pay_university_fees'],
            'pay_study_fees' => $fees['pay_study_fees'],
            'pay_total_amount' => $fees['pay_total_amount'],
            'pay_date' => date('d-m-y', strtotime($fees['pay_date'])),
        );
        $student_fees[] = $stu_fess;
    }

   
    
    $joinYearValue = $row['stu_join_year'];
    $feesPattern1 = $row['cou_fees_type'];
    if ($feesPattern1 == 'Semester') {
        $joinYearValue .= ' Sem';
    } else if ($feesPattern1 == 'Year') {
        $joinYearValue .= ' Year';
    }

        $acaYearValue = $row['stu_aca_year'];
        $feesPattern = $row['cou_fees_type'];
        if ($feesPattern == 'Semester') {
            $acaYearValue .= ' Sem';
        } else if ($feesPattern == 'Year') {
            $acaYearValue .= ' Year';
        }
    // Prepare university details array
    $studentView = [
           
                    'stuId' => $row['stu_id'],
                    'name' => $row['stu_name'],
                    'phone' => $row['stu_phone'],
                    'email' => $row['stu_email'],
                    'uni_id' => $row['uni_name'],
                    'cou_id' => html_entity_decode($row['cou_name']),
                    'medium_id' => $row['stu_medium_id'],
                    'apply_no' => $row['stu_apply_no'],
                    'stu_addmision_new' => $row['stu_addmision_new'],
                    'acaYear' => $acaYearValue,
                    'joinYear' => $joinYearValue,
                    'enroll' => $row['stu_enroll'],
                    'year_type' => $row['add_year_type'],
                    'language' => $row['ele_elective'],
                    'digilocker' => $row['add_digilocker'],
                    'admit_date' => $row['add_admit_date'],
                    'dob' => $row['add_dob'],
                    'gender' => $row['add_gender'],
                    'address' => $row['add_address'],
                    'pincode' => $row['add_pincode'],
                    'father_name' => $row['add_father_name'],
                    'mother_name' => $row['add_mother_name'],
                    'aadhar_no' => $row['add_aadhar_no'],
                    'nationality' => $row['add_nationality'],
                    'mother_tongue' => $row['add_mother_tongue'],
                    'religion' => $row['add_religion'],
                    'caste' => $row['add_caste'],
                    'community' => $row['add_community'],
                    'marital_status' => $row['add_marital_status'],
                    'employed' => $row['add_employed'],
                    'qualification' => $row['add_qualifiaction'],
                    'institute' => $row['add_institute'],
                    'comp_year' => $row['add_comp_year'],
                    'study_field' => $row['add_study_field'],
                    'grade' => $row['add_grade'],
                    'sslc' => $row['doc_sslc'],
                    'hsc' => $row['doc_hsc'],
                    'community_doc' => $row['doc_community'],
                    'tc' => $row['doc_tc'],
                    'aadhar_doc' => $row['doc_aadhar'],
                    'photo' => $row['doc_photo'],
                    'student_fees' => !empty($student_fees) ? $student_fees : '-',
    ];

    echo json_encode($studentView);
    exit();
          
    } else {
        echo "Error executing query: " . $conn->error;
    }
}
//-funtion end ---------------------------------------------------------------------------------

        
?>