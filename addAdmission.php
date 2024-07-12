
                <!-- Start Content-->
                <div class="container-fluid d-none" id="addAdmissionModal">
                    <div class="col-12">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="header-title">Admission Progress</h4>
                                    <button type="button" id="backToMainBtn" class="btn btn-secondary">
                                        Back to Main
                                    </button>
                                </div>
                                <form>
                                    <div id="progressbarwizard">
                                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                            <li class="nav-item">
                                                <a href="#Basic" data-bs-toggle="tab" class="nav-link rounded-0 py-1 active">
                                                    <i class="ri-account-circle-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Primary Info</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#Education" data-bs-toggle="tab" class="nav-link rounded-0 py-1">
                                                    <i class="ri-profile-line fw-normal fs-18 align-middle me-1"></i>
                                                    <span class="d-none d-sm-inline">Seccondry Info</span>
                                                </a>
                                            </li>
                                            
                                        </ul>

                                        <div class="tab-content b-0 mb-0">
                                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 50.0000%;"></div>
                                            </div>

                                            <div class="tab-pane active show" id="Basic">
                                            <div class="row">

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="tname" class="form-label"><b> Name</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="firstname" id="tname" required="required">
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

                                    <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                            <label for="mobileNo" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mobile No" name="mobileNo" id="mobileNo" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="email" class="form-label"><b>Email</b></label>
                                                <input type="email" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Email" name="email" id="email" required="required">
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

                                                <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="fathername" class="form-label"><b>Father Name</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Father Name" name="fathername" id="fathername" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="mothername" class="form-label"><b>Mother Name</b><span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Father Name" name="mothername" id="mothername" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
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

                            <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                            <label for="address" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                            <textarea class="form-control" placeholder="Enter Address" name="address" id="address" required="required"></textarea>
                                            </div>
                                            </div>
                                            
                                            <div class="col-sm-4">
                                          <div class="form-group pb-1">
                                        <label for="pincode" class="form-label"><b>Pincode</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\d{6}$" title="Please enter a 6-digit pincode" placeholder="Enter Pincode" name="pincode" id="pincode" required="required">
                                          </div>
                                          </div>

                                                
                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="editDob" class="form-label"><b>Date of Birth</b><span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" placeholder="Enter Date of Birth" name="editDob" id="editDob" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
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


                                                <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="nationality" class="form-label"><b>Nationality</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Nationality" name="nationality" id="nationality" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="motherTongue" class="form-label"><b>Mother Tongue</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Mother Tongue" name="motherTongue" id="motherTongue" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="religion" class="form-label"><b>Religion</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Religion" name="religion" id="religion" required="required">
                                            </div>
                                            </div>

                                            
                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="caste" class="form-label"><b>Caste</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Caste" name="caste" id="caste" required="required">
                                            </div>
                                            </div>

                                            
                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="community" class="form-label"><b>Community</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" required="required">
                                            </div>
                                            </div>

                                            <div class="col-sm-4">
                                            <div class="form-group pb-1">
                                            <label for="aatharNumber" class="form-label"><b>Aathar Number</b></label>
                                            <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aathar Number" name="aatharNumber" id="aatharNumber" required="required">
                                            </div>
                                            </div> 

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Year Type</b></label>
                                    <select class="form-control" name="Empoloyed" id="Empoloyed" required="required">
                                        <option value="">--Select the Type--</option>
                                        <option value="Single">Academic Year</option>
                                        <option value="Married">Calander Year</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Marital Status</b></label>
                                    <select class="form-control" name="course" id="course" required="required">
                                        <option value="">--Select the Marital Status--</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Empoloyed</b></label>
                                    <select class="form-control" name="Empoloyed" id="Empoloyed" required="required">
                                        <option value="">--Select the Empoloyed--</option>
                                        <option value="Single">Yes</option>
                                        <option value="Married">No</option>
                                        
                                    </select>
                                </div>
                            </div>
                        

                                          

                                    <div class="col-sm-6">
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

                                        <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="Previous" class="form-label"><b>Previous College / school Studied</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Previous College / school Studied" name="Previous" id="Previous" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="completed" class="form-label"><b>Year Of Completed</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Year Of Completed" name="completed" id="completed" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="study" class="form-label"><b>Major Field Of Study</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Major Field Of Study" name="study" id="study" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="grade" class="form-label"><b>CGPA / Grade</b></label>
                                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter CGPA / Grade" name="grade" id="grade" required="required">
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group pb-1">
                                                <label for="sslc" class="form-label"><b>SSLC Marksheet</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter SSLC" name="sslc" id="sslc" required="required">
                                            </div>
                                        </div>


                                        
                                        <div class="col-sm-6">
                                        <div class="form-group pb-1">
                                                <label for="hsc" class="form-label"><b>HSC Marksheet</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter HSC" name="hsc" id="hsc" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6"> 
                                        <div class="form-group pb-1">
                                                <label for="community" class="form-label"><b>Community Certificate</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Community" name="community" id="community" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group pb-1">
                                                <label for="tc" class="form-label"><b>Transfer Certificate</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter TC" name="tc" id="tc" required="required">
                                            </div>
                                        </div>

                                            
                                        <div class="col-sm-6">
                                        <div class="form-group pb-1">
                                                <label for="aathar" class="form-label"><b>Aathar Card</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Aathar" name="aathar" id="aathar" required="required">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="form-group pb-1">
                                                <label for="photo" class="form-label"><b>Passposrt Size Photo</b></label>
                                                <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Photo" name="photo" id="photo" required="required">
                                            </div>
                                        </div>



                                        <ul class="pager wizard mb-0 list-inline mt-1">
                                                <li class="previous list-inline-item">
                                                    <button type="button" class="btn btn-light" data-bs-target="#Basic" data-bs-toggle="tab"><i class="ri-arrow-left-line me-1"></i> Back to Profile</button>
                                                </li>
                                                <li class="next list-inline-item float-end">
                                                    <button type="submit" class="btn btn-info">Submit</button>
                                                </li>
                                            </ul>
                                            </div>

                                   <!---------------------------------------------------------------------- ----------------- -->


                                           

                                           
                                        




                                        </div> <!-- tab-content -->
                                    </div> <!-- end #progressbarwizard-->
                                </form>

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->

            
  