<?php
session_start();
    include "class.php";
    
     
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>
<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        <?php include("top.php") ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

        <?php include("left.php"); ?>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        
        <div class="content-page">
            <div class="content">
            <?php include("formSubject.php");?>
                <!-- Start Content-->
                <div class="container-fluid" id="StuContent">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-flower">
                                <img src="assets/images/flowers/img-3.png">
                            </div>

                            <div class="bg-flower-2">
                                <img src="assets/images/flowers/img-1.png">
                            </div>
        
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="button" id="addSubjectBtn" class="btn btn-info">
                                            Add New Subject
                                        </button>
                                    </div>
                                </div>
                                <h4 class="page-title">Subjects</h4>   
                            </div>
                        </div>
                    </div>

                   
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Subject Code</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Year</th>
                                    <?php if ($user_role == 'Admin') { ?>
                                      <th scope="col">Action</th>
                                     <?php } ?>
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>
                                      <?php $id = 4 ; ?>
                     <tr>
                        <td>1</td>
                        <td>CS705</td>
                        <td>Cloud Computing</td>
                        <td>1 st Year</td>
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="editSubject(<?php echo $id; ?>);"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="editSubject(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
   
                        
                    </tbody>
                  </table>

                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div> <!-- end row-->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include("footer.php") ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->


    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Datatables js -->
    <script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

<script>
 $(document).ready(function() {

  //---------------------form reset start-------------------
    $('#backButton').on('click', function() {
      $('#addSubject').removeClass('was-validated');
            $('#addSubject').addClass('needs-validation');
            $('#addSubject')[0].reset(); // Reset the form


        $('#addSubjectModal').addClass('d-none');
        $('#StuContent').removeClass('d-none');
    });

    $('#editBackButton').on('click', function() {
   
        $('#editSubjectModal').addClass('d-none');
        $('#StuContent').removeClass('d-none');
    });

    $('#cancelButton').on('click', function() {

      $('#addSubject').removeClass('was-validated');
            $('#addSubject').addClass('needs-validation');
            $('#addSubject')[0].reset(); // Reset the form

        $('#addSubjectModal').addClass('d-none');
        $('#StuContent').removeClass('d-none');
    });

    $('#editCancelButton').on('click', function() {


  $('#editSubjectModal').addClass('d-none');
  $('#StuContent').removeClass('d-none');
});


//---------------------form reset end -------------------

      //-----------university select course load start -----------------------------

      $('#university').change(function() {
        var universityId = $(this).val();
        alert(universityId);
        
        if (universityId === "") {
            $('#course').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            return; // No university selected, exit the function
        }

        $.ajax({
            url: "action/actSubject.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { universitySub: universityId },
            dataType: 'json',
            success: function(response) {
                
                var options = '<option value="">--Select the Course--</option>';
                
                 // Loop through each course in the response and append to options
                 $.each(response, function(index, course) {
                    options += '<option value="' + course.cou_id + '">' + course.cou_name + '</option>';
                });
                $('#course').html(options); // Update the course dropdown
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });

    //-----------course select elective load end -----------------------------



          //-----------university select course load start -----------------------------

          $('#course').change(function() {
        var electiveId = $(this).val();
        alert(electiveId);
        
        if (electiveId === "") {
            $('#elective').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown
            $('#electiveDiv').hide(); // Hide the elective div if no course is selected
            $('#addElectiveButton').attr('data-type', '');
            return; // No course selected, exit the function
        }

        $.ajax({
            url: "action/actSubject.php", // URL of the PHP script to handle the request
            type: "POST",
            data: { electiveSub: electiveId },
            dataType: 'json',
            success: function(response) {
                  // Handle course details
                if (response.course) {
                    var duration = response.course.cou_duration;
                    var examType = response.course.cou_exam_type;

                    var options = '<option value="">--Select--</option>';
                    
                    if (examType === 'Year') {
                        for (var i = 1; i <= duration; i++) {
                            options += '<option value="' + i + '">' + i + ' st Year</option>';
                        }
                    } else if (examType === 'Semester') {
                        for (var i = 1; i <= (duration * 2); i++) {
                            options += '<option value="' + i + '">' + i + ' st Semester</option>';
                        }
                    }

                    $('#year').html(options);
                }
                   // Handle elective details
                   if (response.electives && response.electives.length > 0) {
                    $('#electiveDiv').show(); // Show the elective div if there are courses
                    var electiveOptions = '<option value="">--Select the Course--</option>';

                    // Loop through each course in the response and append to options
                    $.each(response.electives, function(index, course) {
                        electiveOptions += '<option value="' + course.ele_id + '">' + course.ele_elective + '</option>';
                    });
                    $('#elective').html(electiveOptions); // Update the course dropdown

                    $('#addElectiveButton').attr('data-type', 'elective');
                    $('#subType').val("Elective");
                } else {
                    $('#electiveDiv').hide(); // Hide the elective div if no courses
                    $('#elective').html('<option value="">--Select the Course--</option>'); // Clear the course dropdown

                    $('#addElectiveButton').attr('data-type', 'language'); // Set the data-type for language
                    $('#subType').val("language");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed: " + status + ", " + error);
            }
        });
    });

    //-----------course select elective load end -----------------------------

       
    $('#addInputButton').click(function() {
        var newInputDiv = $('<div class="row mt-3"></div>');

        var inputDiv1 = $('<div class="col-sm-5"></div>');
        var inputLabel1 = $('<label class="form-label"><b>Subject Code</b></label>');
        var input1 = $('<input type="text" class="form-control" name="newInputSubjectCode[]" required>');
        inputDiv1.append(inputLabel1);
        inputDiv1.append(input1);
        newInputDiv.append(inputDiv1);

        var inputDiv2 = $('<div class="col-sm-5"></div>');
        var inputLabel2 = $('<label class="form-label"><b>Subject Name</b></label>');
        var input2 = $('<input type="text" class="form-control" name="newInputSubjectName[]" required>');
        inputDiv2.append(inputLabel2);
        inputDiv2.append(input2);
        newInputDiv.append(inputDiv2);

        var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
        var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
        deleteButton.click(function() {
            newInputDiv.remove();
        });
        deleteButtonDiv.append(deleteButton);

        newInputDiv.append(deleteButtonDiv);

        $('#additionalInputs').append(newInputDiv);
    });

    $('#addElectiveButton').click(function() {
        var buttonType = $(this).attr('data-type');

        if (buttonType === 'language') {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-3"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Language Name</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputLanguageSubjectCode[]" required>');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-4"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Language Subject Code</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputLanguageSubjectName[]" required>');
            inputDiv2.append(inputLabel2);
            inputDiv2.append(input2);
            newInputDiv.append(inputDiv2);

            var inputDiv3 = $('<div class="col-sm-4"></div>');
            var inputLabel3 = $('<label class="form-label"><b>Language Subject Name</b></label>');
            var input3 = $('<input type="text" class="form-control" name="newInputLanguageSubjectType[]" required>');
            inputDiv3.append(inputLabel3);
            inputDiv3.append(input3);
            newInputDiv.append(inputDiv3);

            var deleteButtonDiv = $('<div class="col-sm-1 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(deleteButtonDiv);

            $('#electiveInputs').append(newInputDiv);
        } else if (buttonType === 'elective') {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-5"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Elective Subject Code</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputElectiveSubjectCode[]">');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-5"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Elective Subject Name</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputElectiveSubjectName[]">');
            inputDiv2.append(inputLabel2);
            inputDiv2.append(input2);
            newInputDiv.append(inputDiv2);

            var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(deleteButtonDiv);

            $('#electiveInputs').append(newInputDiv);
        }
    });


    $('#editAddInputButton').click(function() {
        var newInputDiv = $('<div class="row mt-3"></div>');

        var inputDiv1 = $('<div class="col-sm-5"></div>');
        var inputLabel1 = $('<label class="form-label"><b>Subject Code</b></label>');
        var input1 = $('<input type="text" class="form-control" name="EditNewInputSubjectCode[]" required>');
        inputDiv1.append(inputLabel1);
        inputDiv1.append(input1);
        newInputDiv.append(inputDiv1);

        var inputDiv2 = $('<div class="col-sm-5"></div>');
        var inputLabel2 = $('<label class="form-label"><b>Subject Name</b></label>');
        var input2 = $('<input type="text" class="form-control" name="editNewInputSubjectName[]" required>');
        inputDiv2.append(inputLabel2);
        inputDiv2.append(input2);
        newInputDiv.append(inputDiv2);

        var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
        var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
        deleteButton.click(function() {
            newInputDiv.remove();
        });
        deleteButtonDiv.append(deleteButton);

        newInputDiv.append(deleteButtonDiv);

        $('#editLanguageInputs').append(newInputDiv);
    });

    $('#editAddElectiveButton').click(function() {
        var buttonType = $(this).attr('data-type');

        if (buttonType === 'language') {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-3"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Language Name</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputLanguageSubjectCode[]" required>');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-4"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Language Subject Code</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputLanguageSubjectName[]" required>');
            inputDiv2.append(inputLabel2);
            inputDiv2.append(input2);
            newInputDiv.append(inputDiv2);

            var inputDiv3 = $('<div class="col-sm-4"></div>');
            var inputLabel3 = $('<label class="form-label"><b>Language Subject Name</b></label>');
            var input3 = $('<input type="text" class="form-control" name="newInputLanguageSubjectType[]" required>');
            inputDiv3.append(inputLabel3);
            inputDiv3.append(input3);
            newInputDiv.append(inputDiv3);

            var deleteButtonDiv = $('<div class="col-sm-1 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(deleteButtonDiv);

            $('#editElectiveInputs').append(newInputDiv);
        } else if (buttonType === 'elective') {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-5"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Elective Subject Code</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputElectiveSubjectCode[]">');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-5"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Elective Subject Name</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputElectiveSubjectName[]">');
            inputDiv2.append(inputLabel2);
            inputDiv2.append(input2);
            newInputDiv.append(inputDiv2);

            var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(deleteButtonDiv);

            $('#editElectiveInputs').append(newInputDiv);
        }
    });
});




// Ajax form submission
$('#addSubject').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var form = this; // Get the form element
            if (form.checkValidity() === false) {
                // If the form is invalid, display validation errors
                form.reportValidity();
                return;
            }
            
            var formData = new FormData(this);

            $.ajax({
                url: 'action/actSubject.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {

                // Handle success response
        console.log(response);
        if (response.success) {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: response.message,
            timer: 2000
          }).then(function() {

            $('#addSubjectModal').addClass('d-none');
            $('#StuContent').removeClass('d-none');
            
            // $('#addSubject').modal('hide');
            $('#scroll-horizontal-datatable').load(location.href + ' #scroll-horizontal-datatable > *', function() {
              $('#scroll-horizontal-datatable').DataTable().destroy();
              $('#scroll-horizontal-datatable').DataTable({
                "paging": true, // Enable pagination
                "ordering": true, // Enable sorting
                "searching": true // Enable searching
              });
            });
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message
          });
        }
      },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle error response
                    alert('Error adding Enquiry: ' + textStatus);
                }
            });
        });



        //----------------edit subject ----------------------------------

              // edit function -------------------------
              function editSubject(editId) {
    $('#StuContent').addClass('d-none');
    $('#editSubjectModal').removeClass('d-none');
    
    $.ajax({
        url: 'action/actSubject.php',
        method: 'POST',
        data: { editId: editId },
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                console.error('Error:', response.error);
                return;
            }

            $('#editSubId').val(response.sub_id);
            $('#editUniversity').val(response.sub_uni_id);
            $('#editCourse').val(response.sub_cou_id);
            $('#editElective').val(response.sub_ele_id);
            $('#editYear').val(response.sub_exam_patten);

            $('#editAddElectiveButton').attr('data-type', 'elective');

            // Clear previous input fields
            $('#electiveInputs').empty();
            $('#languageInputs').empty();

            // Example data structure for electiveSubjects and languageSubjects
            const electiveSubjects = []; // Populate this with actual data if needed
            const languageSubjects = []; // Populate this with actual data if needed

            // Render elective and language subjects
            renderSubjectInputs('elective', electiveSubjects);
            renderSubjectInputs('language', languageSubjects);
        },
        error: function(xhr, status, error) {
            console.error('AJAX request failed:', status, error);
        }
    });
}

function renderSubjectInputs(subjectType, data) {
    var container = subjectType === 'elective' ? '#electiveInputs' : '#languageInputs';
    $(container).empty();
    
    if (Array.isArray(data)) {
        data.forEach(function(subject, index) {
            var newInputDiv = $('<div class="row mb-3"></div>'); // Added mb-3 class for some margin

            var input1Div = $('<div class="col-sm-5"></div>');
            var input1Label = $('<label class="form-label"><b>Subject Code</b></label>');
            var input1 = $('<input type="text" class="form-control" name="' + (subjectType === 'elective' ? 'editElectiveSubjectCode[]' : 'editLanguageSubjectCode[]') + '" required>').val(subject.code);
            input1Div.append(input1Label);
            input1Div.append(input1);

            var input2Div = $('<div class="col-sm-5"></div>');
            var input2Label = $('<label class="form-label"><b>Subject Name</b></label>');
            var input2 = $('<input type="text" class="form-control" name="' + (subjectType === 'elective' ? 'editElectiveSubjectName[]' : 'editLanguageSubjectName[]') + '" required>').val(subject.name);
            input2Div.append(input2Label);
            input2Div.append(input2);

            var deleteButtonDiv = $('<div class="col-sm-2 d-flex align-items-end"></div>');
            var deleteButton = $('<button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>');
            deleteButton.click(function() {
                newInputDiv.remove();
            });
            deleteButtonDiv.append(deleteButton);

            newInputDiv.append(input1Div);
            newInputDiv.append(input2Div);
            newInputDiv.append(deleteButtonDiv);

            $(container).append(newInputDiv);
        });
    } else {
        console.error('Subject data is not an array.');
    }
}






</script>







<script>
    document.getElementById('addSubjectBtn').addEventListener('click', function() {
        document.getElementById('StuContent').classList.add('d-none');
        document.getElementById('addSubjectModal').classList.remove('d-none');
    });
    document.getElementById('backToMainBtn').addEventListener('click', function() {
            document.getElementById('StuContent').classList.remove('d-none');
            document.getElementById('addSubjectModal').classList.add('d-none');
        });
</script>
     

</body>

</html>



