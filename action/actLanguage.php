<?php
include '../db/dbConnection.php'; // Adjust the path to your database connection file

header('Content-Type: application/json');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Define the function to fetch language report
    function landuageReport() {    
        global $conn; // Assuming $conn is your database connection variable

        // Query to retrieve elective languages
        $language_query = "SELECT `ele_id`, `ele_elective` FROM `jeno_elective` WHERE ele_lag_elec = 'L' AND ele_status = 'Active'";

        // Execute the query
        $language_result = $conn->query($language_query);

        $languages = []; // Initialize an array to store language details

        // Check if query was successful and there is a result
        if ($language_result && $language_result->num_rows > 0) {
            while ($lag_row = $language_result->fetch_assoc()) {
                // Push each language as an object into the languages array
                $languages[] = array(
                    'ele_id' => $lag_row['ele_id'],
                    'ele_elective' => $lag_row['ele_elective']
                );
            }
        }

        return $languages;
    }

    // Fetch the language report
    $languages = landuageReport();

    // Output the data as JSON
    echo json_encode($languages);
} else {
    // Handle incorrect request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
