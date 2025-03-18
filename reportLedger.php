<?php
session_start();
    include "class.php"; //function page
    include "db/dbConnection.php"; // databse connection
    
    $centerId = $_SESSION['centerId'];
    $role = $_SESSION['role'];

    function getLocationOptions($selectedId = null) {
        $location_result = getLocation(); // Call the function to fetch locations
        $options = '';
        while ($row = $location_result->fetch_assoc()) {
            $id = $row['loc_id']; 
            $name = $row['loc_short_name'];
            $selected = ($selectedId == $id) ? 'selected' : '';
            $options .= "<option value=\"$id\" $selected>$name</option>";
        }
        return $options;
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
                               
                                <h4 class="page-title">LedgerType Report</h4> 
                                <form class="needs-validation" novalidate>
                                    <div class="row mt-3 mb-3">
                                    <?php
                                        date_default_timezone_set(timezoneId: 'Asia/Kolkata');
                                        $maxDate = date('Y-m-d', strtotime('-1 day'));
                                    ?>
                                <div class="col-md-2">
                                    <label for="startDate" class="form-label">Start Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="startDate" required max="<?php echo $maxDate; ?>">
                                    <div class="invalid-feedback" id="startDateError">Please enter a start date.</div>
                                </div>
                                <div class="col-md-2">
                                    <label for="endDate" class="form-label">End Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required max="<?php echo $maxDate; ?>">
                                    <div class="invalid-feedback" id="endDateError">End date cannot be before the start date.</div>
                                </div>

                                    
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="university" class="form-label"><b>Transaction</b><span class="text-danger">*</span></label>
                                                <select class="form-control" name="transaction" id="category" required>
                                                    <option value="All">--All Transaction--</option>
                                                    <option value="Income">Income</option>
                                                    <option value="Expense">Expense</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a transaction type.</div>
                                            </div>
                                        </div>

                                       

                                        <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="location" class="form-label"><b>Location</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="location" id="location" required <?php if($role != 'Admin') echo 'readonly'; ?>>
                                        <!-- <option value="All">--All Location--</option> -->
                                        <?php 
                                            if($role == 'Admin') {
                                                echo getLocationOptions();
                                            } else {
                                                echo getLocationOptions($centerId);
                                            }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Please select a location.</div>
                                </div>
                            </div>

                                 

                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary mt-4" id="searchBtn">Search</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
             <div class="table-responsive">
             <table id="exampleReport" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="bg-light">
                                    <th class="col-1 text-center">S.No.</th>
                                    <th class="col-2 text-center">Category</th>
                                    <th class="col-5 text-center">Ledger Type</th>
                                    <th class="col-2 text-center">Income Amount</th>
                                    <th class="col-2 text-center">Expense Amount</th>
       
                                    
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td class="text-center">Opening Balance - Cash</td>
                        <td></td>
                        <td id="openCash"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-center">Opening Balance - Online</td>
                        <td></td>
                        <td></td>
                        <td id="openOnline"></td>
                    </tr>

                  
            
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th class="text-center">Total Amount</th>
                            <th id="totalIncome"></th>
                            <th id="totalExpence"></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-center">Closing Balance - Cash</td>
                            <td></td>
                            <td class="text-right" id="closeCash"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="text-center">Closing Balance - Online</td>
                            <td></td>
                            <td></td>
                            <td class="text-right" id="closeOnline"></td>
                        </tr>
                    </tfoot>
                  </table>
                  </div>

                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

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

    <!-- Theme Settings -->


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

    <!--   pdf and excel print  -->
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


    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-------Start Add Student--->
    <script>

         // If the role is not Admin, make the select dropdown read-only
    <?php if($role != 'Admin'): ?>
        document.getElementById('location').disabled = true;
    <?php endif; ?>

    document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');
    const startDateError = document.getElementById('startDateError');
    const endDateError = document.getElementById('endDateError');

    function validateDates() {
        const startDateValue = new Date(startDateInput.value);
        const endDateValue = new Date(endDateInput.value);

        if (startDateInput.value) {
            startDateInput.classList.remove('is-invalid');
            startDateError.style.display = 'none';
        } else {
            startDateInput.classList.add('is-invalid');
            startDateError.style.display = 'block';
        }

        if (endDateInput.value) {
            if (endDateValue < startDateValue) {
                endDateInput.classList.add('is-invalid');
                endDateError.style.display = 'block';
            } else {
                endDateInput.classList.remove('is-invalid');
                endDateError.style.display = 'none';
            }
        } else {
            endDateInput.classList.add('is-invalid');
            endDateError.style.display = 'block';
        }
    }

    function validateForm(event) {
        validateDates();
        if (document.querySelectorAll('.is-invalid').length > 0) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    }

    startDateInput.addEventListener('change', validateDates);
    endDateInput.addEventListener('change', validateDates);
    document.querySelector('.needs-validation').addEventListener('submit', validateForm);
});
    </script>
    <script>

$(document).ready(function() {
    var table = $('#exampleReport').DataTable({
        dom: 'Bfrtip',
        buttons: [
           
            {
                extend: 'excel',
                footer: true
            },
            {
                extend: 'print',
                footer: true
            }
        ],
       
    });


    $('#searchBtn').on('click', function() {
        
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var category = $('#category').val();
        var location = $('#location').val();

        // Validate fields
        var isValid = true;

        if (!startDate) {
            $('#startDate').addClass('is-invalid');
            $('#startDateError').show();
            isValid = false;
        } else {
            $('#startDate').removeClass('is-invalid');
            $('#startDateError').hide();
        }

        if (!endDate) {
            $('#endDate').addClass('is-invalid');
            $('#endDateError').show();
            isValid = false;
        } else {
            $('#endDate').removeClass('is-invalid');
            $('#endDateError').hide();
        }

        if (!category) {
            $('#category').addClass('is-invalid');
            $('#universityError').show();
            isValid = false;
        } else {
            $('#category').removeClass('is-invalid');
            $('#universityError').hide();
        }

        if (!location) {
            $('#location').addClass('is-invalid');
            $('#locationError').show();
            isValid = false;
        } else {
            $('#location').removeClass('is-invalid');
            $('#locationError').hide();
        }

        if (isValid) {
            $.ajax({
                url: 'action/actLedgerReport.php',
                method: 'POST',
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    category: category,
                    location: location
                },
                dataType: 'json',
                success: function(response) {

                    $('#totalIncome').text(response.total_income);
                    $('#totalExpence').text(response.total_expense);
                    $('#openCash').text(response.opening_cash);
                    $('#openOnline').text(response.opening_online);
                    $('#closeCash').text(response.closing_cash);
                    $('#closeOnline').text(response.closing_online);
                    updateTable(response.merged_data,response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });

    function updateTable(data,response) {

        data.sort(function(a, b) {
            // Prioritize income rows
            if (a.type === 'payment' && b.type !== 'payment') return -1; // Income comes first
            if (a.type !== 'payment' && b.type === 'payment') return 1; // Expense comes later

            // If both are of the same type, prioritize transaction category (income > expense)
            if (a.type === 'transaction' && b.type === 'transaction') {
                if (a.tran_category === 'Income' && b.tran_category !== 'Income') return -1;
                if (a.tran_category !== 'Income' && b.tran_category === 'Income') return 1;
            }
            return 0; // Keep the order if they're the same category type
        });

        var table = $('#exampleReport').DataTable({
            "destroy": true,  // Allows re-initialization of the DataTable
            "columnDefs": [
                { targets: 0, className: 'text-center' }, // Serial Number
                { targets: 1, className: 'text-center' }, // Category
                { targets: 2, className: 'text-center text-nowrap' }, // Reason
                { targets: 3, className: 'text-right' }, // Amount
                { targets: 4, className: 'text-right' }  // Expense Amount
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    footer: true, // Include footer in the Excel export
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];

                        // Manually add closing balance rows at the end
                        var closingBalanceRows = [
                            '<row><c t="inlineStr"><is><t></t></is></c><c t="inlineStr"><is><t>Closing Balance - Cash</t></is></c><c t="inlineStr"><is><t></t></is></c><c t="inlineStr"><is><t>' + ($('#closeCash').text() || '') + '</t></is></c><c t="inlineStr"><is><t></t></is></c></row>',
                            '<row><c t="inlineStr"><is><t></t></is></c><c t="inlineStr"><is><t>Closing Balance - Online</t></is></c><c t="inlineStr"><is><t></t></is></c><c t="inlineStr"><is><t></t></is></c><c t="inlineStr"><is><t>' + ($('#closeOnline').text() || '') + '</t></is></c></row>'
                        ];

                        // Get the sheetData element where rows are defined
                        var sheetData = $(sheet).find('sheetData');

                        // Append closing balance rows
                        $(sheetData).append(closingBalanceRows.join(''));

                        // Update dimension to reflect the new row count
                        var rowCount = $(sheetData).children('row').length;
                        $(sheet).find('dimension').attr('ref', 'A1:E' + rowCount);
                    }
                },
                {
                    extend: 'print',
                    customize: function(win) {
                        var tfootContent = $('tfoot').html(); // Grab the entire tfoot content
                        $(win.document.body).find('table').append('<tfoot>' + tfootContent + '</tfoot>');
                    }
                }
            ],
        });
        table.clear(); // Clear existing data

        table.row.add([
            '', 'Opening Balance - Cash', '', response.opening_cash || '-', '-'
        ]).draw();

        table.row.add([
            '', 'Opening Balance - Online', '', '-', response.opening_online || '-'
        ]).draw();

        data.forEach(function(row, index) {
            

            var rowData = [];

            // Add common fields
            rowData.push(index + 1); 

            if (row.type === 'transaction') {
                rowData.push(row.tran_category); 
                rowData.push(row.tran_reason); 
                if (row.tran_category === 'Expense') {
                    rowData.push('-'); 
                } else {
                    rowData.push(row.tran_amount ? '₹ ' + parseFloat(row.tran_amount).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : ''); 
                }
                if (row.tran_category === 'Expense') {
                    rowData.push(row.tran_amount ? '₹ ' + parseFloat(row.tran_amount).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : ''); 
                } else {
                    rowData.push('-'); 
                }
                
            } else if (row.type === 'payment') {
                rowData.push('Income');
                rowData.push('Addmission Fees'); 
                rowData.push(row.pay_total_amount ? '₹ ' + parseFloat(row.pay_total_amount).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) : ''); 
                rowData.push('-');
            }

            table.row.add(rowData);
        });

        table.draw();
    }
    });



</script>

    

</body>

</html>



