
<!-- Modal -->
<div class="modal fade" id="addFeesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditFees" id="addFees">
                    <input type="hidden" name="hdnAction" value="addFees">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Fees</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editFirstName" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Student Name" name="editFirstName" id="edtiFirstName" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editLastName" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Name" name="editLastName" id="editLastName" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editEmail" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter Course Name" name="editEmail" id="editEmail" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editDob" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="editDob" id="editDob" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editMobile" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editMobile" id="editMobile" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Amount Paid</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter amount" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Paid Method</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Paid Date</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
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



<!-- Modal -->
<div class="modal fade" id="editFeesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditFees" id="editFees">
                    <input type="hidden" name="hdnAction" value="editFees">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Fees</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editFirstName" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Student Name" name="editFirstName" id="edtiFirstName" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editLastName" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Name" name="editLastName" id="editLastName" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editEmail" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter Course Name" name="editEmail" id="editEmail" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editDob" class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="editDob" id="editDob" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editMobile" class="form-label"><b>Mobile No</b><span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" pattern="[0-9]{10}" placeholder="Enter Mobile No" name="editMobile" id="editMobile" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Amount Paid</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter amount" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Paid Method</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Paid Date</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
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