<?php

// include "class.php";
include "db/dbConnection.php";

//    echo  $id = $_GET['payment_id'];
$id = $_GET['payment_id'];
// $id = 1;

// Validate and sanitize the input
if (!is_numeric($id)) {
    die("Invalid payment ID");
}     

$select_sql = "SELECT
                    a.stu_name,
                    a.stu_enroll,
                    a.stu_aca_year,
                    a.stu_join_year,
                    b.cou_name,
                    c.uni_name,
                    d.add_father_name,
                    d.add_admit_date
                FROM
                    `jeno_student` AS a
                LEFT JOIN jeno_course AS b
                ON
                    a.stu_cou_id = b.cou_id
                LEFT JOIN jeno_university AS c
                ON
                    a.stu_uni_id = c.uni_id
                LEFT JOIN jeno_stu_additional AS d
                ON
                    a.stu_id = d.add_stu_id
                WHERE
                    a.stu_id = '$id'";


$result = $conn->query($select_sql);

if ($result->num_rows > 0) {
// Output data of each row
$row = $result->fetch_assoc();

    $stu_name = $row['stu_name'];
    $stu_enroll = $row['stu_enroll'];
    $stu_aca_year = $row['stu_aca_year'];
    $cou_name = $row['cou_name'];
    $uni_name = $row['uni_name'];
    $add_father_name = $row['add_father_name'];
    $add_admit_date = date('Y', strtotime($row['add_admit_date']));
    
    

} 
else {
echo "0 results";
}






require_once 'TCPDF/tcpdf.php';

// Initialize TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Course Completion Certificate');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set margins
$pdf->SetMargins(25, 20, 25);
$pdf->SetAutoPageBreak(true, 20);

// Add a page with a border
$pdf->AddPage();
$pdf->SetLineWidth(0.5);
$pdf->Rect(10, 10, $pdf->getPageWidth() - 20, $pdf->getPageHeight() - 20);

// Center the logo and title
// $logoPath = 'image/jenoLogopng.png'; 
// $pdf->Image($logoPath, 85, 20, 50, '', 'PNG', '', 'C', false, 300, '', false, false, 0, false, false, false);

// Title
$pdf->SetFont('times', 'B', 24);
$pdf->SetY(70);
$pdf->Cell(0, 15, 'To Whomsoever it may concern ', 0, 1, 'C');

// Date in the top right corner
$pdf->SetFont('times', '', 12);
$date = date('d-M-Y');
$pdf->SetY(90);
$pdf->Cell(0, 10, $date, 0, 1, 'R');

// Main content
$pdf->Ln(10);
$pdf->SetFont('times', '', 15);

// Student details placeholders
$studentName = $stu_name;
$fatherName = $add_father_name;
$enrollmentNo = $stu_enroll;
$courseName = $cou_name;
$year = $add_admit_date;
$uniName = $uni_name;
$yearInCourse = "{$stu_aca_year}nd";
// $yearInCourse = $stu_aca_year."nd";

// Main content with bold names and center alignment
$content = <<<EOD
                        <p style="padding: 10px; line-height: 1.5;">
                              This is to certify that <b>$studentName</b>, S/O or D/O <b>$fatherName</b>, Enrollment No: <b>$enrollmentNo</b>, is doing his/her <b>$courseName</b> - <b>$yearInCourse</b> year Course at <b>$uniName</b> through our Study Center in the year <b>$year</b>.
                          </p>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'J', true);

// Divider line
$pdf->Ln(15);
$pdf->SetLineWidth(0.2);
$pdf->Line(30, $pdf->GetY(), $pdf->getPageWidth() - 30, $pdf->GetY());
$pdf->Ln(10);

// Signature Section
$pdf->SetFont('times', 'I', 14);
$pdf->Cell(0, 10, 'Programme Coordinator', 0, 1, 'L');


// Output the PDF
$pdf->Output('Enhanced_Course_Certificate.pdf', 'I');
