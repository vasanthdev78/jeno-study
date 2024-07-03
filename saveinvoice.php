<?php
include("db/dbConnection.php");

$id = $_GET['empId'];
//$id = 4;

$select_sql = "SELECT * FROM `invoice` WHERE inv_id = $id";

$result = $conn->query($select_sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        //echo "ID: " . $row["inv_id"] . " - JSON Data: " . $row["invoice_dateile"] . "<br>";
        $formData = json_decode($row["invoice_dateile"], true);
        //echo $formData["Amount"];
    }
} else {
    echo "0 results";
}
$conn->close();

// Include the FPDF library
require('./fpdf186/fpdf.php');

// Create a class extending FPDF
class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Set font to Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Title
        $this->Cell(0, 10, 'Invoice', 0, 1, 'C');
        $this->Ln(5);

        // Move to the right
        $this->Cell(70);

        // Left logo
        $this->Image('./image/logo.png', 10, 4, 50); // Adjust the path and size as needed

        
        // Company name
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'RORIRI SOFTWARE SOLUTIONS PRIVATE LIMITED', 0, 1, 'R');
        

        // Address
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'RORIRI IT PARK, NALLANATHAPURAM, Kalakkad, Keela Karuvelankulam, Tamil Nadu 627502', 0, 1, 'R');
        $this->Cell(0, 6, 'GST No: 33AANCR0590E1ZG', 0, 1,'R');
        // Line break
        $this->Ln(10);
    }

    // Footer
        function Footer()
        {
            $this->SetY(-70);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0,8,"Bank :Indian Overseas Bank",0,0,"L");
            $this->SetFont('Arial', 'B', 12);
            $this->Image('./image/seal.png', 90, 190, 45);
            $this->Image('./image/sign.png', 150, 193, 40);
            $this->Cell(0,10,"Authorized Signature",0,1,"R");
            $this->SetFont('Arial', '', 12);
            $this->Cell(0,8,"Account Name : RORIRI SOFTWARE SOLUTIONS PVT. LTD. ",0,1,"L");
            $this->Cell(0,8,"Account No.     : 515707989",0,1,"L");
            $this->Cell(0,8,"IFSC Code       : IOBA0001383",0,0,"l");
            $this->Ln(10);
            $this->Cell(0,10,"",'B',1);
            $this->Ln(10); // Adjust the line height as needed
            $this->SetY(-25);
            $this->SetFont('Arial', '', 10);
            $this->Cell(0,10,"Mobile : 7845593579  || email : contact@roririsoft.com   ",0,1,"c");
            $this->SetY(-23);
            $this->Cell(0,6,"Thankyou from Roriri Software Solutions PVT. LTD.",0,1,"R");
            
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

// Create a new PDF instance
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Set font for the document
$pdf->SetFont('Arial', '', 12);

// Add invoice content
$pdf->Cell(0, 10, 'Name: '.$formData["Name"], 'T', 0,'L');
$pdf->Cell(0, 10, 'Date: ' . date('Y-m-d'), 'T', 1,'R');
$pdf->Cell(0, 10, 'Invoice Number: INV-00'.$id, 0, 0,'L');
$pdf->Cell(0, 10, 'GST No:'.$formData["gstno"], 0, 1,'R');
$pdf->MultiCell(0, 10, 'Address: ' . $formData["Address"], 'B', 'L');
$pdf->Ln(); // Move to the next line

// Add item details to the table

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 10, 'Description', 1, 0, 'C'); 
$pdf->Cell(30, 10, 'HSN Code', 1, 0, 'C');// Changed alignment to center
$pdf->Cell(30, 10, 'Quantity', 1, 0, 'C'); // Adjusted width and changed alignment to center
$pdf->Cell(40, 10, 'Unit Price', 1, 0, 'C'); // Adjusted width and changed alignment to center
$pdf->Cell(40, 10, 'Total Price', 1, 1, 'C'); // Adjusted width and changed alignment to center
$pdf->SetFont('Arial', '', 10);
$Amount = $formData['Amount'];

// Loop through each item detail
for ($i = 0; $i < count($formData['Particulars']); $i++) { 
    // Fetch item details
    $Technologies = $formData['Technologies'][$i];
    $ssncode = $formData['ssncode'][$i];
    $Particulars = $formData['Particulars'][$i];
    $Amount = $formData['Amount'][$i];
    
    $pdf->Cell(50, 8, $Technologies, 1);
    $pdf->Cell(30, 8, $ssncode, 1); 
    $pdf->Cell(30, 8, $Particulars, 1,0,'R'); 
    $pdf->Cell(40, 8, $Amount, 1,0,'R');  
    $totalAmt =$Particulars * $Amount ;
    $pdf->Cell(40, 8, $totalAmt, 1, 0,'R'); // Border on the left and right sides

    $pdf->Ln();
    // Move to the next line for the next row
}


$total = $totalAmt; // Calculate total by summing all amounts
$gst = $formData['gst'];
if ($gst == 'IGST') {
    $taxRate = 0.18; // IGST rate is 18%
} else {
    // Assuming SGST and CGST are applied, each at 9%
    $taxRate = 0.09;
}
$tax = $total * $taxRate;
$grandTotal = $total + $tax;

// Add subtotal, tax, and grand total to the table

$pdf->Cell(150, 10, 'Subtotal:', 1, 0, 'R'); // Adjusted alignment to right
$pdf->Cell(40, 10, '$' . $total, 1, 1, 'R'); // Adjusted alignment to right and added line break

if($gst == 'IGST'){
$pdf->Cell(150, 10, 'IGST (' . ($taxRate * 100) . '%):', 1, 0, 'R'); // Adjusted alignment to right
$pdf->Cell(40, 10, '$' . $tax, 1, 1, 'R'); // Adjusted alignment to right and added line break
}else{
$pdf->Cell(150, 10, 'CGST (' . ($taxRate * 100) . '%):', 1, 0, 'R'); // Adjusted alignment to right
$pdf->Cell(40, 10, '$' . $tax, 1, 1, 'R'); // Adjusted alignment to right and added line break

$pdf->Cell(150, 10, 'SGST (' . ($taxRate * 100) . '%):', 1, 0, 'R'); // Adjusted alignment to right
$pdf->Cell(40, 10, '$' . $tax, 1, 1, 'R'); // Adjusted alignment to right and added line break
}

$pdf->Cell(150, 10, 'Grand Total:', 1, 0, 'R'); // Adjusted alignment to right
$pdf->Cell(40, 10, '$' . $grandTotal, 1, 1, 'R'); // Adjusted alignment to right and added line break

// No need to specify the file path
$pdf->Output("RoririInvoice.pdf", 'D'); // Force download the PDF
//echo "PDF invoice created successfully.";
?>
