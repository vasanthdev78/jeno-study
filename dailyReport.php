<?php
session_start();
include("class.php");
$centerId = $_SESSION['centerId'];
$current_date = date('Y-m-d');  // Correct date format
$date = new DateTime($current_date);

// Subtract one day from the current date
$date->modify('-1 day');

// Get the modified date in 'Y-m-d' format
$previous_date = $date->format('Y-m-d');



   $total_online_epense_qry=" SELECT 
        SUM(`tran_amount`) AS total_expense_online
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Expense' AND tran_method ='Online';";

    $total_cash_epense_qry="SELECT SUM(`tran_amount`) AS total_expense_cash 
    FROM `jeno_transaction` 
    WHERE tran_status = 'Active' 
    AND tran_center_id =$centerId 
    AND tran_date BETWEEN '$current_date' AND '$current_date'
     AND tran_category ='Expense' 
     AND tran_method ='Cash'; ";

        $total_online_income_qry="SELECT 
        SUM(`tran_amount`) AS total_income_online
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Income' AND tran_method ='Online';";


        $total_cash_income_qry="SELECT 
        SUM(`tran_amount`) AS total_income_cash
    FROM `jeno_transaction`
    WHERE tran_status = 'Active' AND tran_center_id =$centerId
    AND tran_date BETWEEN '$current_date' AND '$current_date' AND tran_category ='Income' AND tran_method ='Cash';";

        $total_fees_cash_income_qry="SELECT 
        SUM(`pay_study_fees`) AS total_income_fees_cash
    FROM `jeno_payment_history`
    WHERE pay_status = 'Active' AND pay_center_id =$centerId
    AND pay_date BETWEEN '$current_date' AND '$current_date' AND pay_paid_method ='Cash';";

        $total_fees_online_income_qry="SELECT 
        SUM(`pay_study_fees`) AS total_income_fees_online
        FROM `jeno_payment_history`
        WHERE pay_status = 'Active' AND pay_center_id =$centerId
        AND pay_date BETWEEN '$current_date' AND '$current_date' AND pay_paid_method ='Online';";

        $opening_balance_qry = "SELECT 
        `open_id`, `open_date`, `open_open_online`, `open_open_cash`, `open_close_online`, `open_close_cash`
        FROM `jeno_opening`
        WHERE open_date = '$previous_date' AND open_status = 'Active' AND open_center_id = $centerId;;";





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

?>
<!DOCTYPE html>
<html lang="en">

<?php include("head2.php"); ?>
<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <?php include("top.php") ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            <?php include("left.php"); ?>
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
                            </div>
                        </div>
                    </div>
             
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr class="bg-light">
                                <th scope="col-1">S.No.</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        // Fetch transaction data
                        $selQuery = "SELECT 
                        `tran_id`,
                        `tran_category`,
                        `tran_date`,
                        `tran_amount`,
                        `tran_method`,
                        `tran_transaction_id`,
                        `tran_description`,
                        `tran_reason`
                        FROM `jeno_transaction`
                        WHERE tran_status = 'Active' AND tran_center_id = $centerId
                        AND tran_date BETWEEN '$current_date' AND '$current_date'";

                        $tran_result = mysqli_query($conn, $selQuery);

                        $i = 1; 
                        while ($row = mysqli_fetch_array($tran_result, MYSQLI_ASSOC)) {
                            $tran_id = $row['tran_id'];
                            $tran_category = $row['tran_category'];
                            $tran_date = $row['tran_date'];
                            $tran_amount = $row['tran_amount'];
                            $tran_method = $row['tran_method'];
                            $tran_transaction_id = $row['tran_transaction_id'];
                            $tran_description = $row['tran_description'];
                            $tran_reason = $row['tran_reason'];



                        ?>
                            <tr>
                                <th><?php echo $i; $i++;?></th>
                                <th><?php echo $tran_date;?></th>
                                <th><?php echo $tran_category;?></th>
                                <th><?php echo $tran_reason;?></th>
                                <th><?php echo $tran_method;?></th>
                                <th><?php echo $tran_amount;?></th>
                            </tr>
                        <?php 
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total:</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include("footer.php") ?>
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- pdf and excel print -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!-- Datatable Demo App js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        $(document).ready(function() {
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', footer: true },
            { extend: 'csv', footer: true },
            { extend: 'excel', footer: true },
            { extend: 'pdf', footer: true },
            { extend: 'print', footer: true }
        ],
        footerCallback: function(row, data, start, end, display) {
            var api = this.api();

            // Function to calculate the total for a specific column
            var calculateTotal = function(index) {
                return api.column(index, { page: 'current' }).data().reduce(function(a, b) {
                    return parseFloat(a) + parseFloat(b);
                }, 0);
            };

            // Calculate the total for the "Amount" column (index 5)
            var totalAmount = calculateTotal(5);

            // Update the footer with the totals
            $(api.column(5).footer()).html(totalAmount.toFixed(2));

            // Append rows for opening and closing balances
            $(api.table().footer()).append(
                '<tr><td colspan="5">Opening Balance - Cash</td><td>' + openingBalanceCash.toFixed(2) + '</td></tr>' +
                '<tr><td colspan="5">Opening Balance - Online</td><td>' + openingBalanceOnline.toFixed(2) + '</td></tr>' +
                '<tr><td colspan="5">Closing Balance - Cash</td><td>' + closingBalanceCash.toFixed(2) + '</td></tr>' +
                '<tr><td colspan="5">Closing Balance - Online</td><td>' + closingBalanceOnline.toFixed(2) + '</td></tr>'
            );
        }
    });
});

    </script>

</body>
</html>
