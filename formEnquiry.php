
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
                                    <label for="editFirstName" class="form-label"><b>First Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="editFirstName" id="edtiFirstName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editLastName" class="form-label"><b>last Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Last Name" name="editLastName" id="editLastName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editEmail" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="editEmail" id="editEmail" required="required">
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
                                    <label for="editMobile" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editMobile" id="editMobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="editAddress" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
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
                                    <label for="editFirstName" class="form-label"><b>First Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter First Name" name="editFirstName" id="edtiFirstName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editLastName" class="form-label"><b>last Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Last Name" name="editLastName" id="editLastName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="editEmail" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="editEmail" id="editEmail" required="required">
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
                                    <label for="editMobile" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editMobile" id="editMobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-1">
                                    <label for="editAddress" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
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
