

<?php
include("../class.php");
include "../db/dbConnection.php";

session_start();
$centerId = $_SESSION['centerId'];
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];


// Handle select university fetching course details -----------------------------------------------------------
if (isset($_POST['university']) && $_POST['university'] != '') {

    $endDate = $_POST['endDate'];
    $startDate = $_POST['startDate'];
    $university = $_POST['university'];
    
    // Check if the university filter is set to 'All' or is empty
    if ($university == 'All' || empty($university)) {
        // Include all universities
        $universityFilterCondition = '1=1'; // This condition always evaluates to true
    } else {
        // Filter by the selected university
        $universityFilterCondition = "b.stu_uni_id = '" . $conn->real_escape_string($university) . "'";
    }
    
    // Construct the SQL query
    $selQuery = "SELECT 
        a.pay_university_fees,
        a.pay_study_fees, 
        a.pay_total_amount,
        b.stu_uni_id ,
        b.stu_name ,
        a.pay_year ,
        a.pay_date
    FROM 
        jeno_payment_history AS a 
        LEFT JOIN jeno_student AS b ON a.pay_student_name = b.stu_name 
    WHERE 
        ($universityFilterCondition)
        AND a.pay_date BETWEEN '$startDate' AND '$endDate'
        AND a.pay_center_id = '$centerId'
        AND a.pay_status = 'Active'";

    $result = mysqli_query($conn, $selQuery);

    if ($result) {
        
        
        $fees = [];

        while ($row = $result->fetch_assoc()) {
            $pay_date = date('d-m-Y', strtotime($row['pay_date']));
            $fees[] = [
                'StuName' => $row['stu_name'],
                'pay_year' => $row['pay_year'],
                'uni_name' => universityName($row['stu_uni_id']),
                'fee_uni_fee' => $row['pay_university_fees'],
                'fee_sty_fee' => $row['pay_study_fees'],
                'pay_total_amount' => $row['pay_total_amount'],
                'pay_date' => $pay_date,
            ];


            

        }
       

        echo json_encode($fees);
    } else {
        $response['message'] = "Error fetching Enquiry details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit();
}

// Handle select university fetching course details --end---------------------------------------------------------