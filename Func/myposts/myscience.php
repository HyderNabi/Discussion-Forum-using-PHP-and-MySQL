<?php 
include("../../inclFiles/connect.php");
include("mypostsfunc.php");
?>
<html>
<head>
  <Link  type = "text/css" href = "../../Styles/content.css"  rel = "stylesheet" />
  <Link  type = "text/css" href = "../../Styles/displayposts.css"  rel = "stylesheet" />
</head>
<body>
                      <?php
					   if(isset($_GET['del'])){
		                  if($_GET['del'] == "suc")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Deleted!!!
							   <a href='myscience.php'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['del'] == "fai")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Delete!!!.
							   <a href='myscience.php'>Refresh</a></font></center>
							 "; 
						   }
					  }
					  if(isset($_GET['pageno'])){
						  $pag_no = $_GET['pageno'];
					  }
					   if(isset($_GET['info'])){
		                   if($_GET['info'] == "succ")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Commented Successfully!!!.
							   <a href='myscience.php?pageno=$pag_no'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['info'] == "faii")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Comment!!!.
							   <a href='myscience.php?pageno=$pag_no'>Refresh</a></font></center>
							 "; 
						   }
					  }
					  ?>
					   <div id="Right_rightContent"><!-- Right_rightContent_Navigation pane-->
					   <!-- display posts from here-->
								<div id="postContainer">
								      <text style="Font-size: 20px; font-style: italic; color: #120073; margin:10px; ">My Science Posts</text>
								<?php dislayPosts($tableName="scienceposts",$Topictable="sciencetopic",$sec="Science") ?>
								</div>
								 
						</div>
				
</body>
</html>