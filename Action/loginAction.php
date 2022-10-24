<?php 
session_start();
include("../inclFiles/connect.php");
$Contact = mysqli_real_escape_string($mycon, $_POST['contactNumber']);
$Pass = mysqli_real_escape_string($mycon, $_POST['Password']);
$check = "SELECT * FROM user WHERE cnumber = '".$Contact."' ";
 $run_check  = mysqli_query($mycon, $check);
 if(mysqli_num_rows($run_check) == 0)
 {
	 header("Location: ../index.php?Message=nt");
 }
 else if(mysqli_num_rows($run_check) == 1)
 {
	$check_pass = "SELECT * FROM user WHERE cnumber = '".$Contact."' AND password = '".$Pass."' ";
	$run_check_pass = mysqli_query($mycon, $check_pass);
	if(mysqli_num_rows($run_check_pass) == 1)
	{
		$_SESSION['key'] = $Contact;
		$_SESSION['pass'] = $Pass;
		$update = "UPDATE user SET login_date = NOW(), login_time = NOW() WHERE cnumber = '".$Contact."' AND password = '".$Pass."' ";
		$run_update = mysqli_query($mycon, $update);
		   if($run_update)
		   { 
	       header("Location: ../Func/prehome.php?f=hy");
		   } else{
	       header("Location: ../index.php?Message=inpas");
	       }
		
	}
	else
	{
	 header("Location: ../index.php?Message=inpas");
	}
 }
 else {
      header("Location: ../index.php?Message=inc");
 }


?>