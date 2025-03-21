<?php
session_start();
    include "class.php"; //function page
    include "db/dbConnection.php"; // database connection
    
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>
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
                               
                                <h4 class="page-title">Income Report</h4> 
                                <form class="needs-validation" novalidate> 
                                <div class="row mt-3 mb-3">
                                <div class="col-md-3">
                                    <label for="startDate" class="form-label">Start Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="startDate" required>
                                    <div class="invalid-feedback" id="startDateError">Please enter a start date.</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="endDate" class="form-label">End Date:<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="endDate" required>
                                    <div class="invalid-feedback" id="endDateError">End date cannot be before the start date.</div>
                                </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="university" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                            <select class="form-control" name="university" id="university" required>
                                                <option value="All">--Select All University--</option>
                                                <?php 
                                                $centerId = $_SESSION['centerId'];
                                                $university_result = universityTable($centerId); // Call the function to fetch universities 
                                                while ($row = $university_result->fetch_assoc()) {
                                                    $id = $row['uni_id']; 
                                                    $name = $row['uni_name'];    
                                                ?>
                                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="invalid-feedback" id="universityError">Please select a university.</div>
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
             <div class="table-resposive">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Paid Date</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Study Year</th>
                                    <th scope="col">University Name</th>
                                    <th scope="col">University Fees</th>
                                    <th scope="col">Study Center Fees</th>
                                    <th scope="col">Amount</th>
                                    
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>
                    
            
                    </tbody>
                    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th id="uniFess"></th>
            <th id="stuFess"></th>
            <th id="totalFess"></th>
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

        <!-- Wizard Form Demo js -->
        <script src="assets/js/pages/demo.form-wizard.js"></script>

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
    <script src="assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> -->
  <script src="assets/addlink/sweetalert.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>


    <!-------Start Add Student--->
    <script>
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
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
          
            {
                extend: 'print',
                footer: true
            }
        ],
        footerCallback: function(row, data, start, end, display) {
            var api = this.api();
            
            var calculateTotal = function(index) {
            return api.column(index, { page: 'current' }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
        };

        // Calculate the total for the "Amount" column (index 4)
        var totalAmount = calculateTotal(5);
        // Calculate the total for the "University Fees" column (index 5)
        var totalUniversityFees = calculateTotal(6);
        // Calculate the total for the "Study Center Fees" column (index 6)
        var totalStudyCenterFees = calculateTotal(7);

        // Update the footer with the totals
        // $(api.column(5).footer()).html(totalAmount.toFixed(2));
        // $(api.column(6).footer()).html(totalUniversityFees.toFixed(2));
        // $(api.column(7).footer()).html(totalStudyCenterFees.toFixed(2));
        }
    });

    $('#searchBtn').on('click', function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var university = $('#university').val();

        var isValid = true;

        // Validate fields
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

        if (isValid) {
            $.ajax({
                url: 'action/actIncome.php',
                method: 'POST',
                data: {
                    startDate: startDate,
                    endDate: endDate,
                    university: university
                },
                dataType: 'json',
                success: function(response) {

                    $('#stuFess').text(response.total_study_fees);
                    $('#uniFess').text(response.total_university_fees);
                    $('#totalFess').text(response.total_pay_amount);
                    updateTable(response.fees);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });

    function updateTable(data) {
        var table = $('#example').DataTable();
        table.clear(); // Clear existing data

        data.forEach(function(row, index) {
            table.row.add([
                index + 1,
                row.pay_date,
                row.StuName,
                row.pay_year,
                row.uni_name,
                row.fee_uni_fee,
                row.fee_sty_fee,
                row.pay_total_amount
            ]);
        });

        table.draw();
    }
});


</script>

    

</body>

</html>



