<!-- Modal -->
<div class="modal fade" id="addElectiveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="addElective" id="addElective" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addElective">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Elective Subject</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                                    
                                    <select class="form-control" name="courseName" id="courseName">
                                        <option value="">--Select Course--</option>
                                        <option value="1">MBA</option>
                                        <option value="2">MSC</option>
                                        <option value="3">MA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>Elective Subject Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Elective Subject Name" name="electiveName" id="electiveName" required="required">
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
             <div class="modal fade" id="editElectiveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="editElective" id="editElective" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editElective">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Elective Subject</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editCourseName" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                                    
                                    <select class="form-control" name="editCourseName" id="editCourseName">
                                        <option value="">--Select Course--</option>
                                        <option value="1">MBA</option>
                                        <option value="2">MSC</option>
                                        <option value="3">MA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editElectiveName" class="form-label"><b>Elective Subject Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Elective Subject Name" name="editElectiveName" id="editElectiveName" required="required">
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

    
        <div class="table-responsive d-none " id="universityView">
        
        <form name="frm" method="post">
            <input type="hidden" name="hdnAction" value="">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">University Details</h4>
            </div>  
            <div class="modal-footer mb-3">
                <button type="button" class="btn btn-danger" id="backButton">Back</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>University Name</h4> 
                            <span class="detail" id="viewUniversityName"></span>
                        </div>
                    </div>  
                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Study Center Code</h4>
                            <span class="detail" id="viewStudyCenterCode"></span>
                        </div>
                    </div>
                
                <div id="viewuniversity"></div>
                    
                </div>
            </div>
            
        </form>   
    </div>
        
