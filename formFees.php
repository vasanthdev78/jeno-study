
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
                       

                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="admissionId" class="form-label"><b>Admission Id</b><span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="admissionId" id="admissionId" required="required">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="studentName" class="form-label"><b>Student Name</b><span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="studentName" id="studentName" required="required">
                            </div>
                        </div>
                       

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="paidMethod" class="form-label"><b>Paid Method</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="paidMethod" id="paidMethod" required="required">
                                    <option value="">--Select Payment Method--</option>
                                    <option value="Online">Online</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="transactionId" class="form-label"><b>Transaction Id</b><span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  placeholder="Enter Transaction ID" name="transactionId" id="transactionId" required="required">
                            </div>
                        </div>

                        <!-- New input field for online payment method -->
                        <div class="col-sm-12" id="onlinePaymentDetails" style="display:none;">
                            <div class="form-group pb-1">
                                <label for="description" class="form-label"><b>Description</b><span class="text-danger">*</span></label>
                                <textarea class="form-control"  placeholder="Enter Description" name="description" id="description"></textarea>                                
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="universityPaid" class="form-label"><b>University Fees</b><span class="text-danger">  20,000</span></label>
                                <input type="number" class="form-control"  placeholder="Enter amount" name="universityPaid" id="universityPaid" required="required">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group pb-1">
                                <label for="studyPaid" class="form-label"><b>Study Center Fees</b><span class="text-danger">  10,000</span></label>
                                <input type="number" class="form-control"  placeholder="Enter amount" name="studyPaid" id="studyPaid" required="required">
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
                                <input type="date" class="form-control"  name="paidDate" id="paidDate" required="required">
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
            <form name="frmEditFees" id="addFees">
                <input type="hidden" name="hdnAction" value="addFees">
                <input type="hidden" name="editid" id="editid">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Edit Fees</h4>
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


    <!-- <-- ---------------------------------------------------------------------> 


    <div class="table-responsive d-none" id="clientDetail">
    <button type="button" class="btn btn-danger float-end "  onclick="toggleDivs()">Back</button>
                <form name="frm" method="post">
                    <input type="hidden" name="hdnAction" value="">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
                    </div>  
                <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="card p-3">
                                        <h4>Name</h4> 
                                        <span class="detail" id="name"></span>
                                    </div>
                                </div>  
                                <div class="col-sm-3 ">
                                    <div class="card p-3">
                                        <h4>Course Name</h4>
                                        <span class="detail" id="course_name"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="card p-3">
                                        <h4>Charge</h4>
                                        <span class="detail" id="charge"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card p-3">
                                        <h4>Course Duration</h4>
                                        <span class="detail" id="course_duration"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card p-3">
                                        <h4>Amount Received</h4>
                                        <span class="detail" id="amount_received"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="card p-3">
                                        <h4>Balance</h4>
                                        <span class="detail" id="balance"></span>
                                    </div>
                                </div>
                                
                                
                                </div>
                            </div>
                            <h3 class="modal-title" id="myModalLabel">Payment History</h3>
                            <table id="scroll-horizontal-datatable1" class="table table-striped w-100 nowrap">
                            <thead>
                                <tr class="bg-light">
                                            <th scope="col-1">S.No.</th>
                                            <th scope="col">Payment Date</th>
                                            <th scope="col">Amount Received</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Download</th>
                                            
                            </tr>
                            </thead>
                            <tbody id="paymentHistoryBody">                                
                                
                            </tbody>
                        </table>

                    
                    
                    
                    
                    
                    </form>  

            </div>