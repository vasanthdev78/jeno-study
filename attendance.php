<?php
session_start();
include ("db/dbConnection.php");
$emp_selQuery = "SELECT *  FROM employee_tbl WHERE emp_status='Active'";
$emp_resQuery = mysqli_query($conn, $emp_selQuery);

$att_selQuery = "SELECT attendance_tbl.*,
    employee_tbl.*
     FROM attendance_tbl
    LEFT JOIN employee_tbl on attendance_tbl.emp_id=employee_tbl.emp_id
    WHERE attendance_tbl.attendance_status = 'Active'";
$att_resQuery = mysqli_query($conn, $att_selQuery);

?>
<!DOCTYPE html>
<html lang="en">
<?php include ("head.php"); ?>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- ========== Topbar Start ========== -->
        <?php include ("top.php") ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <?php include ("left.php"); ?>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <div id="AttendanceDetail"></div>

                <!-- Start Content-->
                <div class="container-fluid" id="attContent">

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

                                <h4 class="page-title">Attendance</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <?php include "addAttendance.php" ?> <!---add Attendance popup--->
                    <?php //include("editAttendance.php"); ?><!-------Edit Attendance popup--->
                    <div class="row g-4">
                        <div class="form-group">
                            <label for="categoryType"> Category Type </label>
                            <select class="form-control" name="categoryType" id="categoryType">
                                <option value="">-----select Category type-----</option>
                                <?php
                                // $category_type_Query = "SELECT * FROM `category_tbl`";
                                // $category_type_res = mysqli_query($conn, $category_type_Query);
                                // $i = 1;
                                // while ($category_res = mysqli_fetch_array($category_type_res, MYSQLI_ASSOC)) {
                                //     $category_id = $category_res['category_id'];
                                //     $category_type = $category_res['category_type'];
                                //     ?>
                                <!-- <option value="<?php //echo $category_id; ?>">
                                        //     <?php //echo $category_type; ?>
                                        // </option>
                                        // <?php //} ?> -->
                                <option value="">Employee</option>
                                <option value="">Client</option>

                            </select>
                            <label for="dob" class="form-label"><b>Date of Birth</b></label>
                            <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob"
                                id="dob" required="required">
                        </div>
                        
                        <div class="col-12">
                            <div class="mb-4">

                                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Employee</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_array($emp_resQuery, MYSQLI_ASSOC)) {
                                            $emp_id = $row['emp_id'];
                                            $emp_fname = $row['emp_first_name'];
                                            $emp_lname = $row['emp_last_name'];
                                            $emp_name = $emp_fname . ' ' . $emp_lname;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i;
                                                    $i++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $emp_name; ?>
                                                </td>
                                                <td><label><input type="radio" class="present"
                                                            name="<?php echo $row['emp_id']; ?>" value="Present"
                                                            required>&nbsp;Present</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="<?php echo $row['emp_id']; ?>"
                                                            value="Absent">&nbsp;Absent</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="<?php echo $row['emp_id']; ?>"
                                                            value="Onduty">&nbsp;OnDuty</label>&nbsp;&nbsp;&nbsp;
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- end card -->
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" id="addAttendanceBtn" class="btn btn-info"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            Submit Attendance
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include ("footer.php") ?>
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

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>


        function validateForm() {
            var date = document.getElementById('date').value;
            var pname = document.getElementById('productname').value;
            var qty = document.getElementById('quantity').value;
            var instockInput = document.getElementById('in-quantity');
            var outstock = document.getElementById('out-quantity').value;

            // Parse quantity values to integers
            var parsedQty = parseInt(qty);
            var parsedOutstock = parseInt(outstock);

            // Calculate instock by subtracting outstock from quantity
            var instock = parsedQty - parsedOutstock;

            // Display instock value
            instockInput.value = instock;

            // Array to store the fields with errors
            var errorFields = [];

            // Check if each field is empty or if quantity is not a number
            if (date === "") {
                errorFields.push('Date');
            }

            if (pname === "") {
                errorFields.push('Product Name');
            }

            // Check if quantity is not a number
            if (isNaN(parsedQty) || qty === "") {
                errorFields.push('Quantity');
            }
            if (isNaN(instock) || isNaN(parsedOutstock) || outstock === "") {
                errorFields.push('Out-Stock Quantity');
            }

            // If there are errors, display alert messages for each error
            if (errorFields.length > 0) {
                var errorMessage = "Please fill in the following fields correctly:\n";
                for (var i = 0; i < errorFields.length; i++) {
                    errorMessage += "- " + errorFields[i] + "\n";
                }
                alert(errorMessage);
                return false; // Prevent form submission
            } else {
                alert("One more row added...");
                return true; // Allow form submission
            }
        }





    </script>
    <script>

        //------------------Start add Attendance -------------------------------
        $(document).ready(function () {

            function resetForm(formId) {
                document.getElementById(formId).reset(); // Reset the form
            }
            $('#addAttendanceBtn').click(function () {
                resetForm('attendance');
            });
            $('#attendance').submit(function (e) {
                e.preventDefault(); // Prevent the form from submitting normally

                var formData = new FormData(this);
                $.ajax({
                    url: "action/actAttendances.php",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                timer: 2000
                            }).then(function () {
                                resetForm('attendance');
                                $('#staticBackdrop').modal('hide');
                                $('#AttendanceTable').load(location.href + ' #AttendanceTable > *', function () {
                                    $('#AttendanceTable').DataTable().destroy();
                                    $('#AttendanceTable').DataTable({
                                        "paging": true,
                                        "ordering": true,
                                        "searching": true
                                    });
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while adding Attendance data.'
                        });
                    }
                });
            });


        });
    </script>
    <script>
        $("#categoryType").change(function () {
            var category_type = $(this).val();

            $.ajax({
                type: "POST",
                url: "getCategory.php",
                data: { category_type: category_type },
                success: function (response) {
                    $("#scroll-horizontal-datatable").html(response);
                }
            });
        });
    </script>
</body>

</html>