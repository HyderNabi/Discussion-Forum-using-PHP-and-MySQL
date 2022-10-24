<?php
session_start();
if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
{
	header("Location: ../index.php?Message=lgoot");
}
$key = $_SESSION['key'];
$pas = $_SESSION['pass'];

	global $mycon;
	global $key;
	global $pas;
	$getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$userID = $name_array['user_id'];
		$fname = $name_array['fname'];
		$lname = $name_array['lname'];
		$sex = $name_array['gender'];
		$username = $fname. " ".$lname;
		
	}

//module for extracting the data from media table..

	$getmedia = "SELECT * FROM media WHERE user_id = '".$userID."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		
	}
function UserCount()
{       global $mycon;
		$user_count = "SELECT * FROM user";
		$run_user_count = mysqli_query($mycon, $user_count);
		if($run_user_count)
		{
			$total = mysqli_num_rows($run_user_count);
			echo $total;
		}
}
?>