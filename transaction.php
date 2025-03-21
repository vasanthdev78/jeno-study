<?php
session_start();
include "class.php"; // function page
include "db/dbConnection.php"; //database connection
    $centerId = $_SESSION['centerId'];
    $ledgerTable = ledgerTable($centerId);
    // $transactionResult = transactionTable($centerId);
    $current_date = date('Y-m-d');
    // Create a DateTime object for the current date
    $date = new DateTime($current_date);

    // Subtract one day from the current date
    $date->modify('-1 day');

    // Get the modified date in 'Y-m-d' format
    $previous_date = $date->format('Y-m-d');
    $openingBalance = getTransactionAmounts($centerId,$current_date); // show transaction ditails
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>
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
            <?php include "formTransaction.php";?>

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
                                        <button type="button" id="addEnquiryBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addaddTransactionModal">
                                            Add New Transaction
                                        </button>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                <h3 class="page-title col-2">Transaction</h3> 
                                <h4 class="col-10 mt-4 text-success">Today Opening Balance - Cash : <span class="text-info"><?php echo '₹ ' . number_format($openingBalance['cash_total'], 2); ?></span> Online : <span class="text-info"><?php echo '₹ ' .number_format($openingBalance['online_total'], 2); ?></span></h4>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>

             
                    <div class="table-responsive">
                    <table id="transationTable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                            <th scope="col">S.No.</th>
                            <th scope="col">Transaction Type</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
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

<!-- App js -->
<script src="assets/js/app.min.js"></script>

<script>

var transationTable; // Declare globally
    $(document).ready(function () {

        transationTable = $('#transationTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: 'action/actTransaction.php',
                type: 'GET',
                data: function (d) {
                    d.location = <?= $centerId; ?>; // Pass centerId
                    d.transationTable = 'transationTable'; // Pass year filter
                },
            },
            columns: [
                { data: 'serial_number' },
                { data: 'tran_category' },
                { data: 'tran_reason' },
                { data: 'tran_amount' },
                { data: 'tran_date' },
                { data: 'tran_method' },
                { data: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'asc']],
            responsive: true,
        });
    });
    
</script>

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

    // Function to set the max attribute to today's date
    function setMaxDate() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').setAttribute('max', today);
            document.getElementById('editDate').setAttribute('max', today);
        }

        // Call setMaxDate when the window loads
        window.onload = setMaxDate;

      

    </script>

    <script>

    
            // Function to handle editing a transaction
            function editTran(editId) {

                $('#editTransaction').removeClass('was-validated');
                $('#editTransaction').addClass('needs-validation');

                $.ajax({
                    url: 'action/actTransaction.php',
                    method: 'POST',
                    data: { editId: editId },
                    dataType: 'json', // Specify the expected data type as JSON
                    success: function(response) {
                        console.log(response); // Debugging console log
                        $('#editTransactionId').val(response.tran_id);
                        $('#editCategory').val(response.tran_category);


                          // Fetch categories for the dropdown
                $.ajax({
                    url: 'action/actTransaction.php',
                    method: 'POST',
                    data: {
                        Category_name: response.tran_category // Fixed syntax: use key-value pair correctly
                         },
                    dataType: 'json',
                    success: function(categories) {
                        let options = '<option value="">Select Ledger Type</option>';
                        categories.forEach(category => {
                            
                            options += `<option value="${category.led_id}">${category.led_type}</option>`;
                        });
                        $('#editLedgerType').html(options);
                        $('#editLedgerType').val(response.tran_reason);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching categories:', error);
                    }
                });



                        $('#editIncomeReason').val(response.tran_reason);
                        $('#editDate').val(response.tran_date);
                        $('#editAmount').val(response.tran_amount);
                        $('#editPaidMethod').val(response.tran_method);
                        $('#editTranId').val(response.tran_transaction_id);
                        $('#editDescription').val(response.tran_description);
                        $('#editPaymentType').val(response.tran_pay_type);

                    // Parse transaction date
                    const transactionDate = new Date(response.tran_date);
                    const today = new Date();

                    // Reset time components to midnight for accurate date-only comparison
                    transactionDate.setHours(0, 0, 0, 0);
                    today.setHours(0, 0, 0, 0);

                    // Toggle readonly property based on date comparison
                    if (transactionDate.getTime() === today.getTime()) {
                        $('#editAmount').prop('readonly', false); // Make editable
                    } else {
                        $('#editAmount').prop('readonly', true); // Make read-only
                    }


            //             if (response.tran_reason) {
            //     $('#editExpenseReason').show();
            //     $('#editexpenseReasonInput').val(response.tran_reason);
            // } else {
            //     $('#editExpenseReason').hide();
            //     $('#editexpenseReasonInput').val(''); // Clear the field
            // }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', status, error); // Debugging console log
                    }
                });
            }
  




             //Edit update Enquiry form Ajax

             document.addEventListener('DOMContentLoaded', function() {
    $('#editTransaction').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var form = this; // Get the form element
        if (form.checkValidity() === false) {
            // If the form is invalid, display validation errors
            form.reportValidity();
            return;
        }

        var formData = new FormData(this);

        // Disable the update button to prevent double clicks
        $('#updateBtn').prop('disabled', true);

        $.ajax({
            url: "action/actTransaction.php",
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
                        $('#editExpenseModal').modal('hide'); // Close the modal
                        $('.modal-backdrop').remove(); // Remove the backdrop   
                        transationTable.ajax.reload(null, false);
                        
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
                    text: 'An error occurred while editing Enquiry data.'
                });
            },
            complete: function() {
                // Re-enable the update button after processing (success or error)
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
});





  


 
</script>

  <script>

$('#category').change(function() {
        var category = $(this).val();
        
        if (category === "") {
            $('#ledgerType').html('<option value="">--Select Ledger Type--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actTransaction.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { Category_name: category },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select Ledger Type--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.led_id + '">' + course.led_type + '</option>';
                });
                $('#ledgerType').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });


    $('#editCategory').change(function() {
        var category = $(this).val();
        
        if (category === "") {
            $('#editLedgerType').html('<option value="">--Select Ledger Type--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actTransaction.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { Category_name: category },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select Ledger Type--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.led_id + '">' + course.led_type + '</option>';
                });
                $('#editLedgerType').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });

      $('#addEnquiryBtn').click(function() {

      $('#addTransaction').removeClass('was-validated');
      $('#addTransaction').addClass('needs-validation');
      $('#addTransaction')[0].reset(); // Reset the form
    //   $('#ledgerType').val('');
    $('#ledgerType').html('<option value="">--Select Ledger Type--</option>'); // Reset ledger type dropdown

      });

      $('#backButtonTransaction').click(function() {
      $('#transactionView').addClass('d-none');
      $('#StuContent').show();

      });


       // Ajax form submission
$('#addTransaction').submit(function(event) {
    event.preventDefault(); // Prevent default form submission

    var form = this; // Get the form element
    if (form.checkValidity() === false) {
        // If the form is invalid, display validation errors
        form.reportValidity();
        return;
    }
    
    var formData = new FormData(this);

    // Disable the submit button to prevent double clicks
    $('#submitBtn').prop('disabled', true); // Replace '#submitBtn' with your actual submit button ID

    $.ajax({
        url: 'action/actTransaction.php',
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
                    $('#addaddTransactionModal').modal('hide');
                    transationTable.ajax.reload(null, false);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle error response
            alert('Error adding Enquiry: ' + textStatus);
        },
        complete: function() {
            // Re-enable the submit button after processing (success or error)
            $('#submitBtn').prop('disabled', false); // Replace '#submitBtn' with your actual submit button ID
        }
    });
});




        
        
    //----delete ---
    function goDeleteTransaction(id)
        {
    //alert(id);
    if(confirm("Are you sure you want to delete Transaction?"))
    {
      $.ajax({
        url: 'action/actTransaction.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            transationTable.ajax.reload(null, false);
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
    }

        
          

     //------view page -----------------------------


     function goViewTransaction(id)
{
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'action/actTransaction.php',
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          
          $('#StuContent').hide();
          $('#transactionView').removeClass('d-none');
        
          $('#viewCategory').text(response.tran_category);
          $('#viewExpenseReason').text(response.tran_reason);
          $('#viewDate').text(response.tran_date);
         // Assuming response.tran_amount is a numeric value or a string representing a number
        const amount = parseFloat(response.tran_amount); // Convert to number if it's a string
        $('#viewAmount').text('₹ ' + amount.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));

          $('#viewPaidMethod').text(response.tran_method);
          $('#viewPaidType').text(response.tran_pay_type);
          $('#viewTransactionId').text(response.tran_transaction_id);
          $('#viewDescription').text(response.tran_description);

        // Show the receipt div and update the href attribute if the category is 'Income'
         if (response.tran_category === 'Income') {
                $('#incomeReceiptDiv').removeClass('d-none'); // Show the div and remove d-none class
                $('#incomeReceipt').attr('href', 'action/actIncomeReceipt.php?tran_id=' + response.tran_id);
            } else{
                $('#incomeReceiptDiv').addClass('d-none'); // Show the div and remove d-none class
            }
    

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



