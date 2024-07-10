    
    <!-- Modal -->
    <div class="modal fade" id="addIssueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddIssue" id="addIssue" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addIssue">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Book Issue</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Student Name</b></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Student Name--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Book Name</b></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Book Name--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Issue Date</b></label>
                                    <input type="date" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Book Count" name="course" id="course" required="required">
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
    <div class="modal fade" id="editIssueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditIssue" id="editIssue">
                    <input type="hidden" name="hdnAction" value="editIssue">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Book Issue</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Student Name</b></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Student Name--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Book Name</b></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Book Name--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Issue Date</b></label>
                                    <input type="date" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Book Count" name="course" id="course" required="required">
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

 