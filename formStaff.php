<!-- Modal -->
   <div class="modal fade" id="addStaffModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="needs-validation" novalidate name="frmAddStaff" id="addStaff" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addStaffId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Staff</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="staffName" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Staff Name" name="staffName" id="staffName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dob" class="form-label"><b>Date of Birth</b><span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" id="dob" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gender" class="form-label"><b>Gender</b><span class="text-danger">*</span></label>
                                    <select class="form-control" id="gender" name="gender" required="required">
                                        <option value="">--Select the Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobile" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No." name="mobile" id="mobile" required>
                                    <!-- <div class="invalid-feedback">
                                        Please enter a valid 10-digit mobile number.
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dateofjoin" class="form-label"><b>Date of Joining</b><span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Join" name="dateofjoin" id="dateofjoin" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="salary" class="form-label"><b>Salary</b></label>
                                    <input type="number" class="form-control" pattern="[0-9]{12}" placeholder="Enter Salary" name="salary" id="salary">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="designation" class="form-label"><b>Designation</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter designation" name="designation" id="designation">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email Id" name="email" id="email" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Enter address" name="address" id="address" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="aadhar" class="form-label"><b>Aadhar card</b><span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="aadhar" id="aadhar" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="username" class="form-label"><b>Username</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Enter Username" name="username" id="username" required="required">
                                    <div class="invalid-feedback">
                                        The username already exists.
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password" class="form-label"><b>Password</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Password" name="password" id="password" required="required">
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
    <div class="modal fade" id="editStaffModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form class="needs-validation" novalidate name="frmEditStaff" id="editStaff" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addEditId">
                    <input type="hidden" name="hdnStaffId" id="staffId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Staff</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="staffNameEdit" class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Staff Name" name="staffNameEdit" id="staffNameEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dobEdit" class="form-label"><b>Date of Birth</b><span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dobEdit" id="dobEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="genderEdit" class="form-label"><b>Gender</b><span class="text-danger">*</span></label>
                                    <select class="form-control" id="genderEdit" name="genderEdit" required="required">
                                        <option value="">--Select the Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mobileEdit" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No." name="mobileEdit" id="mobileEdit" required>
                                    <!-- <div class="invalid-feedback">
                                        Please enter a valid 10-digit mobile number.
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dateofjoinEdit" class="form-label"><b>Date of Joining</b><span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Join" name="dateofjoinEdit" id="dateofjoinEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="salaryEdit" class="form-label"><b>Salary</b></label>
                                    <input type="number" class="form-control" pattern="[0-9]{12}" placeholder="Enter Salary" name="salaryEdit" id="salaryEdit">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="designationEdit" class="form-label"><b>Designation</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter designation" name="designationEdit" id="designationEdit">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="emailEdit" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Enter Email Id" name="emailEdit" id="emailEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="addressEdit" class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Enter address" name="addressEdit" id="addressEdit" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="aadharEdit" class="form-label"><b>Aadhar card</b><span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" name="aadharEdit" id="aadharEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usernameEdit" class="form-label"><b>Username</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  placeholder="Enter Username" name="usernameEdit" id="usernameEdit" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="passwordEdit" class="form-label"><b>Password</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Password" name="passwordEdit" id="passwordEdit" required="required">
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

