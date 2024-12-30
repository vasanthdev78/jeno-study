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
    <style>
        /* Apply wrapping to all columns during print */
.wrap-text {
    white-space: normal !important;
    word-wrap: break-word !important;
}

/* Ensure print-specific styles apply */
@media print {
    body {
        -webkit-print-color-adjust: exact; /* Ensure colors are printed */
    }

    .wrap-print-table {
        table-layout: fixed;
        width: 100%;
    }

    .wrap-print-table th,
    .wrap-print-table td {
        white-space: normal !important;
        word-wrap: break-word !important;
        max-width: 200px;  /* Adjust based on content */
        overflow: hidden;
    }

    /* Force A4 width */
    @page {
        size: A4;
        margin: 10mm;
    }
}

    </style>
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
                               
                                <h4 class="page-title">Transaction Report</h4> 
                                <form class="needs-validation" novalidate>
                                    <div class="row mt-3 mb-3">
                                    <div class="col-md-2">
                                    <label for="startDate" class="form-label">Start Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="startDate" required>
                                    <div class="invalid-feedback" id="startDateError">Please enter a start date.</div>
                                </div>
                                <div class="col-md-2">
                                    <label for="endDate" class="form-label">End Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required>
                                    <div class="invalid-feedback" id="endDateError">End date cannot be before the start date.</div>
                                </div>

                                    
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="university" class="form-label"><b>Transaction</b><span class="text-danger">*</span></label>
                                                <select class="form-control" name="transaction" id="university" required>
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
             <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="bg-light">
                                    <th >S.No.</th>
                                    <th >Paid Date</th>
                                    <th >Category</th>
                                    <th >Ledger Type</th>
                                    <th >Description</th>
                                    <th >Payment Method</th>
                                    <th >Payment Type</th>
                                    <th >Income</th>
                                    <th >Expense</th>
                                    
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td></td>
                        <td>Opening Banalnce Cash</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td ></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>Opening Banalnce Online</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td ></td>
                        <td ></td>
                        </tr>
            
                    </tbody>
                    <tfoot>
            <tr>
            <th colspan="6"></th>
        <th>Total Amount</th>
        <th id="totalIncome"></th>
        <th id="totalExpence"></th>
        
    </tr>

    <tr>
                        <td></td>
                        <td>Closing Banalnce Cash</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="closing_cash"></td>
                        <td></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>Closing Banalnce Online</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td id="closing_online"></td>
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

    // Helper function to get yesterday's date
    function getYesterday() {
        const today = new Date();
        today.setDate(today.getDate() - 1);
        return today;
    }

    // Validate dates
    function validateDates() {
        const startDateValue = new Date(startDateInput.value);
        const endDateValue = new Date(endDateInput.value);
        const yesterday = getYesterday();

        // Start date validation
        if (startDateInput.value) {
            startDateInput.classList.remove('is-invalid');
            startDateError.style.display = 'none';
        } else {
            startDateInput.classList.add('is-invalid');
            startDateError.style.display = 'block';
        }

        // End date validation
        if (endDateInput.value) {
            if (endDateValue < startDateValue || endDateValue > yesterday) {
                endDateInput.classList.add('is-invalid');
                endDateError.textContent = 'End date cannot be today or in the future.';
                endDateError.style.display = 'block';
            } else {
                endDateInput.classList.remove('is-invalid');
                endDateError.style.display = 'none';
            }
        } else {
            endDateInput.classList.add('is-invalid');
            endDateError.textContent = 'End date is required.';
            endDateError.style.display = 'block';
        }
    }

    // Prevent form submission if validation fails
    function validateForm(event) {
        validateDates();
        if (document.querySelectorAll('.is-invalid').length > 0) {
            event.preventDefault();
        }
    }

    // Attach event listeners
    startDateInput.addEventListener('change', validateDates);
    endDateInput.addEventListener('change', validateDates);
    document.querySelector('.needs-validation').addEventListener('submit', validateForm);
    
    // Restrict end date to yesterday
    endDateInput.max = getYesterday().toISOString().split('T')[0];
});
    </script>
    <script>

$(document).ready(function() {
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
//             {
//     extend: 'excel',
//     footer: true,
//     customize: function (xlsx) {
//         var sheet = xlsx.xl.worksheets['sheet1.xml'];  // Access the first sheet

//         // Grab the entire tfoot content
//         var tfootContent = $('tfoot').html();

//         // Add the footer rows manually
//         var footerRows = '';

//         // We assume the last row is at index 'n', and the first row is at index 1
//         var startRow = 2; // starting row for footer (adjust based on the number of data rows)

//         // Iterate through each row in the tfoot and append it to the Excel sheet
//         $(tfootContent).find('tr').each(function(index, row) {
//             footerRows += '<row r="' + (startRow + index) + '">'; // Adjusting row number based on footer
//             $(row).find('td').each(function(cellIndex, cell) {
//                 // Generate correct cell reference for Excel (A1, B1, etc.)
//                 var cellRef = String.fromCharCode(65 + cellIndex) + (startRow + index);
//                 footerRows += '<c t="inlineStr" r="' + cellRef + '"><is><t>' + $(cell).text() + '</t></is></c>';
//             });
//             footerRows += '</row>';
//         });

//         // Append the footer rows to the Excel sheet
//         $(sheet).find('sheetData').append(footerRows);
//     }
// },
{
    extend: 'print',
    customize: function (win) {
        // New footer content as regular rows (not <tfoot>)
        var newFooter = `

            <tr>
                <td colspan="7" style="text-align:right; font-weight:bold;">Total Amount:</td>
                <td style="font-weight:bold;">${$('#totalIncome').text()}</td>
                <td style=" font-weight:bold;">${$('#totalExpence').text()}</td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:right; font-weight:bold;">Closing Cash:</td>
                <td>${$('#closing_cash').text()}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:right; font-weight:bold;">Closing Online:</td>
                <td></td>
                <td>${$('#closing_online').text()}</td>
            </tr>
        `;

        // Remove any existing footer rows to prevent duplication
        $(win.document.body).find('table tr.print-footer').remove();
        
        // Append footer directly after table body as normal rows
        $(win.document.body).find('table tbody').append(newFooter);
        
        // Apply print-specific table styling
        $(win.document.body).find('table').addClass('wrap-print-table');

        // Ensure text wrapping for all columns
        $(win.document.body).find('table th, table td').addClass('wrap-text');

        // Force table width to fit A4 paper size
        $(win.document.body).find('table')
            .css('width', '100%')
            .css('border-collapse', 'collapse');

        // Adjust font size for print layout
        $(win.document.body).css('font-size', '10px');
    }
}

        ],
        columnDefs: [
            { width: '80px', targets: 3 },  // Set column 4 width
            { className: 'wrap-text', targets: '_all' }  // Apply wrapping to all columns
        ],
        autoWidth: false  // Disable automatic column sizing
    });

    $('#searchBtn').on('click', function() {
        
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var university = $('#university').val();
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

        if (!university) {
            $('#university').addClass('is-invalid');
            $('#universityError').show();
            isValid = false;
        } else {
            $('#university').removeClass('is-invalid');
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
                url: 'action/actTransaction.php',
                method: 'POST',
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    university: university,
                    location: location
                },
                dataType: 'json',
                success: function(response) {

                    $('#totalIncome').text(response.total_income);
                    $('#totalExpence').text(response.total_expense);
                   
                    
                    updateTable(response.merged_data ,response.opening_online ,response.opening_cash);
                    $('#opening_total_online').text(response.opening_online);
                    $('#opening_total_cash').text(response.opening_cash);
                    $('#closing_online').text(response.closing_online);
                    $('#closing_cash').text(response.closing_cash);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });

    function updateTable(data ,online,cash) {
    // var table = $('#example').DataTable();
    table.clear(); // Clear existing data

    // Add opening balance rows at the top
    table.row.add([
        '',  // Serial Number
        'Opening Balance Cash',
        '',
        '',
        '',
        '',
        '',
        '<span id="opening_total_cash">'+ cash +'</span>',  // Placeholder for cash balance
        ''
    ]).draw(false);

    table.row.add([
        '',
        'Opening Balance Online',
        '',
        '',
        '',
        '',
        '',
        '',
        '<span id="opening_total_online">'+ online +'</span>'  // Placeholder for online balance
    ]).draw(false);

    data.forEach(function(row, index) {
        var income = 0;
var expense = 0;
var amount = 0;


if (row.type === 'payment') {
    income = parseFloat(row.pay_total_amount);  // Payments are income
    amount = income;
    
} else if (row.type === 'transaction') {
    if (row.tran_category === 'Income') {
        income = parseFloat(row.tran_amount);
        amount = income;
       
    } else if (row.tran_category === 'Expense') {
        expense = parseFloat(row.tran_amount);
        amount = expense;
        
    }
}

// Skip rows where both income and expense are zero
if (income === 0 && expense === 0) {
    return;
}

var rowData = [];

// Add common fields
rowData.push(index + 1); // Serial number
rowData.push(row.date); // Date

if (row.type === 'transaction') {
    // Transaction specific fields
    rowData.push(row.tran_category); // Category
    rowData.push('<span class="text-nowrap">' + row.tran_reason + '</span>'); // Reason
    rowData.push(row.tran_description); // Description
    rowData.push(row.tran_method); // Method
    rowData.push(row.tran_pay_type || '-'); // Payment Type

    if (row.tran_category === 'Income') {
        rowData.push(' ₹ ' + amount.toFixed(2));  // Show income/expense in same column
        rowData.push('');  // Show income/expense in same column     
    }else {
        rowData.push(' ');  // Show income/expense in same column    
        rowData.push(' ₹ ' + amount.toFixed(2));  // Show income/expense in same column
    }
    
} else if (row.type === 'payment') {
    // Payment specific fields
    rowData.push('Income'); // Static category for payments
    rowData.push('<span class="text-nowrap">' + row.pay_student_name + ' - ' + row.cou_name + ' (' + row.stu_aca_year + ' Year)' + '</span>'); // Reason
    rowData.push('Admission Fees'); // Static description
    rowData.push(row.pay_paid_method); // Paid Method
    rowData.push(row.pay_description || 'N/A'); // Description
    rowData.push(' ₹ ' + amount.toFixed(2)); // Show total amount for payments
    rowData.push(''); // Show total amount for payments
}

table.row.add(rowData);

     

    });

    

    table.draw();

    
}

    });



</script>

    

</body>

</html>



