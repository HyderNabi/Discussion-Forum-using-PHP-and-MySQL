 <?php 
include("../inclFiles/connect.php");
include("headerfunc.php");
?>
<html>
<head><Link  type = "text/css" href = "../Styles/header.css"  rel = "stylesheet" /></head>
 <body class="body">
  
        <div class="wrapper"><!-- .wrapper -->
		          <header> <!-- .Header -->
                    
		                 <div class="entry">		                 	
		                 	  <img class="profile"  src="profle/uploads/<?php echo $profilepic; ?>" alt="Profile" height="45" width="45" style="float:left">
		                 	  &nbsp;
        							  <a href="profle/profile.php?userID=<?php echo $userID; ?>" target="body"" style="text-decoration: none;">
							            <text class="text">
                                 <?php echo "$username";?> 
                                 </text>
							        </a>
									</div>
									
									
									
									
									<div class="navv">
									     <nav>
												<ul>
												<li><a   href="prehome.php" target="blank" style="text-decoration: none;">Home</a></li>
                                                 
												 <?php 
												   if(isset($_GET['stid']))
												     {
														 //////
														 if($_GET['stid']=="c")
														 {
															 echo'<li><a  href="computer.php" target="body" >Computer Science</a></li>';
														 }else
														 {
															 echo'<li><a  href="computer.php" target="body" style="text-decoration: none;">Computer Science</a></li>';
														 }
														 //////////
														 /////////
														  if($_GET['stid']=="s")
														 {
															 echo'<li><a  href="science.php" target="body">Science</a></li>';
														 }else
														 {
															 echo'<li><a  href="science.php" target="body" style="text-decoration: none;">Science</a></li>';
														 }
														 /////////
														  /////////
														  if($_GET['stid']=="i")
														 {
															 echo'<li><a  href="islamic.php" target="body">Islamic</a></li>';
														 }else
														 {
															 echo'<li><a  href="islamic.php" target="body" style="text-decoration: none;">Islamic</a></li>';
														 }
														 /////////
														 /////////
														  if($_GET['stid']=="a")
														 {
															 echo'<li><a  href="arts.php" target="body" >Arts</a></li>';
														 }else
														 {
															 echo'<li><a  href="arts.php" target="body" style="text-decoration: none;">Arts</a></li>';
														 }
														 /////////
														 /////////
														  if($_GET['stid']=="g")
														 {
															 echo'<li><a  href="general.php" target="body" >General</a></li>';
														 }else
														 {
															 echo'<li><a  href="general.php" target="body" style="text-decoration: none;">General</a></li>';
														 }
														 /////////
														  /////////
														  if($_GET['stid']=="o")
														 {
															 echo'<li><a href="other.php" target="body">1st to 12th</a></li>';
														 }else
														 {
															 echo'<li><a href="other.php" target="body" style="text-decoration: none;">1st to 12th</a></li>';
														 }
														 /////////
												      }
												 ?>
												     <li><a  href="profle/profile.php?userID=<?php echo $userID; ?>" target="body" style="text-decoration: none;">Profile</a></li>
						                            <li><a  href="profle/members.php" target="body" style="text-decoration: none;">Members(<font style = "color: red;"><?php UserCount();?></font>)</a></li>
												</ul>
									     </nav>
									</div>
                          						
		          </header><!-- .Header -->
</html>