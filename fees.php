<?php
session_start();
    include "db/dbConnection.php"; // database connection
    include "class.php";

    $centerId = $_SESSION['centerId'];

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

              <?php include "formFees.php";?>
                <!-- Start Content-->
                <div class="container-fluid" id="feesContent">

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
                               
                                <h4 class="page-title">Fees List</h4>   
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

                <div class="col-md-3">
                    <label for="yearFilter" class="form-label">Filter by Year</label>
                    <input type="text" name="yearFilter" id="yearFilter" class="form-control" placeholder="Enter format: 23C" oninput="validateYearFilter()">
                    <small id="yearFilterError" style="color: red; display: none;">Invalid format! Please use 23C format.</small>
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
                    
            <div class="table-responsive">
             <table id="addmission_table" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    <th scope="col">Application No.</th>
                                    <th scope="col">Roll No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">University</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Balance</th>
                                    <th scope="col">University Fees Status</th>
                                    <th scope="col">Jeno Fees Status</th> 
                                    <th scope="col">Action</th>
                                    
                      </tr>
                    </thead>
                   
                  </table>
                  </div>
                  

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
    
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script> -->
  <script src="assets/addlink/sweetalert.js"></script>

    <!-- Datatable Demo Aapp js -->
    <script src="assets/js/pages/demo.datatable-init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>
        var table;
    $(document).ready(function () {
       table = $('#addmission_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: 'action/actFees.php', // Backend endpoint for data
                type: 'GET',
                data: function (d) {
                    d.centerId = <?= $centerId; ?>; // Pass centerId
                    d.university = $('#filter-university').val(); // Pass university filter
                    d.course = $('#filter-course').val(); // Pass course filter
                    d.year = $('#yearFilter').val(); // Pass year filter
                    d.feesTable = 'feesTable'; // Pass year filter
                },
            },
            columns: [
                { data: 'serial_number' },
                { data: 'application_no' },
                { data: 'roll_no' },
                { data: 'student_name' },
                { data: 'university' },
                { data: 'course' },
                { data: 'phone' },
                { data: 'balance' },
                { data: 'university_fee_status' },
                { data: 'jeno_fee_status' },
                { data: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'asc']],
            responsive: true,
        });

        $('#filter-university, #filter-course, #yearFilter').on('change keyup', function () {
            table.ajax.reload(null, false);
        });

    });
</script>
    <script>
    function validateYearFilter() {
        const input = document.getElementById('yearFilter');
        const error = document.getElementById('yearFilterError');
        const pattern = /^([1-9]\d|0[1-9])[CcAa]?$/; // Valid numbers 01-99, followed by optional C/A (case insensitive)

        if (input.value.trim() === "") {
            error.style.display = 'none'; // Hide error message
            input.style.borderColor = ''; // Reset border color
        } else if (pattern.test(input.value)) {
            error.style.display = 'none'; // Hide error message
            input.style.borderColor = ''; // Reset border color
        } else {
            error.style.display = 'block'; // Show error message
            input.style.borderColor = 'red'; // Highlight input in red
        }

        // Ensure only valid characters are entered
        if (!/^([1-9]?\d|0[1-9]?)?[CcAa]?$/.test(input.value)) {
            input.value = input.value.slice(0, -1); // Remove last invalid character
        }
    }
</script>
    <script>
        // Enable Bootstrap tooltips
document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
    </script>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    // Declare the variable outside the if-else scope
    // var dataTable;

    // // Check if DataTable is already initialized
    // if ($.fn.DataTable.isDataTable('#addmission_table')) {
    //     // Retrieve the existing DataTable instance
    //     dataTable = $('#addmission_table').DataTable();
    // } else {
    //     // Initialize the DataTable only if it is not already initialized
    //     dataTable = $('#addmission_table').DataTable();
    // }

    // Event listeners for the filters
    // document.getElementById("filter-university").addEventListener("change", function () {
    //     filterTable(dataTable);
    // });
    // document.getElementById("filter-course").addEventListener("change", function () {
    //     filterTable(dataTable);
    // });
    // document.getElementById("yearFilter").addEventListener("input", function () {
    //     filterTable(dataTable);
    // });

    function filterTable(dataTable) {
        const universityFilter = document.getElementById("filter-university").value.toLowerCase();
        const courseFilter = document.getElementById("filter-course").value.toLowerCase();
        const yearFilter = document.getElementById("yearFilter").value.trim();
        const yearRegex = yearFilter ? `^${yearFilter}` : ''; 
        dataTable.column(1).search(yearRegex, true, false).draw();
        // Apply filter for university
        dataTable.column(4).search(universityFilter || '', true, false).draw(); // Adjust column index if necessary
        // Apply filter for course
        dataTable.column(5).search(courseFilter || '', true, false).draw(); // Adjust column index if necessary
    }
});
</script>


    <script>


    $(document).ready(function() {
    

        //--calculate extra amount not entry-------------------------
    function calculateTotalAndBalance() {
    var uni_fee = parseFloat($('#universityFees').text().replace('₹ ', '')) || 0;
    var sty_fee = parseFloat($('#studyFees').text().replace('₹ ', '')) || 0;

    var universityPaid = parseFloat($('#universityPaid').val()) || 0;
    var studyPaid = parseFloat($('#studyPaid').val()) || 0;
    var amountPaid = parseFloat($('#amountPaid').val()) || 0;

    var totalUniFeeBalance = uni_fee;
    var totalStyFeeBalance = sty_fee;

    if (universityPaid > uni_fee) {
        showAlert('danger', 'Entered university fee amount exceeds the total amount by ₹ ' + (universityPaid - uni_fee));
        universityPaid = uni_fee;
        $('#universityPaid').val(uni_fee).addClass('is-invalid');
    } else {
        $('#universityPaid').removeClass('is-invalid');
    }

    if (studyPaid > sty_fee) {
        showAlert('danger', 'Entered study fee amount exceeds the total amount by ₹ ' + (studyPaid - sty_fee));
        studyPaid = sty_fee;
        $('#studyPaid').val(sty_fee).addClass('is-invalid');
    } else {
        $('#studyPaid').removeClass('is-invalid');
    }

    var totalAmount = universityPaid + studyPaid;
    $('#totalAmount').val(totalAmount);

    // Calculate the balance for each fee type
    var uniBalance = uni_fee - universityPaid;
    var styBalance = sty_fee - studyPaid;

    // Calculate the total balance
    var totalBalance = uniBalance + styBalance;
    $('#balance').val(totalBalance);

    // Calculate the remaining balance after considering the amount already paid
    var remainingBalance = totalBalance - amountPaid;
    $('#remainingBalance').val(remainingBalance);
}

function showAlert(type, message) {
        // Remove the oldest alert if more than 2 alerts are displayed
        var alerts = $('#alertContainer .alert');
        if (alerts.length >= 2) {
            alerts.first().remove();
        }

        var alertId = 'alert-' + Date.now();
        var alertHtml = 
            '<div id="' + alertId + '" class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
            message +
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
            '</div>';
        
        $('#alertContainer').append(alertHtml);

        // Automatically remove the alert after 3 seconds
        setTimeout(function() {
            $('#' + alertId).alert('close');
        }, 3000);
    }

$('#universityPaid, #studyPaid, #amountPaid').on('input', calculateTotalAndBalance);

    });
</script>

<script>

document.getElementById('paidDate').max = new Date().toISOString().split('T')[0];

$('#addCourseBtn').click(function() {

$('#addCourse').removeClass('was-validated');
$('#addCourse').addClass('needs-validation');
$('#addCourse')[0].reset(); // Reset the form
$('#fessType').val('');
$('#universityPaid').removeClass('is-invalid is-valid');
$('#studyPaid').removeClass('is-invalid is-valid');

});

$('#backButtonsubject').click(function() {
window.location.href = "fees.php";

});

function downloadBills(paymentId) {

      // Open the first bill in a new tab
      let firstWindow = window.open('action/actDownload.php?payment_id=' + paymentId, '_blank');

// Check if the first window is closed, then redirect to the second page
let checkWindow = setInterval(function () {
    if (firstWindow.closed) {
        clearInterval(checkWindow);
        window.location.href = 'action/actStudentReceipt.php?payment_id=' + paymentId;
    }
}, 500); // Check every 500ms if the first window is closed
      
    }

//----view page get data ---------------------------------
function goViewPayment(studentId) {
    $('#feesContent').hide();
    $('#clientDetail').removeClass('d-none');
    $.ajax({
        url: 'action/actFees.php', // Replace with your PHP file path
        type: 'POST', // or 'POST' depending on your PHP handling
        data: { studentId: studentId }, // Send student ID to fetch specific payment history
        dataType: 'json',
        success: function(response) {

            function formatNumber(num, currencySymbol = '₹ ') {
    return currencySymbol + Number(num).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

                 // Assuming response.data contains payment history array
                var html = '';

          //       $('#feesid').val(paymentHistory.fee_id);
          // $('#studentId').val(paymentHistory.stu_id);
       // Extract student current year from response
var studentCurrentYear = response.pay_year;

$('#viewAdmisionId').text(response.stu_addmision_new);
$('#viewStudentName').text(response.pay_student_name);
$('#ViewYear').text(response.pay_year);
$('#viewUniversityTotalFees').text(formatNumber(response.fee_uni_fee_total));
$('#viewStudyCenterTotalFees').text(formatNumber(response.fee_sdy_fee_total));
$('#viewUniversityFees').text(formatNumber(response.fee_uni_fee));
$('#viewStudyCenterFees').text(formatNumber(response.fee_sty_fee));
$('#viewTotalFees').text(formatNumber(response.totalAmount));
$('#viewTotalPaid').text(formatNumber(response.totalPaid));
$('#viewBalance').text(formatNumber(response.balance));

console.log(response.hostory_table);

function formatDate(dateString) {
    const [year, month, day] = dateString.split('-');
    return `${day}-${month}-${year}`;
}

var html = '';

response.hostory_table.forEach(function(payment, index) {
    html += '<tr>';
    html += '<td>' + (index + 1) + '</td>'; // S.No.
    html += '<td>' + payment.pay_year + '</td>'; // Payment Year
    html += '<td>' + formatDate(payment.pay_date) + '</td>'; // Payment Date
    html += '<td>' + formatNumber(payment.pay_total_amount) + '</td>'; // Amount Received
    html += '<td>' + payment.pay_paid_method + '</td>'; // Payment Method
    html += '<td>';
    html += '<button type="button" class="btn btn-primary" onclick="downloadBills(' + payment.pay_id + ')">Bill</button> &nbsp;';
   

    <?php if ($user_role == 'Admin') { ?>
        // Add delete button conditionally based on the student's current year
        if (payment.pay_year === studentCurrentYear) {
            html += '<button class="btn btn-circle btn-danger text-white gap-3" onclick="goDeleteCourse(' + payment.pay_id + ')"><i class="bi bi-trash"></i></button>';
        }
    <?php } ?>

    html += '</td>';
    html += '</tr>';
       });
                $('#paymentHistoryBody').html(html); // Append HTML to table body

                // Initialize DataTable
                $('#scroll-horizontal-datatable1').DataTable({
                    destroy: true, // Destroy existing instance before reinitializing
                    responsive: true,
                    scrollX: true
                });
           
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
//---payment method change ----------------------------
    document.getElementById('paidMethod').addEventListener('change', function() {
        var paymentMethod = this.value;
        var onlinePaymentDetails = document.getElementById('onlinePaymentDetails');
        
        if (paymentMethod === 'Online') {
            onlinePaymentDetails.style.display = 'block';
            document.getElementById('onlineTransactionId').setAttribute('required', 'required');
        } else {
            onlinePaymentDetails.style.display = 'none';
            document.getElementById('onlineTransactionId').removeAttribute('required');
        }
    });


    //--edit fees details get data ---------------------------
    function goEditFees(addGetId) {
    $('#addFees').removeClass('was-validated').addClass('needs-validation');
    $('#addFees')[0].reset(); // Reset the form
    $('#alertContainer').empty(); // Clear previous alerts

    $.ajax({
        url: 'action/actFees.php',
        method: 'POST',
        data: { addGetId: addGetId },
        dataType: 'json',
        success: function(response) {
            console.log('AJAX response received:', response); // Debugging line

            if (response && response.fee_id) {
                // Process the response data
                $('#feesid').val(response.fee_id);
                $('#studentId').val(response.stu_id);
                $('#admissionId').val(response.fee_admision_id);
                $('#studentName').val(response.stu_name);
                $('#universityFees').text('₹ ' + response.fee_uni_fee_total);
                $('#studyFees').text('₹ ' + response.fee_sdy_fee_total);

                var uni_fee = Number(response.fee_uni_fee_total);
                var sty_fee = Number(response.fee_sdy_fee_total);

                var paid_uni_fee = Number(response.fee_uni_fee);
                var paid_sty_fee = Number(response.fee_sty_fee);

                var balance_uni_fee = uni_fee - paid_uni_fee;
                var balance_sty_fee = sty_fee - paid_sty_fee;
                var total_balance = balance_uni_fee + balance_sty_fee;

                $('#balance').val(total_balance);

                $('#year').prop('disabled', total_balance > 0);
                $('#universityPaid').prop('disabled', paid_uni_fee >= uni_fee);
                $('#studyPaid').prop('disabled', paid_sty_fee >= sty_fee);

                // Populate the year dropdown based on course duration
                var options = '';
                var courseDuration = response.cou_duration;
                var feesPattern = response.cou_fees_type;
                $('#feesType').val(feesPattern);

                var studyYear = parseInt(response.stu_study_year);

                if (feesPattern === 'Semester') {
                    var totalSems = courseDuration * 2; // 2 semesters per year
                    for (var i = 1; i <= totalSems; i++) {
                        var optionText = i + ' Sem';
                        var disabled = (i !== studyYear && i !== studyYear + 1) ? ' disabled' : '';
                        options += '<option value="' + i + '"' + disabled + '>' + optionText + '</option>';
                    }
                } else if (feesPattern === 'Year') {
                    for (var i = 1; i <= courseDuration; i++) {
                        var optionText = i + ' Year';
                        var disabled = (i !== studyYear && i !== studyYear + 1) ? ' disabled' : '';
                        options += '<option value="' + i + '"' + disabled + '>' + optionText + '</option>';
                    }
                }

                $('#year').html(options);
                $('#year').val(studyYear);

                // Handle input validation for paid fields
                $('#universityPaid').off('input').on('input', function() {
                    var enteredAmount = Number($(this).val());
                    if (enteredAmount > balance_uni_fee) {
                        $('#actualBalance').val(balance_uni_fee);
                    } else {
                        $('#actualBalance').val(enteredAmount);
                    }
                    calculateTotalAndBalance();
                });

                $('#studyPaid').off('input').on('input', function() {
                    var enteredAmount = Number($(this).val());
                    if (enteredAmount > balance_sty_fee) {
                        showAlert('danger', 'Entered study fee amount exceeds the remaining balance by ₹ ' + (enteredAmount - balance_sty_fee));
                        $(this).val(balance_sty_fee).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                    calculateTotalAndBalance();
                });

                function calculateTotalAndBalance() {
                    var universityPaid = parseFloat($('#actualBalance').val()) || 0;
                    var studyPaid = parseFloat($('#studyPaid').val()) || 0;
                    var totalAmount = universityPaid + studyPaid;
                    $('#totalAmount').val(totalAmount);

                    var balance = total_balance - totalAmount;
                    $('#balance').val(balance);

                    $('#year').prop('disabled', balance > 0);
                }

                function showAlert(type, message) {
                // Remove the oldest alert if more than 2 alerts are displayed
                var alerts = $('#alertContainer .alert');
                if (alerts.length >= 2) {
                    alerts.first().remove();
                }

                var alertId = 'alert-' + Date.now();
                var alertHtml = 
                    '<div id="' + alertId + '" class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                    message +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>';
                
                $('#alertContainer').append(alertHtml);

                // Automatically remove the alert after 3 seconds
                setTimeout(function() {
                    $('#' + alertId).alert('close');
                }, 2000);
            }
            } else {
                console.error('Invalid response data');
                $('#alertContainer').append(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    'Invalid response data' +
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>'
                );
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX request failed:', status, error);
            $('#alertContainer').append(
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                'AJAX request failed: ' + error +
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                '</div>'
            );
        }
    });
}




//---add fees form submit----------------------
$('#addFees').off('submit').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting normally

    $('#year').prop('disabled', false);
    
    function resetField(fieldId) {
        var $field = $(fieldId);

        // Check if the field is currently disabled
        if ($field.prop('disabled')) {
            // Remove the disabled property
            $field.prop('disabled', false);

            // Set the value to 0
            $field.val(0);
        }
    }

    // Call the function for both fields
    resetField('#universityPaid');
    resetField('#studyPaid');

    var form = this; // Get the form element
    if (form.checkValidity() === false) {
        // If the form is invalid, display validation errors
        form.reportValidity();
        $('#year').prop('disabled', true);
        return;
    }

    // Disable the submit button to prevent double clicks
    $('#submitBtn').prop('disabled', true); // Ensure this matches your button's ID

    var formData = new FormData(form);
    $.ajax({
        url: "action/actFees.php",
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
                    $('#addFeesModal').modal('hide');
                    table.ajax.reload(null, false);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message
                });
            }

            // Re-enable the submit button after processing
            $('#submitBtn').prop('disabled', false);
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



//---delete fees details----------------------------
  function goDeleteCourse(id)
        {
    //alert(id);
    if(confirm("Are you sure you want to delete Fees Record?"))
    {
      $.ajax({
        url: 'action/actFees.php',
        method: 'POST',
        data: {
          deleteId: id
        },
        //dataType: 'json', // Specify the expected data type as JSON
        success: function(response) {
            table.ajax.reload(null, false);
         

        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
    }
    }

    $('#year').on('change', function() {
    var selectedYear = $(this).val();
    var studentId = $('#studentId').val();

    if (selectedYear) {
        $.ajax({
            url: 'updateStudentYear.php',
            method: 'POST',
            data: {
                studentId: studentId,
                selectedYear: selectedYear
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Student year updated and new fees recorded successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $('#year').prop('disabled', true);
                        $('#universityPaid').prop('disabled', false);
                        $('#studyPaid').prop('disabled', false);
                        // Get the inserted row fee ID and call the goEditFees function
                        var newFeeId = response.fee_id;
                        goEditFees(newFeeId);
                    });
                } else {
                    alert('Failed to update student year or record new fees: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed:', status, error);
            }
        });
    }
});


    document.getElementById('universityPaid').addEventListener('input', function(e) {
        var value = e.target.value;
        if (value.includes('-')) {
            e.target.value = value.replace('-', '');
            alert('Negative values are not allowed.');
        }
    });

    document.getElementById('studyPaid').addEventListener('input', function(e) {
        var value = e.target.value;
        if (value.includes('-')) {
            e.target.value = value.replace('-', '');
            alert('Negative values are not allowed.');
        }
    });

</script>

</body>

</html>



