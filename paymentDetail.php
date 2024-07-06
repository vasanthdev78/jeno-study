<?php
include("db/dbConnection.php");

// Check if employee id is provided
if(isset($_POST['id']) && $_POST['id'] != '') {
    $payId = $_POST['id'];

    // Prepare and execute the SQL query
    $selQuery = "SELECT student_tbl.*
    , payment_tbl.*
    , course_tbl.*
    ,payment_history_tbl.*
    FROM student_tbl
    LEFT JOIN
        payment_tbl ON payment_tbl.stu_id=student_tbl.stu_id
    LEFT JOIN
        course_tbl ON course_tbl.course_id=student_tbl.course_id
    LEFT JOIN 
        payment_history_tbl on payment_history_tbl.pay_id=payment_tbl.pay_id
    WHERE 
        student_tbl.stu_status='Active'
        AND payment_tbl.payment_status='Active'
        AND student_tbl.entity_id=1
        AND payment_tbl.pay_id='$payId'";
    
    $result1 = $conn->query($selQuery);

    if($result1) {
        // Fetch employee details
        $row = mysqli_fetch_array($result1 , MYSQLI_ASSOC);
        $id = $row['stu_id']; 
        
        $fname = $row['first_name'];
        $lname=$row['last_name'];
        $course_name=$row['course_name'];
        $charge=$row['charge'];
        $course_duration=$row['course_month'];
        $amount_received=$row['amount_received'];
        
       
        
        $balance=$charge-$amount_received;


        $name=$fname." ".$lname;    

    } else {
        echo "Error executing query: " . $conn->error;
    }
} else {
    // If employee id is not provided, redirect to employees.php
    header("Location: payment.php");
    exit(); // Ensure script stops executing after redirection
}
?>
                 
      <div class="table-responsive">
          <form name="frm" method="post">
              <input type="hidden" name="hdnAction" value="">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Payment Details</h4>
            </div>  
           <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Name</h4> 
                                <span class="detail"><?php echo $name;?></span>
                            </div>
                        </div>  
                         <div class="col-sm-3 ">
                            <div class="card p-3">
                                <h4>Course Name</h4>
                                <span class="detail"><?php echo  $course_name ;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="card p-3">
                                <h4>Charge</h4>
                                <span class="detail"><?php echo  $charge ;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Course Duration</h4>
                                <span class="detail"><?php echo $course_duration;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Amount Received</h4>
                                <span class="detail"><?php echo $amount_received;?></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card p-3">
                                <h4>Balance</h4>
                                <span class="detail"><?php echo $balance;?></span>
                            </div>
                        </div>
                        
                        
                        </div>
                    </div>
                    <h3 class="modal-title" id="myModalLabel">Payment History</h3>
                    <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap">
                    <thead>
                        <tr class="bg-light">
                                    <th scope="col-1">S.No.</th>
                                    
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Amount Received</th>
                                    <th scope="col">Payment Method</th>
                                    
                      </tr>
                    </thead>
                    <tbody>
                        
                        <?php $resSel="SELECT * FROM `payment_history_tbl`
                        WHERE pay_id='$payId'";
                        $res = $conn->query($resSel);

                        $i=1; 
                        while($row1 = mysqli_fetch_array($res , MYSQLI_ASSOC)) { 
                            $payment_method=$row1['payment_method'];
                            $payment_date=$row1['history_payment_date'];
                            $pay_amount=$row1['pay_amount'];

                        ?>
                     <tr>
                        <td><?php echo $i; $i++; ?></td>
                        
                        
                       
                        <td><?php echo $payment_date; ?></td>
                        <td><?php echo $pay_amount; ?></td>
                        <td><?php echo $payment_method; ?></td> 
                        
                      </tr>
                      <?php } ?>
                        
                    </tbody>
                  </table>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" onclick="javascript:location.href='payment.php'" >Back</button>
               
            </div> 
            </form>   
      </div>
    
