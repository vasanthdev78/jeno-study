<?php
session_start();
include "db/dbConnection.php";

$current_date = date('Y-m-d');  // Correct date format
$date = new DateTime($current_date);

// Subtract one day from the current date
$date->modify('-1 day');
$previous_date = $date->format('Y-m-d');

// Get all active locations
$location_query = "SELECT `loc_id` FROM `jeno_location` WHERE loc_status = 'Active'";
$location_result = mysqli_query($conn, $location_query);

if (!$location_result) {
    die("Failed to fetch locations: " . mysqli_error($conn));
}

while ($location_row = mysqli_fetch_assoc($location_result)) {
    $loc_id = $location_row['loc_id'];

    

        // Fetch transactions and balances for the current center
        $total_online_expense_qry = "SELECT SUM(`tran_amount`) AS total_expense_online FROM `jeno_transaction` WHERE tran_status = 'Active' AND tran_center_id = $loc_id AND tran_date = '$current_date' AND tran_category = 'Expense' AND tran_method = 'Online'";
        $total_cash_expense_qry = "SELECT SUM(`tran_amount`) AS total_expense_cash FROM `jeno_transaction` WHERE tran_status = 'Active' AND tran_center_id = $loc_id AND tran_date = '$current_date' AND tran_category = 'Expense' AND tran_method = 'Cash'";
        $total_online_income_qry = "SELECT SUM(`tran_amount`) AS total_income_online FROM `jeno_transaction` WHERE tran_status = 'Active' AND tran_center_id = $loc_id AND tran_date = '$current_date' AND tran_category = 'Income' AND tran_method = 'Online'";
        $total_cash_income_qry = "SELECT SUM(`tran_amount`) AS total_income_cash FROM `jeno_transaction` WHERE tran_status = 'Active' AND tran_center_id = $loc_id AND tran_date = '$current_date' AND tran_category = 'Income' AND tran_method = 'Cash'";
        $total_fees_cash_income_qry = "SELECT SUM(`pay_study_fees`) AS total_income_fees_cash FROM `jeno_payment_history` WHERE pay_status = 'Active' AND pay_center_id = $loc_id AND pay_date = '$current_date' AND pay_paid_method = 'Cash'";
        $total_fees_online_income_qry = "SELECT SUM(`pay_study_fees`) AS total_income_fees_online FROM `jeno_payment_history` WHERE pay_status = 'Active' AND pay_center_id = $loc_id AND pay_date = '$current_date' AND pay_paid_method = 'Online'";
        $opening_balance_qry = "SELECT `open_id`, `open_date`, `open_open_online`, `open_open_cash`, `open_close_online`, `open_close_cash` FROM `jeno_opening` WHERE open_date = '$previous_date' AND open_status = 'Active' AND open_center_id = $loc_id";

        $expense_online_result = mysqli_query($conn, $total_online_expense_qry);
        $expense_cash_result = mysqli_query($conn, $total_cash_expense_qry);
        $income_online_result = mysqli_query($conn, $total_online_income_qry);
        $income_cash_result = mysqli_query($conn, $total_cash_income_qry);
        $income_fees_cash_result = mysqli_query($conn, $total_fees_cash_income_qry);
        $income_fees_online_result = mysqli_query($conn, $total_fees_online_income_qry);
        $opening_balance_result = mysqli_query($conn, $opening_balance_qry);

        if ($expense_online_result && $expense_cash_result && $income_online_result && $income_cash_result && $income_fees_cash_result && $income_fees_online_result && $opening_balance_result) {
            $row1 = mysqli_fetch_assoc($expense_online_result) ?? [];
            $row2 = mysqli_fetch_assoc($expense_cash_result) ?? [];
            $row3 = mysqli_fetch_assoc($income_online_result) ?? [];
            $row4 = mysqli_fetch_assoc($income_cash_result) ?? [];
            $row5 = mysqli_fetch_assoc($income_fees_cash_result) ?? [];
            $row6 = mysqli_fetch_assoc($income_fees_online_result) ?? [];
            $row7 = mysqli_fetch_assoc($opening_balance_result) ?? [];

            $online_expense = $row1['total_expense_online'] ?? 0;
            $cash_expense = $row2['total_expense_cash'] ?? 0;
            $online_income = $row3['total_income_online'] ?? 0;
            $cash_income = $row4['total_income_cash'] ?? 0;
            $fees_cash = $row5['total_income_fees_cash'] ?? 0;
            $fees_online = $row6['total_income_fees_online'] ?? 0;

            $open_open_online = $row7['open_close_online'] ?? 0;
            $open_open_cash = $row7['open_close_cash'] ?? 0;

            $total_online_income = $online_income + $fees_online;
            $total_cash_income = $cash_income + $fees_cash;

            $hand_online = $total_online_income + $open_open_online;
            $hand_cash = $total_cash_income + $open_open_cash;

            $new_hand_cash = $hand_cash - $cash_expense;
            $new_hand_online = $hand_online - $online_expense;

            // For the next day's opening balance, use today's closing balance
            $open_date = date('Y-m-d', strtotime('+1 day')); // Set the correct date for the next day

            // Insert the next day's opening balance
            $insert_sql = "INSERT INTO jeno_opening (open_date, open_open_online, open_open_cash, open_close_online, open_close_cash, open_center_id) VALUES (?, ?, ?, 0, 0, ?)";
            $stmt = $conn->prepare($insert_sql);
            $stmt->bind_param("sddi", $open_date, $new_hand_online, $new_hand_cash, $loc_id);
            $stmt->execute();
            $stmt->close();

            // Update the current day's closing balance
            $update_sql = "UPDATE jeno_opening SET open_close_online = ?, open_close_cash = ? WHERE open_date = ? AND open_center_id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("ddsi", $new_hand_online, $new_hand_cash, $current_date, $loc_id);
            $stmt->execute();
            $stmt->close();
        }
    }


$conn->close();
?>
