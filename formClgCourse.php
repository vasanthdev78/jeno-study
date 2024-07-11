    
    <!-- Modal -->
    <div class="modal fade" id="addCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddCourse" id="addCourse" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addCourse">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Course</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
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
                                    <label for="medium" class="form-label"><b>Medium</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Medium--</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="tamil">English</option>
                                        <option value="tamil">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="duration" class="form-label"><b>Duration (Years)</b></label>
                                    <input type="number" class="form-control" name="duration" id="duration" required="required" placeholder="Enter Course duration" min="1" max="10">
                                </div>
                            </div> 
                        </div><hr>
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
    <div class="modal fade" id="editCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmEditCourse" id="editCourse">
                    <input type="hidden" name="hdnAction" value="editCourse">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Course</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
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
                                    <label for="medium" class="form-label"><b>Medium</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Medium--</option>
                                        <option value="tamil">Tamil</option>
                                        <option value="tamil">English</option>
                                        <option value="tamil">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="duration" class="form-label"><b>Duration (Years)</b></label>
                                    <input type="number" class="form-control" name="duration" id="duration" required="required" placeholder="Enter Course duration" min="1" max="10">
                                </div>
                            </div> 
                        </div><hr>
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

 