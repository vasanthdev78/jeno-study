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
                        <div class="row p-3">
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="universityName" class="form-label"><b>University Code</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University" name="universityName" id="universityName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="universityName" class="form-label"><b>University Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter University Name" name="universityName" id="universityName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="universityImage" class="form-label"><b>University Image</b></label>
                                    <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Image" name="universityImage" id="universityImage">
                                </div>
                            </div>
                          
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="destination" class="form-label"><b>Destination</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter destination" name="destination" id="destination">
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
                        <div class="row p-3">
                        <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="editUniversityCode" class="form-label"><b>University Code</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Code" name="editUniversityCode" id="editUniversityCode" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="editUniversityName" class="form-label"><b>University Name</b></label>
                                    <input type="text" class="form-control" placeholder="Enter University Name" name="editUniversityName" id="editUniversityName" required="required">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="editUniversityImage" class="form-label"><b>University Image</b></label>
                                    <input type="file" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter University Image" name="editUniversityImage" id="editUniversityImage">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group pb-3">
                                    <label for="editDestination" class="form-label"><b>Destination</b></label>
                                    <input type="text" class="form-control"  placeholder="Enter destination" name="editDestination" id="editDestination">
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

                     
