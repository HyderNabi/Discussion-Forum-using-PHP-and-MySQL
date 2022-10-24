<?php
include("../../inclFiles/connect.php");
include("profilefunc.php");
?>
 <html>
 <head>
   <Link  type = "text/css" href = "../../Styles/profile.css"  rel = "stylesheet" />
 </head>
 <body>
 <div id="leftContent"><!-- body -->
 <?php                
                 if(isset($_GET['msg']))
				{
						$m = $_GET['msg'];
							if($m == "ex")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Sorry...This file already exits..Try other one..
							 <a href='profile.php'>Refresh.</a></font>";
							}
							else if($m == "lr")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Too....large in size....
							 <a href='profile.php'>Refresh.</a></font>";
							}
							else if($m == "ty")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.
							 <a href='profile.php'>Refresh.</a></font>";
							}
							else if($m == "err")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Sorry, there was an error uploading your file.
							 <a href='profile.php'>Refresh.</a></font>";
							}												
							else if($m == "ntimg")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Sorry ....This file is not an image.
							 <a href='profile.php'>Refresh.</a></font>";
							}
							else if($m == "upl")
							{
							 echo "<font style = 'font-size: 20px; margin-left: 20px; color: red;'>Uploaded.
							 <a href='profile.php'>Refresh.</a></font>";
							}
				}
	?>
				<div id="upper_leftContrent"><!--profile pic and background here-->
				    <center> <a href="uploads/<?php echo $backgrnd ?>" ><img id="backgound" src="uploads/<?php echo $backgrnd ?>" alt="back ground picture"/></a>
					<!--profile //////////////////////////
					///////////////////////////////////
					/////////////////////////////////-->
					<div id="prodivision">
		          	     	       <a href="uploads/<?php echo $profilepic ?>"><img id="secondaryprofile" src="uploads/<?php echo $profilepic ?>"
							                     alt="Profile"/></a>
							</div>					
							          <text id="textsecond">
								                 <?php
                                                           echo $username;
						                           ?>
                                      </text>
							      
		          	   	         
								 
				</div>
				</center>
				
				<!--profile //////////////////////////
					///////////////////////////////////
					/////////////////////////////////-->
					<text id="extra">Figure caption:</text><text id="extrastuff"><?php echo $figcap; ?></text>
					
                        <hr style=" height: 5px; background-color: #000000; ">					 	       
							   <div id="leftNav">
							             <div id ="left">
												<text id="extra">First Name:</text><text id="extrastuff"><?php echo $fname; ?></text><br/><br/><br/><br/>
												<text id="extra">Last Name:</text><text id="extrastuff"><?php echo $lname; ?></text><br/><br/><br/><br/>
												<text id="extra">Full Name:</text><text id="extrastuff"><?php echo $username; ?></text><br/><br/><br/><br/>
												<text id="extra">E-mail:</text><text id="extrastuff"><?php echo $email; ?></text><br/><br/><br/><br/>
												<text id="extra">Field of Intrest:</text><text id="extrastuff"><?php echo $area_of_intrest; ?></text><br/><br/><br/><br/>
										 </div>
										 
										 <div id= "right">
										      <text id="extra">Gender:</text><text id="extrastuff"><?php echo $sex; ?></text><br/><br/><br/><br/>
											     <text id="extra">Figure Caption:</text> <text id="extrastuff"><?php echo $figcap; ?></text><br/><br/>
												<text id="extra">Member Since(Date):</text> <text id="extrastuff"><?php echo $date; ?></text><br/><br/><br/><br/>
												<text id="extra">Member Since(Time):</text> <text id="extrastuff"><?php echo $time; ?></text><br/><br/><br/><br/>
												<text id="extra">Last Login:</text><text id="extrastuff"><?php echo $login_date." | ".$login_time; ?></text><br/><br/><br/><br/>
										 </div>
                                           			                         
										
												
							  </div>
							 <?php
							    if($userID == GetID())
								{
									
									echo"
									                <form  id = 'signup' action = 'upload.php' method = 'POST' enctype = 'multipart/form-data'>
													<label style='color:red; font-size: 20px; font-family: Yu Gothic UI Semibold;'>Update Profile Picture</label><br/>
														<input id = 'post_input' type = 'file' name = 'pp' required = 'required'  /><br/><br/>
														<input id = 'post_input' type = 'submit' name = 'profileq' value ='Upload'/><br/><br/><br/>
														<hr style=' height: 5px; background-color: #000000; '>	
														
														</form>
                                                     <form  id = 'signupp' action = 'background_upload.php' method = 'POST' enctype = 'multipart/form-data'>
													 <label style='color:red; font-size: 20px; font-family: Yu Gothic UI Semibold;'>Update Background Picture</label><br/>
														<input id = 'post_input' type = 'file' name = 'bb' required = 'required' /><br/><br/>
														<input id = 'post_input' type = 'text' name = 'cc' required = 'required'   maxlength='30' placeholder='Enter figure caption(not more than 30 letters).'/><br/><br/>
														<input id = 'post_input' type = 'submit' name = 'backq' value ='Upload'/>
														</form>														
									
                                            ";	
								}
											?>
							 
							
		       </div><!-- body -->
			
		</body>
	</html>
