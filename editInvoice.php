   
                                   <!-- Modal -->
                <div class="modal fade" id="editPayment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg-custom">
            <div class="modal-content">
                <form name="frmeditPayment" id="editpaymentform" action="process.php" method="POST">
                    <input type="hidden" name="hdnAction" value="editPayment">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">Edit Invoice</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-3">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="name" class="form-label"><b> Name</b></label>
                                    <input type="text" class="form-control"  name="studentname" id="invname" >
                                    <input type="hidden" class="form-control"  name="invid" id="invid" required="required">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group pb-3">
                                    <label for="Company" class="form-label"><b>Address </b></label>
                                    <input type="textarea" class="form-control"  name="invaddress" id="invaddress" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group pb-3">
                                    <label for="location" class="form-label"><b>Mobile No</b></label>
                                    <input type="text" class="form-control" name="invmobileNo" id="invmobileNo" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group pb-3">
                                    <label for="mobile" class="form-label"><b>GST NO</b></label>
                                    <input type="text" class="form-control"  name="invgstno" id="invgstno" >
                                </div>
                            </div>
                            <div class="col-sm-4">
                                    <label for="Amount" class="form-label"><b>GST :</b></label>
                                    <select name="gst" class="form-control" id="gst">
                                        <option value="IGST">IGST</option>
                                        <option value="SGST-CGST">SGST-CGST</option> 
                                    </select>
                                </div>
                            
                            <div class="form-group p-1 col-3" id="invssncodeContainer"></div>
                            <div class="form-group p-1 col-3" id="invtechnologiesContainer"></div>
                            <div class="form-group p-1 col-3" id="invparticularsContainer"></div>
                            <div class="form-group p-1 col-3" id="invamountContainer"></div>
                            
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


