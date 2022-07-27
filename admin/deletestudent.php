<?php
include('dbconnection.php');


if(isset($_GET['deleteid']))
{
    $studel_id=$_GET['deleteid'];

   
    $sql="DELETE FROM tbl_student where student_id= $studel_id";

    $data=mysqli_query($conn,$sql);

    if($data){
        header('location:student.php');
    }
    else{
		die(mysqli_error($conn));
	}
}

?>