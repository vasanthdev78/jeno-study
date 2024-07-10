<?php
session_start();
include("db/dbConnection.php");

$selQuery = "SELECT student_tbl.*, additional_details_tbl.*, course_tbl.* FROM student_tbl
LEFT JOIN additional_details_tbl on student_tbl.stu_id=additional_details_tbl.stu_id
LEFT JOIN course_tbl on student_tbl.course_id=course_tbl.course_id
WHERE student_tbl.stu_status = 'Active' and student_tbl.entity_id=1";
$resQuery = mysqli_query($conn, $selQuery); 
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <?php include("top.php"); ?>
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
                    <div class="col-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Admission Progress </h4>

                                <form>
                                    <div id="progressbarwizard">
                                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                            <li class="nav-item">
                                                <a href="#Basic" data-bs-toggle="tab" class="nav-link rounded-0 py-1 active">
                                                    <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Basic Info</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Education" data-bs-toggle="tab" class="nav-link rounded-0 py-1">
                                                    <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Education</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#documents" data-bs-toggle="tab" class="nav-link rounded-0 py-1">
                                                <i class="bi bi-file-earmark-arrow-up"></i>
                                                    <span class="d-none d-sm-inline">Upload documents</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#payment" data-bs-toggle="tab" class="nav-link rounded-0 py-1">
                                                <i class="bi bi-paypal"></i>
                                                    <span class="d-none d-sm-inline">Payment</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div class="tab-content b-0 mb-0">
                                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.3333%;"></div>
                                            </div>

                                            <div class="tab-pane active show" id="Basic">
                                            <div class="row">

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="firstname" class="form-label"><b>First Name</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="firstname" id="firstname" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="lastname" class="form-label"><b>Last Name</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="lastname" id="lastname" required="required">
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="editDob" class="form-label"><b>Date of Birth</b><span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="Enter Date of Birth" name="editDob" id="editDob" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                        <div class="form-group pb-1">
                                            <label for="editGender" class="form-label"><b>Gender</b><span class="text-danger">*</span></label>
                                            <select class="form-control" id="editGender" name="editGender" required="required">
                                                <option>----select----</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                               </div>
                                           </div>

                                             <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="fathername" class="form-label"><b>Father Name</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Father Name" name="fathername" id="fathername" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="mothername" class="form-label"><b>Mother Name</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Father Name" name="mothername" id="mothername" required="required">
                                            </div>
                                            </div>

                                            
                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="nationality" class="form-label"><b>Nationality</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Nationality" name="nationality" id="nationality" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="motherTongue" class="form-label"><b>Mother Tongue</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mother Tongue" name="motherTongue" id="motherTongue" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="religion" class="form-label"><b>Religion</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Religion" name="religion" id="religion" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="caste" class="form-label"><b>Caste</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Caste" name="caste" id="caste" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="community" class="form-label"><b>Community</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="aatharNumber" class="form-label"><b>Aathar Number</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aathar Number" name="aatharNumber" id="aatharNumber" required="required">
                                            </div>
                                            </div> 

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                         <label class="form-label"><b>Marital Status</b></label><br>
                                                <div class="row">
                                                 <div class="col-sm-3">
                                                  <div class="form-check">
                                            <input class="form-check-input" type="radio" name="maritalStatus" id="single" value="Single" required>
                                                 <label class="form-check-label" for="single">
                                                 Single
                                                 </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="maritalStatus" id="married" value="Married" required>
                                                    <label class="form-check-label" for="married">
                                                        Married
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>


                                    
                                    <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                         <label class="form-label"><b>Empoloyed</b></label><br>
                                                <div class="row">
                                                 <div class="col-sm-3">
                                                  <div class="form-check">
                                            <input class="form-check-input" type="radio" name="employed" id="yes" value="yes" required>
                                                 <label class="form-check-label" for="yes">
                                                 Yes
                                                 </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="employed" id="no" value="no" required>
                                                    <label class="form-check-label" for="no">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                            
                                         <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="email" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Email" name="email" id="email" required="required">
                                            </div>
                                        </div>


                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="mobileNo" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mobile No" name="mobileNo" id="mobileNo" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                            <label for="address" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Address" name="address" id="address" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                          <div class="form-group pb-1">
                                        <label for="pincode" class="form-label"><b>Pincode</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\d{6}$" title="Please enter a 6-digit pincode" placeholder="Enter Pincode" name="pincode" id="pincode" required="required">
                                          </div>
                                          </div>

                                          <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="university" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="university" id="university" required="required">
                                        <option value="">--Select the University--</option>
                                        <option value="MS">MS University</option>
                                        <option value="Anna">Anna University</option>
                                        <option value="Alagappa">Alagappa University</option>
                                        <option value="UM">University Of Madras</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="course" id="course" required="required">
                                        <option value="">--Select the Course--</option>
                                        <option value="BBA">BBA</option>
                                        <option value="MBA">MBA</option>
                                        <option value="BCA">BCA</option>
                                        <option value="MCA">MCA</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Year</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Year--</option>
                                        <option value="1">1 st Year</option>
                                        <option value="2">2 nd Year</option>
                                        <option value="3">3 rd Year</option>
                                    </select>
                                </div>
                            </div>  


                                            </div> <!-- end row -->

                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-end">
                                                        <button type="button" class="btn btn-info" data-bs-target="#Education" data-bs-toggle="tab">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                    </li>
                                                </ul>
                                            </div>

                            <!-- ---------------------------tab pane 2--------------------------------------------- -->
                                            <div class="tab-pane" id="Education">
                                                <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                             <label class="form-label"><b>Medium Of Instuction</b></label><br>
                                                <div class="row">
                                                 <div class="col-sm-3">
                                                  <div class="form-check">
                                            <input class="form-check-input" type="radio" name="medium" id="tamil" value="tamil" required>
                                                 <label class="form-check-label" for="tamil">
                                                 Tamil
                                                 </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="medium" id="english" value="english" required>
                                                    <label class="form-check-label" for="english">
                                                        English
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="medium" id="others" value="others" required>
                                                    <label class="form-check-label" for="others">
                                                        Others
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group pb-1">
                                            <label for="qualifiaction" class="form-label"><b>Highest Qualifiaction</b></label>
                                            <select class="form-control" id="qualifiaction" name="qualifiaction" required="required">
                                                <option>----select----</option>
                                                <option value="12">12TH</option>
                                                <option value="ug">UG</option>
                                                <option value="pg">PG</option>
                                            </select>
                                               </div>
                                           </div>

                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label for="Previous" class="form-label"><b>Previous College / school Studied</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Previous College / school Studied" name="Previous" id="Previous" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label for="completed" class="form-label"><b>Year Of Completed</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Year Of Completed" name="completed" id="completed" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label for="study" class="form-label"><b>Major Field Of Study</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Major Field Of Study" name="study" id="study" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label for="grade" class="form-label"><b>CGPA / Grade</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter CGPA / Grade" name="grade" id="grade" required="required">
                                            </div>
                                        </div>


                                                </div> <!-- end row -->
                                                <ul class="pager wizard mb-0 list-inline">
                                                    <li class="previous list-inline-item">
                                                        <button type="button" class="btn btn-light" data-bs-target="#Basic" data-bs-toggle="tab"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                    </li>
                                                    <li class="next list-inline-item float-end">
                                                        <button type="button" class="btn btn-info" data-bs-target="#documents" data-bs-toggle="tab">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                    </li>
                                                </ul>
                                            </div>

                                   <!------------------------------------------------------------- ----------------- -->
                                            <div class="tab-pane" id="documents">
                                                <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label for="sslc" class="form-label"><b>SSLC Marksheet</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter SSLC" name="sslc" id="sslc" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group pb-1">
                                                <label for="hsc" class="form-label"><b>HSC Marksheet</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter HSC" name="hsc" id="hsc" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12"> 
                                        <div class="form-group pb-1">
                                                <label for="community" class="form-label"><b>Community Certificate</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group pb-1">
                                                <label for="tc" class="form-label"><b>Transfer Certificate</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter TC" name="tc" id="tc" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                        <div class="form-group pb-1">
                                                <label for="aathar" class="form-label"><b>Aathar Card</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aathar" name="aathar" id="aathar" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                        <div class="form-group pb-1">
                                                <label for="photo" class="form-label"><b>Passposrt Size Photo</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Photo" name="photo" id="photo" required="required">
                                            </div>
                                        </div>



                                        </div> <!-- end row -->
                                                <ul class="pager wizard mb-0 list-inline">
                                                    <li class="previous list-inline-item">
                                                        <button type="button" class="btn btn-light" data-bs-target="#Education" data-bs-toggle="tab"><i class="ri-arrow-left-line me-1"></i> Back to Account</button>
                                                    </li>
                                                    <li class="next list-inline-item float-end">
                                                        <button type="button" class="btn btn-info" data-bs-target="#payment" data-bs-toggle="tab">Add More Info <i class="ri-arrow-right-line ms-1"></i></button>
                                                    </li>
                                                </ul>
                                            </div>


                    <!-- //------------------------------------------payment ---------------------------------------------------------->
                                            <div class="tab-pane" id="payment">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group pb-1">
                                                        <label for="paymentMode"><b>Payment Mode</b></label>
                                                        <select class="form-control" id="paymentMode" name="paymentMode" required>
                                                            <option value="">----select----</option>
                                                            <option value="Online">Online</option>
                                                            <option value="Cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group pb-1">
                                                        <label for="transactionId"><b>Transaction Id</b></label>
                                                        <input type="number" class="form-control" id="transactionId" name="transactionId" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Transaction Id" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group pb-1">
                                                        <label for="editDob"><b>Paid Date</b></label>
                                                        <input type="date" class="form-control" id="editDob" name="editDob" placeholder="Enter Date of Birth" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group pb-1">
                                                        <label for="universityFees"><b>University Fees</b></label>
                                                        <input type="number" class="form-control" id="universityFees" name="universityFees" placeholder="Enter University Fees" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group pb-1">
                                                        <label for="studyCenterFees"><b>Study Center Fees</b></label>
                                                        <input type="number" class="form-control" id="studyCenterFees" name="studyCenterFees" placeholder="Enter Study Center Fees" required>
                                                    </div>
                                                </div>

                                            </div> <!-- end row -->

                                            <ul class="pager wizard mb-0 list-inline mt-1">
                                                <li class="previous list-inline-item">
                                                    <button type="button" class="btn btn-light" data-bs-target="#documents" data-bs-toggle="tab"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                                </li>
                                                <li class="next list-inline-item float-end">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </li>
                                            </ul>
                                        </div>




                                        </div> <!-- tab-content -->
                                    </div> <!-- end #progressbarwizard-->
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include("footer.php"); ?>
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

    <!-- Bootstrap JS (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

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

    <!-- Datatable Demo App js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        $(document).ready(function() {
            // Update progress bar width on tab change
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                var step = $(e.target).closest('.nav-item').index();
                var totalSteps = $('.nav-item').length;
                var percent = (step + 1) / totalSteps * 100;
                $('.progress-bar').css({width: percent + '%'});
            });

            // Handle next and previous buttons
            $('button[data-bs-target]').on('click', function() {
                var target = $(this).data('bs-target');
                $('a[href="' + target + '"]').tab('show');
            });
        });
    </script>

</body>
</html>
