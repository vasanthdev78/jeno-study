
<!-- Modal -->
<div class="modal fade" id="addFeesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmEditFees" id="addFees">
                <input type="hidden" name="hdnAction" value="addFees">
                <input type="hidden" name="editid" id="editid">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Fees</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="editFirstName" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Student Name" name="editFirstName" id="editFirstName" required="required">
                            </div>
                        </div>
                       

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="paidMethod" class="form-label"><b>Paid Method</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="paidMethod" id="paidMethod" required="required">
                                    <option value="">--Select Payment Method--</option>
                                    <option value="online">Online</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="transactionId" class="form-label"><b>Transaction Id</b><span class="text-danger">*</span></label>
                                <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Transaction ID" name="transactionId" id="transactionId" required="required">
                            </div>
                        </div>

                        <!-- New input field for online payment method -->
                        <div class="col-sm-12" id="onlinePaymentDetails" style="display:none;">
                            <div class="form-group pb-1">
                                <label for="Description" class="form-label"><b>Description</b><span class="text-danger">*</span></label>
                                <textarea class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces"  placeholder="Enter Description" name="Description" id="Description"></textarea>                                
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="universityPaid" class="form-label"><b>University Fees</b><span class="text-danger">  20,000</span></label>
                                <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter amount" name="universityPaid" id="universityPaid" required="required">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="studyPaid" class="form-label"><b>Study Center Fees</b><span class="text-danger">  10,000</span></label>
                                <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter amount" name="studyPaid" id="studyPaid" required="required">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="totalAmount" class="form-label"><b>Amount Paid</b></label>
                                <input type="number" class="form-control" name="totalAmount" id="totalAmount" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="paidDate" class="form-label"><b>Paid Date</b><span class="text-danger">*</span></label>
                                <input type="date" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" name="paidDate" id="paidDate" required="required">
                            </div>
                        </div>

                        

                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateBtn">Submit</button>
                </div>
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->



<!-- Modal -->
<div class="modal fade" id="editFeesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form name="frmEditFees" id="editFees">
                    <input type="hidden" name="hdnAction" value="editFees">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Fees</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editFirstName" class="form-label"><b>Student Roll No</b><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter Student Name" name="editFirstName" id="edtiFirstName" required="required">
                                    </div>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Total Amount</b><span class="text-danger">*</span></label>
                                        <span class="form-control">50,000</span>  
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>University Paid</b><span class="text-danger">*</span></label>
                                        <span class="form-control">20,000</span>  
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Study Paid</b><span class="text-danger">*</span></label>
                                        <span class="form-control">1,000</span>  
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Balance</b><span class="text-danger">*</span></label>
                                        <span class="form-control">19,000</span>  
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Amount Paid</b><span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter amount" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                <div class="form-group pb-1">
                                    <label for="paidMethod" class="form-label"><b>Paid Method</b><span class="text-danger">*</span></label>
                                    <select class="form-control" name="paidMethod" id="paidMethod" required="required">
                                        <option value="">--Select Payment Method--</option>
                                        <option value="online">Online</option>
                                        <option value="cash">Cash</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-sm-6">
                                    <div class="form-group pb-1">
                                        <label for="editAddress" class="form-label"><b>Paid Date</b><span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" pattern="^\S.*$" title="Please enter a value with no leading or trailing spaces" placeholder="Enter address" name="editAddress" id="editAddress" required="required">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateBtn">Submit</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->