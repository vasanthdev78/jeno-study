<?php
// Start session
session_start();

// Database connection
require_once 'db_connection.php'; // Adjust this based on your database connection setup

// Check if form is submitted
if ((isset($_POST['username']) && $_POST['password'] && $_POST['role'])) {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // SQL query to retrieve user details
    $sql = "SELECT `ur_id`, `ur_name`, `ur_username`, `ur_password`, `ur_role` 
            FROM `jeno_users` 
            WHERE `ur_username` = ? AND `ur_password` = ? AND `ur_role` = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sss", $username, $password, $role);

    // Execute the statement
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($ur_id, $ur_name, $ur_username, $ur_password, $ur_role);

        // Fetch the data
        if ($stmt->fetch()) {
            // User found, set session variables
            $_SESSION['ur_id'] = $ur_id;
            $_SESSION['ur_name'] = $ur_name;
            $_SESSION['ur_role'] = $ur_role;

            // Redirect to dashboard.php
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username, password, or role.";
        }
    } else {
        // Query execution error
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect to login page if accessed directly (optional)
    header("Location: index.php");
    exit();
}
?>
