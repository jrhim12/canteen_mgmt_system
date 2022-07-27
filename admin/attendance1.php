<?php

//attendance.php


include('header.php');
$conn=mysqli_connect('localhost','root','','attendance');

?>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
        <div class="col-md-9">Attendance List</div>
        <div class="col-md-3" align="right">
      
          <button type="button" id="report_button" class="btn btn-danger btn-sm">Report</button>
        </div>
      </div>
    </div>
  	<div class="card-body">
  		<div class="table-responsive">
        <table class="table table-striped table-bordered" id="attendance_table">
          <thead>
            <tr>
              <th>Student Name</th>
             
              <th>Student Id</th>
              <th>Attendance Status</th>
              <th>Attendance Date</th>
            
            </tr>
          </thead>
          <tbody>

          <tbody>
    <?php
            
            $sql="SELECT  tbl_student.student_name, tbl_student.student_roll_number, tbl_attendance.student_id, tbl_attendance.attendance_status,tbl_attendance.attendance_date
                   FROM tbl_attendance
 INNER JOIN tbl_student ON tbl_attendance.student_id=tbl_student.student_id ORDER BY attendance_date desc";

            $query=mysqli_query($conn,$sql);

            if($query){
              while($row=mysqli_fetch_assoc($query))
              {   
                $student_name=$row['student_name'];
                $student_roll_number=$row['student_roll_number'];
                $student_id=$row['student_id'];
                $attendance_status=$row['attendance_status'];
                $attendance_date=$row['attendance_date'];
               
         echo'
          <td>'.$student_name.'</td>
       
          <td>'. $student_id.'</td>
          <td>'.$attendance_status.'</td>
          <td>'.$attendance_date.'</td>
          
          
        </tr>';
        
    }
        
    }
    
    ?>
 
 
</tbody>
</table>
</div>

<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../css/datepicker.css" />

<style>
    .datepicker
    {
      z-index: 1600 !important; /* has to be larger than 1050 */
    }
</style>

<div class="modal" id="reportModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Make Report</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
         
         
        </div>
        <div class="form-group">
          <div class="input-daterange">
            <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
            <span id="error_from_date" class="text-danger"></span>
            <br />
            <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
            <span id="error_to_date" class="text-danger"></span>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" name="create_report" id="create_report" class="btn btn-success btn-sm">Create Report</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



      
      

<script>


  $('.input-daterange').datepicker({
    todayBtn: "linked",
    format: "yyyy-mm-dd",
    autoclose: true,
    container: '#formModal modal-body'
  });

  $(document).on('click', '#report_button', function(){
    $('#reportModal').modal('show');
  });

  $('#create_report').click(function(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var error = 0;

    if(from_date == '')
    {
      $('#error_from_date').text('From Date is Required');
      error++;
    }
    else
    {
      $('#error_from_date').text('');
    }

    if(to_date == '')
    {
      $('#error_to_date').text("To Date is Required");
      error++;
    }
    else
    {
      $('#error_to_date').text('');
    }

    if(error == 0)
    {
      $('#from_date').val('');
      $('#to_date').val('');
      $('#formModal').modal('hide');
      window.open("report.php?action=attendance_report&from_date="+from_date+"&to_date="+to_date);
    }

  });

 
   

   

 


</script>