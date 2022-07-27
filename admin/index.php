<?php

//index.php

include('header.php');

include('dbconnection.php');


?>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
        <div class="col-md-9">Overall Student Attendance Status</div>
        <div class="col-md-3" align="right">
          
        </div>
      </div>
    </div>

    <div>
    <div class="card-body">
  <form id="form1" action="" method="POST">
      <div class="row">
      <div class="col-md-4">
              <div class="form-group">

    <label>Student Id</label><input class="form-control" type="text" name="studentid1" value="" placeholder="Please Enter Your Id">
</div>
</div>
          <div class="col-md-4">
              <div class="form-group">

    <label>form_date</label><input class="form-control" type="date" name="form_date" value="">
</div>
</div>
<div class="col-md-4">
      <div class="form-group">

<label>Till_date</label><input class="form-control" type="date" name="till_date" value="">
      </div>
    </div>
   
      <div class="col-md-4">
      <div class="form-group my-3">
          
          <input type="submit" class="btn btn-primary" style="margin-top: -10px; " name="submit1">
          
      </div>
      </div>
</form>
      </div>
      

    </div>

  	<div class="card-body">
  		<div class="table-responsive">
        <table class="table table-striped table-bordered" id="student_table">
          <thead>
            <tr>
              <th>student Id</th>
              <th>Student Name</th>
              <th>class</th>
              <th>Meal</th>
              <th>Attendance Status</th>
              <th>Attendance Date</th>
             
             
              
            </tr>
          </thead>
          <tbody>
          <?php
if((isset($_POST['form_date'])) && isset($_POST['till_date']))
{
  if(empty($_POST['studentid1'])){
    $studentid2 = '0';
  }else{
    $studentid2 = $_POST['studentid1'];
  }
    $date1=$_POST['form_date'];
    $date2=$_POST['till_date'];

   

    if($studentid2 != 0){

    $query = "SELECT tbl_attendance.student_id, tbl_student.student_name, tbl_grade.grade_name, tbl_attendance.time, tbl_attendance.attendance_status, tbl_attendance.attendance_date FROM tbl_attendance JOIN tbl_student ON tbl_student.student_id = tbl_attendance.student_id JOIN tbl_grade ON tbl_grade.grade_id = tbl_student.student_grade_id where (attendance_date BETWEEN '$date1' AND '$date2') and ( tbl_attendance.student_id='$studentid2')  ";
    }       
    elseif($studentid2 == 0)
    {
      $query = "SELECT tbl_attendance.student_id, tbl_student.student_name, tbl_grade.grade_name, tbl_attendance.time, tbl_attendance.attendance_status, tbl_attendance.attendance_date FROM tbl_attendance JOIN tbl_student ON tbl_student.student_id = tbl_attendance.student_id JOIN tbl_grade ON tbl_grade.grade_id = tbl_student.student_grade_id where (attendance_date BETWEEN '$date1' AND '$date2')   ";
    
    }              
    $query_run=mysqli_query($conn,$query);
   

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $row)
        {
          ?>
          <tr>
              <td><?= $row['student_id']; ?></td>
              <td><?= $row['student_name']; ?></td>
              <td><?= $row['grade_name']; ?></td>
              <td><?= $row['time']; ?></td>
              <td><?= $row['attendance_status']; ?></td>
              <td><?= $row['attendance_date']; ?></td>
              
              
        </tr>
          <?php   }
                                  }
                                  else
                                  {
                                      echo "No Record Found";
                                  }
                              }
                          ?>
                          </tbody>
                      </table>
                  </div>
              </div>
                            

</body>
</html>

