                           <!-- Modal -->
                           <div class="modal fade" id="addScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="frmAddSchedule" id="addSchedule" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addSchedule">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="facultiesName" class="form-label"><b>Faculties Name</b></label>
                                    <select class="form-control" id="facultiesName" name="facultiesName" required="required">
                                         <option>----select----</option>
                                        <option value="vasanth">Vasanth</option>
                                        <option value="raj">Raj</option>
                                        <option value="sankar">Sankar</option>
                                        <option value="muthu">Muthu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="fromDate" class="form-label"><b>From Date</b></label>
                                    <input type="date" class="form-control" placeholder="Enter From Date" name="fromDate" id="fromDate" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="endDate" class="form-label"><b>End Date</b></label>
                                    <input type="date" class="form-control" placeholder="Enter End Date" name="endDate" id="endDate" required="required">
                                </div>
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="session" class="form-label"><b>Session</b></label>
                                    <select class="form-control" id="session" name="session" required="required">
                                         <option>----select----</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Evening">Evening</option>
                                        <option value="Full time">Full time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="Subject" class="form-label"><b>Subject</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter Subject" name="Subject" id="Subject">
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
    <div class="modal fade" id="editScheduleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="frmEditSchedule" id="editSchedule" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editSchedule">
                    <input type="hidden" name="editId" id="editId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                        <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="facultiesName" class="form-label"><b>Faculties Name</b></label>
                                    <select class="form-control" id="facultiesName" name="facultiesName" required="required">
                                         <option>----select----</option>
                                        <option value="vasanth">Vasanth</option>
                                        <option value="raj">Raj</option>
                                        <option value="sankar">Sankar</option>
                                        <option value="muthu">Muthu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="fromDate" class="form-label"><b>From Date</b></label>
                                    <input type="date" class="form-control" placeholder="Enter From Date" name="fromDate" id="fromDate" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="endDate" class="form-label"><b>End Date</b></label>
                                    <input type="date" class="form-control" placeholder="Enter End Date" name="endDate" id="endDate" required="required">
                                </div>
                            </div>
                           
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="session" class="form-label"><b>Session</b></label>
                                    <select class="form-control" id="session" name="session" required="required">
                                         <option>----select----</option>
                                        <option value="Morning">Morning</option>
                                        <option value="Evening">Evening</option>
                                        <option value="Full time">Full time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="Subject" class="form-label"><b>Subject</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter Subject" name="Subject" id="Subject">
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