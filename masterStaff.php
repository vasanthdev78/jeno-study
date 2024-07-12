<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT student_tbl.*,
    additional_details_tbl.*,
    course_tbl.*
     FROM student_tbl
    LEFT JOIN additional_details_tbl on student_tbl.stu_id=additional_details_tbl.stu_id
    LEFT JOIN course_tbl on student_tbl.course_id=course_tbl.course_id
    WHERE student_tbl.stu_status = 'Active' and student_tbl.entity_id=1";
    $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
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
                                <div class="page-title-right">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" id="addStaff" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addStaffModal">
                                            Add New Staff
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Staff</h3>   
                            </div>
                        </div>
                    </div>

             <?php include("formStaff.php");?> <!---add Staff popup--->
             
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Date of Joining</th>
                                    <th scope="col">Email ID</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                    
                     <tr>
                        <td scope="row">1</td>
                        <td>John Doe</td>
                        <td>9876541320</td>
                        <td>System Admin</td>
                        <td>01/02/2023</td>
                        <td>johndoe@gmail.com</td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn"  data-bs-toggle="modal" data-bs-target="#editStaffModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" ><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" ><i class="bi bi-trash"></i></button>
                            
                        </td>
                      </tr>
                      <tr>
                        <td scope="row">2</td>
                        <td>HariHaran</td>
                        <td>6547962145</td>
                        <td>Receptionist</td>
                        <td>01/05/2023</td>
                        <td>hariharan@gmail.com</td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn"  data-bs-toggle="modal" data-bs-target="#editStaffModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" ><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" ><i class="bi bi-trash"></i></button>
                            
                        </td>
                      </tr>
                      <tr>
                        <td scope="row">3</td>
                        <td>Ajay</td>
                        <td>9876352410</td>
                        <td>Accountant</td>
                        <td>01/06/2023</td>
                        <td>ajayprasad@gmail.com</td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn"  data-bs-toggle="modal" data-bs-target="#editStaffModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" ><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" ><i class="bi bi-trash"></i></button>
                            
                        </td>
                      </tr>
                      <tr>
                        <td scope="row">4</td>
                        <td>Srinivas</td>
                        <td>7896541230</td>
                        <td>Cashier</td>
                        <td>01/08/2023</td>
                        <td>srinivas@gmail.com</td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn"  data-bs-toggle="modal" data-bs-target="#editStaffModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" ><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" ><i class="bi bi-trash"></i></button>
                            
                        </td>
                      </tr>
                      <tr>
                        <td scope="row">5</td>
                        <td>Mari Raj</td>
                        <td>8974563210</td>
                        <td>Software Engineer</td>
                        <td>01/10/2023</td>
                        <td>mariraj@gmail.com</td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn"  data-bs-toggle="modal" data-bs-target="#editStaffModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" ><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" ><i class="bi bi-trash"></i></button>
                           
                        </td>
                      </tr>

                     
                        
                    </tbody>
                  </table>

                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

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
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

  

    

</body>

</html>



