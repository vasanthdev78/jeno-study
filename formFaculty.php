                           <!-- Modal -->
                           <div class="modal fade" id="addFacultyfModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddStaff" id="addFaculty" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addFaculty">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add addFaculty</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="staffName" class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Name" name="staffName" id="staffName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="dob" class="form-label"><b>Date of Birth</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="dob" id="dob" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
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
                                <div class="form-group pb-3">
                                    <label for="mobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="mobile" id="mobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="dateofjoin" class="form-label"><b>Date of Join</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Join" name="dateofjoin" id="dateofjoin" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="salary" class="form-label"><b>Salary</b></label>
                                    <input type="number" class="form-control" pattern="[0-9]{12}" placeholder="Enter Salary" name="salary" id="salary">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="destination" class="form-label"><b>Designation</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter destination" name="destination" id="destination">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="email" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="subject" class="form-label"><b>Subject</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="subject" id="subject" required="required">
                                    <option value="">--Select Subject--</option>
                                    <option value="online">Networking</option>
                                    <option value="cash">php</option>
                                    <option value="cash">java</option>
                                    <option value="cash">Web development</option>
                                    <option value="cash">python</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="address" class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="address" id="address" required="required">
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
    <div class="modal fade" id="editaddFacultyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditaddFaculty" id="editaddFacultyt">
                    <input type="hidden" name="hdnAction" value="editaddFaculty">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Faculty</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editstaffName" class="form-label"><b>Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Name" name="editstaffName" id="editstaffName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editdob" class="form-label"><b>Date of Birth</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Birth" name="editdob" id="editdob" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editgender" class="form-label"><b>Gender</b></label>
                                    <select class="form-control" id="editgender" name="editgender" required="required">
                                         <option>----select----</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editmobile" class="form-label"><b>Mobile No</b></label>
                                    <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editmobile" id="editmobile" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editdateofjoin" class="form-label"><b>Date of Join</b></label>
                                    <input type="date" class="form-control" placeholder="Enter Date of Join" name="editdateofjoin" id="editdateofjoin" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editsalary" class="form-label"><b>Salary</b></label>
                                    <input type="number" class="form-control" pattern="[0-9]{12}" placeholder="Enter Salary" name="editsalary" id="editsalary">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editdestination" class="form-label"><b>Designation</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter destination" name="editdestination" id="editdestination">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="editemail" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" placeholder="Enter Email" name="editemail" id="editemail" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="subject" class="form-label"><b>Subject</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="subject" id="subject" required="required">
                                    <option value="">--Select Subject--</option>
                                    <option value="online">Networking</option>
                                    <option value="cash">php</option>
                                    <option value="cash">java</option>
                                    <option value="cash">Web development</option>
                                    <option value="cash">python</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="editaddress" class="form-label"><b>Address</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editaddress" id="editaddress" required="required">
                                </div>
                            </div>
                            
                          
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- Modal -->
<div class="modal fade" id="docStudentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Add Staff Documents</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="frmDocStudent" id="docStudent" class="form-horizontal">
                                                            <input type="hidden" name="hdnAction" value="docStudent">
                                                            <input type="hidden" name="userName" id="userName" value="">
                                                            <input type="hidden" name="stuDocId" id="stuDocId" value="">
                                                            <div class="row mb-3">
                                                                <label for="aadhar" class="col-3 col-form-label">Aadhar Card</label>
                                                                <div class="col-9">
                                                                    <input type="file" class="form-control" id="aadhar" name="aadhar" required>
                                                                    <a id="aadharLink" href="#" target="_blank"><span id="aadharImg"></span></a>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="mark" class="col-3 col-form-label">Mark Sheet Card</label>
                                                                <div class="col-9">
                                                                    <input type="file" class="form-control" id="marksheet" name="marksheet" required>
                                                                    <a id="marksheetLink" href="#" target="_blank"><span id="marksheetImg"></span></a>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="docSubmit">Submit</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------ -->