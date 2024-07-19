<!-- Start Content-->
<div class="container-fluid d-none" id="addSubjectModal">
    <div class="card overflow-hidden">
        <div class="card-body">
            <h4 class="header-title">Add Subject</h4>
            <form class="needs-validation" novalidate  name="frmAddSubject" id="addSubject" enctype="multipart/form-data">
            <div class="col-12 text-end">
                    <button type="button" id="backButton" class="btn btn-danger">Back</button>
                </div>
                <input type="hidden" name="hdnAction" value="addSubject">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="university" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                            <select class="form-control" name="university" id="university" required>
                                <option value="">--Select the University--</option>
                                <?php 
                                     $university_result = universityTable(); // Call the function to fetch universities 
                                     while ($row = $university_result->fetch_assoc()) {
                                     $id = $row['uni_id']; 
                                    $name = $row['uni_name'];    
                        
                                      ?>
                        
                        <option value="<?php echo $id;?>"><?php echo $name;?></option>

                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="course" class="form-label"><b>Course Name</b><span class="text-danger">*</span></label>
                            <select class="form-control" name="course" id="course" required>
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
                            <label for="category" class="form-label"><b>Category</b><span class="text-danger">*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">--Select the Category--</option>
                                <option value="HR">HR</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Project Management">Project Management</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="year" class="form-label"><b>Year / Semester</b><span class="text-danger">*</span></label>
                            <select class="form-control" name="year" id="year" required>
                                <option value="">--Select the Year--</option>
                                <option value="1">1 st Year</option>
                                <option value="2">2 nd Year</option>
                                <option value="3">3 rd Year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" id="addInputButton" class="btn btn-primary">Add Subject</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" id="addElectiveButton" class="btn btn-primary">Add Language Subject</button>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-md-5">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <h4 id="subjectsHeader" class="header-title">Subjects</h4>
                                <div id="additionalInputs"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <h4 id="languageSubjectsHeader" class="header-title">Language Subjects</h4>
                                <div id="electiveInputs"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" id="cancelButton" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
