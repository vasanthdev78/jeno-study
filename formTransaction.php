    
    <!-- Modal -->
    <div class="modal fade" id="addaddTransactionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="needs-validation" novalidate  name="frmAddExpense" id="addTransaction" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addTransaction">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Transaction</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="category" class="form-label"><b>Category</b></label>
                                <select class="form-control" name="category" id="category" required="required">
                                    <option value="">--Select Category--</option>
                                    <option value="Income">Income</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div>
                        </div>
                        <!-- New input field for online payment method -->
                        <div class="col-sm-12" id="expenseReason" style="display:none;">
                            <div class="form-group pb-1">
                                <label for="expenseReason" class="form-label"><b>Expense Reason</b></label>
                                <textarea class="form-control"   placeholder="Enter Expense Reason" name="expenseReason" id="expenseReasonInput"></textarea>                                
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="date" class="form-label"><b>Date </b></label>
                                    <input type="date" class="form-control"  name="date" id="date" required="required">
                                </div>
                            </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="amount" class="form-label"><b>Amount</b></label>
                                    <input type="number" class="form-control" placeholder="Enter Amount" name="amount" id="amount" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="paidMethod" class="form-label"><b>Paid Method</b></label>
                                <select class="form-control" name="paidMethod" id="paidMethod" required="required">
                                    <option value="">--Select Payment Method--</option>
                                    <option value="online">Online</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="transactionId" class="form-label"><b>Transaction Id</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Expense Amount" name="transactionId" id="transactionId" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12" >
                            <div class="form-group pb-1">
                                <label for="description" class="form-label"><b>Description</b></label>
                                <textarea class="form-control"   placeholder="Enter Description" name="description" id="description"></textarea>                                
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

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

    <!-- Modal -->
    <div class="modal fade" id="editExpenseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form class="needs-validation" novalidate  name="editTransaction" id="editTransaction" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editTransaction">
                    <input type="hidden" name="editTransactionId" id="editTransactionId">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Transaction</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="editCategory" class="form-label"><b>Category</b></label>
                                <select class="form-control" name="editCategory" id="editCategory" required="required">
                                    <option value="">--Select Category--</option>
                                    <option value="Income">Income</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div>
                        </div>
                        <!-- New input field for online payment method -->
                        <div class="col-sm-12" id="editExpenseReason" style="display:none;">
                            <div class="form-group pb-1">
                                <label for="editExpenseReason" class="form-label"><b>Expense Reason</b></label>
                                <textarea class="form-control"   placeholder="Enter Expense Reason" name="editExpenseReason" id="editexpenseReasonInput"></textarea>                                
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editDate" class="form-label"><b>Date </b></label>
                                    <input type="date" class="form-control"  name="editDate" id="editDate" required="required">
                                </div>
                            </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editAmount" class="form-label"><b>Amount</b></label>
                                    <input type="number" class="form-control" placeholder="Enter Amount" name="editAmount" id="editAmount" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="editPaidMethod" class="form-label"><b>Paid Method</b></label>
                                <select class="form-control" name="editPaidMethod" id="editPaidMethod" required="required">
                                    <option value="">--Select Payment Method--</option>
                                    <option value="online">Online</option>
                                    <option value="Cash">Cash</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editTranId" class="form-label"><b>Transaction Id</b></label>
                                    <input type="text" class="form-control" placeholder="Enter Expense Amount" name="editTranId" id="editTranId" required="required">
                                </div>
                            </div>

                            <div class="col-sm-12" >
                            <div class="form-group pb-1">
                                <label for="editDescription" class="form-label"><b>Description</b></label>
                                <textarea class="form-control"   placeholder="Enter Description" name="editDescription" id="editDescription"></textarea>                                
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

    <div class="d-none " id="transactionView">
        
        <form name="frm" method="post">
            <input type="hidden" name="hdnAction" value="">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Enquiry Details</h3>
            </div>  
            <div class="modal-footer mb-3">
                <button type="button" class="btn btn-danger" id="backButtonTransaction">Back</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Category</h4> 
                            <span class="detail" id="viewCategory"></span>
                        </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Expense Reason</h4>
                            <span class="detail" id="viewExpenseReason"></span>
                        </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Date</h4>
                            <span class="detail" id="viewDate"></span>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Amount</h4>
                            <span class="detail" id="viewAmount"></span>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Paid Method</h4>
                            <span class="detail" id="viewPaidMethod"></span>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Transaction Id</h4>
                            <span class="detail" id="viewTransactionId"></span>
                        </div>
                    </div>


                    <div class="col-sm-3">
                        <div class="card p-3">
                            <h4>Description</h4>
                            <span class="detail" id="viewDescription"></span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </form>   
    </div>