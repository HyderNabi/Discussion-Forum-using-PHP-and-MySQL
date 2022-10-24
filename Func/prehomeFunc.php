<?php
session_start();
if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
{
	header("Location: ../index.php?Message=lgoot");
}
$key = $_SESSION['key'];
$pas = $_SESSION['pass'];
function GetName()
{
	global $mycon;
	global $key;
	global $pas;
	$getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$fname = $name_array['fname'];
		$lname = $name_array['lname'];
		$sex = $name_array['gender'];
		echo $fname. " ".$lname;
		return $sex;
	}
}
//get user idate
function Getuserid()
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
//module for extracting the data from media table..
$userID = Getuserid();
	$getmedia = "SELECT * FROM media WHERE user_id = '".$userID."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		
	}

?>
