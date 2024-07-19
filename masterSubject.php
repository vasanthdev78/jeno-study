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
                    
                     <tr>
                        <td>1</td>
                        <td>CS705</td>
                        <td>Cloud Computing</td>
                        <td>1 st Year</td>
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>CS709</td>
                        <td>Internet Protocol</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>CS745</td>
                        <td>Artificial Inteligence</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>CS805</td>
                        <td>Python</td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
                        </td>
                        <?php } ?>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>CS205</td>
                        <td>Maths 1 </td>
                        <td>1 st Year</td>
                    
                        <?php if ($user_role == 'Admin') { ?>
                        <td>
                            <button type="button" class="btn btn-circle btn-warning text-white modalBtn" onclick="goEditStudent(<?php echo $id; ?>);" data-bs-toggle="modal" data-bs-target="#editSubjectModal"><i class='bi bi-pencil-square'></i></button>
                            <button class="btn btn-circle btn-danger text-white" onclick="goDeleteStudent(<?php echo $id; ?>);"><i class="bi bi-trash"></i></button>
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

    $('#cancelButton').on('click', function() {

      $('#addSubject').removeClass('was-validated');
            $('#addSubject').addClass('needs-validation');
            $('#addSubject')[0].reset(); // Reset the form

        $('#addSubjectModal').addClass('d-none');
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

        // Function to show or hide the category field based on the selected course
        function toggleCategoryField() {
            var selectedCourse = $('#course').val();
            if (selectedCourse === 'MBA') {
                $('#categoryField').show();
            } else {
                $('#categoryField').hide();
            }
            updateLanguageButtonLabel(); // Call to update the button label
        }

        // Function to update the label and inputs of the "Add Language Subject" button
        function updateLanguageButtonLabel() {
            var selectedCourse = $('#course').val();
            var selectedCategory = $('#category').val();
            var addButton = $('#addElectiveButton');

            if (selectedCourse === 'MBA' && selectedCategory !== '') {
                addButton.text('Add Elective Subject').attr('data-type', 'elective');
                $('#languageSubjectsHeader').text('Elective Subjects');
            } else {
                addButton.text('Add Language Subject').attr('data-type', 'language');
                $('#languageSubjectsHeader').text('Language Subjects');
            }
        }

        // Initial state on document ready
        toggleCategoryField();

        // Event listener for course select change
        $('#course').change(function() {
            toggleCategoryField();
        });

        // Event listener for category select change
        $('#category').change(function() {
            updateLanguageButtonLabel();
        });

        $('#addInputButton').click(function() {
            var newInputDiv = $('<div class="row mt-3"></div>');

            var inputDiv1 = $('<div class="col-sm-5"></div>');
            var inputLabel1 = $('<label class="form-label"><b>Subject Code</b></label>');
            var input1 = $('<input type="text" class="form-control" name="newInputSubjectCode[]">');
            inputDiv1.append(inputLabel1);
            inputDiv1.append(input1);
            newInputDiv.append(inputDiv1);

            var inputDiv2 = $('<div class="col-sm-5"></div>');
            var inputLabel2 = $('<label class="form-label"><b>Subject Name</b></label>');
            var input2 = $('<input type="text" class="form-control" name="newInputSubjectName[]">');
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
                var input1 = $('<input type="text" class="form-control" name="newInputElectiveSubjectCode[]">');
                inputDiv1.append(inputLabel1);
                inputDiv1.append(input1);
                newInputDiv.append(inputDiv1);

                var inputDiv2 = $('<div class="col-sm-4"></div>');
                var inputLabel2 = $('<label class="form-label"><b>Language Subject Code</b></label>');
                var input2 = $('<input type="text" class="form-control" name="newInputElectiveSubjectName[]">');
                inputDiv2.append(inputLabel2);
                inputDiv2.append(input2);
                newInputDiv.append(inputDiv2);

                var inputDiv3 = $('<div class="col-sm-4"></div>');
                var inputLabel3 = $('<label class="form-label"><b>Language Subject Name</b></label>');
                var input3 = $('<input type="text" class="form-control" name="newInputElectiveSubjectType[]">');
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
    });
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



