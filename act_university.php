<?php
include "db_config.php";


 if(isset($_POST['uni_add']) && $_POST['uni_add'] == "uni_add"){
 
            // Retrieve form data
            $uni_name = $_POST['uni_name'];
            $uni_description = $_POST['uni_description'];
            $uni_uni_id = $_POST['uni_uni_id'];
            

            // Handle file upload
            $target_dir = "assets/images/university-img/";
            $timestamp = time(); // Add current timestamp
            $original_filename = basename($_FILES["uni_image"]["name"]);
            $imageFileType = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));
            $new_img_name=  $timestamp . "_" . $original_filename;
            $new_filename = $target_dir . $timestamp . "_" . $original_filename;

            $uploadOk = 1;

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["uni_image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($new_filename)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["uni_image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["uni_image"]["tmp_name"], $new_filename)) {
                    echo "The file ". htmlspecialchars($original_filename). " has been uploaded.";
                    $uni_image = htmlspecialchars($new_img_name);

           

                    // Prepare and bind
                    $uni_add_query = $conn->prepare("INSERT INTO jeno_university (uni_uni_id, uni_name, uni_image, uni_description) VALUES (?, ?, ?, ?)");
                    $uni_add_query->bind_param("ssss", $uni_uni_id, $uni_name, $uni_image, $uni_description);

                    // Execute the statement
                    if ($uni_add_query->execute()) {
                        echo "New university created successfully";
                        exit();
                    } else {
                        echo "Error: " . $uni_add_query->error;
                    }

                    // Close the statement and connection
                    $uni_add_query->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    exit();
                }
            }
        }
   


        // -------------------add datas end =----------------------------


            //-----------------edit responce start-----------------------------

    if(isset($_POST['uni_edit']) && $_POST['uni_edit'] == "uni_edit"){
        $uni_edit_query = $conn->prepare("SELECT `uni_name`, `uni_image`, `uni_description` FROM `jeno_university` WHERE uni_id = ?");
        $uni_edit_query->bind_param("i", $edit_id);

        // Execute the statement
        if ($uni_edit_query->execute()) {
            // Bind the result variables
            $uni_edit_query->bind_result($uni_name, $uni_image, $uni_description);

            // Fetch the data
            if ($uni_edit_query->fetch()) {
                $response = [
                    "uni_name" => $uni_name,
                    "uni_image" => $uni_image,
                    "uni_description" => $uni_description
                ];
                echo json_encode($response);
            } else {
                echo json_encode(["error" => "No data found for the given ID."]);
            }
        } else {
            echo json_encode(["error" => "Execution error: " . $uni_edit_query->error]);
        }

        // Close the statement and connection
        $uni_edit_query->close();
        $conn->close();
    } else {
        echo json_encode(["error" => "Error: Missing edit ID."]);
        exit();
    }

    //-----------------edit responce end-----------------------------



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
        exit();
    } else {
        echo "Error: " . $uni_edit_add_query->error;
        
    }
  
    // Close the statement and connection
    $uni_edit_add_query->close();
    
      } 
    //   else {
    //   echo "Error: Missing required POST parameters.";
    //   }



      //-----------------edit add star ---------------------------------
      
      if(isset($_POST['uni_edit_add']) && $_POST['uni_edit_add'] == "uni_edit_add"){
            if (isset($_POST['edit_id'], $_POST['uni_name'], $_POST['uni_description'])) {
                $edit_id = $_POST['edit_id'];
                $uni_name = $_POST['uni_name'];
                $uni_description = $_POST['uni_description'];
    
                // Handle file upload if a new file is provided
                if (isset($_FILES["uni_image"])) {
                    $target_dir = "assets/images/university-img/";
                    $target_file = $target_dir . basename($_FILES["uni_image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
                    // Check if image file is an actual image or fake image
                    $check = getimagesize($_FILES["uni_image"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo json_encode(["error" => "File is not an image."]);
                        $uploadOk = 0;
                    }
    
                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo json_encode(["error" => "Sorry, file already exists."]);
                        $uploadOk = 0;
                    }
    
                    // Check file size
                    if ($_FILES["uni_image"]["size"] > 500000) {
                        echo json_encode(["error" => "Sorry, your file is too large."]);
                        $uploadOk = 0;
                    }
    
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                        echo json_encode(["error" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
                        $uploadOk = 0;
                    }
    
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo json_encode(["error" => "Sorry, your file was not uploaded."]);
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["uni_image"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars(basename($_FILES["uni_image"]["name"])). " has been uploaded.";
                            $uni_image = htmlspecialchars(basename($_FILES["uni_image"]["name"]));
                        } else {
                            echo json_encode(["error" => "Sorry, there was an error uploading your file."]);
                        }
                    }
                }
    
                // Prepare and bind update query
                if (isset($uni_image)) {
                    // Update with image
                    $uni_update_query = $conn->prepare("UPDATE jeno_university SET uni_name = ?, uni_image = ?, uni_description = ? WHERE uni_id = ?");
                    $uni_update_query->bind_param("sssi", $uni_name, $uni_image, $uni_description, $edit_id);
                } else {
                    // Update without image
                    $uni_update_query = $conn->prepare("UPDATE jeno_university SET uni_name = ?, uni_description = ? WHERE uni_id = ?");
                    $uni_update_query->bind_param("ssi", $uni_name, $uni_description, $edit_id);
                }
    
                // Execute the statement
                if ($uni_update_query->execute()) {
                    echo json_encode(["success" => "University updated successfully"]);
                    exit();
                } else {
                    echo json_encode(["error" => "Error: " . $uni_update_query->error]);
                }
    
                // Close the statement and connection
                $uni_update_query->close();
                $conn->close();
            } else {
                echo json_encode(["error" => "Error: Missing required POST parameters."]);
            }
        } else {
            echo json_encode(["error" => "Form was not submitted correctly."]);
        }
      //-----------------edit add end ---------------------------------



      
        //-------------delete data start -----------------------------
        if (isset($_POST['uni_delete']) && $_POST['uni_delete'] == "uni_delete") {
            if (isset($_POST['edit_id'])) {
                $edit_id = $_POST['edit_id'];
    
    
                // Prepare and bind update query
                $uni_update_query = $conn->prepare("UPDATE jeno_university SET uni_status = 'Inactive' WHERE uni_id = ?");
                $uni_update_query->bind_param("i", $edit_id);
    
                // Execute the statement
                if ($uni_update_query->execute()) {
                    echo json_encode(["success" => "University status updated to Inactive successfully"]);
                    exit();
                } else {
                    echo json_encode(["error" => "Error: " . $uni_update_query->error]);
                }
    
                // Close the statement and connection
                $uni_update_query->close();
                $conn->close();
            } else {
                echo json_encode(["error" => "Error: Missing edit ID."]);
            }
        } else {
            echo json_encode(["error" => "Form was not submitted correctly."]);
        }

        //------------delete data end --------------------------------




$conn->close();
?>