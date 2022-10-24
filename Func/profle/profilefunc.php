<?php
session_start();
if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
{
	header("Location: ../index.php?Message=lgoot");
}
$key = $_SESSION['key'];
$pas = $_SESSION['pass'];
function GetID()
{
	global $mycon;
	global $key;
	global $pas;
	$getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$my_id = $name_array['user_id'];
		
		 return $my_id;
	}
}

	global $mycon;
	
if(isset($_GET['userID']))
{
	$_SESSION['userID'] = $_GET['userID'];
	
}
   $userID = $_SESSION['userID'] ;
	$getName = "SELECT * FROM user WHERE user_id = '".$userID."' limit 1";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$fname = $name_array['fname'];
		$lname = $name_array['lname'];
		$sex = $name_array['gender'];
		$email = $name_array['email'];
		$area_of_intrest = $name_array['field'];
		$date = $name_array['date'];
		$time = $name_array['time'];
		$login_date = $name_array['login_date'];
		$login_time = $name_array['login_time'];
		$username = $fname. " ".$lname;
	
	}
	
	//module for extracting the data from media table..
	$getmedia = "SELECT * FROM media WHERE user_id = '".$userID."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		$backgrnd = $media_array['backgrnd'];
		$figcap = $media_array['caption'];
	}
	
?>
