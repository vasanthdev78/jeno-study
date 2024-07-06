<?php
session_start();
include("db/dbConnection.php");  
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

                <!-- Start Content-->
                <div class="container-fluid">

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
                                        <button type="button" id="addInvoiceBtn" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#collegeStoreModal">
                                            Add New Invoice
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Invoice</h4>   
                            </div>
                        </div>
                    </div>

             
                               
               
                    <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile No</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
           
                <?php 
             $select_sql="Select * from invoice";
             $result = $conn->query($select_sql);
             if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    
                    $id = $row["inv_id"];
                    $detaile= $row["invoice_dateile"];
                    $formData = json_decode($row["invoice_dateile"], true);
                    // echo $formData["rollNo"];
           
             ?>   
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $formData["Name"]; ?></td>
                <td><?php echo $formData["MobileNo"]; ?></td>
                <td><?php echo $formData["Address"]; ?></td>
                <td><button class="btn btn-primary" onclick="goeditInvoice(<?php echo $id ?>)" data-bs-toggle="modal" data-bs-target="#editPayment"><i class="bi bi-pencil-square"></i></button></td>
                <td><button class="btn btn-primary" onclick="gotoDetailExpense(<?php echo $id ?>)"><i class="bi bi-box-arrow-down"></i></button></td>

                
            </tr>
           
      <?php  }
            } else {
                echo "0 results";
            } ?>
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
    <?php include "theme.php"?>

    <?php include "editinvoice.php"?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script src="js/function.js"></script>

</body>
</html>

<div class="modal fade" id="collegeStoreModal" tabindex="-1" role="dialog" aria-labelledby="collegeStoreModalLabel" aria-hidden="true">
  
        <div class="modal-dialog modal-full-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="collegeStoreModalLabel">Roriri Software Solutions </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <form id="myForm"  action="process.php" method="POST">
                            <div class="row">
                                <div class="form-group p-1 col-12 col-sm-4">
                                    <label for="Name"><h6>Name :</h6></label>
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group p-1 col-12 col-sm-4">
                                    <label for="Address"><h6>Address </h6></label>
                                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address" required>
                                </div>
                                <div class="form-group p-1 col-12 col-sm-4">
                                    <label for="mobileNo"><h6>Mobile No</h6></label>
                                    <input type="number" class="form-control" id="mobileNo" name="mobileNo" placeholder="Enter mobileNo" required>
                                </div>
                                <div class="form-group p-1 col-12 col-sm-4">
                                    <label for="gstno"><h6>GST No</h6></label>
                                    <input type="text" class="form-control" id="gstno" name="gstno" placeholder="Enter GST NO" required>
                                </div>
                              
                                <div class="form-group p-1 col-12 col-sm-4">
                                    <label for="Amount"><h6>GST :</h6></label>
                                    <select name="gst" class="form-control" id="gst">
                                        <option value="IGST">IGST</option>
                                        <option value="SGST-CGST">SGST-CGST</option> 
                                    </select>
                                </div>

                            </div>
                            <div id="product"></div>
                            <div class="form-group p-1 col-12 col-sm-4">
                                <button type="button" class="btn btn-success" id="addProductBtn"><i class="bi bi-plus-circle-dotted"></i> Product</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Invoice</button>
                        </form>
                </div>
            </div>
       
        </div>
    </div>

    
    
    <script>
        document.getElementById('addProductBtn').addEventListener('click', function() {
            var productRow = document.createElement('div');
            productRow.className = 'row product-row';
            productRow.innerHTML = `
            <div class="form-group p-1 col-3">
                    <label for="Technologies"><h6>Description:</h6></label>
                    <input type="text" class="form-control" id="Technologies" name="Technologies[]" placeholder="Enter Technologies">
                </div>
                <div class="form-group p-1 col-2">
                    <label for="itemName"><h6>Quantity:</h6></label>
                    <input type="text" class="form-control" name="Particulars[]" placeholder="Enter Particulars" required>
                </div>
                <div class="form-group p-1 col-3">
                                    <label for="Amount"><h6>Unit Price:</h6></label>
                                    <input type="number" class="form-control" id="Amount" name="Amount[]" placeholder="Enter Amount" required>
                    </div>
                    <div class="form-group p-1 col-2">
                                    <label for="ssncode"><h6>SSN code</h6></label>
                                    <input type="number" class="form-control" id="ssncode" name="ssncode[]" placeholder="Enter SSN Code" required>
                                </div>
                <div class="form-group pt-4 col-2">
                    <button type="button" class="btn btn-circle btn-danger text-white deleteBtn"><i class="bi bi-trash"></i></button>
                </div>
            `;
            document.getElementById('product').appendChild(productRow);

            // Attach event listener to the delete button within the newly created row
            productRow.querySelector('.deleteBtn').addEventListener('click', function() {
                productRow.remove(); // Remove the row when delete button is clicked
            });
        });
        function gotoDetailExpense(id)
{
    //alert(id);
    window.location.href = "saveinvoice.php?empId="+id;
}

function goeditInvoice(editId)
{ 
      $.ajax({
        url: 'geteditInvoice.php',
        method: 'POST',
        data: {
          editId: editId
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {

            console.log(response[0].inv_id); // Accessing the first row's inv_id
            console.log(response[0].invoice_dateile); // Accessing the first row's invoice_dateile
            $('#invid').val(response[0].inv_id);
            $('#invname').val(response[0].invoice_dateile.Name);
            $('#invaddress').val(response[0].invoice_dateile.Address);
            $('#invmobileNo').val(response[0].invoice_dateile.MobileNo);
            $('#invgstno').val(response[0].invoice_dateile.gstno);
            $('#invgst').val(response[0].invoice_dateile.gst);


            // Clear existing input fields
            $('#invssncodeContainer').empty();
            $('#invtechnologiesContainer').empty();
            $('#invparticularsContainer').empty();
            $('#invamountContainer').empty();

            // Create input fields for ssncode
            response[0].invoice_dateile.ssncode.forEach(function(item) {
                $('#invssncodeContainer').append('<label for="addfees" class="form-label"><b>SSN Code</b></label><input type="text" class="form-control" name="ssncode[]" value="' + item + '">');
            });

            // Create input fields for Technologies
            response[0].invoice_dateile.Technologies.forEach(function(item) {
                $('#invtechnologiesContainer').append('<label for="addfees" class="form-label"><b>Description :</b></label><input type="text" class="form-control" name="technologies[]" value="' + item + '">');
            });

            // Create input fields for Particulars
            response[0].invoice_dateile.Particulars.forEach(function(item) {
                $('#invparticularsContainer').append('<label for="addfees" class="form-label"><b>Quantity</b></label><input type="text" class="form-control" name="particulars[]" value="' + item + '">');
            });

            // Create input fields for Amount
            response[0].invoice_dateile.Amount.forEach(function(item) {
                $('#invamountContainer').append('<label for="addfees" class="form-label"><b>Unit Price</b></label><input type="text" class="form-control" name="amount[]" value="' + item + '">');
            });
        
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    
}
    </script>
    




