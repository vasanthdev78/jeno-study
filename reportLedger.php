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
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Ledger Type</th>
                                    <th scope="col">Amount</th>
       
                                    
                      </tr>
                    </thead>
                    <tbody>
                  
            
                    </tbody>
                    <tfoot>
            <tr>
            
        <th>Total Income </th>
        <th id="totalIncome"></th>
        <th>Total Expense</th>
        <th id="totalExpence"></th>
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
                extend: 'copy',
                footer: true
            },
            {
                extend: 'csv',
                footer: true
            },
            {
                extend: 'excel',
                footer: true
            },
            {
                extend: 'pdf',
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
                    updateTable(response.merged_data);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });

    function updateTable(data) {
        var table = $('#exampleReport').DataTable();
        table.clear(); // Clear existing data

        data.forEach(function(row, index) {
            

            var rowData = [];

            // Add common fields
            rowData.push(index + 1); // Serial number

            if (row.type === 'transaction') {
                // Transaction specific fields
                rowData.push(row.tran_category); // Category
                rowData.push('<span class="text-nowrap">' + row.tran_reason + '</span>'); // Reason with text-nowrap class
                rowData.push(row.tran_amount ? '₹ ' + parseFloat(row.tran_amount).toFixed(2) : ''); // Amount
                
            } else if (row.type === 'payment') {
                // Payment specific fields
                rowData.push('Income'); // Static category for payments
                rowData.push('Addmission Fees'); // Static category for payments
                rowData.push(row.pay_total_amount ? '₹ ' + parseFloat(row.pay_total_amount).toFixed(2) : ''); // Study Fees
                
            }

            table.row.add(rowData);
        });

        table.draw();
    }
    });



</script>

    

</body>

</html>



