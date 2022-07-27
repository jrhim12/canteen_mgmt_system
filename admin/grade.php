<?php

//grade.php
include('dbconnection.php');


include('header.php');

if(isset($_POST['submit']))
{
	$gradename=$_POST['grade_name'];
	
	$sql="INSERT INTO `tbl_grade`(`grade_id`, `grade_name`) VALUES ('','$gradename')";
	
	$query=mysqli_query($conn,$sql);
	
	
	
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<meta name="viewport" content="width=device-width, initial-scale=1">
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

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header">
      <div class="row">
        <div class="col-md-9">Grade List</div>
        <div class="col-md-3" align="right">
          <button type="button" id="myBtn" onclick="showForm()" class="btn btn-info btn-sm">Add</button>
        </div>
    
      </div>
    </div>
  	<div class="card-body">
  		<div class="table-responsive">
        <span id="message_operation"></span>

        <table class="table table-bordered" id="grade_table">
          <thead>
            <tr>
              <th>Grade Id</th>
              <th>Grade Name</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
          
          
          <tr>
		  <?php

    $sql1="SELECT * FROM tbl_grade";

    $record=mysqli_query($conn,$sql1);

    if($record){
        while($row=mysqli_fetch_assoc($record))
        {   
		     $gradeid= $row['grade_id'];
            $gradename2=$row['grade_name'];
			

     echo'
	 <td>'.$gradeid.'</td>
      <td>'.$gradename2.'</td>
     
    
      <td>
	  <button class="btn btn-danger"><a href="updategrade.php?updateid='.$gradeid.'" class="text-light">Update</a></button>         
       </td>  
	   <td>
	     <button class="btn btn-success"><a href="deletegrade.php?deleteid='.$gradeid.'" class="text-light">Delete</a></button>
      </td>
    </tr>';
    
}
	  
}

?>
          
          
          
          

          </tbody>
        </table>
  		</div>
  	</div>
  </div>
</div>

</body>
</html>

<div id="myModal" class="modal">

<div class="Fields">
<div>
<div class="formContainer">
<form action="" method="post">
<div class="Fields">
<div>

<h3>Grade_Details</h3>
<hr/>

<div>
<label style="float:left">Grade_name</label>
<input type="text" id="grade_name" name="grade_name" >
</div>
<div>

<input type="submit" name="submit" class="btn btn-primary" >
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>



  


</div>



<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>