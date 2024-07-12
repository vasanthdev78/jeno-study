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
                
            <?php include "addAdmission.php"; ?>
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
                                        <button type="button" id="addAdmissionBtn" class="btn btn-info">
                                            Add New Admission
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Admission</h3>   
                            </div>
                        </div>
                    </div>

       

             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Roll No</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    // $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                    //     $id = $row['stu_id'];  $e_id = $row['entity_id']; $fname = $row['first_name'];$lname=$row['last_name'];  $blood = $row['stu_blood_group'];  $location  = $row['address']; $status = $row['stu_status'];  
                    //     $mobile=$row['phone'];$email=$row['email'];$cast=$row['stu_cast'];$religion=$row['stu_religion'];$mother_tongue=$row['stu_mother_tongue'];$native=$row['stu_native'];$image=$row['stu_image'];$course=$row['course_name'];         
                    //     $name=$fname.' '.$lname;
                        ?>
                     <tr>
                        <td>1</td>
                        <td>Vasanth</td>
                        <td>MCA</td>
                        <td>MS University</td>
                        <td>9894688091</td>
                        <td>20191291516</td>
                    
                        <td>
                        <a href="addAdmission.php"  rel="noopener noreferrer"><button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php  $id; ?>);" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class='bi bi-pencil-square'></i></button></a>
                        <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php  $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php  $id; ?>);"><i class="bi bi-trash"></i></button>
                           
                        </td>
                      </tr>

                      <tr>
                        <td>2</td>
                        <td>Raj</td>
                        <td>MCA</td>
                        <td>MS University</td>
                        <td>9894688091</td>
                        <td>20191291516</td>
                    
                        <td>
                        <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php  $id; ?>);" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class='bi bi-pencil-square'></i></button>
                        <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php  $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php  $id; ?>);"><i class="bi bi-trash"></i></button>
                            
                        </td>
                      </tr>


                      <tr>
                        <td>3</td>
                        <td>Santhuru</td>
                        <td>MCA</td>
                        <td>MS University</td>
                        <td>9894688091</td>
                        <td>20191291516</td>
                    
                        <td>
                        <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php  $id; ?>);" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class='bi bi-pencil-square'></i></button>
                        <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php  $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php  $id; ?>);"><i class="bi bi-trash"></i></button>
                           
                        </td>
                      </tr>

                      <tr>
                        <td>4</td>
                        <td>kaviya</td>
                        <td>MCA</td>
                        <td>MS University</td>
                        <td>9894688091</td>
                        <td>20191291516</td>
                    
                        <td>
                        <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php  $id; ?>);" data-bs-toggle="modal" data-bs-target="#editStudentModal"><i class='bi bi-pencil-square'></i></button>
                        <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php  $id; ?>);"><i class="bi bi-trash"></i></button>
                           
                        </td>
                      </tr>
                      <?php 
                    // }
                     ?>
                        
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

    <script>
    document.getElementById('addAdmissionBtn').addEventListener('click', function() {
        document.getElementById('StuContent').classList.add('d-none');
        document.getElementById('addAdmissionModal').classList.remove('d-none');
    });
    document.getElementById('backToMainBtn').addEventListener('click', function() {
            document.getElementById('StuContent').classList.remove('d-none');
            document.getElementById('addAdmissionModal').classList.add('d-none');
        });
</script>
    

</body>

</html>



