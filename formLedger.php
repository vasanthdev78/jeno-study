    
    <!-- Modal -->
    <div class="modal fade" id="addLedgerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddLedger" id="addLedger" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addLedger">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Ledger</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="university" class="form-label"><b>Ledger Type</b></label>
                                    <select class="form-control" name="university" id="university" required="required">
                                        <option value="">--Select the Ledger Type--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Ledger Id</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Ledger Id" name="editCourseName" id="editCourseName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Ledger Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Ledger Name" name="editCourseName" id="editCourseName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Description</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Description" name="editCourseName" id="editCourseName" required="required">
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
    <div class="modal fade" id="editLedgerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditLedger" id="editLedger">
                    <input type="hidden" name="hdnAction" value="editLedger">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Ledger</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="university" class="form-label"><b>Ledger Type</b></label>
                                    <select class="form-control" name="university" id="university" required="required">
                                        <option value="">--Select the Ledger Type--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Ledger Id</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Ledger Id" name="editCourseName" id="editCourseName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Ledger Name</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Ledger Name" name="editCourseName" id="editCourseName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Description</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Description" name="editCourseName" id="editCourseName" required="required">
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

 