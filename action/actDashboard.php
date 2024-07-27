<?php
include("../class.php");

session_start();
header('Content-Type: application/json');

// Initialize the response array
$response = ['success' => false, 'message' => ''];

if (isset($_POST['data']) && $_POST['data'] != '') {
    $data = $_POST['data'];

    // Construct the SQL query
    $selQuery = "SELECT COUNT(*) AS total_active_students 
    FROM `jeno_student` AS a 
    LEFT JOIN jeno_university AS b ON a.stu_uni_id = b.uni_id
    WHERE a.stu_status = 'Active' AND b.uni_status ='Active';";

    // Execute the query
    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        $row = $result->fetch_assoc();
        $fees = array(
            'total_active_students' => $row['total_active_students']
        );

        $response['success'] = true;
        $response['data'] = $fees;
    } else {
        $response['message'] = "Error fetching details: " . mysqli_error($conn);
    }

    // Output JSON response
    echo json_encode($response);
    exit();
}
?>
