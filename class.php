<?php 
include("db/dbConnection.php");

function universityTable() {
    global $conn; // Assuming $conn is your database connection variable


   // Query to retrieve course name based on course_id
   $university_query = "SELECT * FROM `jeno_university` WHERE uni_status ='Active';";

   // Execute the query
   $university_result = $conn->query($university_query);

   // Check if query was successful
   if ($university_result) {
       // Fetch the course name
       

       return $university_result;
   } else {
       // Query execution failed
       return "Query failed: " . $conn->error;
   }
}


function electiveTable() {
    global $conn; // Assuming $conn is your database connection variable


   // Query to retrieve course name based on course_id
   $elective_query = "SELECT * FROM `jeno_elective` WHERE ele_status ='Active'";

   // Execute the query
   $elective_result = $conn->query($elective_query);

   // Check if query was successful
   if ($elective_result) {
       // Fetch the course name
       

       return $elective_result;
   } else {
       // Query execution failed
       return "Query failed: " . $conn->error;
   }
}
?>
