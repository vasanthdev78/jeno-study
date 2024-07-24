<?php
session_start();
    include("db/dbConnection.php");
    
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

              <?php include("formFees.php");?>

                <!-- Start Content-->
                <div class="container-fluid" id="feesContent">

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
                               
                                <h4 class="page-title">Fees List</h4>   
                            </div>
                        </div>
                    </div>
                    
                    
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">Payment Status</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                    
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    
                        <td>
                        
                           <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewPayment('2024a001');"><i class="bi bi-eye-fill"></i></button>
                            <button type="button" class="btn btn-circle btn-primary text-white modalBtn" onclick="goAddStudent(1);" data-bs-toggle="modal" data-bs-target="#addFeesModal"><i class='bi bi-credit-card'></i></button>
                            

                        </td>
                      </tr>
                        
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
$(document).ready(function() {
    

    // function goDownload(id) {
    //     alert(id);
    //     window.location.href = "action/actDownload.php?payment_id="+id;
    // }
});
</script>

    <script>


    $(document).ready(function() {
    


        function calculateTotalAndBalance() {
            var universityPaid = parseFloat($('#universityPaid').val()) || 0;
            var studyPaid = parseFloat($('#studyPaid').val()) || 0;
            var totalAmount = universityPaid + studyPaid;
            $('#totalAmount').val(totalAmount);

            var amountPaid = parseFloat($('#amountPaid').val()) || 0;
            // var balance = totalAmount - amountPaid;
            // $('#totalAmount').val(balance);
        }

        $('#universityPaid, #studyPaid, #amountPaid').on('input', calculateTotalAndBalance);
    });
</script>

<script>

    

$('#addCourseBtn').click(function() {

$('#addCourse').removeClass('was-validated');
$('#addCourse').addClass('needs-validation');
$('#addCourse')[0].reset(); // Reset the form
$('#fessType').val('');

});

$('#backButtonsubject').click(function() {
$('#clientDetail').addClass('d-none');
$('#feesContent').show();

});

function toggleDivs() {
    // Hide the client detail div
    document.getElementById('clientDetail').classList.add('d-none');
    $('#tableFees').show();
}


function goViewPayment(studentId) {
    $('#feesContent').hide();
    $('#clientDetail').removeClass('d-none');

    $.ajax({
        url: 'action/actFees.php', // Replace with your PHP file path
        type: 'GET', // or 'POST' depending on your PHP handling
        data: { studentId: studentId }, // Send student ID to fetch specific payment history
        dataType: 'json',
        success: function(response) {

                 // Assuming response.data contains payment history array
                var html = '';

          //       $('#feesid').val(paymentHistory.fee_id);
          // $('#studentId').val(paymentHistory.stu_id);
          $('#viewAdmisionId').text(response.pay_admission_id);
          $('#viewStudentName').text(response.pay_student_name);
          $('#ViewYear').text(response.pay_year);
          $('#viewUniversityTotalFees').text(response.fee_uni_fee_total);
          $('#viewStudyCenterTotalFees').text(response.fee_sdy_fee_total);
          $('#viewUniversityFees').text(response.fee_uni_fee);
          $('#viewStudyCenterFees').text(response.fee_sty_fee);
          $('#viewTotalFees').text(response.totalAmount);
          $('#viewTotalPaid').text(response.totalPaid);
          $('#viewBalance').text(response.balance);
         
          console.log(response.hostory_table);

        response.hostory_table.forEach(function(payment, index) {
    html += '<tr>';
    html += '<td>' + (index + 1) + '</td>'; // S.No.
    html += '<td>' + payment.pay_date + '</td>'; // Payment Date
    html += '<td>' + payment.pay_total_amount + '</td>'; // Amount Received
    html += '<td>' + payment.pay_paid_method + '</td>'; // Payment Method
    html += '<td>';
    html += '<a href="action/actDownload.php?payment_id='+ payment.pay_id +'"><button type="button" class="btn btn-primary"><i class="bi bi-box-arrow-down"></i></button></a>';
    <?php if ($user_role == 'Admin') { ?>
        html += '<button class="btn btn-circle btn-danger text-white gap-3" onclick="goDeleteCourse(' + payment.pay_id + ')"><i class="bi bi-trash"></i> </button>';
    <?php } ?>

    html += '</td>';
    html += '</tr>';
       });
                $('#paymentHistoryBody').html(html); // Append HTML to table body

                // Initialize DataTable
                $('#scroll-horizontal-datatable1').DataTable({
                    destroy: true, // Destroy existing instance before reinitializing
                    responsive: true,
                    scrollX: true
                });
           
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function toggleDivs() {
    $('#clientDetail').addClass('d-none');
    $('#tableFees').show();
}





    document.getElementById('paidMethod').addEventListener('change', function() {
        var paymentMethod = this.value;
        var onlinePaymentDetails = document.getElementById('onlinePaymentDetails');
        
        if (paymentMethod === 'Online') {
            onlinePaymentDetails.style.display = 'block';
            document.getElementById('onlineTransactionId').setAttribute('required', 'required');
        } else {
            onlinePaymentDetails.style.display = 'none';
            document.getElementById('onlineTransactionId').removeAttribute('required');
        }
    });

    function goAddStudent(addGetId)
    {
      $('#addFees').removeClass('was-validated');
    $('#addFees').addClass('needs-validation');
    $('#addFees')[0].reset(); // Reset the form
    //  $('#fessType').val('');
      
      $.ajax({
        url: 'action/actFees.php',
        method: 'POST',
        data: {
          addGetId: addGetId
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

          $('#feesid').val(response.fee_id);
          $('#studentId').val(response.stu_id);
          $('#admissionId').val(response.fee_admision_id);
          $('#studentName').val(response.stu_name);
          $('#year').val(response.stu_study_year);

          var uni_fee = response.fee_uni_fee_total - response.fee_uni_fee ;
          var sty_fee = response.fee_sdy_fee_total - response.fee_sty_fee ;
          
          $('#balance').val(uni_fee + sty_fee);

          
         
        
            // Function to get index based on study year
        function getIndexByStudyYear(studyYear) {
            switch (studyYear) {
                case "1st Year": return 0;
                case "2nd Year": return 1;
                case "3rd Year": return 2;
                case "4th Year": return 3;
                case "5th Year": return 4;
                default: return -1; // Invalid study year
            }
        }

        var index = getIndexByStudyYear(response.stu_study_year);

        if (index !== -1) {
            if (Array.isArray(response.cou_university_fess) && response.cou_university_fess.length > index) {
                $('#universityFees').text(response.cou_university_fess[index]); // Get the value at the specific index
            } else {
                console.error('cou_university_fess is not a valid array or does not have enough elements.');
            }
            if (Array.isArray(response.cou_study_fees) && response.cou_study_fees.length > index) {
                $('#studyFees').text(response.cou_study_fees[index]); // Get the value at the specific index
            } else {
                console.error('cou_study_fees is not a valid array or does not have enough elements.');
            }
        } else {
            console.error('Invalid study year.');
        }


        
      
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}



$('#addFees').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);
    $.ajax({
      url: "action/actFees.php",
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
            
                  $('#addFeesModal').modal('hide');
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
          text: 'An error occurred while adding Fees data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });



  function goDeleteCourse(id)
        {
    //alert(id);
    if(confirm("Are you sure you want to delete Fees Record?"))
    {
      $.ajax({
        url: 'action/actFees.php',
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



