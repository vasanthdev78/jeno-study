<?php
session_start();
    include("db/dbConnection.php");
    
  
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

            <?php include "formSchedule.php";?> <!---add formSchedule popup--->

                <!-- Start Content-->
                <div class="container-fluid" id="ScheduleContent">

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
                                        <button type="button" id="addScheduleBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
                                            Add New Schedule
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Schedules</h3>   
                            </div>
                        </div>
                    </div>             
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Faculty Name</th>
                                    <th scope="col">From Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Session</th>
                                    <th scope="col">Subject</th> 
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
                        <td>6-7-2024</td>
                        <td>10-7-2024</td>
                        <td>Morning</td>
                        <td>Web Development</td>


                    
                        <td>
                          <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditSchedule(<?php  $id; ?>);" data-bs-toggle="modal" data-bs-target="#editScheduleModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteSchedule(<?php  $id; ?>);"><i class="bi bi-trash"></i></button>
                           
                        </td>
                      </tr>
                      <?php
                    //  } 
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

$(document).ready(function () {

$('#addScheduleBtn').click(function() {

$('#addSchedule').removeClass('was-validated');
$('#addSchedule').addClass('needs-validation');
$('#addSchedule')[0].reset(); // Reset the form

});

$('#course').change(function() {
        var courseId = $(this).val();
        if (courseId) {
            $.ajax({
                type: 'POST',
                url: 'action/actSchedule.php', // The PHP file that fetches the subjects
                data: {course_id: courseId},
                success: function(response) {
                    $('#subject').html(response);
                }
            });
        } else {
            $('#subject').html('<option value="">--Select the Subject--</option>');
        }
    });

$('#addSchedule').off('submit').on('submit', function(e) {

  e.preventDefault(); 

  var form = this; // Get the form element
          if (form.checkValidity() === false) {
              // If the form is invalid, display validation errors
              form.reportValidity();
              return;
          }

          var formData = new FormData(form);

  $.ajax({
    url: "action/actSchedule.php",
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
          $('#addScheduleModal').modal('hide');
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
        text: 'An error occurred while adding Schedule data.'
      });
      // Re-enable the submit button on error
      $('#submitBtn').prop('disabled', false);
    }
  });
});


});

</script>

</body>

</html>



