<?php
include "../class.php"; // function class
include "../db/dbConnection.php"; // database connection

session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];


// Handle fetching transacrion details for report page--------------------------------------------------------
if (isset($_POST['category']) && $_POST['category'] != '') {
    // $centerId = $_SESSION['centerId'];
    $endDate = $_POST['endDate'];
    $startDate = $_POST['startDate'];
    $category = $_POST['category'];
    $location = $_POST['location'];

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



    // Start with the base query
    $select_pay = "SELECT
                `pay_date`,
                SUM(pay_total_amount) AS pay_total_amount
                
            FROM
                `jeno_payment_history`
            WHERE
                pay_status = 'Active'";

            // Add center ID condition if specified
            if ($location !== 'All') {
            $select_pay .= " AND pay_center_id = $location";
            }

            // Add date range condition if both dates are provided
            if (!empty($fromDate) && !empty($toDate)) {
            $select_pay .= " AND pay_date BETWEEN '$startDate' AND '$endDate'";
            }

            // Optional: Add ORDER BY clause
            $select_pay .= " ORDER BY pay_date ASC;";

    $pay_result = mysqli_query($conn, $select_pay);

    $selQuery = "SELECT
                b.led_type AS ledger_type,
                a.tran_category AS category,
                SUM(a.tran_amount) AS total_amount
            FROM
                jeno_transaction AS a
            LEFT JOIN jeno_ledger AS b
            ON
                a.tran_reason = b.led_id
            WHERE
                a.tran_status = 'Active'
                AND a.tran_date BETWEEN '$startDate' AND '$endDate'";

            // Append additional conditions if necessary
            if ($category !== 'All') {
            $selQuery .= " AND a.tran_category = '$category'";
            }

            if ($location !== 'All') {
            $selQuery .= " AND a.tran_center_id = $location";
            }

            // Add GROUP BY and ORDER BY clauses
            $selQuery .= " GROUP BY b.led_type, a.tran_category
            ORDER BY ledger_type, category;";

    $tran_result = mysqli_query($conn, $selQuery);

    if ($pay_result && $tran_result) {
        $merged_data = [];
        $total_income = 0;
        $total_expense = 0;

        if($category === 'Income' || $category === 'All'){

               // Process payment history data (considered as income)
        while ($row = $pay_result->fetch_assoc()) {
            
            // Add payment amount to total income
            $total_income += $row['pay_total_amount'];
            
            $merged_data[] = [
                'type' => 'payment',
                'category' => 'Income',
                'ledger_type' => 'Admission',
                'pay_total_amount' => $row['pay_total_amount']
                
            ];
        }

        }
    
     
    
        // Process transaction data
        while ($row = $tran_result->fetch_assoc()) {
            
            // Determine if transaction is income or expense and update totals
            if ($row['category'] === 'Income') {
                $total_income += $row['total_amount'];
            } else {
                $total_expense += $row['total_amount'];
            }
    
            $merged_data[] = [
                'type' => 'transaction',
                'tran_category' => $row['category'],
                'tran_reason' => $row['ledger_type'],
                'tran_amount' => $row['total_amount']
            ];
        }
        $query = "
            SELECT
                MAX(CASE WHEN open_date = ? AND open_center_id = ? AND open_status = 'Active' THEN open_open_online END) AS opening_online,
                MAX(CASE WHEN open_date = ? AND open_center_id = ? AND open_status = 'Active' THEN open_open_cash END) AS opening_cash,
                MAX(CASE WHEN open_date = ? AND open_center_id = ? AND open_status = 'Active' THEN open_close_online END) AS closing_online,
                MAX(CASE WHEN open_date = ? AND open_center_id = ? AND open_status = 'Active' THEN open_close_cash END) AS closing_cash
            FROM
                jeno_opening
            WHERE
                (open_date = ? OR open_date = ?)
                AND open_center_id = ?
                AND open_status = 'Active';
        ";

        // Prepare the statement
        $stmt = $conn->prepare($query);

        // Bind parameters to the prepared statement
        $stmt->bind_param('sssssssssss', 
            $startDate, $location, 
            $startDate, $location, 
            $endDate, $location, 
            $endDate, $location, 
            $startDate, $endDate, 
            $location
        );

        // Execute the statement
        $stmt->execute();

        // Fetch the result
        $result = $stmt->get_result();

        // Initialize variables to store the results
        $opening_online = $opening_cash = $closing_online = $closing_cash = null;

        // Check if data is found
        if ($result->num_rows > 0) {
            // Fetch data as an associative array
            $data = $result->fetch_assoc();
            
            // Store each value in separate variables
            $opening_online = $data['opening_online'];
            $opening_cash = $data['opening_cash'];
            $closing_online = $data['closing_online'];
            $closing_cash = $data['closing_cash'];
        } else {
            // Handle the case when no data is found
            echo json_encode(['message' => 'No data found for the given dates and location']);
        }

        // Close the statement and connection
        $stmt->close();
            
       
    
        // Add total income and expense to the response
        $response = [
            'merged_data' => $merged_data,
            'total_income' => formatIndianCurrency($total_income),
            'total_expense' => formatIndianCurrency($total_expense),
            'opening_online' => formatIndianCurrency($opening_online),   
            'opening_cash' => formatIndianCurrency($opening_cash),       
            'closing_online' => formatIndianCurrency($closing_online),   
            'closing_cash' => formatIndianCurrency($closing_cash)
        ];
    
        echo json_encode($response);
    } else {
        $response['message'] = "Error fetching data: " . mysqli_error($conn);
        echo json_encode($response);
    }
    
    exit();
}