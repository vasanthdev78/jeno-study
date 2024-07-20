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


     //----course Name  ------------------


     function courseNameOnly($couonlyID) {
        global $conn; // Assuming $conn is your database connection variable
    
        // Query to retrieve university name based on uni_id
        $enquiry_name = "SELECT `cou_name` FROM `jeno_course` WHERE `cou_id` = $couonlyID";
    
        // Execute the query
        $enquiry_result = $conn->query($enquiry_name);
    
        // Check if query was successful and there is a result
        if ($enquiry_result && $enquiry_result->num_rows > 0) {
            // Fetch the university name
            $enquiry_row = $enquiry_result->fetch_assoc();
            return $enquiry_row['cou_name'];
        } else {
            // Query execution failed or no results found
            return "No Course found with the given ID.";
        }
    }


    //----elective Name  ------------------


    function electiveNameOnly($elective) {
        global $conn; // Assuming $conn is your database connection variable
    
        // Query to retrieve university name based on uni_id
        $elective_name = "SELECT `cou_id`, `cou_name`, `cou_exam_type`, `cou_duration` FROM `jeno_course` WHERE cou_id = $elective";
    
        // Execute the query
        $elective_result = $conn->query($elective_name);
    
        // Check if query was successful and there is a result
        if ($elective_result && $elective_result->num_rows > 0) {
            // Fetch the university name
            $elective_row = $elective_result->fetch_assoc();
            return $elective_row['cou_name'];
        } else {
            // Query execution failed or no results found
            return "No Course found with the given ID.";
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

        //---course name and Id=---------------

        function courseName($couID) {
            global $conn; // Assuming $conn is your database connection variable
        
            // Query to retrieve courses based on uni_id
            $cou_name = "SELECT `cou_id`, `cou_name` FROM `jeno_course` WHERE cou_uni_id = $couID";
            
            // Execute the query
            $cou_result = $conn->query($cou_name);
            
            $courses = []; // Initialize an array to store course details
            
            // Check if query was successful and there is a result
            if ($cou_result && $cou_result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($cou_result)) {
                    // Push each course as an object into the courses array
                    $course = array(
                        'cou_id' => $row['cou_id'],
                        'cou_name' => $row['cou_name']
                    );
                    $courses[] = $course;
                }
            }
            
            return $courses;
        }



         //---elective name and Id=---------------

         function electiveName($eleID) {
            global $conn; // Assuming $conn is your database connection variable
        
            // Query to retrieve courses based on uni_id
            $ele_name = "SELECT `ele_id`, `ele_cou_id`, `ele_elective` FROM `jeno_elective` WHERE ele_cou_id =$eleID AND ele_lag_elec = 'E' AND ele_status = 'Active'";
            
            // Execute the query
            $ele_result = $conn->query($ele_name);
            
            $electives = []; // Initialize an array to store course details
            
            // Check if query was successful and there is a result
            if ($ele_result && $ele_result->num_rows > 0) {
                while ($ele_row = mysqli_fetch_assoc($ele_result)) {
                    // Push each course as an object into the courses array
                    $elective = array(
                        'ele_id' => $ele_row['ele_id'],
                        'ele_elective' => $ele_row['ele_elective']
                    );
                    $electives[] = $elective;
                }
            }
            
            return $electives;
        }


         //----transaction table ------------------

        
    function transactionTable() {    
        global $conn; // Assuming $conn is your database connection variable
    
    
       // Query to retrieve course name based on course_id
       $transaction_query = "SELECT `tran_id`, `tran_category`, `tran_date`, `tran_amount`, `tran_method` FROM `jeno_transaction` WHERE tran_status ='Active'";
    
       // Execute the query
       $transaction_result = $conn->query($transaction_query);
    
       // Check if query was successful
       if ($transaction_result) {
           // Fetch the course name
           
    
           return $transaction_result;
       } else {
           // Query execution failed
           return "Query failed: " . $conn->error;
       }
        }

        function admission() {
            global $conn; // Assuming $conn is your database connection variable
        
        
           // Query to retrieve course name based on course_id
           $admission_query = "SELECT a.*, b.*, c.* FROM `jeno_student` AS a LEFT JOIN jeno_university AS b ON a.stu_uni_id=b.uni_id LEFT JOIN jeno_course AS c ON a.stu_cou_id=c.cou_id WHERE stu_status = 'Active'";
        
           // Execute the query
           $admission_result = $conn->query($admission_query);
        
           // Check if query was successful
           if ($admission_result) {
               // Fetch the course name              
               return $admission_result;
           } else {
               // Query execution failed
               return "Query failed: " . $conn->error;
           }
        }


              //----elective language ------------------

        
    function subjectTable() {    
        global $conn; // Assuming $conn is your database connection variable
    
    
       // Query to retrieve course name based on course_id
       $subject_query = "SELECT `sub_id`, `sub_uni_id`, `sub_cou_id`, `sub_type` ,`sub_exam_patten` FROM `jeno_subject` WHERE sub_status = 'Active'";
    
       // Execute the query
       $subject_result = $conn->query($subject_query);
    // Check if query was successful
    if ($subject_result) {
        // Fetch the course name
        
 
        return $subject_result;
    } else {
        // Query execution failed
        return "Query failed: " . $conn->error;
    }
        }
        

?>
