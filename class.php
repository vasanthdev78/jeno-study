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
   $elective_query = "SELECT a.*, b.*, c.* FROM `jeno_elective` AS a LEFT JOIN `jeno_course` AS b ON a.ele_cou_id = b.cou_id
   LEFT JOIN `jeno_university` AS c ON b.cou_uni_id = c.uni_id WHERE a.ele_status ='Active'";

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


    //----course table ------------------

        
    function courseTable() {    
    global $conn; // Assuming $conn is your database connection variable


   // Query to retrieve course name based on course_id
   $course_query = "SELECT `cou_id` ,`cou_uni_id`, `cou_name`, `cou_medium`, `cou_exam_type` ,`cou_duration`  FROM jeno_course  WHERE cou_status ='Active';";

   // Execute the query
   $course_result = $conn->query($course_query);

   // Check if query was successful
   if ($course_result) {
       // Fetch the course name
       

       return $course_result;
   } else {
       // Query execution failed
       return "Query failed: " . $conn->error;
   }
    }


    //----university Name table ------------------


    function universityName($uniID) {
        global $conn; // Assuming $conn is your database connection variable
    
        // Query to retrieve university name based on uni_id
        $Uni_name = "SELECT `uni_name` FROM `jeno_university` WHERE `uni_id` = $uniID";
    
        // Execute the query
        $result = $conn->query($Uni_name);
    
        // Check if query was successful and there is a result
        if ($result && $result->num_rows > 0) {
            // Fetch the university name
            $row = $result->fetch_assoc();
            return $row['uni_name'];
        } else {
            // Query execution failed or no results found
            return "No university found with the given ID.";
        }
    }


    //----Enquiry table ------------------

        
    function enquiryTable() {    
        global $conn; // Assuming $conn is your database connection variable
    
    
       // Query to retrieve course name based on course_id
       $enquiry_query = "SELECT `enq_id`, `enq_uni_id`, `enq_cou_id`, `enq_number`, `enq_stu_name`, `enq_email`, `enq_dob`, `enq_gender`, `enq_mobile`, `enq_address`, `enq_adminsion_status` FROM `jeno_enquiry` WHERE enq_status ='Active'";
    
       // Execute the query
       $enquiry_result = $conn->query($enquiry_query);
    
       // Check if query was successful
       if ($enquiry_result) {
           // Fetch the course name
           
    
           return $enquiry_result;
       } else {
           // Query execution failed
           return "Query failed: " . $conn->error;
       }
        }

      

?>
