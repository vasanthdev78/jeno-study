<?php


include "db/dbConnection.php";

    //    echo  $id = $_GET['payment_id'];
   $id = $_GET['payment_id'];
//    $id = 1;

   // Validate and sanitize the input
   if (!is_numeric($id)) {
       die("Invalid payment ID");
   }     

   $select_sql = "SELECT
               `stf_id`,
               `stf_name`,
               `stf_role`,
               `stf_joining_date`,
               `stf_leave_date`
           FROM
               `jeno_staff`
           WHERE
               `stf_id` = $id";


   $result = $conn->query($select_sql);

   if ($result->num_rows > 0) {
   // Output data of each row
   $row = $result->fetch_assoc();
       $stf_id = $row['stf_id'];
       $stf_name = $row['stf_name'];
       $stf_role = $row['stf_role'];
       $stf_joining_date = date('j-F-Y', strtotime($row['stf_joining_date']));
       $stf_leave_date = date('j-F-Y', strtotime($row['stf_leave_date']));
   
   } else {
   echo "0 results";
   }

$conn->close();


require('TCPDF/tcpdf.php');


// Initialize TCPDF object
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Experience Certificate');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set margins
$pdf->SetMargins(20, 30, 20);
$pdf->SetAutoPageBreak(true, 20);

// Add a page
$pdf->AddPage();

$pdf->SetLineWidth(0.5);
$pdf->Rect(10, 10, $pdf->getPageWidth() - 20, $pdf->getPageHeight() - 20);

// Add a logo at the top
$logoPath = 'image/jenoLogopng.png'; // Adjust the path to your logo
$pdf->Image($logoPath, 80, 15, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

// Title of the certificate
$pdf->SetFont('times', 'B', 20);
$pdf->SetY(60); // Adjusted Y position for better spacing
$pdf->Cell(0, 15, 'Experience Certificate', 0, 1, 'C');

// Add a line break
$pdf->Ln(18);

// Set font for the main content
$pdf->SetFont('times', '', 15);

// Prepare content
// $date = date('d-M-Y'); 
// $employeeName = "John Doe"; 
// $designation = "Software Engineer"; 
// $startDate = "01-Jan-2020"; 
// $endDate = "31-Dec-2023"; 
// Prepare content
$date = date('d-M-Y'); 
$employeeName = $stf_name; 
$designation = $stf_role; 
$startDate = $stf_joining_date; 
$endDate = $stf_leave_date; 

// Main content with bold employee name
$content = <<<EOD




This is to certify that <b>$employeeName</b> was employed as $designation at Our JENO Study Centre Tirunelveli from $startDate.
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'L', true);

$content2 = <<<EOD
He/She has been a sincere and efficient worker. He/She has been relieved from duties as of $endDate. 

We would like to wish him/her all the best in his/her future endeavors.

Warm Regards,
EOD;

$pdf->Ln(8); // Add spacing between paragraphs
$pdf->writeHTMLCell(0, 0, '', '', nl2br($content2), 0, 1, 0, true, 'L', true);



// Signature and company details
$pdf->Ln(15); // Add space for the signature
$pdf->SetFont('times', 'B', 12);
$pdf->Cell(0, 10, 'Mr. Ralliinson  Packiaraj G', 0, 1, 'L');
$pdf->SetFont('times', '', 12);
$pdf->Cell(0, 10, 'Managing Director', 0, 1, 'L');
$pdf->Cell(0, 10, 'Ph: 9842128600', 0, 1, 'L');

// Output the PDF
$pdf->Output('Experience_Certificate.pdf', 'I');
?>
