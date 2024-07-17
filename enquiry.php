<?php
session_start();
include("class.php");

$enquiry_result = enquiryTable();
    
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
                                        <button type="button" id="addEnquiryBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addEnquiryModal">
                                            Add New Enquiry
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Enquiry</h3>   
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-5">
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
                </div>

             <?php include("formEnquiry.php");?> <!---add Student popup--->
             
             
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Enquiry No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Course</th>                                    
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Status</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>

                    <?php  

                        $i =1;

                        while ($row = $enquiry_result->fetch_assoc()) {
                            $id = $row['enq_id'];
                            

                        ?>

                    
                     <tr>
                        <td><?php echo $i ; $i++ ?></td>
                        <td><?php echo $row['enq_number'] ?></td>
                        <td><?php echo $row['enq_stu_name'] ?></td>
                        <td><?php echo $row['enq_uni_id'] ?></td>
                        <td><?php echo $row['enq_cou_id'] ?></td>
                        <td><?php echo $row['enq_mobile'] ?></td>
                        <td><?php echo $row['enq_adminsion_status'] ?></td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editEnquiryModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                      </tr>   
                     <?php } ?>  
                                             
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
        $('#addEnquiryBtn').click(function() {

            $('#addEnquiry').removeClass('was-validated');
            $('#addEnquiry').addClass('needs-validation');
            $('#addEnquiry')[0].reset(); // Reset the form
            // $('#fessType').val('');

            });

            $('#backButtoncourse').click(function() {
            $('#CourseView').addClass('d-none');
            $('#courseContent').show();

            });


            $(document).ready(function() {
    $('#university').change(function() {
        var universityId = $(this).val();
        alert(universityId);
        
        if (universityId === "") {
            $('#course').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actEnquiry.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { university: universityId },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                
                var options = '<option value="">--Select the Course--</option>';
                
                for (var i = 0; i < response.length; i++) {
                    options += '<option value="' + response.cou_id + '">' + response.cou_name + '</option>';
                }

                $('#course').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });
});





    </script>

 

</body>

</html>



