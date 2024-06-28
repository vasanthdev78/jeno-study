<?php
include "db_config.php";


 if(isset($_POST['uni_add']) && $_POST['uni_add'] == "uni_add"){
  // Retrieve form data
  $uni_name = $_POST['uni_name'];
  $uni_image = $_POST['uni_image'];
  $uni_description = $_POST['uni_description'];
  $uni_status = $_POST['uni_status'];

  // Prepare and bind
  $uni_add_query = $conn->prepare("INSERT INTO jeno_university (uni_name, uni_image, uni_description, uni_created_at, uni_updated_at, uni_status) VALUES (?, ?, ?, ?, ?, ?)");
  $uni_add_query->bind_param("ssssss", $uni_name, $uni_image, $uni_description, $uni_created_at);

  // Execute the statement
  if ($uni_add_query->execute()) {
      echo "New university created successfully";
  } else {
      echo "Error: " . $uni_add_query->error;
  }

  // Close the statement and connection
  $uni_add_query->close();
  
    } else {
    echo "Error: Missing required POST parameters.";
    }






    if(isset($_POST['uni_edit']) && $_POST['uni_edit'] == "uni_edit"){
     // Prepare and bind
     $uni_edit_query = $conn->prepare("SELECT `uni_name`, `uni_image`, `uni_description` FROM `jeno_university` WHERE uni_id = ?");
     $uni_edit_query->bind_param("i", $edit_id);

     // Execute the statement
     if ($uni_edit_query->execute()) {
         // Bind the result variables
         $uni_edit_query->bind_result($uni_name, $uni_image, $uni_description);

         // Fetch the data
         if ($uni_edit_query->fetch()) {
             echo "University data retrieved successfully:<br>";
             echo "Name: " . $uni_name . "<br>";
             echo "Image: " . $uni_image . "<br>";
             echo "Description: " . $uni_description . "<br>";
         } else {
             echo "No data found for the given ID.";
         }
     } else {
         echo "Error: " . $uni_edit_query->error;
     }

     // Close the statement and connection
     $uni_edit_query->close();
     
 } else {
     echo "Error: Missing edit ID.";
 }


 if(isset($_POST['uni_edit_add']) && $_POST['uni_edit_add'] == "uni_edit_add"){
    // Retrieve form data
    $edit_id = $_POST['edit_id'];
    $uni_name = $_POST['uni_name'];
    $uni_image = $_POST['uni_image'];
    $uni_description = $_POST['uni_description'];
    $uni_status = $_POST['uni_status'];
  
    // Prepare and bind
    $uni_edit_add_query = $conn->prepare("INSERT INTO jeno_university (uni_name, uni_image, uni_description, uni_created_at, uni_updated_at, uni_status) VALUES (?, ?, ?, ?, ?, ?)");
    $uni_edit_add_query->bind_param("ssssss", $uni_name, $uni_image, $uni_description, $uni_created_at);
  
    // Execute the statement
    if ($uni_edit_add_query->execute()) {
        echo "New university created successfully";
    } else {
        echo "Error: " . $uni_edit_add_query->error;
    }
  
    // Close the statement and connection
    $uni_edit_add_query->close();
    
      } else {
      echo "Error: Missing required POST parameters.";
      }









$conn->close();
?>