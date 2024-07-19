<?php
session_start();

    include "class.php";
    
    // $selQuery = "SELECT student_tbl.*,
    // additional_details_tbl.*,
    // course_tbl.*
    //  FROM student_tbl
    // LEFT JOIN additional_details_tbl on student_tbl.stu_id=additional_details_tbl.stu_id
    // LEFT JOIN course_tbl on student_tbl.course_id=course_tbl.course_id
    // WHERE student_tbl.stu_status = 'Active' and student_tbl.entity_id=1";
    // $resQuery = mysqli_query($conn , $selQuery); 
    
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
                         <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php  $id; ?>);" id="editAdmissionBtn"><i class='bi bi-pencil-square'></i></button>
                        <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php  $id; ?>);"><i class="bi bi-eye-fill"></i></button>
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
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
    $(document).ready(function() {
    // Show add admission modal on button click
    $('#addAdmissionBtn').on('click', function() {
        $('#StuContent').addClass('d-none');
        $('#addAdmissionModal').removeClass('d-none');
    });

    // Back to main content from add admission modal
    $('#addAdmissionModal').on('click', '#backToMainBtn', function() {
        $('#StuContent').removeClass('d-none');
        $('#addAdmissionModal').addClass('d-none');
    });

    // // Show edit admission modal on button click
    // $('.editAdmissionBtn').on('click', function() {
    //     $('#StuContent').addClass('d-none');
    //     $('#editAdmissionModal').removeClass('d-none');
    // });

    // // Back to main content from edit admission modal
    // $('#editAdmissionModal').on('click', '#backToMainBtn', function() {
    //     $('#StuContent').removeClass('d-none');
    //     $('#editAdmissionModal').addClass('d-none');
    // });
    $('#university').change(function() {
        var universityId = $(this).val();
        
        if (universityId === "") {
            $('#courseName').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actElective.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { university: universityId },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select the Course--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
                });
                $('#courseName').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });
});


$('#addAdmission').off('submit').on('submit', function(e) {

    e.preventDefault(); 

    var form = this; // Get the form element
            if (form.checkValidity() === false) {
                // If the form is invalid, display validation errors
                form.reportValidity();
                return;
            }

            var formData = new FormData(form);

    $.ajax({
      url: "action/actAdmission.php",
      method: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        // Handle success response
        console.log(response);
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.message,
            timer: 2000
          }).then(function() {
            $('#addStaffModal').modal('hide');
            $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
              $('#scroll-horizontal-datatable').DataTable().destroy();
              $('#scroll-horizontal-datatable').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "searching": true // Enable searching
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
      error: function(xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred while adding Staff data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });


        
</script>


    

</body>

</html>



