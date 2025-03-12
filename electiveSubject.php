<?php
session_start();
    
    include "class.php"; // function 
    include "db/dbConnection.php";
    $location = $_SESSION['centerId'];
    $elective_result = electiveTable($location); // Call the function to fetch universities 
    
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
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
            <div id="studentDetail"></div>
            <?php include "formElectiveSubject.php";?> <!---add Student popup--->

                <!-- Start Content-->
                <div class="container-fluid" id="StuContent" >

                    <!-- start page title -->
                    <div class="row" >
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
                                        <button type="button" id="addElectiveBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addElectiveModal">
                                            Add New Elective Subject
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Elective Subject List</h3>   
                            </div>
                        </div>
                    </div>

             
             
                    <div class="table-responsive">
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">University Name</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Elective Subject</th>
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                <?php  

                    $i =1;

                    while ($row = $elective_result->fetch_assoc()) {
                        $id = $row['ele_id'];
                        

            ?>

            <tr>
                        <td scope="row"><?php echo $i ; $i++ ?></td>
                        <td><?php echo $row['uni_name'] ?></td>
                        <td><?php echo $row['cou_name'] ?></td>
                        <td><?php echo $row['ele_elective'] ?></td>
                        <td>
                            <?php if ($user_role == 'Admin') { ?>
                                <button  class="btn btn-circle btn-warning text-white modalBtn" onclick="editelective(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editElectiveModal"><i class='bi bi-pencil-square'></i></button>
                                <button class="btn btn-circle btn-danger text-white" onclick="goDeleteElective(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                            <?php } else { ?>
                                <button  class="btn btn-circle btn-warning text-white modalBtn" onclick="editelective(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editElectiveModal"><i class='bi bi-pencil-square'></i></button>
                            <?php } ?>

                        </td>
                      </tr>



        <?php } ?>
                   
                  
                        
                    </tbody>
                  </table>
                  </div>

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
    
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> -->
  <script src="assets/addlink/sweetalert.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-------Start Add Student--->
  
    <script>
let isElectiveNameValid = true; // Global flag to track elective name validity

function checkElectiveName() {
    var electiveName = $('#electiveName').val().trim();
    var courseName = $('#courseName').val().trim(); // Get the input value for editing
    // Proceed only if there is input
    if (electiveName.length > 0) {
        $.ajax({
            url: 'action/actElective.php', // Server-side script to check name
            type: 'POST',
            data: { electiveName_check: electiveName ,courseID : courseName },
            dataType: 'json',
            success: function(response) {
                if (response.exists) {
                    // If the name exists, show an error message
                    $('#electiveNameError').text('This elective name already exists. Please choose another.').show();
                    $('#electiveName').addClass('is-invalid'); // Bootstrap error styling
                    isElectiveNameValid = false; // Update validity flag
                } else {
                    // If the name is available, hide the error message
                    $('#electiveNameError').hide();
                    $('#electiveName').removeClass('is-invalid'); // Remove error styling
                    isElectiveNameValid = true; // Update validity flag
                }
            },
            error: function() {
                console.error('Error checking elective name');
                $('#electiveNameError').text('An error occurred while checking the elective name. Please try again.').show();
                $('#electiveName').addClass('is-invalid');
                isElectiveNameValid = false; // Set to false if AJAX fails
            }
        });
    } else {
        // If input is empty, hide the error message
        $('#electiveNameError').hide();
        $('#electiveName').removeClass('is-invalid'); // Remove error styling
        isElectiveNameValid = true; // Reset validity flag
    }
}


// Function to check if the edit elective name already exists
let isEditElectiveNameValid = true; // Use let instead of var for block scope
function checkEditElectiveName() {
    var editElectiveName = $('#editElectiveName').val().trim(); // Get the input value for editing
    var editCourseName = $('#editCourseName').val().trim(); // Get the input value for editing

    // Proceed only if there is input
    if (editElectiveName.length > 0) {
        $.ajax({
            url: 'action/actElective.php', // Server-side script to check name
            type: 'POST',
            data: { electiveName_check: editElectiveName ,courseID : editCourseName }, // Send the current elective ID to exclude from the check
            dataType: 'json',
            success: function(response) {
                if (response.exists) {
                    // If the name exists, show an error message
                    $('#editElectiveNameError').text('This elective name already exists. Please choose another.').show();
                    $('#editElectiveName').addClass('is-invalid'); // Bootstrap error styling
                    isEditElectiveNameValid = false; // Update validity flag
                } else {
                    // If the name is available, hide the error message
                    $('#editElectiveNameError').hide();
                    $('#editElectiveName').removeClass('is-invalid'); // Remove error styling
                    isEditElectiveNameValid = true; // Update validity flag
                }
            },
            error: function() {
                console.error('Error checking edit elective name');
                $('#editElectiveNameError').text('An error occurred while checking the elective name. Please try again.').show();
                $('#editElectiveName').addClass('is-invalid');
                isEditElectiveNameValid = false; // Set to false if AJAX fails
            }
        });
    } else {
        // If input is empty, hide the error message
        $('#editElectiveNameError').hide();
        $('#editElectiveName').removeClass('is-invalid'); // Remove error styling
        isEditElectiveNameValid = true; // Reset validity flag
    }
}

    
                        
    $('#addElectiveBtn').click(function() {
        $('#addElective').removeClass('was-validated');
        $('#addElective').addClass('needs-validation');
        $('#addElective')[0].reset(); // Reset the form
        $('#electiveNameError').hide();
        $('#electiveName').removeClass('is-invalid');
    });


    // edit function -------------------------
function editelective(editId) {
   

    $.ajax({
        url: 'action/actElective.php',
        method: 'POST',
        data: {
            editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            $('#editElective').removeClass('was-validated');
            $('#editElective').addClass('needs-validation');
            $('#editElectiveNameError').hide();
            $('#editElectiveName').removeClass('is-invalid');
            $('#editid').val(response.ele_id);
            $('#editElectiveName').val(response.ele_elective);
            $('#editCourseName').val(response.ele_cou_id);
            

                    },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}




      // Ajax form submission
      $('#addElective').off('submit').on('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    var form = this; // Get the form element
    var submitButton = $('#submitBtn'); // Select your submit button (adjust the selector as needed)

    // Disable the submit button to prevent multiple clicks
    submitButton.prop('disabled', true);

    // Check the validity of the form and elective name
    if (form.checkValidity() === false || !isElectiveNameValid) {
        // If the form is invalid or elective name is invalid, display validation errors
        if (!isElectiveNameValid) {
            // If elective name is invalid, trigger custom validation
            $('#electiveName').focus(); // Optional: Focus on the elective name input
        }
        form.reportValidity(); // Show default browser validation messages

        // Re-enable the submit button if the form is invalid
        submitButton.prop('disabled', false);
        return;
    }

    var formData = new FormData(form);

    $.ajax({
        url: 'action/actElective.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(response) {
            // Handle success response
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: response.message,
                    timer: 2000
                }).then(function() {
                    $('#addElectiveModal').modal('hide');
                    $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                        $('#scroll-horizontal-datatable').DataTable().destroy();
                        $('#scroll-horizontal-datatable').DataTable({
                            "paging": true,  // Enable pagination
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
            // Re-enable the submit button after the AJAX call
            submitButton.prop('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle error response
            alert('Error adding elective: ' + textStatus);
            // Re-enable the submit button in case of error
            submitButton.prop('disabled', false);
        }
    });
});




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


        //Edit Student Ajax


        // Document ready function
document.addEventListener('DOMContentLoaded', function() {
    // Check the elective name validity on input change
    $('#editElectiveName').on('input', checkEditElectiveName);

    $('#editElective').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = this; // Get the form element
        var submitButton = $('#updateBtn'); // Adjust the selector to your actual button's ID or class

        // Disable the submit button to avoid double-click
        submitButton.prop('disabled', true);

        // Check the validity of the form and elective name
        if (form.checkValidity() === false || !isEditElectiveNameValid) {
            // If the form is invalid or elective name is invalid, display validation errors
            if (!isEditElectiveNameValid) {
                // If elective name is invalid, trigger custom validation
                $('#editElectiveName').focus(); // Optional: Focus on the elective name input
            }
            form.reportValidity(); // Show default browser validation messages

            // Re-enable the submit button if the form is invalid
            submitButton.prop('disabled', false);
            return;
        }

        var formData = new FormData(form); // Collect form data

        // Perform AJAX submission
        $.ajax({
            url: "action/actElective.php",
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
                        $('#editElectiveModal').modal('hide'); // Close the modal
                        $('.modal-backdrop').remove(); // Remove the backdrop

                        // Reload the data table
                        $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                            $('#scroll-horizontal-datatable').DataTable().destroy();
                            $('#scroll-horizontal-datatable').DataTable({
                                "paging": true,   // Enable pagination
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
                // Re-enable the submit button after processing
                submitButton.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while editing Elective data.'
                });
                // Re-enable the submit button on error
                submitButton.prop('disabled', false);
            }
        });
    });
});


    function goDeleteElective(id)
        {
    //alert(id);
    if(confirm("Are you sure you want to delete Elective Subject?"))
    {
      $.ajax({
        url: 'action/actElective.php',
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

    
</script>

</body>

</html>



