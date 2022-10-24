<?php
session_start();
include("../inclFiles/connect.php");
$fname = mysqli_real_escape_string($mycon, $_POST['fname']);
$lname = mysqli_real_escape_string($mycon, $_POST['lname']);
$cnumber = mysqli_real_escape_string($mycon, $_POST['cnumber']);
$email = mysqli_real_escape_string($mycon, $_POST['email']);
$password = mysqli_real_escape_string($mycon, $_POST['password']);
$retype = mysqli_real_escape_string($mycon, $_POST['retype']);
$gender = mysqli_real_escape_string($mycon, $_POST['gender']);
$feild= mysqli_real_escape_string($mycon, $_POST['feild']);
//Validating input fields............
if(empty($fname) || empty($lname) || empty($cnumber) || empty($email) || empty($password) || empty($retype) || empty($gender) || empty($feild)){
header("Location: ../index.php?Message=incomp");
} 
else {
     if(!is_numeric($cnumber)){
         header("Location: ../index.php?Message=notnum");
	 } else if(strlen($cnumber) != 10)
	 {
		header("Location: ../index.php?Message=cont"); 
	 } else{
	    if(!(strlen($password) >= 8 AND strlen($password) <=21))
		{
			header("Location: ../index.php?Message=shrr");
		}
		else
		{
		         if($password != $retype)
				 {
				  header("Location: ../index.php?Message=dmat");
				 } else
				 {
	                     if($gender == "disabled")
						 {
							 header("Location: ../index.php?Message=ged");
						 } 
						 else
						 {
							 if($feild == "disabledField")
							 {
								 header("Location: ../index.php?Message=fd");
							 }
							 else
							 {
							   $check  =  "SELECT * FROM user WHERE cnumber  = '".$cnumber."' ";
							   $run_check = mysqli_query($mycon, $check);
							   if(mysqli_num_rows($run_check) == 0)
							   {
								   $checkPassword = "SELECT * FROM user WHERE password  = '".$password."' ";
								   $run_checkPassword = mysqli_query($mycon, $checkPassword);
								   if(mysqli_num_rows($run_checkPassword) == 0)
								   {
									   //insertion starts from here////........
									   $insert_user = "INSERT INTO user (fname, lname, cnumber, password, email, gender, field, date, time,login_date,login_time)
									   VALUES ('".$fname."', '".$lname."', '".$cnumber."', '".$password."', '".$email."', '".$gender."', '".$feild."', NOW(), NOW(), NOW(), NOW() )";
									   $run_insert_user = mysqli_query($mycon, $insert_user);
									   if($run_insert_user == TRUE)
									   {
										   $_SESSION['key'] = $cnumber;
		                                   $_SESSION['pass'] = $password;
										   $key = $_SESSION['key'];
										   $pas = $_SESSION['pass'];
										   ////////////////////////
										   //getting user id to make an entry in media table////
										          $getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	                                               $run_getName = mysqli_query($mycon, $getName);
	                                                 if($run_getName)
	                                                       {
	                                                          	$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		                                                         $my_id = $name_array['user_id'];
																 $gen = $name_array['gender'];
																 if($gen == "Male")
																 {
																	 $pp = "defaultMale.png";
																 }
																 else{
																	  $pp = "defaultFemale.png";
																 }
                                                          }
										   
										   
										   
										   ////////////////////////
		                                 
										   
										     $update = "INSERT INTO media (user_id,profilepic) VALUES ('".$my_id."', '".$pp."')";
		                                     $run_update = mysqli_query($mycon, $update);
												if($run_update)
													{ 
	                                                      header("Location: ../Func/prehome.php?f=hy");
		                                              } else{
	                                                       header("Location: ../index.php?Message=dnt");
	                                               }
									   }
									   else 
									   {
										   header("Location: ../index.php?Message=dnt");
									   }
									   
								   }
								   else
								   {
									    header("Location: ../index.php?Message=alrr");		
								   }
								   
							   }
							   else
							   {
								   header("Location: ../index.php?Message=alr");							   
							   }
							 }
						 }
							 
				}
					 
		}
	 }
	 
 
}

?>