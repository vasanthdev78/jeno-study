<?php
session_start();
include "class.php"; // function page
include "db/dbConnection.php"; // database connection
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
                                <center><h5>Today : <?php echo date('d-m-Y'); ?></h5></center>
                                
                            </div>
                        </div>
                    </div>
             
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr class="bg-light">
            <th scope="col-1">S.No.</th>
            <th scope="col">Reason</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Income</th>
            <th scope="col">Expense</th>
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

            // Check if the transaction is income or expense
            if ($tran_category == 'Income') {
                $income = $tran_amount;
                $expense = 0;
            } else {
                $income = 0;
                $expense = $tran_amount;
            }
        ?>
            <tr>
                <td><?php echo $i; $i++;?></td>
                <td><?php echo $tran_reason;?></td>
                <td><?php echo $tran_method;?></td>
                <td><?php echo $income;?></td>
                <td><?php echo $expense;?></td>
            </tr>
        <?php 
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th id="total-income"></th>
            <th id="total-expense"></th>
        </tr>
    </tfoot>    
    </table>

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
        var todayDate = '<?php echo date('d-m-Y'); ?>';

        var table = $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copy',
                    footer: true,
                    customize: function (data) {
                        var footerHtml = '\n<tr><td colspan="5">Opening Balance - Cash</td><td>' + openingBalanceCash.toFixed(2) + '</td></tr>' +
                                         '<tr><td colspan="5">Opening Balance - Online</td><td>' + openingBalanceOnline.toFixed(2) + '</td></tr>' +
                                         '<tr><td colspan="5">Closing Balance - Cash</td><td>' + closingBalanceCash.toFixed(2) + '</td></tr>' +
                                         '<tr><td colspan="5">Closing Balance - Online</td><td>' + closingBalanceOnline.toFixed(2) + '</td></tr>';
                        return 'Date: ' + todayDate + '\n' + data + footerHtml;
                    }
                },
                {
                    extend: 'csv',
                    footer: true,
                    customize: function (csv) {
                        return 'Date: ' + todayDate + '\n' + csv + '\nOpening Balance - Cash,' + openingBalanceCash.toFixed(2) +
                                     '\nOpening Balance - Online,' + openingBalanceOnline.toFixed(2) +
                                     '\nClosing Balance - Cash,' + closingBalanceCash.toFixed(2) +
                                     '\nClosing Balance - Online,' + closingBalanceOnline.toFixed(2);
                    }
                },
                {
                    extend: 'excelHtml5',
                    footer: true,
                    customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        var sheetData = sheet.getElementsByTagName('sheetData')[0];
                        var rows = sheetData.getElementsByTagName('row');
                        
                        var balanceRows = [
                            ['Opening Balance - Cash', openingBalanceCash.toFixed(2)],
                            ['Opening Balance - Online', openingBalanceOnline.toFixed(2)],
                            ['Closing Balance - Cash', closingBalanceCash.toFixed(2)],
                            ['Closing Balance - Online', closingBalanceOnline.toFixed(2)]
                        ];
                        
                        balanceRows.forEach(function(balance, index) {
                            var rowNumber = rows.length + index + 1;
                            var newRow = '<row r="' + rowNumber + '">';
                            newRow += '<c t="inlineStr"><is><t>' + balance[0] + '</t></is></c>';
                            newRow += '<c t="n"><v>' + balance[1] + '</v></c>';
                            newRow += '</row>';
                            sheetData.innerHTML += newRow;
                        });

                        // Add a header with the date
                        var headerRow = '<row r="1"><c t="inlineStr"><is><t>Date: ' + todayDate + '</t></is></c><c t="inlineStr"><is><t></t></is></c></row>';
                        sheetData.insertAdjacentHTML('afterbegin', headerRow);
                    }
                },
                {
                    extend: 'pdf',
                    footer: true,
                    customize: function (doc) {
                        var mainContent = doc.content[1];
                        var customRows = {
                            table: {
                                widths: ['*', '*'],
                                body: [
                                    ['Opening Balance - Cash', openingBalanceCash.toFixed(2)],
                                    ['Opening Balance - Online', openingBalanceOnline.toFixed(2)],
                                    ['Closing Balance - Cash', closingBalanceCash.toFixed(2)],
                                    ['Closing Balance - Online', closingBalanceOnline.toFixed(2)]
                                ]
                            },
                            layout: 'noBorders'
                        };

                        // Add a header with the date
                        doc.content.unshift({
                            text: 'Date: ' + todayDate,
                            margin: [0, 0, 0, 10]
                        });

                        doc.content.splice(1, 1, mainContent);
                        doc.content.push(customRows);
                    }
                },
                {
                    extend: 'print',
                    footer: true,
                    customize: function (win) {
                        var body = $(win.document.body);
                        var table = body.find('table').eq(0);

                        // Add the date at the top of the print view
                        body.prepend('<h4 class="page-title">Daily Report</h4><center><h5>Today : ' + todayDate + '</h5></center><br>');

                        body.append(
                            '<br><table class="table" style="width: 100%; border-collapse: collapse;">' +
                            '<tbody>' +
                            '<tr><td colspan="5">Opening Balance - Cash</td><td>' + openingBalanceCash.toFixed(2) + '</td></tr>' +
                            '<tr><td colspan="5">Opening Balance - Online</td><td>' + openingBalanceOnline.toFixed(2) + '</td></tr>' +
                            '<tr><td colspan="5">Closing Balance - Cash</td><td>' + closingBalanceCash.toFixed(2) + '</td></tr>' +
                            '<tr><td colspan="5">Closing Balance - Online</td><td>' + closingBalanceOnline.toFixed(2) + '</td></tr>' +
                            '</tbody></table>'
                        );

                        table.addClass('display').css('font-size', '10px');
                    }
                }
            ],
            footerCallback: function(row, data, start, end, display) {
                var api = this.api();

                var calculateTotal = function(index) {
                    return api.column(index, { page: 'current' }).data().reduce(function(a, b) {
                        return parseFloat(a) + parseFloat(b);
                    }, 0);
                };

                var totalIncome = calculateTotal(3); // Income column index
                var totalExpense = calculateTotal(4); // Expense column index

                // Handle NaN cases
                totalIncome = isNaN(totalIncome) ? 0 : totalIncome;
                totalExpense = isNaN(totalExpense) ? 0 : totalExpense;

                // Update the footer with totals
                $('#total-income').html(totalIncome.toFixed(2));
                $('#total-expense').html(totalExpense.toFixed(2));

                // Remove existing custom footer rows and add new ones
                $('#example tfoot tr.custom-footer').remove();
                var customFooterRows = 
                    '<tr class="custom-footer"><td colspan="3">Opening Balance - Cash</td><td>' + openingBalanceCash.toFixed(2) + '</td></tr>' +
                    '<tr class="custom-footer"><td colspan="3">Opening Balance - Online</td><td>' + openingBalanceOnline.toFixed(2) + '</td></tr>' +
                    '<tr class="custom-footer"><td colspan="3">Closing Balance - Cash</td><td>' + closingBalanceCash.toFixed(2) + '</td></tr>' +
                    '<tr class="custom-footer"><td colspan="3">Closing Balance - Online</td><td>' + closingBalanceOnline.toFixed(2) + '</td></tr>';

                $(api.table().footer()).append(customFooterRows);
            }
        });
    });
</script>




</body>
</html>
