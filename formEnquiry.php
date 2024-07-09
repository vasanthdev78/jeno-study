
<!-- Modal -->
    <div class="modal fade" id="addEnquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddEnquiry" id="addEnquiry" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addEnquiry">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Enquiry</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="firstName" class="form-label"><b>First Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="firstName" id="firstName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="lastName" class="form-label"><b>last Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Last Name" name="lastName" id="lastName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="dob" class="form-label"><b>Date of Birth</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" id="dob" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="gender" class="form-label"><b>Gender</b></label>
                                    <select class="form-control" id="gender" name="gender" required="required">
                                         <option>----select----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="mobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="mobile" id="mobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="address" class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="address" id="address" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="university" class="form-label"><b>University</b></label>
                                    <select class="form-control" id="university" name="university" required="required">
                                         <option>----select----</option>
                                        <option value="msUniversity">MS University</option>
                                        <option value="universityofmadras">University Of Madras</option>
                                        <option value="barathiarUniversity">Barathiar University</option>
                                        <option value="alagappaUniversity">Alagappa University</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="course" class="form-label"><b>Course</b></label>
                                    <select class="form-control" id="course" name="course" required="required">
                                         <option>----select----</option>
                                        <option value="msc">MSC</option>
                                        <option value="mba">MBA</option>
                                        <option value="ma">MA</option>
                                        <option value="mca">MCA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="branch" class="form-label"><b>Branch</b></label>
                                    <select class="form-control" id="branch" name="branch" required="required">
                                         <option>----select----</option>
                                        <option value="tirunelveli">Trunelveli</option>
                                        <option value="madurai">Madurai</option>
                                        <option value="chennai">Chennai</option>
                                        <option value="trichy">Trichy</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

        <!-- Modal -->
             <div class="modal fade" id="editEnquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="frmEditEnquiry" id="editEnquiry" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editEnquiry">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Enquiry</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editFirstName" class="form-label"><b>First Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="editFirstName" id="edtiFirstName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editLastName" class="form-label"><b>last Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Last Name" name="editLastName" id="editLastName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editEmail" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="editEmail" id="editEmail" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editDob" class="form-label"><b>Date of Birth</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="editDob" id="editDob" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editGender" class="form-label"><b>Gender</b></label>
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
                                    <label for="editMobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editMobile" id="editMobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="editAddress" class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="editUniversity" class="form-label"><b>University</b></label>
                                    <select class="form-control" id="editUniversity" name="editUniversity" required="required">
                                         <option>----select----</option>
                                        <option value="msUniversity">MS University</option>
                                        <option value="universityofmadras">University Of Madras</option>
                                        <option value="barathiarUniversity">Barathiar University</option>
                                        <option value="alagappaUniversity">Alagappa University</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editCourse" class="form-label"><b>Course</b></label>
                                    <select class="form-control" id="editCourse" name="editCourse" required="required">
                                         <option>----select----</option>
                                        <option value="msc">MSC</option>
                                        <option value="mba">MBA</option>
                                        <option value="ma">MA</option>
                                        <option value="mca">MCA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editBranch" class="form-label"><b>Branch</b></label>
                                    <select class="form-control" id="editBranch" name="editBranch" required="required">
                                         <option>----select----</option>
                                        <option value="tirunelveli">Trunelveli</option>
                                        <option value="madurai">Madurai</option>
                                        <option value="chennai">Chennai</option>
                                        <option value="trichy">Trichy</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
