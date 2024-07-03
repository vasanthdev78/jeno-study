<?php
include("db/dbConnection.php");

$id = $_POST['editId'];
//$id = 4;

$select_sql = "SELECT * FROM `invoice` WHERE inv_id = $id";

$result = $conn->query($select_sql);


$data = array(); // Initialize an empty array to hold the data

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Decode JSON data if necessary (assuming 'invoice_dateile' is JSON)
        $invoiceData = json_decode($row['invoice_dateile'], true);

        // Check if JSON decoding was successful
        if ($invoiceData === null && json_last_error() !== JSON_ERROR_NONE) {
            // Handle the error, e.g., log it or set a default value
            $invoiceData = array(); // or handle the error in your application logic
        }

        // Construct each row as an associative array
        $rowData = array(
            'inv_id' => $row['inv_id'],
            'invoice_dateile' => $invoiceData
            // Add more columns as needed
        );

        // Append the current row data to the main data array
        $data[] = $rowData;
    }

    // Output the data array as JSON (optional)
    echo json_encode($data);

} else {
    echo "0 results";
}



$conn->close();

?>