<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT student_tbl.*
    , payment_tbl.*
    , course_tbl.*
    FROM student_tbl
    LEFT JOIN
        payment_tbl ON payment_tbl.stu_id=student_tbl.stu_id
    LEFT JOIN
        course_tbl ON course_tbl.course_id=student_tbl.course_id
    WHERE 
        student_tbl.stu_status='Active'
        AND payment_tbl.payment_status='Active'
        AND student_tbl.entity_id=1";
    $resQuery = mysqli_query($conn , $selQuery); 
    
?>  

<!DOCTYPE html>
<html lang="en">

<?php include "head.php"?>
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
            <div id="paymentDetail"></div>


                <!-- Start Content-->
                <div class="container-fluid" id="paymentContent">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-flower">
                                <img src="assets/images/flowers/img-3.png">
                            </div>

                            <div class="bg-flower-2">
                                <img src="assets/images/flowers/img-1.png">
                            </div>
        
                            
                        </div>
                    </div>

            
             <?php include("editPayment.php"); ?>
             
               
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Course Charge</th>
                                    <th scope="col">Amount Received</th>
                                    <th scope="col">Balance</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                        $id = $row['pay_id'];
                        $fname = $row['first_name'];
                        $lname=$row['last_name'];
                        $course_name=$row['course_name'];
                        $course_duration=$row['course_month'];
                        $charge=$row['charge'];
                        $amount_received=$row['amount_received'];
                        $name=$fname." ".$lname;
                        $balance=$charge-$amount_received;
                        ?>
                     <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $course_name; ?></td>
                       
                        <td><?php echo $charge; ?></td> 
                        <td><?php echo $amount_received; ?></td>
                        <td><?php echo $balance; ?></td> 
                        
                        
                    
                        <td>
                            <button class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditPayment(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editPayment"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewPayment(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                           
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
  <?php include("theme.php"); ?> 

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
    <script src="js/function.js"></script>

</body>



</html>



<script>
    
//------------------Start add Client -------------------------------
$(document).ready(function() {

function resetForm(formId) {
  document.getElementById(formId).reset(); // Reset the form
}


  //--- start edit form update --------------------------
  $('#editpaymentform').off('submit').on('submit', function(e) {
        e.preventDefault(); // Prevent the form from submitting normally

        var formData = new FormData(this);
        alert(formData);
        $.ajax({
            url: "action/actPayment.php",
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
                        $('#editPayment').modal('hide'); // Close the modal
                        
                        $('.modal-backdrop').remove(); // Remove the backdrop   
                          $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                               
                              $('#scroll-horizontal-datatable').DataTable().destroy();
                               
                                $('#scroll-horizontal-datatable').DataTable({
                                  
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
                    text: 'An error occurred while Edit employee data.'
                });
                // Re-enable the submit button on error
                $('#updateBtn').prop('disabled', false);
            }
        });
    });
    //----end edit page update--------------------------------
 
});





function goViewPayment(id)
{
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'paymentDetail.php',
        method: 'POST',
        data: {
            id: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          $('#paymentContent').hide();
          $('#paymentDetail').html(response);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}
function goEditPayment(editId)
{ 
      $.ajax({
        url: 'action/actPayment.php',
        method: 'POST',
        data: {
          editId: editId
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

            $('#payeditid').val(response.pay_id);
            let name = response.first_name + " " + response.last_name;
            $('#studentname').val(name);
            $('#coursename').val(response.course_name);
            $('#coursefees').val(response.course_fees);
            $('#monthduration').val(response.course_month + " Months");
            $('#balancefees').val(response.amount_received);

            $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
                $('#scroll-horizontal-datatable').DataTable().destroy();
                $('#scroll-horizontal-datatable').DataTable();
     
                            });
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}

</script>

