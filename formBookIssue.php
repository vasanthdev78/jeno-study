    
    <!-- Modal -->
    <div class="modal fade" id="addBookIssueModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="needs-validation" novalidate name="frmAddStock" id="addBookissue" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addBookissue">
                    <input type="hidden" name="typeExam" id="typeExam">
                    <input type="hidden" name="studentId" id="studentId">
                    <input type="hidden" name="bookId" id="bookId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Book Issue</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="admissionId" class="form-label"><b>Admission Id</b></label>
                                    <input type="text" class="form-control"   name="admissionId" id="admissionId" required="required" readonly>
                                </div>
                            </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="studentName" class="form-label"><b>Student Name</b></label>
                                    <input type="text" class="form-control" name="studentName" id="studentName" required="required" readonly>
                                </div>
                            </div>

                            <div class="col-lg-12">
                            <div class="form-group">
                                            <label for="courseyear" class="form-label"><b>Year of Stusy</b></label>
                                            <select class="form-control" name="courseyear" id="courseyear" >
                                                        
                                                        
                                                
                                            </select>
                                            </div>
                                        </div> <!-- end col -->

                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label class="form-label"><b>Book and ID from University</b></label><br>
                                                        <div class="row">
                                                        <div class="col-sm-4 ">
                                                        <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="bookReceived" id="bookNotReceived" value="Not Received" checked required>
                                                        <label class="form-check-label" for="bookNotReceived">
                                                        Not Received
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="bookReceived" id="bookReceived" value="Received" required>
                                                            <label class="form-check-label" for="bookReceived">
                                                            Received
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <label for="bookIssue" class="form-label"><b>Issued Book List</b></label>
                                            <select class="select2 form-control select2-multiple" name="bookIssue[]" id="bookIssue" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                                      
                                                
                                            </select>
                                        </div> <!-- end col -->


                                        <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                                <label class="form-label"><b>ID Card</b></label><br>
                                                        <div class="row">
                                                        <div class="col-sm-4 ">
                                                        <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="idCard" id="notIssue" value="Not Issued" checked required>
                                                        <label class="form-check-label" for="notIssue">
                                                        Not Issued
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="idCard" id="Issue" value="Issued" required>
                                                            <label class="form-check-label" for="Issue">
                                                            Issued
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
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
    <div class="modal fade" id="editStockModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="frmAddStock" id="editStock" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editStock">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Book Issue</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Student Roll No</b></label>
                                    <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Book Count" name="course" id="course" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                         <label class="form-label"><b>Books</b></label><br>
                                                <div class="row">
                                                 <div class="col-sm-4 ">
                                                  <div class="form-check">
                                            <input class="form-check-input" type="radio" name="books" id="notIssue" value="notIssue" checked required>
                                                 <label class="form-check-label" for="notReceived">
                                                 Not Issue
                                                 </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="books" id="Issue" value="Issue" required>
                                                    <label class="form-check-label" for="Issue">
                                                    Issue
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>


                                    <div class="col-sm-12">
                                            <div class="form-group pb-1">
                                         <label class="form-label"><b>ID Card</b></label><br>
                                                <div class="row">
                                                 <div class="col-sm-4 ">
                                                  <div class="form-check">
                                            <input class="form-check-input" type="radio" name="notReceived" id="notIssue" value="notIssue" checked required>
                                                 <label class="form-check-label" for="notReceived">
                                                 Not Issue
                                                 </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="books" id="Issue" value="Issue" required>
                                                    <label class="form-check-label" for="Issue">
                                                    Issue
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                        
                          
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Date</b></label>
                                    <input type="date" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter In-Stock Date" name="course" id="course" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

     
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
                                    <label for="year" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Student Name--</option>
                                        <option value="rajkumar">Rajkumar</option>
                                        <option value="rajkumar">Vasanth</option>
                                        <option value="rajkumar">Anushiya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Year</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Year--</option>
                                        <option value="1">1 st Year</option>
                                        <option value="2">2 nd Year</option>
                                        <option value="3">3 rd Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Book Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Book Name--</option>
                                        <option value="cc">Cloud Computing</option>
                                        <option value="cc">Internet Protocol</option>
                                        <option value="cc">Artificial Inteligence</option>
                                        <option value="cc">POM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Issue Date</b><span class="text-danger">*</span></label>
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
                                    <label for="year" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Student Name--</option>
                                        <option value="rajkumar">Rajkumar</option>
                                        <option value="rajkumar">Vasanth</option>
                                        <option value="rajkumar">Anushiya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="year" class="form-label"><b>Year</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="year" id="year" required="required">
                                        <option value="">--Select the Year--</option>
                                        <option value="1">1 st Year</option>
                                        <option value="2">2 nd Year</option>
                                        <option value="3">3 rd Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Book Name</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="medium" id="medium" required="required">
                                        <option value="">--Select the Book Name--</option>
                                        <option value="cc">Cloud Computing</option>
                                        <option value="cc">Internet Protocol</option>
                                        <option value="cc">Artificial Inteligence</option>
                                        <option value="cc">POM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="medium" class="form-label"><b>Issue Date</b><span class="text-danger">*</span></label>
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

 