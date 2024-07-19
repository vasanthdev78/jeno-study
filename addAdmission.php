
                <!-- Start Content-->
                <div class="container-fluid d-none" id="addAdmissionModal">
                <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="header-title">Admission Progress</h4>
                                            <button type="button" id="backToMainBtn" class="btn btn-secondary">
                                                Back to Main
                                            </button>
                                        </div>
                                        <form class="needs-validation" novalidate name="frmAddAdmission" id="addAdmission" enctype="multipart/form-data">
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                            <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Primary Info</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 py-1">
                                                            <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                                            <span class="d-none d-sm-inline">Seccondry Info</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            
                                                <div class="tab-content b-0 mb-0">

                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>
                                            
                                                    <div class="tab-pane" id="account-2">
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="stuName" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="stuName" id="stuName" required="required">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="mobileNo" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mobile No" name="mobileNo" id="mobileNo" required="required">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                                <label for="email" class="form-label"><b>Email</b></label>
                                                                <input type="email" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Email Id" name="email" id="email" required="required">
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
                                                            <label for="medium" class="form-label"><b>Medium </b><span class="text-danger">*</span></label>
                                                            <select class="form-control" name="medium" id="medium" required="required">
                                                            <option value="">--Select the Medium--</option>
                                                            <option value="BBA">Tamil</option>
                                                            <option value="MBA">English</option>
                                                            <option value="BCA">Others</option>

                                                            </select>
                                                            </div>
                                                            </div>

                                                        </div> <!-- end row -->

                                                        <ul class="list-inline wizard mb-0">
                                                            <li class="next list-inline-item float-end">
                                                                <a href="javascript:void(0);" class="btn btn-info">Add More Info <i class="ri-arrow-right-line ms-1"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="tab-pane" id="profile-tab-2">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                            <div class="form-group">
                                                            <label for="yearType" class="form-label"><b>Year Type</b></label>
                                                            <select class="form-control" name="yearType" id="yearType" >
                                                            <option value="">--Select the Type--</option>
                                                            <option value="1">Academic Year</option>
                                                            <option value="2">Calander Year</option>

                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group">
                                                            <label for="language" class="form-label"><b>Language / Elective </b></label>
                                                            <select class="form-control" name="language" id="language" >
                                                            <option value="">--Select the Paper--</option>
                                                            <option value="Tamil">Tamil</option>
                                                            <option value="English">English</option>
                                                            <option value="English">Malayalam</option>
                                                            <option value="arabic">Arabic</option>

                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="digilocker" class="form-label"><b>Digilocker</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Digilocker Id" name="digilocker" id="digilocker" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="admitDate" class="form-label"><b>Admission Date</b></label>
                                                            <input type="date" class="form-control" placeholder="Enter Date of Admission" name="admitDate" id="admitDate" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="dob" class="form-label"><b>Date of Birth</b></label>
                                                            <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" id="dob" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="gender" class="form-label"><b>Gender</b></label>
                                                            <select class="form-control" id="gender" name="gender" >
                                                            <option>--Select the Gender--</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Transgender">Transgender</option>
                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                            <div class="form-group pb-1">
                                                            <label for="address" class="form-label"><b>Address</b></label>
                                                            <textarea class="form-control" placeholder="Enter Address" name="address" id="address" ></textarea>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="pincode" class="form-label"><b>Pincode</b></label>
                                                            <input type="text" class="form-control" pattern="^\d{6}$" title="Please enter a 6-digit pincode" placeholder="Enter Pincode" name="pincode" id="pincode" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="fathername" class="form-label"><b>Father Name</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Father Name" name="fathername" id="fathername">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="mothername" class="form-label"><b>Mother Name</b> </label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mother Name" name="mothername" id="mothername" >
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="aadharNumber" class="form-label"><b>Aadhar Number</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aadhar Number" name="aadharNumber" id="aadharNumber" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="nationality" class="form-label"><b>Nationality</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Nationality" name="nationality" id="nationality" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="motherTongue" class="form-label"><b>Mother Tongue</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mother Tongue" name="motherTongue" id="motherTongue" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="religion" class="form-label"><b>Religion</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Religion" name="religion" id="religion" >
                                                            </div>
                                                            </div>


                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="caste" class="form-label"><b>Caste</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Caste" name="caste" id="caste">
                                                            </div>
                                                            </div>


                                                            <div class="col-sm-4">
                                                            <div class="form-group pb-1">
                                                            <label for="community" class="form-label"><b>Community</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group">
                                                            <label for="marital" class="form-label"><b>Marital Status</b></label>
                                                            <select class="form-control" name="marital" id="marital">
                                                            <option value="">--Select the Marital Status--</option>
                                                            <option value="1">Single</option>
                                                            <option value="2">Married</option>
                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group">
                                                            <label for="empoloyed" class="form-label"><b>Empoloyed</b></label>
                                                            <select class="form-control" name="empoloyed" id="empoloyed" >
                                                            <option value="">--Select the Empoloyed--</option>
                                                            <option value="1">Yes</option>
                                                            <option value="2">No</option>

                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="qualifiaction" class="form-label"><b>Highest Qualifiaction</b></label>
                                                            <select class="form-control" id="qualifiaction" name="qualifiaction" >
                                                            <option>--Select the Qualifiaction--</option>
                                                            <option value="1">Diploma</option>
                                                            <option value="2">12TH</option>
                                                            <option value="3">UG</option>
                                                            <option value="4">PG</option>
                                                            </select>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="previous" class="form-label"><b>Previous College / School Studied</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Previous College / School Studied" name="previous" id="previous" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="completed" class="form-label"><b>Year Of Completed</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Year Of Completed" name="completed" id="completed" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="study" class="form-label"><b>Major Field Of Study</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Major Field Of Study" name="study" id="study" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="grade" class="form-label"><b>CGPA / Grade</b></label>
                                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter CGPA / Grade" name="grade" id="grade" >
                                                            </div>
                                                            </div>


                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="sslc" class="form-label"><b>SSLC Marksheet</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter SSLC" name="sslc" id="sslc">
                                                            </div>
                                                            </div>



                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="hsc" class="form-label"><b>HSC Marksheet</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter HSC" name="hsc" id="hsc" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6"> 
                                                            <div class="form-group pb-1">
                                                            <label for="community" class="form-label"><b>Community Certificate</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" >
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="tc" class="form-label"><b>Transfer Certificate</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter TC" name="tc" id="tc" >
                                                            </div>
                                                            </div>


                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="aadhar" class="form-label"><b>Aathar Card</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aadhar" name="aadhar" id="aadhar">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                            <div class="form-group pb-1">
                                                            <label for="photo" class="form-label"><b>Passport Size Photo</b></label>
                                                            <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Photo" name="photo" id="photo" >
                                                            </div>
                                                            </div>

                                                            </div> <!-- end row -->
                                                        <ul class="pager wizard mb-0 list-inline">
                                                            <li class="previous list-inline-item">
                                                                <button type="button" class="btn btn-light"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
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
                </div> <!-- content -->


            <!-- --------------------------------------- -->


            <!----------------------------------------->
      
            
  