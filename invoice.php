<?php
session_start(); 
include "db_config.php" 
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
<body id="landing" class="sidebar-open">
  <div class="loading">
    <div class="loading-center"><img src="img/Connect.png" alt="Loading" /></div>
  </div>
  <div class="page-container animsition">
    <div id="dashboardPage">
      <!-- Top bar -->
      <div class="topbar"><?php include("top.php"); ?></div>
      <!-- Side Menu -->
      <div class="sidebar"><?php include("left.php"); ?></div>
      <main>
        <div class="page-breadcrumb"><?php if(isset($_SESSION['message']) && $_SESSION['message'] != "") { ?>
          <h1 class="session"><?php echo $_SESSION['message']; $_SESSION['message'] = ""; ?></h1>
          <?php } ?></div>
          <div id="clientDetail"></div>
        <div class="container-fluid">
          <div class="row" id="clientPage">
            <div class="col-sm-12">
              <div class="card" id="client">
                <div class="card-body">
                  <!-- title -->
                  <div class="d-md-flex align-items-center">
                    <div ><h1>Invoice</h1></div>
                    
                    <div class="ml-auto"><button type="button" class="fourth" data-toggle="modal" data-target="#collegeStoreModal">Add Invoice</button></div>
                    
                  </div>
                  <!-- title -->
                </div>
                
                
                <div class="container mt-5">
             <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Mobile No</th>
                <th>Address</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
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
                <td><?php echo $id ?></td>
                <td><?php echo $formData["Name"]; ?></td>
                <td><?php echo $formData["MobileNo"]; ?></td>
                <td><?php echo $formData["Address"]; ?></td>
                <td><button class="btn btn-primary" onclick="gotoDetailExpense(<?php echo $id ?>)"><i class="fas fa-download"></i> </button></td>

                
            </tr>
           
      <?php  }
            } else {
                echo "0 results";
            } ?>
        </tbody>
    </table>
</div>
                
              </div>
            </div>
          </div>
        </div>
      


         <?php include('footer.php'); ?>

         
      </main>
    </div>

  </div>
  <?php include("addClient.php"); ?>
  <?php include("editClient.php"); ?>

<!-- Le Javascript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://bootadmin.org/scripts/vendor/bootstrap.min.js"></script>
<script src="https://bootadmin.org/scripts/vendor/library.min.js"></script>
<script src="https://bootadmin.org/scripts/core/main.js"></script>
<script src="js/dataTables.bundle.js"></script>
<script src="js/table/datatable.js"></script>

<!-- Modal -->
<div class="modal fade" id="collegeStoreModal" tabindex="-1" role="dialog" aria-labelledby="collegeStoreModalLabel" aria-hidden="true">
  
        <div class="modal-dialog modal-full-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="collegeStoreModalLabel">Roriri Software Solutions </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                                    <label for="Amount"><h6>GST :</h6></label>
                                    <select name="gst" id="gst">
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
            <div class="form-group p-1 col-12 col-sm-3">
                    <label for="Technologies"><h6>Description:</h6></label>
                    <input type="text" class="form-control" id="Technologies" name="Technologies[]" placeholder="Enter Technologies">
                </div>
                <div class="form-group p-1 col-12 col-sm-3">
                    <label for="itemName"><h6>Quantity:</h6></label>
                    <input type="text" class="form-control" name="Particulars[]" placeholder="Enter Particulars" required>
                </div>
                
                <div class="form-group p-1 col-12 col-sm-3">
                                    <label for="Amount"><h6>Unit Price:</h6></label>
                                    <input type="number" class="form-control" id="Amount" name="Amount[]" placeholder="Enter Amount" required>
                    </div>
                <div class="form-group pt-4 col-12 col-sm-2">
                    <button type="button" class="btn btn-circle btn-danger text-white deleteBtn"><i class="bi bi-trash"></i></button>
                </div>
            `;
            document.getElementById('product').appendChild(productRow);

            // Attach event listener to the delete button within the newly created row
            productRow.querySelector('.deleteBtn').addEventListener('click', function() {
                productRow.remove(); // Remove the row when delete button is clicked
            });
        });
    </script>
    <!-- <script src="js/function.js"></script> -->

   <script>
  function gotoDetailExpense(id)
{
    //alert(id);
    window.location.href = "saveinvoice.php?empId="+id;
}

   </script>