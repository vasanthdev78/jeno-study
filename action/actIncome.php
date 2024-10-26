

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

    function formatIndianCurrency($amount) {
        $decimal = number_format($amount, 2, '.', ''); // Format to two decimal places
        $decimal_parts = explode('.', $decimal); // Separate integer and decimal parts
    
        // Format integer part to Indian numbering system
        $integer_part = $decimal_parts[0];
        $last_three_digits = substr($integer_part, -3);
        $remaining_digits = substr($integer_part, 0, -3);
    
        if ($remaining_digits != '') {
            $remaining_digits = preg_replace('/\B(?=(\d{2})+(?!\d))/', ',', $remaining_digits);
            $integer_part = $remaining_digits . ',' . $last_three_digits;
        }
    
        return '₹ ' . $integer_part . '.' . $decimal_parts[1]; // Return formatted amount with decimal
    }
    
    // Construct the SQL query
    $selQuery = "SELECT 
        a.pay_university_fees,
        a.pay_study_fees, 
        a.pay_total_amount,
        b.stu_uni_id,
        b.stu_name,
        a.pay_year,
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
        $totalAmount = 0; // Initialize total pay amount
        $totalUniversityFees = 0; // Initialize total university fees
        $totalStudyFees = 0; // Initialize total study fees

        while ($row = $result->fetch_assoc()) {
            $pay_date = date('d-m-Y', strtotime($row['pay_date']));
            $totalAmount += $row['pay_total_amount']; // Add to total amount
            $totalUniversityFees += $row['pay_university_fees']; // Add to total university fees
            $totalStudyFees += $row['pay_study_fees']; // Add to total study fees

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

        // Add the totals to the response
        $response = [
            'fees' => $fees,
            'total_pay_amount' => formatIndianCurrency($totalAmount), // Overall total pay amount
            'total_university_fees' => formatIndianCurrency($totalUniversityFees), // Overall university fees total
            'total_study_fees' => formatIndianCurrency($totalStudyFees) // Overall study center fees total
        ];

        echo json_encode($response);
    } else {
        $response['message'] = "Error fetching Enquiry details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit();
}
// Handle select university fetching course details --end---------------------------------------------------------