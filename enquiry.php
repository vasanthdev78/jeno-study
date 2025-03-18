<?php
session_start();
include "class.php"; // function class
include "db/dbConnection.php"; // database connection
$centerId = $_SESSION['centerId'];
$enquiry_result = enquiryTable($centerId);  // enquiry details shoe table
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head2.php"; ?>
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
            <?php include "formEnquiry.php";?> <!---add Student popup--->

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
             
                    <div class="filter-container mb-4">
    <div class="row">
        <div class="col-md-4">
            <label for="universityFilter" class="form-label">Filter by University</label>
            <select id="universityFilter" class="form-select">
            <option value="">All Universities</option>
                        <?php 
                                        $uniCenterId = $_SESSION['centerId'];
                                        $university_result = universityTable($uniCenterId); // Call the function to fetch universities 
                                        while ($row = $university_result->fetch_assoc()) {
                                            $id = $row['uni_id']; 
                                    $name = $row['uni_name'];    
                        
                                      ?>
                        
                        <option value="<?php echo $id;?>"><?php echo $name;?></option>

                        <?php } ?>
            </select>
        </div>
        
        <div class="col-md-4">
            <label for="courseFilter" class="form-label">Filter by Course</label>
            <select id="courseFilter" class="form-select">
            <option value="">All Courses</option>
                        <?php 
                                        $uniCenterId = $_SESSION['centerId'];
                                        $university_result = courseTable($uniCenterId); // Call the function to fetch universities 
                                        while ($row = $university_result->fetch_assoc()) {
                                            $id = $row['cou_id']; 
                                    $name = $row['cou_name'];    
                        
                                      ?>
                        
                        <option value="<?php echo $id;?>"><?php echo $name;?></option>

                        <?php } ?>
            </select>
        </div>
        
        <div class="col-md-4">
            <label for="dateFilter" class="form-label">Filter by Date</label>
            <input type="date" id="dateFilter" class="form-control" />
        </div>
    </div>
</div>

                    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr class="bg-light">
                <th scope="col-1">S.No.</th>
                <th class="d-none" scope="col-1">Date</th>
                <th scope="col">Name</th>
                <th scope="col">University</th>
                <th scope="col">Course</th>                                  
                <th scope="col">Contact No</th>
                <th scope="col">Status</th> 
                <th scope="col">Action</th>                              
            </tr>
        </thead>
        <tbody>

       
        
        </tbody>
    </table>
</div>


                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include "footer.php" ?>
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

                <!--   pdf and excel print  -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="assets/addlink/jquery.3.6.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="assets/addlink/datatable.1.11.5.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script> -->
    <script src="assets/addlink/datatablebutton.2.2.2.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <script src="assets/addlink/jszip.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> -->
    <script src="assets/addlink/pdf.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script> -->
    <script src="assets/addlink/pdffount.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script> -->
    <script src="assets/addlink/datatablehtml.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> -->
    <script src="assets/addlink/print.js"></script>


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>
        // Enable Bootstrap tooltips
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
    </script>

  

    <script>
//---data table print pdf ,excel etc --------------------------------
$(document).ready(function() {
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        serverSide: true,
        processing: true,
        ajax: {
            url: "action/actEnquiry.php", // PHP file to fetch data
            type: "POST",
            data: function(d) {
                // Add filter values to AJAX request data
                d.university = $('#universityFilter').val();
                d.course = $('#courseFilter').val();
                d.date = $('#dateFilter').val();
                d.TableName = "newTable"; // Send TableName with the AJAX request if needed
            }
        },
        columns: [
            { data: "s_no" },
            { data: "enq_date", visible: false },
            { data: "enq_stu_name" },
            { data: "university" },
            { data: "course" },
            { data: "enq_mobile" },
            { data: "enq_adminsion_status" },
            { data: "action" }
        ]
    });

    // Attach event listeners to filters to reload the table on change
    $('#universityFilter, #courseFilter, #dateFilter').on('change', function() {
        table.ajax.reload(null, false);
    });
});


        

        //----date of birth select valitation opration ---------------------------------------
        var today = new Date().toISOString().split('T')[0];

// Calculate the date 10 years ago
var tenYearsAgo = new Date();
tenYearsAgo.setFullYear(tenYearsAgo.getFullYear() - 10);
var tenYearsAgoDate = tenYearsAgo.toISOString().split('T')[0];

// Set the max attribute for the DOB input
document.getElementById('dob').setAttribute('max', tenYearsAgoDate);
document.getElementById('editDob').setAttribute('max', tenYearsAgoDate);
 

        $('#addEnquiryBtn').click(function() {

            $('#addEnquiry').removeClass('was-validated');
            $('#addEnquiry').addClass('needs-validation');
            $('#addEnquiry')[0].reset(); // Reset the form
            // $('#fessType').val('');

            });

            $('#backButtonEnquiry').click(function() {
            $('#enquiryView').addClass('d-none');
            $('#StuContent').show();

            });


            $(document).ready(function() {


                //--add university university select -------------------------
    $('#university').change(function() {
        var universityId = $(this).val();
        
        if (universityId === "") {
            $('#course').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actEnquiry.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { universityID: universityId },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select the Course--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
                });
                $('#course').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });

    //--edit university select ------------change course -----
    $('#editUniversity').change(function() {
        var universityId = $(this).val();
        // alert(universityId);
        
        if (universityId === "") {
            $('#editCourse').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actEnquiry.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { universityID: universityId },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select the Course--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
                });
                $('#editCourse').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });


    });




   // Ajax form submission -----------------------------
$('#addEnquiry').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    var form = this; // Get the form element
    if (form.checkValidity() === false) {
        // If the form is invalid, display validation errors
        form.reportValidity();
        return;
    }

    // Disable the submit button to prevent double-click
    $('#submitEnquiryBtn').prop('disabled', true); // Change this ID to match your submit button's ID

    var formData = new FormData(this);

    $.ajax({
        url: 'action/actEnquiry.php',
        type: 'POST',
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
                    $('#addEnquiryModal').modal('hide');
                    // $('#example').load(location.href + ' #example > *', function() {
                    //     $('#example').DataTable().destroy();
                    //     $('#example').DataTable({
                    //         "paging": true, // Enable pagination
                    //         "ordering": true, // Enable sorting
                    //         "searching": true, // Enable searching
                    //         dom: 'Bfrtip', // Define the elements that should be included in the DataTable
                    //         buttons: [
                    //             'copy', 'csv', 'excel', 'pdf', 'print' // Include buttons for copy, CSV, Excel, PDF, and print
                    //         ]
                    //     });
                    // });
                    table.ajax.reload(null, false);

                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
            // Re-enable the submit button after processing
            $('#submitEnquiryBtn').prop('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle error response
            alert('Error adding Enquiry: ' + textStatus);
            // Re-enable the submit button on error
            $('#submitEnquiryBtn').prop('disabled', false);
        }
    });
});



        



          // edit function -------------------------
    function editEnquiry(editId) {

        $('#editEnquiry').removeClass('was-validated');
            $('#editEnquiry').addClass('needs-validation');

    $.ajax({
        url: 'action/actEnquiry.php',
        method: 'POST',
        data: {
            editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            $('#editEnquiryId').val(response.enq_id);
            $('#editName').val(response.enq_stu_name);
            $('#editGender').val(response.enq_gender);
            $('#editDob').val(response.enq_dob);
            $('#editMobile').val(response.enq_mobile);
            $('#editEmail').val(response.enq_email);
            $('#editAddress').val(response.enq_address);
            $('#editremark').val(response.enq_remark);
            $('#editUniversity').val(response.enq_uni_id);
            
            $('#editMedium').val(response.enq_medium);
            


            var options = '<option value="">--Select the Course--</option>';
                
                // Loop through each course in the response and append to options
                $.each(response.enq_courses, function(index, course) {
                   options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
               });
               $('#editCourse').html(options); // Update the course dropdown
               $('#editCourse').val(response.enq_cou_id);
           
                    },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }




         

 // --edit form submit -------------------------------------
document.addEventListener('DOMContentLoaded', function() {
    $('#editEnquiry').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = this; // Get the form element
        if (form.checkValidity() === false) {
            // If the form is invalid, display validation errors
            form.reportValidity();
            return;
        }

        // Disable the update button to prevent double click
        $('#updateBtn').prop('disabled', true); // Change this ID to match your update button's ID

        var formData = new FormData(this);
        $.ajax({
            url: "action/actEnquiry.php",
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
                        $('#editEnquiryModal').modal('hide'); // Close the modal
                        $('.modal-backdrop').remove(); // Remove the backdrop  
                        table.ajax.reload(null, false);
 
                        // $('#example').load(location.href + ' #example > *', function() {
                        //     $('#example').DataTable().destroy();
                        //     $('#example').DataTable({
                        //         "paging": true, // Enable pagination
                        //         "ordering": true, // Enable sorting
                        //         "searching": true, // Enable searching
                        //         dom: 'Bfrtip', // Define the elements that should be included in the DataTable
                        //         buttons: [
                        //             'copy', 'csv', 'excel', 'pdf', 'print' // Include buttons for copy, CSV, Excel, PDF, and print
                        //         ]
                        //     });
                        // });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
                // Re-enable the submit button after processing
                $('#updateBtn').prop('disabled', false);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while editing enquiry data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});





    //----delete ----------------
    function goDeleteEnquiry(id)
        {
    //alert(id);
    if(confirm("Are you sure you want to delete enquiry?"))
    {
      $.ajax({
        url: 'action/actEnquiry.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            table.ajax.reload(null, false);

    //       $('#example').load(location.href + ' #example > *', function() {
                               
    //                            $('#example').DataTable().destroy();
                               
    //                             $('#example').DataTable({
    //                                 "paging": true, // Enable pagination
    //                                 "ordering": true, // Enable sorting
    //                                 "searching": true, // Enable searching
    //                                 dom: 'Bfrtip', // Define the elements that should be included in the DataTable
    // buttons: [
    //   'copy', 'csv', 'excel', 'pdf', 'print' // Include buttons for copy, CSV, Excel, PDF, and print
    // ]
    //                             });
    //                         });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
    }




    //------view page -----------------------------


    function goViewEnquiry(id)
{
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'action/actEnquiry.php',
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          
          $('#StuContent').hide();
          $('#enquiryView').removeClass('d-none');
        
          $('#viewStudentName').text(response.enq_stu_name);
          $('#viewGender').text(response.enq_gender);
           // Change date format from YYYY-MM-DD to DD-MM-YYYY
        let originalDate = response.enq_dob; // Assuming this is in the format YYYY-MM-DD
        let dateParts = originalDate.split('-'); // Split the date string
        let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // Reformat to DD-MM-YYYY
        
          $('#viewDob').text(formattedDate);
          $('#viewMobileNo').text(response.enq_mobile);
          $('#viewEmail').text(response.enq_email);
          $('#viewAddress').text(response.enq_address);
          $('#viewRemark').text(response.enq_remark);
          $('#viewUniversityName').text(response.enq_uni_id);
          $('#viewCourseName').text(response.enq_cou_id);
          $('#viewMedium').text(response.enq_medium);
          $('#viewAddmissionStatus').text(response.enq_adminsion_status);

    

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



