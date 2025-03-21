<?php
session_start();
include "class.php"; // function page
include "db/dbConnection.php"; // database connection
$centerId = $_SESSION['centerId'];
$current_date = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : date('Y-m-d');  // Correct date format
$date = new DateTime($current_date);

// Subtract one day from the current date
$date->modify('-1 day');

// Get the modified date in 'Y-m-d' format
$previous_date = $date->format('Y-m-d');



   $total_online_epense_qry=" SELECT 
        SUM(`tran_amount`) AS total_expense_online
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Expense' AND tran_method ='Online';"; // get online trasaction amount

    $total_cash_epense_qry="SELECT SUM(`tran_amount`) AS total_expense_cash 
    FROM `jeno_transaction` 
    WHERE tran_status = 'Active' 
    AND tran_center_id =$centerId 
    AND tran_date BETWEEN '$current_date' AND '$current_date'
     AND tran_category ='Expense' 
     AND tran_method ='Cash'; "; // get cash trasaction income amount

        $total_online_income_qry="SELECT 
        SUM(`tran_amount`) AS total_income_online
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Income' AND tran_method ='Online';"; // get online trasaction expense amount


        $total_cash_income_qry="SELECT 
        SUM(`tran_amount`) AS total_income_cash
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Income' AND tran_method ='Cash';"; // get cash trasaction expense amount

        $total_fees_cash_income_qry="SELECT 
        SUM(`pay_study_fees`) AS total_income_fees_cash
    FROM `jeno_payment_history`
    WHERE pay_status = 'Active' AND pay_center_id =$centerId
    AND pay_date BETWEEN '$current_date' AND '$current_date' AND pay_paid_method ='Cash';"; // get fess total in cash

        $total_fees_online_income_qry="SELECT 
        SUM(`pay_study_fees`) AS total_income_fees_online
        FROM `jeno_payment_history`
        WHERE pay_status = 'Active' AND pay_center_id =$centerId
        AND pay_date BETWEEN '$current_date' AND '$current_date' AND pay_paid_method ='Online';"; // get fess total in online

        $opening_balance_qry = "SELECT 
        `open_id`, `open_date`, `open_open_online`, `open_open_cash`, `open_close_online`, `open_close_cash`
        FROM `jeno_opening`
        WHERE open_date = '$previous_date' AND open_status = 'Active' AND open_center_id = $centerId;"; // openin balance





    $expense_online_result = mysqli_query($conn, $total_online_epense_qry);
    $expense_cash_result = mysqli_query($conn, $total_cash_epense_qry);
    $income_online_result = mysqli_query($conn, $total_online_income_qry);
    $income_cash_result = mysqli_query($conn, $total_cash_income_qry);
    $income_fees_cash_result = mysqli_query($conn, $total_fees_cash_income_qry);
    $income_fees_inline_result = mysqli_query($conn, $total_fees_online_income_qry);
    $opening_result = mysqli_query($conn, $opening_balance_qry);

    if ($expense_online_result && $expense_cash_result && $income_online_result && $income_cash_result && $income_fees_cash_result && $income_fees_inline_result) {
        $row1 = mysqli_fetch_assoc($expense_online_result) ?? [];
        $row2 = mysqli_fetch_assoc($expense_cash_result) ?? [];
        $row3 = mysqli_fetch_assoc($income_online_result) ?? [];
        $row4 = mysqli_fetch_assoc($income_cash_result) ?? [];
        $row5 = mysqli_fetch_assoc($income_fees_cash_result) ?? [];
        $row6 = mysqli_fetch_assoc($income_fees_inline_result) ?? [];
        $row7 = mysqli_fetch_assoc($opening_result) ?? [];
        
            $online_exepense =$row1['total_expense_online'] ?? 0 ;
            $cash_exepense =$row2['total_expense_cash'] ?? 0 ;
            $online_income =$row3['total_income_online'] ?? 0 ;
            $cash_income =$row4['total_income_cash'] ?? 0 ;
            $fees_cash =$row5['total_income_fees_cash'] ?? 0 ;
            $fees_inline =$row6['total_income_fees_online'] ?? 0 ;

            $open_open_online = $row7['open_close_online'] ?? 0;
             $open_open_cash = $row7['open_close_cash'] ?? 0;

        $total_online_income = $online_income + $fees_inline;
        $total_cash_income = $cash_income + $fees_cash;

        $openig_cash= $total_cash_income + $open_open_cash;
        $opening_online= $total_online_income + $open_open_online;

        $closing_cash= $openig_cash - $cash_exepense;
        $closing_online= $opening_online - $online_exepense;

        echo "<script>
    var openingBalanceCash = $open_open_cash;
    var openingBalanceOnline = $open_open_online;
    var closingBalanceCash = $closing_cash;
    var closingBalanceOnline = $closing_online;
        </script>";
       
    } 


    // Handle fetching transacrion details for report page--------------------------------------------------------

    // $centerId = $_SESSION['centerId'];
    $endDate = $current_date;
    $startDate = $current_date;
    // $location = $_SESSION['centerId'];

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
    WHERE pay_status = 'Active' AND pay_center_id ='$centerId'
    AND pay_date BETWEEN '$startDate' AND '$endDate'";

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
    WHERE tran_status = 'Active' AND tran_center_id ='$centerId'
    AND tran_date BETWEEN '$startDate' AND '$endDate'";


    $tran_result = mysqli_query($conn, $selQuery);

    if ($pay_result && $tran_result) {
        $merged_data = [];

        // Process payment history data
        while ($row = $pay_result->fetch_assoc()) {
            $pay_date = date('d-m-Y', strtotime($row['pay_date']));
            $merged_data[] = [
                'type' => 'payment',
                'pay_id' => $row['pay_id'],
                'pay_admission_id' => $row['pay_admission_id'],
                'pay_student_name' => $row['pay_student_name'],
                'cou_name' => $row['cou_name'],
                'stu_aca_year' => $row['stu_aca_year'],
                'pay_year' => $row['pay_year'],
                'pay_description' => $row['pay_description'],
                'pay_paid_method' => $row['pay_paid_method'],
                'pay_study_fees' => $row['pay_study_fees'],
                'pay_total_amount' => $row['pay_total_amount'],
                'pay_balance' => $row['pay_balance'],
                'date' => $pay_date,
                'pay_center_id' => $row['pay_center_id']
            ];
        }

        // Process transaction data
        while ($row = $tran_result->fetch_assoc()) {
            $tran_date = date('d-m-Y', strtotime($row['tran_date']));
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

        //echo json_encode($merged_data);
    } else {
        $response['message'] = "Error fetching data: " . mysqli_error($conn);
        //echo json_encode($response);
    }

   


?>
<!DOCTYPE html>
<html lang="en">

<?php include "head2.php"; ?>
<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <?php include "top.php" ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            <?php include "left.php"; ?>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        
        <div class="content-page">
            <div class="content">
            <div id="studentDetail"></div>

                <!-- Start Content-->
                <div class="container-fluid" id="StuContent">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-flower">
                                <img src="assets/images/flowers/img-3.png">
                            </div>

                            <div class="bg-flower-2">
                                <img src="assets/images/flowers/img-1.png">
                            </div>
        
                            <div class="page-title-box">
                                <h4 class="page-title">Daily Report</h4>
                                <form method="POST" class="d-flex justify-content-center"> 
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <input type="date" id="dateInput" class="form-control" 
                                max="<?php echo date('Y-m-d'); ?>" 
                                name="selectedDate" 
                                value="<?php echo isset($_POST['selectedDate']) ? $_POST['selectedDate'] : date('Y-m-d'); ?>" 
                                onchange="this.form.submit()">
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>


                    <!-- Display Opening Balances Before the Table -->
                <div class="opening-balance">
                    <!-- <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td colspan="2">Opening Balance - Cash</td>
                                <td><?php echo $open_open_cash ?? 0; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">Opening Balance - Online</td>
                                <td><?php echo $open_open_online ?? 0; ?></td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
                <div class="table-responsive">  
      <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="bg-light">
            <th scope="col">S.No.</th>
            <th scope="col">Ledger Type</th>
            <th scope="col">Description</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Payment Type</th>
            <th scope="col">Income</th>
            <th scope="col">Expense</th>
        </tr>
    </thead>
    <tbody>
        <!-- Opening Balances Rows -->
        <tr>
            <td></td>
            <td>Opening Balance - Cash</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-end">₹ <?php echo number_format($open_open_cash ?? 0, 2); ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Opening Balance - Online</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-end">₹ <?php echo number_format($open_open_online ?? 0, 2); ?></td>
        </tr>

        <!-- Main Data Rows -->
        <?php 
        $i = 1;
        foreach ($merged_data as $data) {
            $income = ($data['type'] == 'payment') ? number_format($data['pay_study_fees'], 2) : 
                (($data['type'] == 'transaction' && $data['tran_category'] == 'Income') ? number_format($data['tran_amount'], 2) : '0.00');

            $expense = ($data['type'] == 'transaction' && $data['tran_category'] != 'Income') ? number_format($data['tran_amount'], 2) : '0.00';

            if ($income == '0.00' && $expense == '0.00') {
                continue;
            }

            $reason = ($data['type'] == 'payment') ? $data['pay_student_name'] . ' ' . $data['cou_name']  . ' ' . $data['stu_aca_year'] . " year" : $data['tran_reason'];
            $paymentMethod = ($data['type'] == 'payment') ? $data['pay_paid_method'] : $data['tran_method'];
            $description = ($data['type'] == 'payment') ? "Admission Fees" : $data['tran_description'];
            $payType = ($data['type'] == 'payment') ? $data['pay_description'] : $data['tran_pay_type'];
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $reason; ?></td>
            <td><?php echo $description; ?></td>
            <td><?php echo $paymentMethod; ?></td>
            <td><?php echo $payType; ?></td>
            <td class="text-end"><?php echo $income ? '₹ ' . $income : ''; ?></td>
            <td class="text-end"><?php echo $expense ? '₹ ' . $expense : ''; ?></td>
        </tr>
        <?php 
        }
        ?>
        
    </tbody>
    <tfoot>

       
        <tr>
            <td></td>
            <td>Closing Balance - Cash:</td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-end">₹ <?php echo number_format($closing_cash ?? 0, 2); ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Closing Balance - Online:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-end">₹ <?php echo number_format($closing_online ?? 0, 2); ?></td>
        </tr>
    </tfoot>    
</table>
</div>


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include "footer.php" ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> -->
    <script src="assets/addlink/sweetalert.js"></script>

    <!-- pdf and excel print -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> -->

    <script src="assets/addlink/jquery.3.6.0.js"></script>
    <script src="assets/addlink/datatable.1.11.5.js"></script>
    <script src="assets/addlink/datatablebutton.2.2.2.js"></script>
    <script src="assets/addlink/jszip.js"></script>
    <script src="assets/addlink/pdf.js"></script>
    <script src="assets/addlink/pdffount.js"></script>
    <script src="assets/addlink/datatablehtml.js"></script>
    <script src="assets/addlink/print.js"></script>

    <!-- Datatable Demo App js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
<script>
    $(document).ready(function() {
        var openingBalanceCash = <?php echo $open_open_cash ?? 0; ?>;
        var openingBalanceOnline = <?php echo $open_open_online ?? 0; ?>;
        var closingBalanceCash = <?php echo $closing_cash ?? 0; ?>;
        var closingBalanceOnline = <?php echo $closing_online ?? 0; ?>;
        var todayDate = '<?php echo (new DateTime($current_date))->format("d M Y"); ?>';
        var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function(win) {
                    var body = $(win.document.body);

                    // Add the header with "Daily Report" and the current date
                    body.prepend('<center><h5>Date: ' + todayDate + '</h5></center><br>');
                    var tfootContent = $('tfoot').html(); // Grab the entire tfoot content
                    $(win.document.body).find('table').append('<tfoot>' + tfootContent + '</tfoot>');

                    // Style adjustments
                    body.find('table').css('font-size', 'inherit');
                }
            },
            // ... other buttons (copy, csv, excel, pdf) ...
        ],
        columnDefs: [
            // Right-align the 5th and 6th columns (Income and Expense)
            {
                targets: [5, 6], // These are zero-based indices (column 5 and 6 in the table)
                className: 'text-right' // Add the 'text-right' class to these columns
            }
        ],
        });
    });
</script>





</body>
</html>
