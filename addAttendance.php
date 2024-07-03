<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="addAttendancefrm" id="addAttendance"  enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="hdnAction" value="addAttendance">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Attendance Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> <!-- end modal header -->
                <div class="modal-body">                
                    <div class="row mb-3">
                        <label for="date" class="col-3 col-form-label">Attendance Date</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="date">
                        </div>
                    </div>

                </div>
                </form>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="validateForm()">Submit</button>
            </div> <!-- end modal footer -->
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->