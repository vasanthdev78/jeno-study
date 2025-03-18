<?php
include "../class.php"; // function page
include "../db/dbConnection.php"; // database connection 

session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];



    // Handle university select fetching course  details ----------------------
if (isset($_POST['universityID']) && $_POST['universityID'] != '') {
    
    $universityId = $_POST['universityID'];
    $centerId = $_SESSION['centerId'];
    

    $courseQuery = "SELECT 
    `cou_id`
    , `cou_name` 
    FROM `jeno_course` 
    WHERE cou_uni_id = $universityId 
    AND cou_center_id =$centerId ;"; // get course name and id 
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

//---Handle university select fetching course  details --end ----------------------------------

// Handle adding a enquuiry data -----------------------------------------------------
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEnquiry') {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars($_POST['gender'], ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($_POST['dob'], ENT_QUOTES, 'UTF-8');
    $mobile = htmlspecialchars($_POST['mobile'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
    $remark = htmlspecialchars($_POST['remark'], ENT_QUOTES, 'UTF-8');
    $university = htmlspecialchars($_POST['university'], ENT_QUOTES, 'UTF-8');
    $course = htmlspecialchars($_POST['course'], ENT_QUOTES, 'UTF-8');
    $medium = htmlspecialchars($_POST['medium'], ENT_QUOTES, 'UTF-8');
    // Other fields
    $uniCenterId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];
    $date =date("Y/m/d");

    

    $university_sql = "INSERT INTO `jeno_enquiry`
    ( `enq_uni_id`
    , `enq_cou_id`
    , `enq_stu_name`
    , `enq_email`
    , `enq_dob`
    , `enq_gender`
    , `enq_mobile`
    , `enq_address`
    , `enq_remark`
    , `enq_medium`
    , `enq_date`
    , `enq_center_id`
    , `enq_created_by`) 
    VALUES 
    ('$university'
    ,'$course'
    ,'$name'
    ,'$email'
    ,'$dob'
    ,'$gender'
    ,'$mobile'
    ,'$address'
    ,'$remark'
    ,'$medium'
    ,'$date'
    ,'$uniCenterId'
    ,'$createdBy')";

    if ($conn->query($university_sql) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Enquiry added successfully!";
    } else {
        $response['message'] = "Error adding Enquiry: " . $conn->error;
    }

    echo json_encode($response);
    exit();
}

//--Handle adding a enquuiry data --end -----------------------------------


// Handle fetching enquiry details for editing--------------------
if (isset($_POST['editId']) && $_POST['editId'] != '') {
    $editId = $_POST['editId'];
    $centerId = $_SESSION['centerId'];

    $selQuery = "SELECT 
    `enq_id`
    , `enq_uni_id`
    , `enq_cou_id`
    , `enq_stu_name`
    , `enq_email`
    , `enq_dob`
    , `enq_gender`
    , `enq_mobile`
    , `enq_address`
    , `enq_remark`
    , `enq_medium` 
    FROM `jeno_enquiry` 
    WHERE enq_id = '$editId'";
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $courseName = courseName($row['enq_uni_id'] ,$centerId);

        $courseDetails = [
            'enq_id' => $row['enq_id'],
            'enq_uni_id' => $row['enq_uni_id'],
            'enq_courses' => $courseName,
            'enq_cou_id' => $row['enq_cou_id'], // Course ID for pre-selecting the course in the dropdown
            'enq_stu_name' => $row['enq_stu_name'],
            'enq_email' => $row['enq_email'],
            'enq_dob' => $row['enq_dob'],
            'enq_gender' => $row['enq_gender'],
            'enq_mobile' => $row['enq_mobile'],
            'enq_address' => $row['enq_address'],
            'enq_remark' => $row['enq_remark'],
            'enq_medium' => $row['enq_medium']
        ];

        echo json_encode($courseDetails);
    } else {
        $response['message'] = "Error fetching Enquiry details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit();
}
//-----Handle fetching enquiry details for editing--end-----------------------------------------------


    // Handle updating enquiry  details -------------------------------------------
    if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editEnquiry') {
        $editEnquiryId = htmlspecialchars($_POST['editEnquiryId'], ENT_QUOTES, 'UTF-8');
        $editName = htmlspecialchars($_POST['editName'], ENT_QUOTES, 'UTF-8');
        $editGender = htmlspecialchars($_POST['editGender'], ENT_QUOTES, 'UTF-8');
        $editDob = htmlspecialchars($_POST['editDob'], ENT_QUOTES, 'UTF-8');
        $editMobile = htmlspecialchars($_POST['editMobile'], ENT_QUOTES, 'UTF-8');
        $editEmail = htmlspecialchars($_POST['editEmail'], ENT_QUOTES, 'UTF-8');
        $editAddress = htmlspecialchars($_POST['editAddress'], ENT_QUOTES, 'UTF-8');
        $editremark = htmlspecialchars($_POST['editremark'], ENT_QUOTES, 'UTF-8');
        $editUniversity = htmlspecialchars($_POST['editUniversity'], ENT_QUOTES, 'UTF-8');
        $editCourse = htmlspecialchars($_POST['editCourse'], ENT_QUOTES, 'UTF-8');
        $editMedium = htmlspecialchars($_POST['editMedium'], ENT_QUOTES, 'UTF-8');
    
        // Get the ID of the user who is updating
        $updatedBy = $_SESSION['userId'];
    
        // Fetch the existing remark
        $selQuery = "SELECT `enq_remark` FROM `jeno_enquiry` WHERE enq_id = $editEnquiryId";
        $result = mysqli_query($conn, $selQuery);
    
        // Check if the query was successful
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            // Check if the remark was retrieved
            $existingRemark = $row['enq_remark'] ?? ''; // Default to an empty string if not found
            $remark = $existingRemark . $editremark; // Concatenate existing remark with new one
    
            // Update query to include the remark
            $editUniversityQuery = "UPDATE `jeno_enquiry`
                SET 
                    `enq_uni_id` = '$editUniversity',
                    `enq_cou_id` = '$editCourse',
                    `enq_stu_name` = '$editName',
                    `enq_email` = '$editEmail',
                    `enq_dob` = '$editDob',
                    `enq_gender` = '$editGender',
                    `enq_mobile` = '$editMobile',
                    `enq_address` = '$editAddress',
                    `enq_remark` = '$remark',
                    `enq_medium` = '$editMedium',
                    `enq_updated_by` = '$updatedBy'
                WHERE enq_id = '$editEnquiryId'";
    
            // Execute the update query
            $universityres = mysqli_query($conn, $editUniversityQuery);
    
            // Prepare response based on query execution
            if ($universityres) {
                $_SESSION['message'] = "Enquiry details updated successfully!";
                $response['success'] = true;
                $response['message'] = "Enquiry details updated successfully!";
            } else {
                $response['success'] = false; // Add success key for consistency
                $response['message'] = "Error: " . mysqli_error($conn);
            }
        } else {
            // Handle error if SELECT query fails
            $response['success'] = false;
            $response['message'] = "Error fetching existing remark: " . mysqli_error($conn);
        }
    
        // Return JSON response
        echo json_encode($response);
        exit();
    }
    

        //----Handle updating enquiry  details--end------------------------------------


        // // Handle deleting a enquiry -------------------------------------
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

            //--Handle deleting a enquiry --end------------------------------------------------


            // handle view data for enquiry view ------------------------------------------------
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
                , `enq_remark`
                , `enq_medium`
                , `enq_adminsion_status`
                 FROM `jeno_enquiry`
                  WHERE enq_id = '$uniId';";
                
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
            'enq_remark' => $row['enq_remark'],
            'enq_medium' => $row['enq_medium'],
            'enq_adminsion_status' => $row['enq_adminsion_status'],
            
        ];

          echo json_encode($enquiryDetails);
          exit();
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }

            //----handle view data for enquiry view --end-----------------------------------------


            if (isset($_POST['TableName']) && $_POST['TableName'] != '') {
                // Example for server-side processing
                $limit = intval($_POST['length']); // Number of records to fetch
                $offset = intval($_POST['start']); // Starting point for records
                $searchValue = $_POST['search']['value'] ?? ''; // Search input
                $university = $_POST['university'] ?? '';
                $course = $_POST['course'] ?? '';
                $date = $_POST['date'] ?? '';
            
                // Base query for active enquiries
                $baseQuery = "SELECT * FROM jeno_enquiry WHERE `enq_status` = 'Active' ORDER BY enq_id DESC";
                $countQuery = "SELECT COUNT(*) AS total FROM jeno_enquiry WHERE `enq_status` = 'Active'";
            
                // Dynamic conditions and parameters for filtering
                $conditions = [];
                $params = [];
                $types = ''; // For parameter binding
            
                // Add conditions based on filters
                if (!empty($university)) {
                    $conditions[] = "enq_uni_id = ?";
                    $params[] = $university;
                    $types .= 'i'; // Assuming enq_uni_id is an integer
                }
                if (!empty($course)) {
                    $conditions[] = "enq_cou_id = ?";
                    $params[] = $course;
                    $types .= 'i'; // Assuming enq_cou_id is an integer
                }
                if (!empty($date)) {
                    $conditions[] = "enq_date = ?";
                    $params[] = $date;
                    $types .= 's';
                }
                if (!empty($searchValue)) {
                    $conditions[] = "(enq_stu_name LIKE ? OR enq_mobile LIKE ?)";
                    $params[] = "%$searchValue%";
                    $params[] = "%$searchValue%";
                    $types .= 'ss';
                }
            
                // Append conditions to the base and count queries
                if (!empty($conditions)) {
                    $conditionString = implode(' AND ', $conditions);
                    $baseQuery .= " AND " . $conditionString;
                    $countQuery .= " AND " . $conditionString;
                }
            
                // Calculate total records without filtering
                $stmt = $conn->prepare($countQuery);
                if ($types) {
                    $stmt->bind_param($types, ...$params);
                }
                $stmt->execute();
                $result = $stmt->get_result();
                $totalData = $result->fetch_assoc()['total'];
            
                // Retrieve filtered records with limit and offset
                $baseQuery .= " LIMIT ?, ?";
                $stmt = $conn->prepare($baseQuery);
                $types .= 'ii'; // For limit and offset
                $params[] = $offset;
                $params[] = $limit;
                $stmt->bind_param($types, ...$params);
                $stmt->execute();
                $result = $stmt->get_result();
            
                $data = [];
                $index=1;
                while ($row = $result->fetch_assoc()) {
                    $data[] = [
                        'id' => $row['enq_id'],
                        's_no' => $index, // Assign the current index value
                        'enq_date' => $row['enq_date'],
                        'enq_stu_name' => $row['enq_stu_name'],
                        'university' => universityName($row['enq_uni_id']),
                        'course' => courseNameOnly($row['enq_cou_id']),
                        'enq_mobile' => $row['enq_mobile'],
                        'enq_adminsion_status' => $row['enq_adminsion_status'],
                        'action' => "<td>
                                        <button type='button' class='btn btn-sm btn-warning text-white modalBtn' 
                                                onclick='editEnquiry({$row['enq_id']});' 
                                                data-bs-toggle='modal' 
                                                data-bs-target='#editEnquiryModal' 
                                                data-bs-toggle='tooltip' title='Edit Enquiry'>
                                            <i class='bi bi-pencil-square'></i>
                                        </button>
                                        <button class='btn btn-sm btn-success text-white modalBtn' 
                                                onclick='goViewEnquiry({$row['enq_id']});' 
                                                data-bs-toggle='tooltip' title='View Enquiry'>
                                            <i class='bi bi-eye-fill'></i>
                                        </button>
                                        <button class='btn btn-sm btn-danger text-white' 
                                                onclick='goDeleteEnquiry({$row['enq_id']});' 
                                                data-bs-toggle='tooltip' title='Delete Enquiry'>
                                            <i class='bi bi-trash'></i>
                                        </button>
                                     </td>"
                    ];

                    $index++; // Increment the index after assigning
                }
            
                // Send JSON response
                echo json_encode([
                    "draw" => intval($_POST['draw']),
                    "recordsTotal" => $totalData, // Total count
                    "recordsFiltered" => $totalData, // Filtered count
                    "data" => $data
                ]);
            
                exit();
            }
            

            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();

