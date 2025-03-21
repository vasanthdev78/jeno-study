<?php
include "../class.php"; // function class
include "../db/dbConnection.php"; // database connection

session_start();
header('Content-Type: application/json');

$response = ['success' => false, 'message' => ''];


if (isset($_GET['transationTable']) && $_GET['transationTable'] === 'transationTable') {
    $location = $_GET['location'];
    $draw = $_GET['draw'];
    $start = $_GET['start'];
    $length = $_GET['length'];
    $searchValue = $_GET['search']['value'];

    // Base query
    $query = "
        SELECT 
            tran_id, 
            tran_category, 
            tran_reason, 
            tran_amount, 
            tran_date, 
            tran_method, 
            tran_description 
        FROM jeno_transaction
        WHERE tran_status = 'Active' 
        AND tran_center_id = $location";

    // Apply search filter
    if (!empty($searchValue)) {
        $query .= " AND (
            tran_category LIKE '%$searchValue%' OR 
            tran_reason LIKE '%$searchValue%' OR 
            tran_method LIKE '%$searchValue%'
        )";
    }

    // Total record count
    $totalQuery = "
    SELECT COUNT(*) as total 
    FROM jeno_transaction
    WHERE tran_status = 'Active' 
    AND tran_center_id = $location";
    $totalResult = mysqli_query($conn, $totalQuery);
    $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

    // Add order and limit
    $query .= " ORDER BY tran_date DESC LIMIT $start, $length";

    // Fetch data
    $result = mysqli_query($conn, $query);

    $data = [];
    $serial = $start + 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $formattedDate = (new DateTime($row['tran_date']))->format('d-m-Y');
        $data[] = [
            'serial_number' => $serial++,
            'tran_category' => $row['tran_category'],
            'tran_reason' => $row['tran_description'],
            'tran_amount' => '₹ ' . number_format($row['tran_amount'], 2),
            'tran_date' => $formattedDate,
            'tran_method' => $row['tran_method'],
            'action' => "
                <button class='btn btn-circle btn-warning text-white' 
                        onclick='editTran({$row['tran_id']});' 
                        data-bs-toggle='modal' 
                        data-bs-target='#editExpenseModal' 
                        title='Edit Transaction'>
                    <i class='bi bi-pencil-square'></i>
                </button>
                <button class='btn btn-circle btn-success text-white' 
                        onclick='goViewTransaction({$row['tran_id']});' 
                        title='View Transaction'>
                    <i class='bi bi-eye-fill'></i>
                </button>
                <button class='btn btn-circle btn-danger text-white' 
                        onclick='goDeleteTransaction({$row['tran_id']});' 
                        title='Delete Transaction'>
                    <i class='bi bi-trash'></i>
                </button>",
        ];
    }

    // Prepare response
    $response = [
        "draw" => intval($draw),
        "recordsTotal" => intval($totalRecords),
        "recordsFiltered" => intval($totalRecords),
        "data" => $data,
    ];

    echo json_encode($response);
    exit();
}

    //---get course --------------------------

    // Handle select university fetching course details-------------------------------------------
if (isset($_POST['universityID']) && $_POST['universityID'] != '') {
    
    $universityId = $_POST['universityID'];
    $centerId = $_SESSION['centerId'];

    $courseQuery = "SELECT 
    `cou_id`
    , `cou_name` 
    FROM `jeno_course` 
    WHERE cou_uni_id = $universityId 
    AND cou_center_id = $centerId;"; // get course id and name 
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

    //--Handle select university fetching course details--end------------------------------------



                        // Handle adding a Transaction -------------------------------------------
                        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addTransaction') {

                           $category = htmlspecialchars($_POST['category'], ENT_QUOTES, 'UTF-8');
                            $expenseReason = htmlspecialchars($_POST['ledgerType'], ENT_QUOTES, 'UTF-8');
                            $date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
                            $amount = htmlspecialchars($_POST['amount'], ENT_QUOTES, 'UTF-8');
                            $paidMethod = htmlspecialchars($_POST['paidMethod'], ENT_QUOTES, 'UTF-8');
                            $transactionId = htmlspecialchars($_POST['transactionId'], ENT_QUOTES, 'UTF-8');
                            $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
                            $paymentType = htmlspecialchars($_POST['paymentType'], ENT_QUOTES, 'UTF-8');
                           
                            // Other fields
                            $uniCenterId = $_SESSION['centerId'];
                            $createdBy = $_SESSION['userId'];

                            

                            $university_sql = "INSERT INTO `jeno_transaction`
                            ( `tran_category`
                            , `tran_date`
                            , `tran_amount`
                            , `tran_method`
                            , `tran_pay_type`
                            , `tran_transaction_id`
                            , `tran_description`
                            , `tran_reason`
                            , `tran_center_id`
                            , `tran_created_by`) 
                            VALUES 
                            ('$category'
                            ,'$date'
                            ,'$amount'
                            ,'$paidMethod'
                            ,'$paymentType'
                            ,'$transactionId'
                            ,'$description'
                            ,'$expenseReason'
                            ,'$uniCenterId'
                            ,'$createdBy')";

                            if ($conn->query($university_sql) === TRUE) {
                                $response['success'] = true;
                                $response['message'] = "transaction added successfully!";
                            } else {
                                $response['message'] = "Error adding transaction: " . $conn->error;
                            }

                            echo json_encode($response);
                            exit();
                        }

                        //--Handle adding a Transaction--end---------------------------------------------


                // Handle fetching tarnsaction details for editing---------------------------------------------
                if (isset($_POST['editId']) && $_POST['editId'] != '') {
                    $editId = $_POST['editId'];
                    $centerId = $_SESSION['centerId'];
                    $selQuery = "SELECT 
                    `tran_id`
                    , `tran_category`
                    , `tran_date`
                    , `tran_amount`
                    , `tran_method`
                    , `tran_pay_type`
                    , `tran_transaction_id`
                    , `tran_description`
                    , `tran_reason`
                     FROM `jeno_transaction` 
                     WHERE tran_id = $editId AND tran_center_id =$centerId";

                    $result = mysqli_query($conn, $selQuery);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        

                        $courseDetails = [
                            'tran_id' => $row['tran_id'],
                            'tran_category' => $row['tran_category'],
                            'tran_date' => $row['tran_date'], // Course ID for pre-selecting the course in the dropdown
                            'tran_amount' => $row['tran_amount'],
                            'tran_method' => $row['tran_method'],
                            'tran_pay_type' => $row['tran_pay_type'],
                            'tran_transaction_id' => $row['tran_transaction_id'],
                            'tran_description' => $row['tran_description'],
                            'tran_reason' => $row['tran_reason']
                           
                        ];

                        echo json_encode($courseDetails);
                    } else {
                        $response['message'] = "Error fetching transaction details: " . mysqli_error($conn);
                        echo json_encode($response);
                    }

                    exit();
                }

                //--Handle fetching tarnsaction details for editing --end---------------------------------------


    // Handle updating Transaction details----------------------------------------------------------------
        if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'editTransaction') {
            $editTransactionId = htmlspecialchars($_POST['editTransactionId'], ENT_QUOTES, 'UTF-8');
            $editCategory = htmlspecialchars($_POST['editCategory'], ENT_QUOTES, 'UTF-8');
            $editExpenseReason = htmlspecialchars($_POST['editLedgerType'], ENT_QUOTES, 'UTF-8');
            $editDate = htmlspecialchars($_POST['editDate'], ENT_QUOTES, 'UTF-8');
            $editAmount = htmlspecialchars($_POST['editAmount'], ENT_QUOTES, 'UTF-8');
            $editPaidMethod = htmlspecialchars($_POST['editPaidMethod'], ENT_QUOTES, 'UTF-8');
            $editTranId = htmlspecialchars($_POST['editTranId'], ENT_QUOTES, 'UTF-8');
            $editDescription = htmlspecialchars($_POST['editDescription'], ENT_QUOTES, 'UTF-8');
            $editPaymentType = htmlspecialchars($_POST['editPaymentType'], ENT_QUOTES, 'UTF-8');
            
         
            // Other fields
            
            $updatedBy = $_SESSION['userId'];
    
 
            $editUniversity ="UPDATE `jeno_transaction` 
            SET 
            `tran_category`='$editCategory'
            ,`tran_date`='$editDate'
            ,`tran_amount`='$editAmount'
            ,`tran_method`='$editPaidMethod'
            ,`tran_pay_type`='$editPaymentType'
            ,`tran_transaction_id`='$editTranId'
            ,`tran_description`='$editDescription'
            ,`tran_reason`='$editExpenseReason'
            ,`tran_updated_by`='$updatedBy'
             WHERE `tran_id` = $editTransactionId;";
            
            $universityres = mysqli_query($conn, $editUniversity);

                if ($universityres) {
                    $_SESSION['message'] = "Transaction details Updated successfully!";
                    $response['success'] = true;
                    $response['message'] = "Transaction details Updated successfully!";
                } 
                else {
                $response['message'] = "Error: " . mysqli_error($conn);
            }
            
            echo json_encode($response);
            exit();
        }

        //--Handle updating Transaction details--end-------------------------------------------


        // // Handle deleting a transaction-------------------------------------------
            if (isset($_POST['deleteId'])) {
                $id = $_POST['deleteId'];
                $updatedBy = $_SESSION['userId'];

                $queryDel = "UPDATE `jeno_transaction` SET `tran_updated_by`='$updatedBy',`tran_status`='Inactive' WHERE tran_id = $id;";
                $reDel = mysqli_query($conn, $queryDel);

                if ($reDel) {
                    
                    $_SESSION['message'] = "Transaction details have been deleted successfully!";
                    $response['success'] = true;
                    $response['message'] = "Transaction details have been deleted successfully!";
                } else {
                    $_SESSION['message'] = "Unexpected error in deleting Transaction details!";
                    $response['message'] = "Error: " . mysqli_error($conn);
                }

                echo json_encode($response);
                exit();
            }

            //--Handle deleting a transaction---end-----------------------------



            // Handle fetching data get transaction detaile--------------------------------------------------
            if(isset($_POST['id']) && $_POST['id'] != '') {
                $uniId = $_POST['id'];
                $centerId = $_SESSION['centerId'];

                // Prepare and execute the SQL query
                $selQuery = "SELECT 
                `tran_id`
                , `tran_category`
                , `tran_date`
                , `tran_amount`
                , `tran_method`
                , `tran_pay_type`
                , `tran_transaction_id`
                , `tran_description`
                , `tran_reason` 
                , b.led_type
                FROM `jeno_transaction` AS a 
                LEFT JOIN jeno_ledger AS b ON a.tran_reason = b.led_id 
                WHERE tran_id = $uniId AND tran_center_id =$centerId";
                
                $result1 = $conn->query($selQuery);

                if($result1) {
                    $row = mysqli_fetch_assoc($result1);
                    $tran_date = date('d-m-Y', strtotime($row['tran_date']));

             // Prepare university details array
        $enquiryDetails = [

            'tran_id' => $row['tran_id'],
            'tran_category' => $row['tran_category'],
            'tran_date' => $tran_date,
            'tran_amount' => $row['tran_amount'],
            'tran_method' => $row['tran_method'],
            'tran_pay_type' => $row['tran_pay_type'],
            'tran_transaction_id' => $row['tran_transaction_id'],
            'tran_description' => $row['tran_description'],
            'tran_reason' => $row['led_type'],
            
        ];

          echo json_encode($enquiryDetails);
          exit();
                      
                } else {
                    echo "Error executing query: " . $conn->error;
                }
            }

            //--Handle fetching data get transaction detaile--end-----------------------------------



            
// Handle fetching transacrion details for report page--------------------------------------------------------
if (isset($_POST['university']) && $_POST['university'] != '') {
    $centerId = $_SESSION['centerId'];
    $endDate = $_POST['endDate'];
    $startDate = $_POST['startDate'];
    $university = $_POST['university'];
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

    // Fetch payment history data
    $select_pay = "SELECT 
        a.pay_id,
        a.pay_admission_id,
        a.pay_student_name,
        a.pay_year,
        a.pay_paid_method,
        a.pay_study_fees,
        a.pay_total_amount,
        a.pay_balance,
        a.pay_description,
        a.pay_date,
        a.pay_center_id,
        b.stu_aca_year,
        c.cou_name
    FROM `jeno_payment_history` AS a 
    LEFT JOIN jeno_student AS b ON a.pay_admission_id = b.stu_apply_no
    LEFT JOIN jeno_course AS c ON b.stu_cou_id = c.cou_id
    WHERE pay_status = 'Active'";
    
    if ($location !== 'All') {
        $select_pay .= " AND pay_center_id ='$location'";
        }

        $select_pay .= " AND pay_date BETWEEN '$startDate' AND '$endDate';";

    $pay_result = mysqli_query($conn, $select_pay);
   

    // Fetch transaction data
    $selQuery = "SELECT 
        `tran_id`,
        `tran_category`,
        `tran_date`,
        `tran_amount`,
        `tran_method`,
        `tran_pay_type`,
        `tran_transaction_id`,
        `tran_description`,
        `tran_reason`,
        b.led_type
    FROM `jeno_transaction` AS a LEFT JOIN jeno_ledger AS b ON a.tran_reason = b.led_id
    WHERE tran_status = 'Active' AND tran_center_id = '$location'
    AND tran_date BETWEEN '$startDate' AND '$endDate'";

    // Append condition for `tran_category` if `university` is not 'All'
    if ($university !== 'All') {
        $selQuery .= " AND `tran_category` = '$university'";
    }

    if ($location !== 'All') {
        $selQuery .= " AND tran_center_id = $location";
    }

    $tran_result = mysqli_query($conn, $selQuery);

    if ($pay_result && $tran_result) {
        $merged_data = [];
        $total_income = 0;
        $total_expense = 0;


        if($university === 'Income' || $university === 'All'){
    
        // Process payment history data (considered as income)
        while ($row = $pay_result->fetch_assoc()) {
            
            $pay_date = date('d-m-Y', strtotime($row['pay_date']));
            
            // Add payment amount to total income
            $total_income += $row['pay_total_amount'];
            
            $merged_data[] = [
                'type' => 'payment',
                'pay_id' => $row['pay_id'],
                'pay_admission_id' => $row['pay_admission_id'],
                'pay_student_name' => $row['pay_student_name'],
                'cou_name' => $row['cou_name'],
                'stu_aca_year' => $row['stu_aca_year'],
                'pay_description' => $row['pay_description'],
                'pay_year' => $row['pay_year'],
                'pay_paid_method' => $row['pay_paid_method'],
                'pay_study_fees' => $row['pay_study_fees'],
                'pay_total_amount' => $row['pay_total_amount'],
                'pay_balance' => $row['pay_balance'],
                'date' => $pay_date,
                'pay_center_id' => $row['pay_center_id']
            ];
        }
        
    }
    
        // Process transaction data
        while ($row = $tran_result->fetch_assoc()) {
         
            $tran_date = date('d-m-Y', strtotime($row['tran_date']));
            
            // Determine if transaction is income or expense and update totals
            if ($row['tran_category'] === 'Income') {
                $total_income += $row['tran_amount'];
            } else {
                $total_expense += $row['tran_amount'];
            }
    
            $merged_data[] = [
                'type' => 'transaction',
                'tran_id' => $row['tran_id'],
                'tran_category' => $row['tran_category'],
                'tran_reason' => $row['led_type'],
                'tran_method' => $row['tran_method'],
                'tran_pay_type' => $row['tran_pay_type'],
                'tran_amount' => $row['tran_amount'],
                'date' => $tran_date,
                'tran_description' => $row['tran_description'],
                'tran_transaction_id' => $row['tran_transaction_id']
            ];
        }
   
    
        // Sort merged data by date
        usort($merged_data, function($a, $b) {
            return strtotime($a['date']) - strtotime($b['date']);
        });

        // Reformat date for final output
        foreach ($merged_data as &$item) {
            $item['date'] = date('d-m-Y', strtotime($item['date']));  // Convert to display format
        }
    
        $opening_cash_sql="SELECT
                            open_open_online,
                            open_open_cash
                        FROM
                            `jeno_opening`
                        WHERE
                            open_date = '$startDate' AND open_center_id = $location;";

        $opening_cash_result = mysqli_query($conn, $opening_cash_sql);
        $opening_row = $opening_cash_result->fetch_assoc();

        $closing_cash_sql="SELECT
                            open_close_online,
                            open_close_cash
                        FROM
                            `jeno_opening`
                        WHERE
                            open_date = '$endDate' AND open_center_id = $location;";

        $closing_cash_result = mysqli_query($conn, $closing_cash_sql);
        $closing_row = $closing_cash_result->fetch_assoc();


        
        // Add total income and expense to the response
        $response = [
            'merged_data' => $merged_data,
            'total_income' => formatIndianCurrency($total_income),
            'total_expense' => formatIndianCurrency($total_expense),
            'opening_cash' => '₹ '.$opening_row['open_open_cash'],
            'opening_online' => '₹ '.$opening_row['open_open_online'],
            'closing_cash' => '₹ '.$closing_row['open_close_cash'],
            'closing_online' => '₹ '.$closing_row['open_close_online']
        ];
    
        echo json_encode($response);
    } else {
        $response['message'] = "Error fetching data: " . mysqli_error($conn);
        echo json_encode($response);
    }
    
    exit();
}
//-Handle fetching transacrion details for report page-end-----------------------------------

if (isset($_POST['Category_name']) && $_POST['Category_name'] != '') {
    
    $Category_name = $_POST['Category_name'];
    $centerId = $_SESSION['centerId'];

    $courseQuery = "SELECT 
    `led_id`
    , `led_type` 
    FROM `jeno_ledger`
     WHERE led_category = '$Category_name'
      AND led_status = 'Active' 
      AND led_center_id = $centerId ";
    $courseResult = mysqli_query($conn, $courseQuery);

    if ($courseResult) {
        while ($row = mysqli_fetch_assoc($courseResult)) {
            // Push each course as an object into the courses array
            $course = array(
                'led_id' => $row['led_id'],
                'led_type' => $row['led_type']
            );
            $courses[] = $course;
        }

        echo json_encode($courses);
    } else {
        $response['message'] = "Error fetching Ledger Name details: " . mysqli_error($conn);
        echo json_encode($response);
    }

    exit(); 
    }


    // if (isset($_GET['category_edit']) && $_GET['category_edit'] != '') {
    
    //     $category_edit = $_GET['category_edit'];
    //     $query = "SELECT `subcat_id`, `Subcategory` FROM `asset_subcategory` WHERE `staus` = 'Active'"; // Change to your actual table name
    //   $result = $conn->query($query);
      
    //   $categories = [];
    //   if ($result) {
    //       while ($row = $result->fetch_assoc()) {
    //           $categories[] = $row;
    //       }
    //   }
      
    //   header('Content-Type: application/json');
    //   echo json_encode($categories);
    //   exit();
    //   }


            // Default response if no action specified
            $response['message'] = "Invalid action specified.";
            echo json_encode($response);
            exit();

