<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT student_tbl.*,
    additional_details_tbl.*,
    course_tbl.*
     FROM student_tbl
    LEFT JOIN additional_details_tbl on student_tbl.stu_id=additional_details_tbl.stu_id
    LEFT JOIN course_tbl on student_tbl.course_id=course_tbl.course_id
    WHERE student_tbl.stu_status = 'Active' and student_tbl.entity_id=1";
    $resQuery = mysqli_query($conn , $selQuery); 
    
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
                                        <button type="button" id="addEnquiryBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                                            Add New Expense
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Expense</h4> 
                               
                            </div>
                        </div>
                    </div>

             <?php include("formExpense.php");?>
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Expense</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Ex. Date</th>
                                    <th scope="col">Bill Img</th>
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td>1</td>
                        <td>Current Bill</td>
                        <td>6000</td>
                        <td>10/07/2024</td>
                        <td></td>
                    
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editExpenseModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewStudent(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
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
    document.getElementById('paidMethod').addEventListener('change', function() {
        var paymentMethod = this.value;
        var onlinePaymentDetails = document.getElementById('onlinePaymentDetails');
        
        if (paymentMethod === 'online') {
            onlinePaymentDetails.style.display = 'block';
            document.getElementById('onlineTransactionId').setAttribute('required', 'required');
        } else {
            onlinePaymentDetails.style.display = 'none';
            document.getElementById('onlineTransactionId').removeAttribute('required');
        }
    });
</script>

  

    

</body>

</html>



