    
    <!-- Modal -->
    <div class="modal fade" id="addSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddSubject" id="addSubject" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addSubject">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Subject</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="university" class="form-label"><b>University Name</b></label>
                                    <select class="form-control" name="university" id="university" required="required">
                                        <option value="">--Select the University--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Course Name</b></label>
                                    <select class="form-control" name="course" id="course" required="required">
                                        <option value="">--Select the Course--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Year</b></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Year--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Medium</b></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Medium--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div><hr>
                        <button type="button" id="addInputButton" class="btn btn-primary">Add Input</button>
                        <div id="additionalInputs"></div>
                        
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
    <div class="modal fade" id="editSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditSubject" id="editSubject">
                    <input type="hidden" name="hdnAction" value="editSubject">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Subject</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <label for="university" class="form-label"><b>University Name</b></label>
                                    <select class="form-control" name="university" id="university" required="required">
                                        <option value="">--Select the University--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="course" class="form-label"><b>Course Name</b></label>
                                    <select class="form-control" name="course" id="course" required="required">
                                        <option value="">--Select the Course--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Year</b></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Year--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Medium</b></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Medium--</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div><hr>
                        <button type="button" id="addInputButton" class="btn btn-primary">Add Input</button>
                        <div id="additionalInputs"></div>
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

 