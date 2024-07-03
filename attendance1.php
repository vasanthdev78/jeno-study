<?php
session_start();
include("db/dbConnection.php");
// //include_once 'functions.php';
// $cntAtten  = 0;
// $where     = "AND A.status = 'Active'";
// $groupBy   = 'GROUP BY A.attendance_date';
// $resultsText = ' ';

// $resultAtten = getAllAtt($conn , 'attendance_tbl AS A JOIN `employee_tbl` AS B ON A.emp_id = B.emp_id' , '*' , $groupBy ,$where);
// $cntAtten    = $resultAtten->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

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

                <!-- Start Content-->
                <div class="container-fluid">

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
                                <div class="page-title-right">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#Staff-add">
                                            Add Attendance
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Attendance Entry</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="tab-pane" id="Staff-add">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Information</h3>
                                            <div class="card-options ">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                                        class="fe fe-chevron-up"></i></a>
                                                <a href="staff.php" class="card-options-remove"><i
                                                        class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <form class="card-body" id="formattendance">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-sm-4 pl-3">
                                                        <div class="form-group">
                                                            <label for="username"><b>Enter Student Class </b></label>
                                                            <select class="form-control show-tick" 
                                                                id="stuClass" name="stuClass">
                                                                <option value="">---select class ---</option>
                                                                <option value="10">1</option>
                                                                <option value="5">2</option>
                                                                <option value="6">3</option>
                                                                <option value="7">4</option>
                                                                <option value="8">5</option>
                                                                <option value="9">6</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 pr-3">
                                                        <div class="form-group">
                                                            <label for="username"><b>Section </b></label>
                                                            <select class="form-control show-tick" name="section"
                                                                id="section" name="section">
                                                                <option value="">---select section ---</option>
                                                                <option value="1">A</option>
                                                                <option value="2">B</option>
                                                                <option value="3">C</option>
                                                                <option value="4">D</option>
                                                                <option value="5">E</option>
                                                                <option value="6">F</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 pr-3">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary mt-4"
                                                                onclick="attendaceAdd()">Submit</button>
                                                        </div>
                                                    </div>
                                        </form>
                                        <form id="attendanceForm" action="" method="post">
                                            <table id="addAttendance" class="table table-bordered mt-4">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <th>Attendance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    
                                                    <!-- Add more rows for additional students -->
                                                </tbody>
                                            </table>

                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary"
                                            onclick="attendanceForm()">Submit</button>
                                        <a href="attendance.php"><button type="button"
                                                class="btn btn-outline-secondary">Cancel</button></a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>


                    <div class="row g-4">
                        <div class="col-12">
                            <div class="mb-4">

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Client Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div> <!-- end modal header -->
                                            <div class="modal-body">

                                                <form name="clientfrm" action="actclientlogin.php" method="post"
                                                    class="form-horizontal">
                                                    <div class="row mb-3">
                                                        <label for="clientName" class="col-3 col-form-label">Client
                                                            Name</label>
                                                        <div class="col-9">
                                                            <input type="text" id="clientName" class="form-control"
                                                                name="clientName" pattern="[A-Za-z]+"
                                                                title="Please enter a valid name (letters and spaces only)"
                                                                required><br>
                                                            <span class="error" id="nameError"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="shopName" class="col-3 col-form-label">Shop
                                                            Name</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="shopName"
                                                                name="shopName" placeholder="Enter shop name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="clientnum" class="col-3 col-form-label">Phone
                                                            Number</label>
                                                        <div class="col-9">
                                                            <input type="number" class="form-control" id="clientnum"
                                                                name="clientnum" placeholder="Enter your Phone number"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="email" class="col-3 col-form-label">E-mail</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="email"
                                                                name="email" placeholder="E-mail" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="location"
                                                            class="col-3 col-form-label">Location</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control" id="location"
                                                                name="location" placeholder="Location" required>
                                                        </div>
                                                    </div>


                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>

                                            </div> <!-- end modal footer -->

                                        </div> <!-- end modal content-->
                                    </div> <!-- end modal dialog-->
                                </div> <!-- end modal-->

                            </div>

                            <div class="modal-footer">
                            </div> <!-- end modal footer -->
                        </div> <!-- end modal content-->
                    </div> <!-- end modal dialog-->
                </div> <!-- end modal-->
                </form>
                <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    if($cntAtten > 0)
                    {
                        while($rowAtten = $resultAtten->fetch_assoc())
                        {
                    ?> 
                        <tr>                        
                            <td><?= $i; ?> </td>
                            <td><?=$attenDate = $rowAtten['attendance_date'];?></td>
                            <td><?=$attenDate = $rowAtten['emp_first_name'];?></td>
                            <td><?=$attenDate = $rowAtten['attendance_type'];?></td>
                        </tr>                              
                                
                        <?php }
                    }?>
                    </tbody>

                </table>

            </div> <!-- end card -->
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

    <!-- Theme Settings -->
    <?php include("theme.php"); ?>

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
        document.addEventListener("DOMContentLoaded", function () {
            var jsonString = '[{"First name":"Yuri","Last name":"Berry","Position":"Chief Marketing Officer (CMO)","Office":"New York","Age":40,"Start date":"2009/06/25","Salary":"$675,000","Extn.":6154,"E-mail":"y.berry@datatables.net"},{"First name":"Caesar","Last name":"Vance","Position":"Pre-Sales Support","Office":"New York","Age":21,"Start date":"2011/12/12","Salary":"$106,450","Extn.":8330,"E-mail":"c.vance@datatables.net"},{"First name":"Tiger","Last name":"Nixon","Position":"System Architect","Office":"Edinburgh","Age":61,"Start date":"2011/04/25","Salary":"$320,800","Extn.":5421,"E-mail":"t.nixon@datatables.net"}]';

            var jsonData = JSON.parse(jsonString);

            var dynamicTableBody = document.getElementById('dynamic-table-body');
            var tableContent = '';

            jsonData.forEach(function (item) {
                tableContent += '<tr>';
                tableContent += '<td>' + item["First name"] + '</td>';
                tableContent += '<td>' + item["Last name"] + '</td>';
                tableContent += '<td>' + item["Position"] + '</td>';
                tableContent += '<td>' + item["Office"] + '</td>';
                tableContent += '<td>' + item["Age"] + '</td>';
                tableContent += '<td>' + item["Start date"] + '</td>';
                tableContent += '<td>' + item["Salary"] + '</td>';
                tableContent += '<td>' + item["Extn."] + '</td>';
                tableContent += '<td>' + item["E-mail"] + '</td>';
                tableContent += '</tr>';
            });

            dynamicTableBody.innerHTML = tableContent;
        });
    </script>
    <script>
        document.getElementById("clientfrm").addEventListener("submit", function (event) {
            var nameInput = document.getElementById("clientName").value;
            var nameError = document.getElementById("nameError");
            alert(nameInput);

            // Check if the name is valid
            if (!nameInput.checkValidity()) {
                // If not valid, show error message
                nameError.textContent = nameInput.validationMessage;
                event.preventDefault(); // Prevent form submission
            } else {
                // If valid, clear error message
                nameError.textContent = "";
            }
        });
    </script>

</body>

</html>




<!-------------------------Add Client-------------------------->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmAddClient" id="addClient">
                <input type="hidden" name="hdnAction" value="addClient">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body row">

                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="name"><b>Name</b></label>
                        <input type="text" placeholder="Enter Client Name" name="name" id="name" required="required">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="Company"><b>Company</b></label>
                        <input type="text" placeholder="Enter Company" name="Company" id="Company" required="required">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="location"><b>Location</b></label>
                        <input type="text" placeholder="Enter Location" name="location" id="location"
                            required="required">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="mobile"><b>Mobile No</b></label>
                        <input type="number" placeholder="Enter Mobile No" name="mobile" id="mobile"
                            required="required">
                    </div>

                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="email"><b>Email</b></label>
                        <input type="email" placeholder="Enter Email" name="email" id="email" required="required">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="modallabel" for="GST Number"><b>GST Number</b></label>
                        <input type="text" placeholder="Enter GST Number" name="gst" id="gst">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-------------------------End Client-------------------------->