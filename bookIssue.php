<?php
session_start();
    include "db/dbConnection.php"; // database connection
    include "class.php";

    $centerId = $_SESSION['centerId'];

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
    c.stu_addmision_new,
    c.stu_phone
    ,d.uni_name
    ,e.cou_name
FROM 
    jeno_book b
JOIN 
    (SELECT 
        book_stu_id, 
        MAX(book_id) AS max_book_id 
     FROM 
        jeno_book 
     GROUP BY 
        book_stu_id) sub 
    ON 
    b.book_id = sub.max_book_id 
LEFT JOIN 
    jeno_student AS c 
    ON 
    b.book_stu_id = c.stu_id 
    LEFT JOIN jeno_university AS d ON c.stu_uni_id = d.uni_id
    LEFT JOIN jeno_course AS e ON c.stu_cou_id = e.cou_id
WHERE 
    b.book_status = 'Active' 
    AND b.book_center_id = '$centerId'
ORDER BY 
    b.book_id DESC;"; // book issue student list show

    $resQuery = mysqli_query($conn , $selQuery); 
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>
<body>
    <!-- Begin page -->
    <div class="wrapper">

        
        <!-- ========== Topbar Start ========== -->
        <?php include "top.php" ?>
        <!-- ========== Topbar End ========== -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

        <?php include "left.php"; ?>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        
        <div class="content-page">
            <div class="content">
            <?php include "formBookIssue.php";?>
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

                      
                    <div class="row mb-3">
                <!-- University Filter -->
                <div class="col-md-3">
                    <label for="filter-university">University</label>
                    <select id="filter-university" class="form-select">
                        <option value="">All Universities</option>
                        <?php 
                                        $uniCenterId = $_SESSION['centerId'];
                                        $university_result = universityTable($uniCenterId); // Call the function to fetch universities 
                                        while ($row = $university_result->fetch_assoc()) {
                                            $id = $row['uni_id']; 
                                    $name = $row['uni_name'];    
                        
                                      ?>
                        
                        <option value="<?php echo $name;?>"><?php echo $name;?></option>

                        <?php } ?>
                    </select>
                </div>
                
                <!-- Course Filter -->
                <div class="col-md-3">
                    <label for="filter-course">Course</label>
                    <select id="filter-course" class="form-select">
                        <option value="">All Courses</option>
                        <?php 
                                        $uniCenterId = $_SESSION['centerId'];
                                        $university_result = courseTable($uniCenterId); // Call the function to fetch universities 
                                        while ($row = $university_result->fetch_assoc()) {
                                            $id = $row['cou_id']; 
                                    $name = $row['cou_name'];    
                        
                                      ?>
                        
                        <option value="<?php echo $name;?>"><?php echo $name;?></option>

                        <?php } ?>
                    </select>
                </div>
                
                <!-- Year Filter -->
                <!-- <div class="col-md-3">
                    <label for="filter-year">Year</label>
                    <select id="filter-year" class="form-select">
                        <option value="">All Years</option>
                         Add dynamic options for years 
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div> -->

            </div>

            
             
             <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                    <tr class="bg-light">
                                   <th scope="col-1">S.No.</th>
                                   <th scope="col">Addmission Id</th>
                                   <th scope="col">University</th>
                                    <th scope="col">Student Name</th>
                                     <th scope="col">Course</th>
                                    <!-- <th scope="col">Year</th> --> 
                                    <th scope="col">Book Receive</th>
                                    <th scope="col">ID Card</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th>
                                    
                                    
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    $i=1; while($row = mysqli_fetch_array($resQuery , MYSQLI_ASSOC)) { 
                        $id = $row['book_id']; 
                        $book_stu_id = $row['book_stu_id']; 
                        $name = $row['stu_name']; 
                        $uni_name = $row['uni_name']; 
                        $cou_name = $row['cou_name']; 
                        $bookRes = $row['book_received']; 
                        $idCard = $row['book_id_card']; 
                        $contact = $row['stu_phone']; 
                        $stu_apply_no_old = $row['stu_apply_no']; 
                        $stu_apply_no = $row['stu_addmision_new']; 
                        ?>

                     <tr>
                     
                        <td><?php echo $i; $i++; ?></td>
                        
                        <td><?php echo !empty($stu_apply_no) ? $stu_apply_no : '---'; ?></td>
                        <td><?php echo $uni_name; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $cou_name; ?></td>
                        <td><?php echo $bookRes; ?></td>
                        
                        <td><?php echo $idCard; ?></td>
                        <td><?php echo $contact; ?></td>
                    
                    
                        <td>
                        <button type="button" onclick="goAddBook('<?php echo $stu_apply_no_old; ?>');" class="btn btn-circle btn-warning text-white modalBtn" data-bs-toggle="modal" data-bs-target="#addBookIssueModal"><i class="bi bi-journal-plus"></i></button>

                            <button class="btn btn-circle btn-success text-white modalBtn" onclick="goViewBook(<?php echo $book_stu_id; ?>);"><i class="bi bi-eye-fill"></i></button>
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
            <?php include "footer.php" ?>
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
    
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert/2@11/dist/sweetalert2.all.min.js"></script> -->
  <script src="assets/addlink/sweetalert.js"></script>

  <!--  Select2 Plugin Js -->
  <script src="assets/vendor/select2/js/select2.min.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>
    

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Event listeners for the filters
    document.getElementById("filter-university").addEventListener("change", filterTable);
    document.getElementById("filter-course").addEventListener("change", filterTable);

    function filterTable() {
        const universityFilter = document.getElementById("filter-university").value.toLowerCase();
        const courseFilter = document.getElementById("filter-course").value.toLowerCase();
        const table = document.getElementById("scroll-horizontal-datatable");
        const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let universityText = rows[i].getElementsByTagName("td")[2].textContent.toLowerCase(); // Correct index for University column
            let courseText = rows[i].getElementsByTagName("td")[4].textContent.toLowerCase(); // Correct index for Course column

            // Check if the row matches the filters
            let isMatch = true;

            if (universityFilter && !universityText.includes(universityFilter)) {
                isMatch = false;
            }
            if (courseFilter && !courseText.includes(courseFilter)) {
                isMatch = false;
            }

            rows[i].style.display = isMatch ? "" : "none"; // Show or hide the row based on the filter
        }
    }
});
</script>

    
       <script>

            $('#backButtonBook').on('click', function() {


            $('#bookView').addClass('d-none');
            $('#StuContent').show();
            });


            function goAddBook(addGetId) {
    // Reset the form and validation state
    $('#addBookissue').removeClass('was-validated');
    $('#addBookissue').addClass('needs-validation');
    $('#addBookissue')[0].reset();
    
    // First AJAX request to fetch student and course details
    $.ajax({
        url: 'action/actBook.php',
        method: 'POST',
        data: {
            addGetId: addGetId
        },
        dataType: 'json', // Ensure the expected data type as JSON
        success: function(response) {
            // Populate the form fields with the response data
            $('#admissionId').val(response.stu_apply_no);
            $('#studentName').val(response.stu_name);
            $('#studentId').val(response.stu_id);
            $('#year').val(response.stu_aca_year);
            $('#typeExam').val(response.cou_exam_type);
            $('#bookId').val(response.book_id);

            
                // Set the corresponding radio button based on the response value
                if (response.book_received === "Received") {
                    $('#bookReceived').prop('checked', true);
                } else if (response.book_received === "Not Received") {
                    $('#bookNotReceived').prop('checked', true);
                }   
                 // Set the corresponding radio button based on the response value
                 if (response.book_id_card === "Issued") {
                    $('#Issue').prop('checked', true);
                } else if (response.book_id_card === "Not Issued") {
                    $('#notIssue').prop('checked', true);
                } 
            

            // if(response.fee_sdy_fee_total == response.fee_sty_fee){

            //     $('#courseyear').prop('disabled', false);
            // }
            var joining_year = parseInt(response.stu_join_year);
                var current_year = parseInt(response.stu_aca_year);

                // Populate the select input with study years or semesters based on course duration and fees type
                var courseYearSelect = $('#courseyear');
                courseYearSelect.empty(); // Clear existing options
                courseYearSelect.append(new Option('--select year--', '')); // Add default option

                var html = '';
                if (response.cou_exam_type === 'Year') {
                    for (var i = 1; i <= response.cou_duration; i++) {
                        if (i >= joining_year) {
                            html += '<option value="' + i + '">' + i + ' Year</option>';
                        }
                    }
                } else if (response.cou_exam_type === 'Semester') {
                    for (var i = 1; i <= response.cou_duration * 2; i++) {
                        if (Math.ceil(i / 2) >= joining_year) { // Convert semester to year and check
                            html += '<option value="' + i + '">' + i + ' Semester</option>';
                        }
                    }
                }
                courseYearSelect.append(html);

                // Set the selected value to the current study year if it exists in the options
                $('#courseyear').val(current_year);

            // Make the second AJAX request to fetch additional details based on the data from the first request
            $.ajax({
                url: 'action/actBook.php', // Ensure this is the correct endpoint
                type: 'POST',
                data: {
                    year: response.stu_aca_year, // Corrected the parameter name to match what you want to send
                    admissionId: response.stu_apply_no,
                    typeExam: response.cou_exam_type
                },
                dataType: 'json',
                success: function(response) {
                          // Handle the response data
                          console.log(response);
                    
                    
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
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error in second AJAX request:', textStatus, errorThrown);
                }
            });
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('Error in first AJAX request:', status, error);
        }
    });
}


        $(document).ready(function() {
    // Bind the change event to the select element
    $('#courseyear').change(function() {
        var selectedYear = $(this).val(); // Get the selected value
        var admissionId = $('#admissionId').val(); // Get the selected value
        var studentId = $('#studentId').val(); // Get the selected value
        var typeExam = $('#typeExam').val(); // Get the selected value
        
        // Make sure a valid year is selected
        if (selectedYear !== '') {
            $.ajax({
                url: 'action/actBook.php',
                method: 'POST',
                data: {
                    addyear: selectedYear,
                    addadmissionId: admissionId,
                    addtypeExam: typeExam,
                    addstudentId: studentId,
                },
                // dataType: 'json',
                success: function(response) {
                    // Handle the response data
                    console.log(response);
                    
                    
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



//--add book iisue form submit-------------------------------
    $('#addBookissue').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally
    $('#addBookissue').removeClass('was-validated');
    $('#addBookissue').addClass('needs-validation');

    $('#courseyear').prop('disabled', false);

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


//--view page data get -------------------------------------------
function goViewBook(id) {
    $.ajax({
        url: 'action/actBook.php',
        method: 'POST',
        data: { id: id },
        dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            $('#StuContent').hide();
            $('#bookView').removeClass('d-none');
        
            // Clear previous content
            $('#viewAdmissionId').text(response[0].stu_apply_no);
            $('#viewStudentName').text(response[0].stu_name);
            $('#viewIdCardStu').text(response[0].book_id_card);
            $('#viewIdCardUni').text(response[0].book_received);

            // Function to populate the div with book details grouped by year
            function populateBooksGroupedByYear(bookList, type) {
                var $viewBooks = (type === 'received') ? $('#viewUniBook') : $('#viewStuBook');
                $viewBooks.empty(); // Clear existing content

                if (!Array.isArray(bookList) || bookList.length === 0) {
                    $viewBooks.html('<p>No books available.</p>');
                    return;
                }

                var groupedBooks = {};
                
                // Group books by year
                bookList.forEach(function(item) {
                    var year = item.book_year;
                    if (year === "0") return; // Exclude year 0
                    var books = (type === 'received') ? item.book_uni_received : item.book_issued;
                    
                    if (!groupedBooks[year]) {
                        groupedBooks[year] = [];
                    }
                    
                    groupedBooks[year] = groupedBooks[year].concat(books);
                });

                var $list = $('<ul>'); // Create an unordered list to hold book items
                
                // Create list items for each year and its books
                $.each(groupedBooks, function(year, books) {
                    var $yearItem = $('<li>').text('Year / Semester : ' + year + '');
                    var $bookList = $('<ul>'); // Create a nested list for books
                    
                    books.forEach(function(book) {
                        var $bookItem = $('<li>').text(book);
                        $bookList.append($bookItem); // Append book item to the nested list
                    });

                    $yearItem.append($bookList); // Append the nested list to the year item
                    $list.append($yearItem); // Append the year item to the main list
                });

                $viewBooks.append($list); // Append the list to the div
            }

            // Prepare and populate the lists
            populateBooksGroupedByYear(response, 'received'); // For university received books
            populateBooksGroupedByYear(response, 'issued');   // For student issued books
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}


        
    </script>
   

</body>

</html>



