<?php

include('dbconnection.php');

//attendance.php

include('header2.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Student_Attendance_record</title>
    <style>


        </style>
   
   
  </head>
  <body class="body">

  <!-- search function for student -->
  
<div class="container">
<div class="container" style="margin-top:20px">

 
 <br/>
 
  <div class="card" id="formElement"  >
  	<div class="card-header">
      <div class="row">
        
        <div class="col-md-3" align="right">
            </div>


      </div>
    
      <form method="POST" action=""><div>
        <label>Studend_Id*</label>&nbsp;&nbsp;<input type="text" name="student_id" value="" placeholder="Enter student id" required="true">&nbsp;
        <label>Mobile*</label>&nbsp;&nbsp;<input type="text" name="mobile" value="" placeholder=" Enter your mobile no" required="true">&nbsp;
        <label>From Date</label>&nbsp;&nbsp;<input type="date" name="att_form_date" value="" >&nbsp;
        <label>Till Date</label>&nbsp;&nbsp;<input type="date" name="att_till_date" value="" >&nbsp;
        <button type="submit" name="stu_submit" class="btn btn-success">search</search>
    
      </div>
          </form>

    </div>
  	<div class="card-body">
  		<div class="table-responsive">
        <span id="message_operation"></span>
        <table class="table table-striped table-bordered" id="attendance_table">
          <thead>
            <tr> 
           
              <th>student_id</th>
              
              <th>Attendance Date</th>
              
              <th>Meal</th>

              <th>Attendance Status</th>
           </tr>
          </thead>
          <tbody>
            
            <?php
          if(isset($_POST['stu_submit'])){

$student_id1=$_POST['student_id'];
$mobile1=$_POST['mobile'];
$date3=$_POST['att_form_date'];
$date4=$_POST['att_till_date'];



$sql3="SELECT * from tbl_attendance where student_id='$student_id1' AND( SELECT mobile FROM tbl_student where mobile='$mobile1') AND (attendance_date BETWEEN '$date3' and '$date4')";
$query_run2=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_assoc($query_run2);

if(mysqli_num_rows($query_run2) > 0)
{
    foreach($query_run2 as $row4)
    {
     
      ?>
 
                    <tr>
                     
                      <td><?= $row4['student_id'];?></td>

                      <td><?= $row4['attendance_date'];?></td>

                      <td><?= $row4['time'];?></td>

                      <td><?= $row4['attendance_status']; ?></td>
                      
                     
    
                    </tr>
                    <?php }}
    else{
        
      echo "<tr><td colspan=5><center>plese type all field right</center></td></tr>";
                                         
    }}
    ?>
                   
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
  
  </div>
  <br/>
  <br/>

  
  </body>
</html>

































