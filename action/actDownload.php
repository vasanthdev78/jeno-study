<?php
include "../class.php";
require '../vendor/autoload.php'; // Ensure this path is correct

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    $sql = "SELECT * FROM jeno_payment_history WHERE pay_id = '$payment_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $payment = $result->fetch_assoc();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Payment Details')
            ->setDescription('Payment details for student');

        // Add some data
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Payment ID');
        $sheet->setCellValue('B1', $payment['pay_id']);
        $sheet->setCellValue('A2', 'Student Name');
        $sheet->setCellValue('B2', $payment['pay_student_name']);
        $sheet->setCellValue('A3', 'Admission ID');
        $sheet->setCellValue('B3', $payment['pay_admission_id']);
        $sheet->setCellValue('A4', 'Year');
        $sheet->setCellValue('B4', $payment['pay_year']);
        $sheet->setCellValue('A5', 'Paid Method');
        $sheet->setCellValue('B5', $payment['pay_paid_method']);
        $sheet->setCellValue('A6', 'Total Amount');
        $sheet->setCellValue('B6', $payment['pay_total_amount']);
        $sheet->setCellValue('A7', 'Date');
        $sheet->setCellValue('B7', $payment['pay_date']);

        // Apply bold style to "Total Amount"
        $sheet->getStyle('A6')->getFont()->setBold(true);
        $sheet->getStyle('B6')->getFont()->setBold(true);

        // Increase the font size for the entire sheet
        $sheet->getStyle('A1:B7')->getFont()->setSize(12);

        // Set alignment for all cells
        $sheet->getStyle('A1:B7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A1:B7')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

        // Adjust column widths
        foreach (range('A', 'B') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Add some space below "Total Amount"
        $sheet->setCellValue('A8', '');
        $sheet->setCellValue('B8', '');

        // Page setup for printing
        $sheet->getPageSetup()
            ->setOrientation(PageSetup::ORIENTATION_PORTRAIT)
            ->setPaperSize(PageSetup::PAPERSIZE_A4)
            ->setFitToWidth(1)
            ->setFitToHeight(0);

        $sheet->getPageMargins()->setTop(0.75);
        $sheet->getPageMargins()->setRight(0.7);
        $sheet->getPageMargins()->setLeft(0.7);
        $sheet->getPageMargins()->setBottom(0.75);

        // Center the sheet when printing
        $sheet->getPageSetup()->setHorizontalCentered(true);
        $sheet->getPageSetup()->setVerticalCentered(false);

        // Write the file
        $writer = new Xlsx($spreadsheet);
        $filePath = 'payment_details_' . $payment_id . '.xlsx';
        $writer->save($filePath);

        // Serve the file to the user for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        header('Cache-Control: max-age=0');
        readfile($filePath);

        // Delete the file after serving it to the user
        unlink($filePath);
    } else {
        echo "No payment details found for the provided payment ID.";
    }

    $conn->close();
} else {
    echo "No payment ID provided.";
}
?>
