<?php 
include("../../inclFiles/connect.php");
include("replyfunc.php");
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
							   <a href='reply.php'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['del'] == "fai")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Delete!!!.
							   <a href='reply.php'>Refresh</a></font></center>
							 "; 
						   }
					  }
					   if(isset($_GET['info'])){
		                  if($_GET['info'] == "succ")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Replied!!!
							   <a href='reply.php'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['info'] == "faii")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Comment!!!.
							   <a href='reply.php'>Refresh</a></font></center>
							 "; 
						   }
					  }
					  ?>
					   <div id="Right_rightContent"><!-- Right_rightContent_Navigation pane-->
					   
					   <?php  displaycomment($comment_id,$OneCommentTableName); ?>
					        
							    <center><a href='reply.php'><font style = 'color: #ffffff; font-size: 20px;'>Refresh</font></a></center>
								<hr id="seperator"> 
								
								<!-- display posts from here-->
								<div id="postContainer">
								      <text style="Font-size: 20px; font-style: italic; color: #120073; margin:10px; ">Replies to this Answer...!</text>
								    <?php displayreplies($comment_id,$OneCommentTableName);?>
								</div>
								
								
								
								
								 
						</div>
				
</body>
</html>