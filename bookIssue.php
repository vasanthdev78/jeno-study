<?php
session_start();
    include("db/dbConnection.php");
    
    $selQuery = "SELECT 
    b.book_id,
    b.book_stu_id,
    b.book_received,
    b.book_issued,
    b.book_id_card,
    b.book_year,
    b.book_created_at,
    b.book_created_by,
    b.book_updated_at,
    b.book_updated_by,
    b.book_status,
    c.stu_name,
    c.stu_apply_no,
    c.stu_phone
    FROM 
    jeno_book b
    JOIN 
    (SELECT 
        book_stu_id, 
        MAX(book_id) as max_book_id 
     FROM 
        jeno_book 
     GROUP BY 
        book_stu_id) sub 
    ON 
    b.book_id = sub.max_book_id LEFT JOIN jeno_student AS c ON b.book_stu_id = c.stu_id WHERE b.book_status ='Active';";

    $resQuery = mysqli_query($conn , $selQuery); 
    
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
        <?php include("formBookIssue.php");?>
        <div class="content-page">
            <div class="content">

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
                               
                                <h4 class="page-title">Books Issue</h4>   
                            </div>
                        </div>
                    </div>

                      <!-- Filters -->
                      <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="universityFilter">University</label>
                            <select id="universityFilter" class="form-control">
                                <option value="">All</option>
                                <option value="University1">University Of Madras</option>
                                <option value="University2">Anna University</option>
                                <option value="University3">MS University</option>
                                <option value="University4">Alagappa University</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="courseFilter">Course</label>
                            <select id="courseFilter" class="form-control">
                                <option value="">All</option>
                                <option value="Course1">BBA</option>
                                <option value="Course2">BCA</option>
                                <option value="Course3">MBA</option>
                                <option value="Course4">MCA</option>
                                <option value="Course5">BSc</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="yearFilter">Year</label>
                            <select id="yearFilter" class="form-control">
                                <option value="">All</option>
                                <option value="1stYear">1st Year</option>
                                <option value="2ndYear">2nd Year</option>
                                <option value="3rdYear">3rd Year</option>
                                <option value="4thYear">4th Year</option>
                                <option value="5thYear">5th Year</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-2 mt-4">
                            <button id="searchButton" class="btn btn-primary">Search</button>
                            </div>  
                        
                    </div>


            
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                    <tr class="bg-light">
                                   <th scope="col-1">S.No.</th>
                                    <th scope="col">Student Name</th>
                                    <!-- <th scope="col">Course</th>
                                    <th scope="col">Year</th> -->
                                    <th scope="col">Book Receive</th>
                                    <th scope="col">Book Issue</th>
                                    <th scope="col">ID Card</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                        $id = $row['book_id']; 
                        $name = $row['stu_name']; 
                        $bookRes = $row['book_received']; 
                        $idCard = $row['book_id_card']; 
                        $contact = $row['stu_phone']; 
                        $stu_apply_no = $row['stu_apply_no']; 
                        ?>

                     <tr>
                     
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $bookRes; ?></td>
                        <td></td>
                        <td><?php echo $idCard; ?></td>
                        <td><?php echo $contact; ?></td>
                    
                    
                        <td>
                        <button type="button" onclick="goAddBook('<?php echo $stu_apply_no; ?>');" class="btn btn-circle btn-warning text-white modalBtn" data-bs-toggle="modal" data-bs-target="#addBookIssueModal"><i class="bi bi-journal-plus"></i></button>

                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewBook(<?php echo $id; ?>);"><i class="bi bi-eye-fill"></i></button>
                        </td>
                      </tr>
                      <?php 
                    }
                     ?>
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

  <!--  Select2 Plugin Js -->
  <script src="assets/vendor/select2/js/select2.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>
    

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    
    
       <script>

            $('#backButtonBook').on('click', function() {


            $('#StuContent').addClass('d-none');
            $('#bookView').removeClass('d-none');
            });


        function goAddBook(addGetId) {
            alert("click button");
            $('#addBookissue').removeClass('was-validated');
            $('#addBookissue').addClass('needs-validation');
            $('#addBookissue')[0].reset(); // Reset the form
            
            $.ajax({
                url: 'action/actBook.php',
                method: 'POST',
                data: {
                    addGetId: addGetId
                },
                dataType: 'json', // Ensure the expected data type as JSON
                success: function(response) {
                    $('#admissionId').val(response.stu_apply_no);
                    $('#studentName').val(response.stu_name);
                    $('#studentId').val(response.stu_id);
                    $('#studentName').val(response.stu_name);
                    $('#year').val(response.stu_study_year);
                    $('#typeExam').val(response.cou_fees_type);
                    $('#bookId').val(response.book_id);
                      // Populate the select input with study years or semesters based on course duration and fees type
            var courseYearSelect = $('#courseyear');
            courseYearSelect.empty(); // Clear existing options
            courseYearSelect.append(new Option('--select year--', '')); // Add default option

            var html = '';

            if (response.cou_fees_type == 'Year') {
                for (var i = 1; i <= response.cou_duration; i++) {
                    html += '<option value="' + i + '">' + i + ' Year</option>';
                }
            } else if (response.cou_fees_type == 'Semester') {
                for (var i = 1; i <= response.cou_duration * 2; i++) {
                    html += '<option value="' + i + '">' + i + ' Semester</option>';
                }
            }

            courseYearSelect.append(html);
            // courseYearSelect.val(response.stu_study_year); // Set the selected value to the current study year if it exists in the options

    
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error('AJAX request failed:', status, error);
                }
            });
        }


        $(document).ready(function() {
    // Bind the change event to the select element
    $('#courseyear').change(function() {
        var selectedYear = $(this).val(); // Get the selected value
        var admissionId = $('#admissionId').val(); // Get the selected value
        var typeExam = $('#typeExam').val(); // Get the selected value
        
        // Make sure a valid year is selected
        if (selectedYear !== '') {
            $.ajax({
                url: 'action/actBook.php',
                method: 'POST',
                data: {
                    year: selectedYear,
                    admissionId: admissionId,
                    typeExam: typeExam
                },
                // dataType: 'json',
                success: function(response) {
                    // Handle the response data
                    console.log(response);
                    alert(response.final_subjects);
                    
               // Populate the select element with final subjects from the response array
                var $select = $('#bookIssue');
                var $select1 = $('#bookUniReceived');

                // Clear existing options if any
                $select.empty();
                $select1.empty();

                

                    // Add filtered subjects to the select element
                    response.final_subjects.forEach(function(subject) {
                        var $option = $('<option>').val(subject).text(subject);
                        $select.append($option);
                    });

                       // Add filtered subjects to the select element
                       response.Uni_final_subjects.forEach(function(subject) {
                        var $option = $('<option>').val(subject).text(subject);
                        $select1.append($option);
                    });

                    // Initialize Select2 on the select element
                    $select.select2();
                    $select1.select2();
               
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    });
    });




    $('#addBookissue').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    var formData = new FormData(this);
    $.ajax({
      url: "action/actBook.php",
      method: 'POST',
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
            
                $('#addBookIssueModal').modal('hide');
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
      error: function(xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'An error occurred while adding Fees data.'
        });
        // Re-enable the submit button on error
        $('#submitBtn').prop('disabled', false);
      }
    });
  });




//   ____________________________________________________________________________________________________________



function goViewBook(id) 
    {
      alert('sdafda');
    //location.href = "clientDetail.php?clientId="+id;
    $.ajax({
        url: 'action/actBook.php',
        method: 'POST',
        data: {
            id: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
          
          $('#StuContent').hide();
          $('#SubjectView').removeClass('d-none');
        
          $('#viewUniversityName').text(response.sub_uni_id);
          $('#viewCourseName').text(response.sub_cou_id);
          
          $('#viewyearSemester').text(response.sub_exam_patten);
        //   $('#viewFeesType').text(response.cou_fees_type);
        //   $('#viewDuration').text(response.cou_duration +" Years");
  // Clear previous input fields
  $('#viewSubjectInputs').empty();
    $('#viewAdditionSubjectInputs').empty();

    // Directly assume sub_subject_code and sub_subject_name are arrays of equal length
    if (Array.isArray(response.sub_subject_code) && Array.isArray(response.sub_subject_name)) {
        response.sub_subject_code.forEach(function(subjectCode, index) {
            var subjectName = response.sub_subject_name[index];
            
            var newInputDiv = $('<div class="row mb-3 detail-card"></div>'); // Added mb-3 class for some margin

            var input1Div = $('<div class="col-sm-6"></div>');
            var input1Card = $('<div class="card p-3"></div>');
            var input1Label = $('<h4>Subject Code</h4>');
            var input1 = $('<span class="detail"></span>').text(subjectCode);
            input1Card.append(input1Label);
            input1Card.append(input1);
            input1Div.append(input1Card);

            var input2Div = $('<div class="col-sm-6"></div>');
            var input2Card = $('<div class="card p-3"></div>');
            var input2Label = $('<h4>Subject Name</h4>');
            var input2 = $('<span class="detail"></span>').text(subjectName);
            input2Card.append(input2Label);
            input2Card.append(input2);
            input2Div.append(input2Card);

            newInputDiv.append(input1Div);
            newInputDiv.append(input2Div);

            $('#viewSubjectInputs').append(newInputDiv);
        });
    } else {
        console.error('sub_subject_code or sub_subject_name is not an array.');
    }

    // Check if sub_addition_lag_name is not empty and add those inputs
    if (Array.isArray(response.sub_addition_lag_name) && response.sub_addition_lag_name.length > 0) {
        response.sub_addition_lag_name.forEach(function(languageName, index) {
            var subCode = response.sub_addition_sub_code[index];
            var subName = response.sub_addition_sub_name[index];

            var newInputDiv = $('<div class="row mb-3 detail-card"></div>'); // Added mb-3 class for some margin

            var input1Div = $('<div class="col-sm-4"></div>');
            var input1Card = $('<div class="card p-3"></div>');
            var input1Label = $('<h4>Additional Language Name</h4>');
            var input1 = $('<span class="detail"></span>').text(languageName);
            input1Card.append(input1Label);
            input1Card.append(input1);
            input1Div.append(input1Card);

            var input2Div = $('<div class="col-sm-4"></div>');
            var input2Card = $('<div class="card p-3"></div>');
            var input2Label = $('<h4>Subject Code</h4>');
            var input2 = $('<span class="detail"></span>').text(subCode);
            input2Card.append(input2Label);
            input2Card.append(input2);
            input2Div.append(input2Card);

            var input3Div = $('<div class="col-sm-4"></div>');
            var input3Card = $('<div class="card p-3"></div>');
            var input3Label = $('<h4>Subject Name</h4>');
            var input3 = $('<span class="detail"></span>').text(subName);
            input3Card.append(input3Label);
            input3Card.append(input3);
            input3Div.append(input3Card);

            newInputDiv.append(input1Div);
            newInputDiv.append(input2Div);
            newInputDiv.append(input3Div);

            $('#viewAdditionSubjectInputs').append(newInputDiv);
        });
    } else {
        if (Array.isArray(response.sub_addition_sub_code) && Array.isArray(response.sub_addition_sub_name)) {
            $('#viewElectiveDiv').removeClass("d-none");
           
            $('#viewElective').text(response.ele_elective);

            response.sub_addition_sub_code.forEach(function(subCode, index) {
                var subName = response.sub_addition_sub_name[index];

                var newInputDiv = $('<div class="row mb-3 detail-card"></div>'); // Added mb-3 class for some margin

                var input1Div = $('<div class="col-sm-6"></div>');
                var input1Card = $('<div class="card p-3"></div>');
                var input1Label = $('<h4>Elective Subject Code</h4>');
                var input1 = $('<span class="detail"></span>').text(subCode);
                input1Card.append(input1Label);
                input1Card.append(input1);
                input1Div.append(input1Card);

                var input2Div = $('<div class="col-sm-6"></div>');
                var input2Card = $('<div class="card p-3"></div>');
                var input2Label = $('<h4>Elective Subject Name</h4>');
                var input2 = $('<span class="detail"></span>').text(subName);
                input2Card.append(input2Label);
                input2Card.append(input2);
                input2Div.append(input2Card);

                newInputDiv.append(input1Div);
                newInputDiv.append(input2Div);

                $('#viewAdditionSubjectInputs').append(newInputDiv);
            });
        } else {
            console.error('sub_addition_sub_code or sub_addition_sub_name is not an array.');
        }
    }   },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }

        
    </script>
   

</body>

</html>



