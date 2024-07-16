<!-- Modal -->
    <div class="modal fade" id="addUniversityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="addUniversity" id="addUniversity" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addUniversity">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add University</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter University Name" name="universityName" id="universityName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>Study Center Code</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Study Center Code" name="studyCode" id="studyCode" required="required">
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
             <div class="modal fade" id="editUniversityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="editUniversity" id="editUniversity">
                    <input type="hidden" name="hdnAction" value="editUniversity">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit University</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter University Name" name="editUniversityName" id="editUniversityName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="universityName" class="form-label"><b>Study Center Code</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Code" name="editStudyCode" id="editStudyCode" required="required">
                                </div>
                            </div>
                            
                        </div><hr>
                        
                        <div id="editItionalInputs"></div>
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


    <div class="table-responsive d-none" id="universityView">
          <form name="frm" method="post">
              <input type="hidden" name="hdnAction" value="">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Task Details</h4>
            </div>  
           <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Name</h4> 
                                <span class="detail"><?php echo $name;?></span>
                            </div>
                        </div>  
                         <div class="col-sm-3 ">
                            <div class="card p-3">
                                <h4>Course Name</h4>
                                <span class="detail"><?php echo  $course ;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Place</h4>
                                <span class="detail"><?php echo $location;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Email Id</h4>
                                <span class="detail"><?php echo $email;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Mobile No.</h4>
                                <span class="detail"><?php echo  $mobile;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="card p-3">
                                <h4>Aadhar Number</h4>
                                <span class="detail"><?php echo $aadhar;?></span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="javascript:location.href='student.php'" >Back</button>
               
            </div> 
            </form>   
      </div>
                     
