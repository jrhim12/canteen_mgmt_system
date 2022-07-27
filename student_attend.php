
<?php


include('dbconnection.php');


//attendance.php

include('header1.php');





?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>canteen attendance system</title>
   
  
  </head>
  <body>
  <?php

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $id=$_POST['id'];
  $mobile=$_POST['mobile'];
  $times=$_POST['time'];
  $time8=implode('',$times);
  $status=$_POST['status'];
  $status1=implode('',$status);
  $date=$_POST['date'];


  $sql3="SELECT max(CONCAT(SUBSTRING(time,1,2), (select attendance_id from tbl_attendance order by attendance_id desc limit 0,1))) AS mealid FROM tbl_attendance";
  $query2=mysqli_query($conn,$sql3);
  $row3=mysqli_fetch_array($query2);
  $mealid=$row3['0'];
  
  $sql10="select * from tbl_attendance where student_id='$id' && time='$time8' && attendance_date='$date' and attendance_date >= NOW() - INTERVAL 1 DAY";
  
  $query10=mysqli_query($conn,$sql10);

  
  $row10=mysqli_fetch_assoc($query10);
  $check=$row10['student_id'] ?? '0';
  $check1=$row10['time'] ?? '0';
  $check2=$row10['attendance_date'] ?? '0';
  
 
 
  if($id!=$check && $time8!=$check1 && $date!=$check2 )
{
 
  $sql2="INSERT INTO `tbl_attendance`(`attendance_id`, `student_id`,`time`, `attendance_status`, `attendance_date`, `teacher_id`, `mealid`) VALUES ('','$id','$time8','$status1','$date','','$mealid') "; 
  $query=mysqli_query($conn,$sql2);


  $sql4="SELECT `mealid` from tbl_attendance WHERE attendance_id = (SELECT MAX(attendance_id) from tbl_attendance) ";
  $query4=mysqli_query($conn,$sql4);
  $row4=mysqli_fetch_array($query4);
  $mealid1=$row4['0'];


  
  if($query)
  {
    echo'<br/>';
    echo'<center>'.'<h4>';
    echo "Dear&nbsp".$name.'&nbspyou have successfully Submitted attendance for &nbsp'.$time8.'&nbsp Your Mealid is &nbsp'.$mealid1.'';
    echo'</center>'.'</h4>';
   // header('location:student_attend.php');
    header( "refresh:3; url=student_attend.php" );
    
    
  }
 
  

}




  

  else
  { echo'<br/>';
    echo'<center>'.'<h4>';
    echo"Dear student you have already submitted your attendance";
    echo'</center>'.'</h4>';
    
     header( "refresh:3; url=student_attend.php" );
    }

}


?>

<!-- time function-->
<div class="container" style="margin-top: 80px;">

<!--<i style="font-weight: 1000; font-size:larger">Meals-->
<?php

date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$time= date("H:i:s");



$time1='07:00:00am';  // time interevel for breakfast
$time2='10:00:00am';

$time3='10:59:00pm';  // time interevel for lunch
$time4='15:00:00pm';

$time5='15:30:00pm';  // time interval for Tea Time
$time6='18:00:00pm';

$time7='19:00:00pm';  // time interevel for dinner
$time8='22:00:00pm';


/*
if(($time>$time1)&&($time<$time2))
{
  echo'&nbsp'.'
  <input type="radio" name="time[]" value="Breakfast" checked="true"><label>Breakfast</label>
  ';
 }
 elseif(($time>$time3)&&($time<$time4))
{
  echo'&nbsp'.'
  <input type="radio" name="time[]" value="Lunch" checked="true"><label>lunch</label>
  ';
 }
 elseif(($time>$time5)&&($time<$time6))
 {
  echo'&nbsp'.'
  <input type="radio" name="time[]" value="Tea" checked="true"><label>Tea</label>
  ';
 }
 elseif(($time>$time7)&&($time<$time8))
 {
  echo'&nbsp'.'
  <input type="radio" name="time[]" value="Dinner" checked="true"><label>Dinner</label>
  ';
 }
 else{
   echo'';
 }*/

 
?>
</i>
</div>





<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
       <!-- <div class="col-md-9">Attendance List</div> -->
        <div class="col-md-3" align="right">
            </div>


      </div>
      <form method="POST" action="">
        <input type="text" name="search" value="" placeholder="place student id">
         <button type="submit" name="submit2" class="btn btn-success">search</search>
      </form>
    </div>
  	<div class="card-body">
  		<div class="table-responsive">
        <span id="message_operation"></span>
        <table class="table table-striped table-bordered table-responsive-lg" id="attendance_table">
          <thead>
            <tr>
              
           
              <th>Student Name</th>
              <th>Student Id</th>
              <th>Mobile Number</th>
              <th> Meals       </th>
              <th>Attendance Status</th>
              <th>Attendance Date</th>
             
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_POST['submit2'])){

            $searchid=$_POST['search'];

       
            $sql="select * from tbl_student where student_id='$searchid'";

            $query_run=mysqli_query($conn,$sql);
            $row1=mysqli_fetch_assoc($query_run);

            

            
            if(mysqli_num_rows($query_run) > 0)
            {
                foreach($query_run as $row)
                {
                  $student_name=$row['student_name'];
                  $student_id=$row['student_id'];
                  $mobile=$row['mobile'];
                  $date=date('y-m-d');
                 

                  
                    ?>
                    <tr>
                      <form action="" method="post" name="myForm" onsubmit="return validateForm()">
                 <div>
                      <td><input  name="name" value=<?php echo $student_name;?> readonly></td>
                      <td><input  name="id"  value=<?php echo $student_id;?> readonly></td>
                      <td><input  name="mobile"  value=<?php echo $mobile;?> readonly></td>
                      <td>    <?php 
    if(($time>$time1)&&($time<$time2))
{
  echo'
  <input type="radio" name="time[]" value="Breakfast" checked="true"><label>Breakfast</label>
  ';
 }
 elseif(($time>$time3)&&($time<$time4))
{
  echo'
  <input type="radio" name="time[]" value="Lunch" checked="true"><label>lunch</label>
  ';
 }
 elseif(($time>$time5)&&($time<$time6))
 {
  echo'
  <input type="radio" name="time[]" value="Tea" checked="true"><label>Tea</label>
  ';
 }

 elseif(($time>$time7)&&($time<$time8))
 {
  echo'
  <input type="radio" name="time[]" value="Dinner" checked="true"><label>Dinner</label>
  ';
 }
 else{
   echo'<input type="text" id="meal" name="meal" value="No Meal Time" readonly>';
 }
       ?>  </td>     
                        
                        <td><input type="radio" name="status[]" value="present" checked="true"><label>present</label>
                        
                        <td><input  name="date"  value=<?php echo $date;?> readonly></td>
                        </tr></div>
                       
                   
                      <td colspan='6' align="right"><button type="submit" name="submit" class="btn btn-success" >attandence</button></td>
                      
                       
                     
            </script>
                      </form>
               
                       
                        
                  
                    <?php   }
                                            }
                                            else
                                            {
                                                echo "<tr><td colspan=5><center>No Record Found</center></td></tr>";
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
  </div>

   
  </body>
</html>

<script>
   
   function validateForm() {
     var x = document.forms["myForm"]["meal"].value;
   
   
     document.write()
     document.write('<!doctype html>');
   document.write('<html lang="en">');
     document.write('<head>')
   
       
      document.write(' <meta charset="utf-8">');
       document.write('<meta name="viewport" content="width=device-width, initial-scale=1">');
   
       document.write(' <link rel="stylesheet" href="css/bootstrap.min.css">');
       document.write(' <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">');
    
      document.write('<title>');
      document.write('canteen attendance system</title>');
     
     document.write('</div>');
      document.write('</head>');
     document.write('<body>');
     document.write('<div class="jumbotron-small text-center" style="margin-bottom:0">')
     document.write('<img src="pic/manit_logo.png" alt="manit logo" width="125" height="125">')
   
     document.write('<span style="font-size: 40px; font-weight: 700;">Canteen Attendance System</span>');
     document.write(' <nav class="navbar navbar-expand-sm bg-dark navbar-dark">');
     document.write('<div style="margin-left: 120px;">');
     document.write(' <a class="navbar-brand" href=""></a>');
     document.write(' <a class="navbar-brand" href=""></a>');
     document.write(' </div>');
   
     document.write(' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">');
     document.write('   <span class="navbar-toggler-icon"></span>');
     document.write(' </button>');
     document.write('<div class="collapse navbar-collapse" id="collapsibleNavbar">');
     document.write(' <ul class="navbar-nav">');
        
     document.write('  </ul>');
     document.write(' </div>  ');
     document.write('</nav>');
     document.write('<br/>');
     document.write('<br/>');
     
     document.write('<center>');
     document.write('<h2>');
   
     document.write('Dear student It is a '+x+' please try after some time');
     document.write('</h2>');
     document.write('</center>');
   
    document.write('</body>');
   document.write('</html>');
   //  window.history.back();  
     setTimeout(function () {   
       window.location.href = '/student-attendance-ajax/student_attend.php'; 
   },5000); 
      
   
   }
   </script>
   




