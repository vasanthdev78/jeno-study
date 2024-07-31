<?php
include("../class.php");

session_start();
header('Content-Type: application/json');

// Initialize the response array
$response = ['success' => false, 'message' => ''];

if (isset($_POST['data']) && $_POST['data'] != '') {
    // Construct the SQL queries for each table
    $selQuery1 = "SELECT COUNT(*) AS total_active_students 
                  FROM `jeno_student` AS a 
                  LEFT JOIN jeno_university AS b ON a.stu_uni_id = b.uni_id
                  WHERE a.stu_status = 'Active' AND b.uni_status = 'Active';";

    $selQuery2 = "SELECT COUNT(*) AS total_active_enquiry
                  FROM `jeno_enquiry`
                  WHERE `enq_status` = 'Active';";

    $selQuery3 = "SELECT COUNT(*) AS total_active_admission
                  FROM `jeno_student`
                  WHERE `stu_status` = 'Active';";

    $selQuery4 = "SELECT COUNT(*) AS total_active_faculty
                  FROM `jeno_faculty`
                  WHERE `fac_status` = 'Active';";

    $selQuery5 = "SELECT COUNT(*) AS total_active_staff
                  FROM `jeno_staff`
                  WHERE `stf_status` = 'Active';";  

    $selQuery6 = "SELECT `tran_amount` 
                  FROM `jeno_transaction` 
                  WHERE tran_status = 'Active' AND tran_category = 'Expense';";  

    $selQuery7 = "SELECT `tran_amount` 
                  FROM `jeno_transaction` 
                  WHERE tran_status = 'Active' AND tran_category = 'Income';";  

    $selQuery8 = "SELECT `fee_uni_fee_total`, `fee_uni_fee`, `fee_sdy_fee_total`, `fee_sty_fee` 
                  FROM `jeno_fees` 
                  WHERE fee_status = 'Active'";  

    $selQuery9 = "SELECT COUNT(*) AS total_active_university
                  FROM `jeno_university`
                  WHERE `uni_status` = 'Active';";

    $selQuery10 = "SELECT COUNT(*) AS total_active_course
                 FROM `jeno_course`
                 WHERE `cou_status` = 'Active';";

    // Execute the queries
    $result1 = mysqli_query($conn, $selQuery1);
    $result2 = mysqli_query($conn, $selQuery2);
    $result3 = mysqli_query($conn, $selQuery3);
    $result4 = mysqli_query($conn, $selQuery4);
    $result5 = mysqli_query($conn, $selQuery5);
    $result6 = mysqli_query($conn, $selQuery6);
    $result7 = mysqli_query($conn, $selQuery7);
    $result8 = mysqli_query($conn, $selQuery8);
    $result9 = mysqli_query($conn, $selQuery9);
    $result10 = mysqli_query($conn, $selQuery10);


    if ($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7 && $result8 && $result9 && $result10) {
        $row1 = mysqli_fetch_assoc($result1) ?? [];
        $row2 = mysqli_fetch_assoc($result2) ?? [];
        $row3 = mysqli_fetch_assoc($result3) ?? [];
        $row4 = mysqli_fetch_assoc($result4) ?? [];
        $row5 = mysqli_fetch_assoc($result5) ?? [];
        $row6 = mysqli_fetch_assoc($result6) ?? [];
        $row7 = mysqli_fetch_assoc($result7) ?? [];
        $row8 = mysqli_fetch_assoc($result8) ?? [];
        $row9 = mysqli_fetch_assoc($result9) ?? [];
        $row10 = mysqli_fetch_assoc($result10) ?? [];

        $tran_income = $row7['tran_amount'] ?? 0;
        $fee_uni_fee = $row8['fee_uni_fee'] ?? 0;
        $fee_sty_fee = $row8['fee_sty_fee'] ?? 0;

        $received_total = $fee_uni_fee + $fee_sty_fee;
        $total_income = $tran_income + $received_total;

        $fees = array(
            'total_active_students' => $row1['total_active_students'] ?? 0,
            'total_active_enquiry' => $row2['total_active_enquiry'] ?? 0,
            'total_active_admission' => $row3['total_active_admission'] ?? 0,
            'total_active_faculty' => $row4['total_active_faculty'] ?? 0,
            'total_active_staff' => $row5['total_active_staff'] ?? 0,
            'tran_amount_expense' => $row6['tran_amount'] ?? 0,
            'total_income' => $total_income,
            'total_active_university' => $row9['total_active_university'] ?? 0,
            'total_active_course' => $row10['total_active_course'] ?? 0
        );

        $response['success'] = true;
        $response['message'] = "Successfully retrieved report";
        $response['data'] = $fees;
    } else {
        $response['message'] = "Error fetching details: " . mysqli_error($conn);
    }
} else {
    $response['message'] = 'Required parameter is missing.';
}

// Output JSON response
echo json_encode($response);
exit();
?>
