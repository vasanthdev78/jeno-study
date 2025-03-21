<?php
session_start();
    
    include "class.php"; // function 
    include "db/dbConnection.php";
    $location = $_SESSION['centerId'];
    

    $ledger_query = "SELECT `led_id`,`led_category`, `led_type` FROM `jeno_ledger` WHERE led_status ='Active' AND led_center_id = $location;";

   // Execute the query
   $ledger_result = $conn->query($ledger_query);
    
    
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
            <?php include "formLedger.php";?> <!---add Student popup--->

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
                                        <button type="button" id="addLedgerBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addLedgerModal">
                                            Add New Ledger
                                        </button>
                                    </div>
                                </div>
                                <h3 class="page-title">Ledger List</h3>   
                            </div>
                        </div>
                    </div>

             
             
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Ledger Type</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                <?php  

                    $i =1;

                    while ($row = $ledger_result->fetch_assoc()) {
                        $id = $row['led_id'];
                        

            ?>

            <tr>
                        <td scope="row"><?php echo $i ; $i++ ?></td>
                        <td><?php echo $row['led_category'] ?></td>
                        <td><?php echo $row['led_type'] ?></td>
                        
                        <td>
                            <?php if ($user_role == 'Admin') { ?>
                                <button  class="btn btn-circle btn-warning text-white modalBtn" onclick="editelective(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editLedgerModal"><i class='bi bi-pencil-square'></i></button>
                                <button class="btn btn-circle btn-danger text-white" onclick="goDeleteElective(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                            <?php } else { ?>
                                <button  class="btn btn-circle btn-warning text-white modalBtn" onclick="editelective(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editLedgerModal"><i class='bi bi-pencil-square'></i></button>
                            <?php } ?>

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
    
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> -->
  <script src="assets/addlink/sweetalert.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-------Start Add Student--->
  
    <script>
    
                        
    $('#addLedgerBtn').click(function() {
        $('#addLedger').removeClass('was-validated');
        $('#addLedger').addClass('needs-validation');
        $('#addLedger')[0].reset(); // Reset the form
        
    });


    // edit function -------------------------
function editelective(editId) {
   

    $.ajax({
        url: 'action/actLedger.php',
        method: 'POST',
        data: {
            editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            $('#editLedger').removeClass('was-validated');
            $('#editLedger').addClass('needs-validation');
            $('#editid').val(response.led_id);
            $('#editLedgertype').val(response.led_type);
            

                    },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}




     // Ajax form submission
$('#addLedger').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    var form = this; // Get the form element
    var submitButton = $('#submitLedgerBtn'); // Adjust the selector to your actual submit button's ID or class

    // Disable the submit button to prevent double-click
    submitButton.prop('disabled', true);

    if (form.checkValidity() === false) {
        // If the form is invalid, display validation errors
        form.reportValidity();

        // Re-enable the submit button if the form is invalid
        submitButton.prop('disabled', false);
        return;
    }

    var formData = new FormData(form);

    $.ajax({
        url: 'action/actLedger.php',
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
                    $('#addLedgerModal').modal('hide');
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
            // Re-enable the submit button after processing
            submitButton.prop('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle error response
            alert('Error adding ledger: ' + textStatus);

            // Re-enable the submit button on error
            submitButton.prop('disabled', false);
        }
    });
});



        //Edit Student Ajax


        document.addEventListener('DOMContentLoaded', function() {
    $('#editLedger').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = this; // Get the form element
        var submitButton = $('#updateBtn'); // Adjust the selector to your actual submit button's ID or class

        // Disable the submit button to prevent double-click
        submitButton.prop('disabled', true);

        if (form.checkValidity() === false) {
            // If the form is invalid, display validation errors
            form.reportValidity();
            // Re-enable the submit button if the form is invalid
            submitButton.prop('disabled', false);
            return;
        }

        var formData = new FormData(form);
        
        $.ajax({
            url: "action/actLedger.php",
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response) {
                // Handle success response
                
                // console.log(response);
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        timer: 2000
                    }).then(function() {
                        $('#editLedgerModal').modal('hide'); // Close the modal
                        $('.modal-backdrop').remove(); // Remove the backdrop   
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
                // Re-enable the submit button after processing
                submitButton.prop('disabled', false);
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while editing Ledger data.'
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
    if(confirm("Are you sure you want to delete Ledger Type?"))
    {
      $.ajax({
        url: 'action/actLedger.php',
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



