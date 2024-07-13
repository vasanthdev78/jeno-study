    
 <!-- Start Content-->
 <div class="container-fluid d-none" id="addSubjectModal">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h4 class="header-title">Add Subject</h4>
                <form name="frmAddSubject" id="addSubject" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addSubject">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="university" class="form-label"><b>University Name</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="university" id="university" required>
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
                            <button type="button" id="addElectiveButton" class="btn btn-primary">Add Elective Subject</button>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h4 class="header-title">Subjects</h4>
                        <div id="additionalInputs"></div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <h4 class="header-title">Elective Subjects</h4>
                        <div id="electiveInputs"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

   