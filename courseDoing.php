<?php
require_once('TCPDF/tcpdf.php');

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
$logoPath = 'image/jenoLogopng.png'; 
$pdf->Image($logoPath, 85, 20, 50, '', 'PNG', '', 'C', false, 300, '', false, false, 0, false, false, false);

// Title
$pdf->SetFont('times', 'B', 24);
$pdf->SetY(70);
$pdf->Cell(0, 15, 'Course Doing Certificate', 0, 1, 'C');

// Date in the top right corner
$pdf->SetFont('times', '', 12);
$date = date('d-M-Y');
$pdf->SetY(90);
$pdf->Cell(0, 10, $date, 0, 1, 'R');

// Main content
$pdf->Ln(10);
$pdf->SetFont('times', '', 14);

// Student details placeholders
$studentName = "John Doe";
$fatherName = "Richard Doe";
$enrollmentNo = "AU123456";
$courseName = "Bachelor of Science";
$year = "2024";
$yearInCourse = "2nd";

// Main content with bold names and center alignment
$content = <<<EOD
This is to certify that <b>$studentName</b>, S/O or D/O <b>$fatherName</b>, Enrollment No: <b>$enrollmentNo</b>, is doing his/her <b>$courseName</b> - <b>$yearInCourse</b> year Course at Alagappa University through our Study Center in the year <b>$year</b>.
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'J', true);

// Divider line
$pdf->Ln(15);
$pdf->SetLineWidth(0.2);
$pdf->Line(30, $pdf->GetY(), $pdf->getPageWidth() - 30, $pdf->GetY());
$pdf->Ln(10);

// Signature Section
$pdf->SetFont('times', 'I', 14);
$pdf->Cell(0, 10, 'Authorized Signature', 0, 1, 'L');


// Output the PDF
$pdf->Output('Enhanced_Course_Certificate.pdf', 'I');
?>
