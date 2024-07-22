<?php
session_start();

    include "class.php";
    
    $admission_result = admission(); 
    
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
                                    <th scope="col">University</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Contact No</th>
                                    <th scope="col">Roll No</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=1; while($row = mysqli_fetch_array($admission_result , MYSQLI_ASSOC)) { 
                        $id = $row['stu_id'];  $name = $row['stu_name']; $phone = $row['stu_phone'];  $university=$row['uni_name'];  
                        $course = $row['cou_name']; $enroll = $row['stu_enroll']; 
                        ?>
                     <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $university; ?></td>
                        <td><?php echo $course; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $enroll; ?></td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" id="editAdmissionBtn" onclick="goEditAdmission(<?php echo $id; ?>);"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white" id="viewAdmissionBtn" onclick="goViewAdmission(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteAdmission(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                           
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
        $('#addAdmission').removeClass('was-validated');
        $('#addAdmission').addClass('needs-validation');
        $('#addAdmission')[0].reset(); // Reset the form
        $('#StuContent').addClass('d-none');
        $('#addAdmissionModal').removeClass('d-none');
    });

    // Back to main content from add admission modal
    $('#addAdmissionModal').on('click', '#backToMainBtn', function() {
        $('#StuContent').removeClass('d-none');
        $('#addAdmissionModal').addClass('d-none');
    });

    // // Show edit admission modal on button click
    $(document).on('click', '#editAdmissionBtn', function() {
        $('#editAdmission').removeClass('was-validated');
        $('#editAdmission').addClass('needs-validation');
        $('#editAdmission')[0].reset(); // Reset the form
        $('#StuContent').addClass('d-none');
        $('#editAdmissionModal').removeClass('d-none');
    });

    // Back to main content from edit admission modal
    $('#editAdmissionModal').on('click', '#backToMainBtn1', function() {
        $('#StuContent').removeClass('d-none');
        $('#editAdmissionModal').addClass('d-none');
    });

    $(document).on('click', '#viewAdmissionBtn', function() {
        // $('#editAdmission').removeClass('was-validated');
        // $('#editAdmission').addClass('needs-validation');
        // $('#editAdmission')[0].reset(); // Reset the form
        $('#StuContent').addClass('d-none');
        $('#viewAdmissionModal').removeClass('d-none');
    });

    // Back to main content from edit admission modal
    $('#viewAdmissionModal').on('click', '#backToMainBtn2', function() {
        $('#StuContent').removeClass('d-none');
        $('#viewAdmissionModal').addClass('d-none');
    });


    $('#university').change(function() {
        var universityId = $(this).val();
        
        if (universityId === "") {
            $('#courseName').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actAdmission.php", // URL of the PHP script to handle the request
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
    $('#courseName').change(function() {
        var courseId = $(this).val();
        
        if (courseId === "") {
            $('#language').html('<option value="">--Select the Specification--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actAdmission.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { courseId: courseId },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select the Specification--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, elective) {
                    options += '<option value="' + elective.ele_id + '">' + elective.ele_elective + '</option>';
                });
                $('#language').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });

    $('#universityEdit').change(function() {
    var universityId = $(this).val();
    
    if (universityId === "") {
        $('#courseNameEdit').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
        return; // No university selected, exit the function
    }

    $.ajax({
        url: "action/actAdmission.php", // URL of the PHP script to handle the request
        type: "POST",
        data: { university: universityId },
        dataType: 'json',
        success: function(response) {
            
            var options = '<option value="">--Select the Course--</option>';
            
             // Loop through each course in the response and append to options
             $.each(response, function(index, course) {
                options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
            });
            $('#courseNameEdit').html(options); // Update the course dropdown
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed: " + status + ", " + error);
        }
    });
});

$('#courseNameEdit').change(function() {
    var courseId = $(this).val();
    
    if (courseId === "") {
        $('#languageEdit').html('<option value="">--Select the Specification--</option>'); // Clear the language dropdown
        return; // No course selected, exit the function
    }

    $.ajax({
        url: "action/actAdmission.php", // URL of the PHP script to handle the request
        type: "POST",
        data: { courseId: courseId },
        dataType: 'json',
        success: function(response) {
            
            var options = '<option value="0">--Select the Specification--</option>';
            
             // Loop through each elective in the response and append to options
             $.each(response, function(index, elective) {
                options += '<option value="' + elective.ele_id + '">' + elective.ele_elective + '</option>';
            });
            $('#languageEdit').html(options); // Update the language dropdown
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
            $('#StuContent').removeClass('d-none');
            $('#addAdmissionModal').addClass('d-none');
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
          text: 'An error occurred while adding Student data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });

  function goEditAdmission(editId) { 
    $.ajax({
        url: 'action/actAdmission.php',
        method: 'POST',
        data: { editId: editId },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            // Set the values for the fields
            $('#admissionId').val(response.stuId);
            $('#stuNameEdit').val(response.name);
            $('#mobileNoEdit').val(response.phone);
            $('#emailEdit').val(response.email);
            $('#universityEdit').val(response.uni_id).trigger('change'); // Trigger change to populate courses

            // Delay setting course and language values to ensure dropdowns are populated
            setTimeout(function() {
                $('#courseNameEdit').val(response.cou_id).trigger('change'); // Trigger change to populate electives

                setTimeout(function() {
                    $('#languageEdit').val(response.language); // Set after triggering change for courses
                }, 10); // Adjust timeout if necessary
                
                $('#mediumEdit').val(response.medium_id);
                $('#yearTypeEdit').val(response.year_type);
                $('#digilockerEdit').val(response.digilocker);
                $('#admitDateEdit').val(response.admit_date);
                $('#dobEdit').val(response.dob);
                $('#genderEdit').val(response.gender);
                $('#addressEdit').val(response.address);
                $('#pincodeEdit').val(response.pincode);
                $('#fathernameEdit').val(response.father_name);
                $('#mothernameEdit').val(response.mother_name);
                $('#aadharNumberEdit').val(response.aadhar_no);
                $('#nationalityEdit').val(response.nationality);
                $('#motherTongueEdit').val(response.mother_tongue);
                $('#religionEdit').val(response.religion);
                $('#casteEdit').val(response.caste);
                $('#communityEdit').val(response.community);
                $('#maritalEdit').val(response.marital_status);
                $('#employedEdit').val(response.employed);
                $('#qualificationEdit').val(response.qualification);
                $('#previousEdit').val(response.institute);
                $('#completedEdit').val(response.comp_year);
                $('#studyEdit').val(response.study_field);
                $('#gradeEdit').val(response.grade);
                $('#enrollEdit').val(response.enroll);
            }, 10   ); // Adjust timeout if necessary
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}

function goDeleteAdmission(id)
{
    if(confirm("Are you sure you want to delete Student?"))
    {
      $.ajax({
        url: 'action/actAdmission.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                               
                               $('#scroll-horizontal-datatable').DataTable().destroy();
                               
                                $('#scroll-horizontal-datatable').DataTable({
                                    "paging": true, // Enable pagination
                                    "ordering": true, // Enable sorting
                                    "searching": true // Enable searching
                                });
                            });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
}



document.addEventListener('DOMContentLoaded', function() {
    $('#editAdmission').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

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
                        $('#StuContent').removeClass('d-none');
                        $('#editAdmissionModal').addClass('d-none');
                        
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
                    text: 'An error occurred while Edit student data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});


</script>


    

</body>

</html>



