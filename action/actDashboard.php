<?php

session_start();
header('Content-Type: application/json');
include "../class.php"; // function file 
include "../db/dbConnection.php"; // databse connection
// Initialize the response array
$response = ['success' => false, 'message' => ''];

$centerId = $_SESSION['centerId'];
    // get dashboard details get and show ----------------------
if (isset($_POST['data']) && $_POST['data'] != '') {
    // Construct the SQL queries for each table
    $selQuery1 = "SELECT COUNT(*) AS total_active_students 
                  FROM `jeno_student` AS a 
                  LEFT JOIN jeno_university AS b ON a.stu_uni_id = b.uni_id
                  WHERE a.stu_status = 'Active' AND b.uni_status = 'Active' AND a.stu_center_id = $centerId;"; // total student

    $selQuery2 = "SELECT COUNT(*) AS total_active_enquiry
                  FROM `jeno_enquiry`
                  WHERE `enq_status` = 'Active' AND enq_center_id = $centerId;"; // total enquiry 

    $selQuery3 = "SELECT COUNT(*) AS total_active_admission
                  FROM `jeno_student`
                  WHERE `stu_status` = 'Active' AND stu_center_id = $centerId;"; // total admission 

    $selQuery4 = "SELECT COUNT(*) AS total_active_faculty
                  FROM `jeno_faculty`
                  WHERE `fac_status` = 'Active' AND fac_center_id = $centerId;"; // total faculty 

    $selQuery5 = "SELECT COUNT(*) AS total_active_staff
                  FROM `jeno_staff`
                  WHERE `stf_status` = 'Active' AND sft_center_id = $centerId;";  // total staff 

    $selQuery6 = "SELECT `tran_amount` 
                  FROM `jeno_transaction` 
                  WHERE tran_status = 'Active' AND tran_category = 'Expense' AND tran_center_id = $centerId;";  // total expense 

    $selQuery7 = "SELECT `tran_amount` 
                  FROM `jeno_transaction` 
                  WHERE tran_status = 'Active' AND tran_category = 'Income' AND tran_center_id = $centerId;";   // total transaction income only 

    $selQuery8 = "SELECT `fee_uni_fee_total`, `fee_uni_fee`, `fee_sdy_fee_total`, `fee_sty_fee` 
                  FROM `jeno_fees` 
                  WHERE fee_status = 'Active' AND fee_center_id = $centerId";  // total fees income only

    $selQuery9 = "SELECT COUNT(*) AS total_active_university
                  FROM `jeno_university`
                  WHERE `uni_status` = 'Active' AND uni_center_id = $centerId;"; // total university 

    $selQuery10 = "SELECT COUNT(*) AS total_active_course
                 FROM `jeno_course`
                 WHERE `cou_status` = 'Active' AND cou_center_id = $centerId;"; // total course 

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
    echo json_encode($response);
    exit();
    } else {
        $response['message'] = 'Required parameter is missing.';
    }

    //---get dashboard details get and show --end-----------------------------

    //---handle one day dashboard show --------------------------------------

    if (isset($_POST['university']) && $_POST['university'] != '') {
        
        $id=$_POST['university'];
            $date =date("Y/m/d");

        $selQuery1 = "SELECT COUNT(*) AS total_active_student 
        FROM `jeno_stu_additional` AS a 
        LEFT JOIN jeno_student AS b 
        ON a.add_stu_id = b.stu_id 
        LEFT JOIN jeno_university AS c
         ON b.stu_uni_id = c.uni_id 
         WHERE a.add_admit_date BETWEEN '$date' AND '$date' 
         AND a.add_status ='Active' AND c.uni_id = $id AND b.stu_center_id = $centerId; "; // total student today only 

        $selQuery2 = "SELECT COUNT(*) AS total_active_enquiry 
                    FROM `jeno_enquiry` AS a
                    LEFT JOIN jeno_university AS b ON a.enq_uni_id = b.uni_id
                    WHERE a.enq_date BETWEEN '$date' AND '$date'
                    AND a.enq_status = 'Active' 
                    AND a.enq_uni_id = $id AND a.enq_center_id = $centerId;";   // total enquiry today only
                         
                         
         $selQuery3 = "SELECT `tran_amount` 
                         FROM `jeno_transaction` 
                         WHERE tran_status = 'Active' AND tran_category = 'Expense' 
                         AND tran_date BETWEEN '$date' AND '$date' 
                         AND tran_center_id = $centerId";   // total transaction income today only
            
            $selQuery4 = "SELECT SUM(pay_study_fees) AS total_income
             FROM `jeno_payment_history` AS a
              LEFT JOIN jeno_student AS b
               ON a.pay_admission_id = b.stu_apply_no 
               LEFT JOIN jeno_university AS c
                ON b.stu_uni_id = c.uni_id 
                WHERE a.pay_date BETWEEN '$date' AND '$date'
                 AND a.pay_status = 'Active'
                  AND b.stu_uni_id = $id AND c.uni_center_id = $centerId;";  // total fees today only

        $result1 = mysqli_query($conn, $selQuery1);
        $result2 = mysqli_query($conn, $selQuery2);
        $result3 = mysqli_query($conn, $selQuery3);
        $result4 = mysqli_query($conn, $selQuery4);
    
        

        if ($result1 && $result2 && $result3 && $result4) {
            $row1 = mysqli_fetch_assoc($result1) ?? [];
            $row2 = mysqli_fetch_assoc($result2) ?? [];
            $row3 = mysqli_fetch_assoc($result3) ?? [];
            $row4 = mysqli_fetch_assoc($result4) ?? [];
            

    
            $fees = array(
                'total_active_student' => $row1['total_active_student'] ?? 0,
                'total_active_enquiry' => $row2['total_active_enquiry'] ?? 0,            
                'tran_amount_expense' => $row3['tran_amount'] ?? 0,
                'total_income' => $row4['total_income'] ?? 0,
                
            );
    
            $response['success'] = true;
            $response['message'] = "Successfully retrieved report";
            $response['data'] = $fees;
        } else {
            $response['message'] = "Error fetching details: " . mysqli_error($conn);
        }
        echo json_encode($response);
        exit();
        } else {
            $response['message'] = 'Required parameter is missing.';


    }

    //--------handle one day dashboard show --end------------------------------



        // Output JSON response
        echo json_encode($response);
        exit();
?>
