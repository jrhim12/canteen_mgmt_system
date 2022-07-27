<?php
include('dbconnection.php');


if(isset($_GET['deleteid']))
{
    $grade_id=$_GET['deleteid'];

   
    $sql="DELETE FROM tbl_grade where grade_id= $grade_id";

    $data=mysqli_query($conn,$sql);

    if($data){
        header('location:grade.php');
    }
    else{
		die(mysqli_error($conn));
	}
}

?>