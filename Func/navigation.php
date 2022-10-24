 <?php
 
 include("../inclFiles/connect.php");
 session_start();
if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
{
	header("Location: ../index.php?Message=lgoot");
}
$key = $_SESSION['key'];
$pas = $_SESSION['pass'];
 
 
	
	 
	$getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$userID = $name_array['user_id'];
		$fname = $name_array['fname'];
		$lname = $name_array['lname'];
		$sex = $name_array['gender'];
		$date = $name_array['date'];
		$time = $name_array['time'];
		$login = $name_array['login_date'];
		$logint = $name_array['login_time'];
		 $fname. " ".$lname;
		 
		
	}
	$getmedia = "SELECT * FROM media WHERE user_id = '".$userID."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		
	}
	//getting no of users in the database
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
function CountMyPosts($tableName){
  global $mycon;
  global $userID;
		$MyPosts_count = "SELECT * FROM $tableName Where user_id = '".$userID."' ";
		$run_MyPosts_count = mysqli_query($mycon, $MyPosts_count);
		if($run_MyPosts_count)
		{
			$total = mysqli_num_rows($run_MyPosts_count);
			echo $total;
		}

}
	

 
 ?>
 <html>
 <head>
   <Link  type = "text/css" href = "../Styles/navigation.css"  rel = "stylesheet" />
 </head>
 <body>
 <div id="leftContent"><!-- Left Navigation pane -->
					         <div id="upper_leftContrent">
                         <center>
		          	   	 <div id="prodivision">
		          	     	<a href="profle/uploads/<?php echo $profilepic ?>" target="body"><img id="secondaryprofile" src="profle/uploads/<?php echo $profilepic; ?>"
							alt="Profile"/></a>
		          	   	</div>
						</center>
						
						    <center>
					        <a href="profle/profile.php?userID=<?php echo $userID; ?>" target="body" style="text-decoration: none;">
							    <text id="textsecond">
								<?php
                              echo"$fname"." $lname";
						   ?>
                       </text>
							  </a>
							  </center>
							  
							  <div id="leftNav">
                                                 <center> 
												      <a id="linkk" href="profle/members.php" target = "body" style="text-decoration: none;">
												                Members(<font style = "color: red;"><?php UserCount();?></font>)
													</a>
												 </center>
						                         
												<hr style=" height: 5px; background-color: #000000; ">
												
												
												   <text id="extra">Member Since:</text> <br/><text id="extrastuff"><?php echo$date." | ".$time;?></text><br/><br/>
												    <text id="extra">Last Login</text><br/> <text id="extrastuff"><?php echo$login." | ".$logint; ?></text><br/><br/><br/>
													
													
		                                                <table>
			                                            <tr>
													           <td><a style="text-decoration: none;" href="myposts/mycomputer.php" target="body"><div id = "logout">My<br/>Computer Sc.<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="computerposts")?></font>)</div></a></td>
															   <td><a style="text-decoration: none;" href="myposts/myscience.php" target="body"><div id = "logout">My<br/>Science<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="scienceposts")?></font>)</div></a></td>
													    <tr/>	
														<tr>
													           <td><a style="text-decoration: none;" href="myposts/myislamic.php" target="body"><div id = "logout">My<br/>Isalmic<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="islamicposts")?></font>)</div></a></td>
															   <td><a style="text-decoration: none;" href="myposts/myarts.php" target="body"><div id = "logout">My<br/>Arts.<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="artsposts")?></font>)</div></a></td>
													    <tr/>
														<tr>
													           <td><a style="text-decoration: none;" href="myposts/mygeneral.php" target="body"><div id = "logout">My<br/>General<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="generalposts")?></font>)</div></a></td>
															   <td><a style="text-decoration: none;" href="myposts/myother.php" target="body"><div id = "logout">My<br/>1st to 12th<br/>Posts (<font style = "color: red;"><?php CountMyPosts($tab="otherposts")?></font>) </div></a></td>
													    <tr/>
														</table>
													 
													
								 </div>
						


                            </div>
							
		          	   </div><!-- Left Navigation pane -->
		</body>
	</html>