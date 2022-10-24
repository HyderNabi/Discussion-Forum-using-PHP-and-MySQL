<?php
include("../../inclFiles/connect.php");
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
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["bb"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["backq"]))
{
    $check = getimagesize($_FILES["bb"]["tmp_name"]);
    if($check !== false)
	{
				if (file_exists($target_file))
				{
						header("Location:profile.php?msg=ex");
				}
				else{
					if ($_FILES["bb"]["size"] > 50000000)
						{
							header("Location:profile.php?msg=lr");
					     
						}else
						{
							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
							   {
									
									header("Location:profile.php?msg=ty");
							   }else
							   {
								   if (move_uploaded_file($_FILES["bb"]["tmp_name"], $target_file)) 
								       {
										   $bb = $_FILES["bb"]["name"];
										   $cc = $_POST['cc'];
										   $id = GetID();
                                          $update = "UPDATE media SET backgrnd = '".$bb."', caption = '".$cc."' Where user_id = '".$id."'";
										  $run_update = mysqli_query($mycon, $update);
		                                   if($run_update)
		                                    { 
	                                               header("Location:profile.php?msg=upl");
		                                     } else{
	                                           header("Location:profile.php?msg=err");
	                                          }
                                        } 
										 else 
										 {
											header("Location:profile.php?msg=err");
                                             
                                         }
							   }   
						}
							
	             }
    } else 
	{
		header("Location:profile.php?msg=ntimg");
       
    }
}







?>
