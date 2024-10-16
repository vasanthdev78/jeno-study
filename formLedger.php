<!-- Modal -->
<div class="modal fade" id="addLedgerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="needs-validation" novalidate name="addLedger" id="addLedger" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="addLedger">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Add Legder </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
       
                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="category" class="form-label"><b>Category</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="category" id="category" required="required">
                                    <option value="">--Select Category--</option>
                                    <option value="Income">Income</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="ledgertype" class="form-label"><b>Ledger Type</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="[a-zA-Z\s]+" title="Numbers are not allowed, spaces are permitted" placeholder="Enter Ledger Type" name="ledgertype" id="ledgertype" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitLedgerBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

    <!-- ------------------------------------------------------------------------------------------------------------------ -->

        <!-- Modal -->
             <div class="modal fade" id="editLedgerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form class="needs-validation" novalidate name="editLedger" id="editLedger" enctype="multipart/form-data">
                    <input type="hidden" name="hdnAction" value="editLedger">
                    <input type="hidden" name="editid" id="editid">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Legder </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row ">
       
                        <div class="col-sm-12">
                            <div class="form-group pb-1">
                                <label for="editCategory" class="form-label"><b>Category</b><span class="text-danger">*</span></label>
                                <select class="form-control" name="editCategory" id="editCategory" required="required">
                                    <option value="">--Select Category--</option>
                                    <option value="Income">Income</option>
                                    <option value="Expense">Expense</option>
                                </select>
                            </div>
                        </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="editLedgertype" class="form-label"><b>Ledger Type</b><span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" pattern="[a-zA-Z\s]+" title="Numbers are not allowed, spaces are permitted" placeholder="Enter Ledger Type" name="editLedgertype" id="editLedgertype" required="required">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updateBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div> <!-- end modal content-->
        </div> <!-- end modal dialog-->
    </div> <!-- end modal-->

   
