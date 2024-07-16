<?php
// actUniversity.php

// Start a session
session_start();

// Include your database connection script
include 'db/dbConnection.php';

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addUniversity') {
    
    // Get the form data and sanitize it
    $universityName = sanitizeInput($_POST['universityName']);
    $studyCode = sanitizeInput($_POST['studyCode']);
    $departments = $_POST['department'];
    $contacts = $_POST['contact'];

    $dept = json_encode($departments);
    $cont = json_encode($contacts);
    
    // Other fields
    $uniCenterId = $_SESSION['centerId'];
    $createdBy = $_SESSION['userId'];
    
    

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Insert each row of data
        $stmt = $conn->prepare("INSERT INTO jeno_university (uni_study_code, uni_name, uni_department, uni_contact, uni_center_id, uni_created_by) VALUES (?, ?, ?, ?, ?, ?)");
        
            $stmt->bind_param("isssii", $studyCode, $universityName, $dept, $cont, $uniCenterId, $createdBy);
            $stmt->execute();
        

        // Commit transaction
        $conn->commit();

        // Success
        echo json_encode(['status' => 'success', 'message' => 'University added successfully']);
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo json_encode(['status' => 'error', 'message' => 'Error adding university: ' . $e->getMessage()]);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
