<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT a.*, b.* FROM `jeno_student` AS a LEFT JOIN jeno_book AS b ON a.stu_id = b.book_stu_id WHERE b.book_status = 'Active' ";
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
                               
                                <h4 class="page-title">Books Issue</h4>   
                            </div>
                        </div>
                    </div>

                      <!-- Filters -->
                      <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="universityFilter">University</label>
                            <select id="universityFilter" class="form-control">
                                <option value="">All</option>
                                <option value="University1">University Of Madras</option>
                                <option value="University2">Anna University</option>
                                <option value="University3">MS University</option>
                                <option value="University4">Alagappa University</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="courseFilter">Course</label>
                            <select id="courseFilter" class="form-control">
                                <option value="">All</option>
                                <option value="Course1">BBA</option>
                                <option value="Course2">BCA</option>
                                <option value="Course3">MBA</option>
                                <option value="Course4">MCA</option>
                                <option value="Course5">BSc</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="yearFilter">Year</label>
                            <select id="yearFilter" class="form-control">
                                <option value="">All</option>
                                <option value="1stYear">1st Year</option>
                                <option value="2ndYear">2nd Year</option>
                                <option value="3rdYear">3rd Year</option>
                                <option value="4thYear">4th Year</option>
                                <option value="5thYear">5th Year</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button id="searchButton" class="btn btn-primary">Search</button>
                            </div>  
                        
                    </div>


             <?php include("formBookIssue.php");?>
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                    <tr class="bg-light">
                                   <th scope="col-1">S.No.</th>
                                    <th scope="col">Student Name</th>
                                    <!-- <th scope="col">Course</th>
                                    <th scope="col">Year</th> -->
                                    <th scope="col">Book Receive</th>
                                    <th scope="col">Book Issue</th>
                                    <th scope="col">ID Card</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                        $id = $row['book_id'];  $name = $row['stu_name']; 
                        $bookRes = $row['book_received']; 
                        $idCard = $row['book_id_card']; $contact = $row['stu_phone']; 
                        ?>

                     <tr>
                     
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $bookRes; ?></td>
                        <td></td>
                        <td><?php echo $idCard; ?></td>
                        <td><?php echo $contact; ?></td>
                    
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditBook(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#addStockModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                        </td>
                      </tr>
                      <?php 
                    }
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

  <!--  Select2 Plugin Js -->
  <script src="assets/vendor/select2/js/select2.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    
    <script>
    function goEditAdmission(editId) { 
    $.ajax({
        url: 'action/actBook.php',
        method: 'POST',
        data: { editId: editId },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            // Set the values for the fields
            // $('#admissionId').val(response.stuId);
            // $('#stuNameEdit').val(response.name);
            // $('#mobileNoEdit').val(response.phone);
            // $('#emailEdit').val(response.email);
            // $('#universityEdit').val(response.uni_id).trigger('change'); // Trigger change to populate courses

            // // Delay setting course and language values to ensure dropdowns are populated
            // setTimeout(function() {
            //     $('#courseNameEdit').val(response.cou_id).trigger('change'); // Trigger change to populate electives

            //     setTimeout(function() {
            //         $('#languageEdit').val(response.language); // Set after triggering change for courses
            //     }, 10); // Adjust timeout if necessary
                
            //     $('#mediumEdit').val(response.medium_id);
            //     $('#yearTypeEdit').val(response.year_type);
            //     $('#digilockerEdit').val(response.digilocker);
            //     $('#admitDateEdit').val(response.admit_date);
            //     $('#dobEdit').val(response.dob);
            //     $('#genderEdit').val(response.gender);
            //     $('#addressEdit').val(response.address);
            //     $('#pincodeEdit').val(response.pincode);
            //     $('#fathernameEdit').val(response.father_name);
            //     $('#mothernameEdit').val(response.mother_name);
            //     $('#aadharNumberEdit').val(response.aadhar_no);
            //     $('#nationalityEdit').val(response.nationality);
            //     $('#motherTongueEdit').val(response.mother_tongue);
            //     $('#religionEdit').val(response.religion);
            //     $('#casteEdit').val(response.caste);
            //     $('#communityEdit').val(response.community);
            //     $('#maritalEdit').val(response.marital_status);
            //     $('#employedEdit').val(response.employed);
            //     $('#qualificationEdit').val(response.qualification);
            //     $('#previousEdit').val(response.institute);
            //     $('#completedEdit').val(response.comp_year);
            //     $('#studyEdit').val(response.study_field);
            //     $('#gradeEdit').val(response.grade);
            //     $('#enrollEdit').val(response.enroll);
            // }, 10   ); // Adjust timeout if necessary
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}
</script>

</body>

</html>



