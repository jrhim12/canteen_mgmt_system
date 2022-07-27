<?php
include('dbconnection.php');
include('header.php');




if(isset($_GET['updateid']))
{
    $updateid=$_GET['updateid'];

$sql="select * from tbl_grade where grade_id='$updateid'";

$row=mysqli_query($conn,$sql);

$row1=mysqli_fetch_assoc($row);

$grade_id=$row1['grade_id'];
$grade_name=$row1['grade_name'];

}


if(isset($_POST['submit1']))
{
    $updateid1=$_GET['updateid'];

    $gradeidname12=$_POST['gradename'];
    $gradeid=$_POST['gradeid'];

    $sql1="UPDATE `tbl_grade` set grade_name='$gradeidname12' where grade_id=$gradeid";

   
    $result1=mysqli_query($conn,$sql1);

    if($result1){
        header('location:grade.php');
    }
    else{

        mysqli_error($conn);
    }

   
    

   
  

   

   
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>updategrade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <style>

/* form design*/

body {
font-family: Arial;
font-size: 17px;
padding: 8px;
}
* {
box-sizing: border-box;
}
.Fields {
display: flex;
flex-wrap: wrap;
padding: 20px;
justify-content: space-around;
}
.Fields div {
margin-right: 10px;
}
label {
margin: 15px;
}
.formContainer {
margin: 10px;
background-color: #efffc9;
padding: 5px 20px 15px 20px;
border: 1px solid rgb(191, 246, 250);
border-radius: 3px;
}
input[type="text"] {
display: inline-block;
width: 100%;
margin-bottom: 20px;
padding: 12px;
border: 1px solid #ccc;
border-radius: 3px;
}
label {
margin-left: 20px;
display: block;
}
.icon-formContainer {
margin-bottom: 20px;
padding: 7px 0;
font-size: 24px;
}
.checkout {
background-color: #4caf50;
color: white;
padding: 12px;
margin: 10px 0;
border: none;
width: 100%;
border-radius: 3px;
cursor: pointer;
font-size: 17px;
}
.checkout:hover {
background-color: #45a049;
}
a {
color: black;
}
span.price {
float: right;
color: grey;
}
@media (max-width: 300px) {
.Fields {
flex-direction: column-reverse;
}
}






/*form design*/



</style>

</head>
  <body>

  <div class="Fields">
<div>
<div class="formContainer">
<form action="updategrade.php" method="post">
<div class="Fields">
<div>

<h3>update Grade_Details</h3>
<hr/>
<div>
<label style="float:left">Grade_Id</label>
<input type="text"  name="gradeid" value="<?php echo $grade_id;?> " readonly >
</div>

<div>
<label style="float:left">Grade_name</label>
<input type="text"  name="gradename" value="<?php echo $grade_name;?>" >
</div>
<div>

<input type="submit" name="submit1" class="btn btn-primary" >
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

