<?php 
include("../inclFiles/connect.php");
include("contentfunc.php");
?>
<html>
<head>
<Link  type = "text/css" href = "../Styles/content.css"  rel = "stylesheet" />
<Link  type = "text/css" href = "../Styles/displayposts.css"  rel = "stylesheet" />
</head>
<body>
 <?php
 
              if(isset($_GET['del'])){
		                  if($_GET['del'] == "suc")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Deleted!!!
							   <a href='general.php'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['del'] == "fai")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Delete!!!.
							   <a href='general.php'>Refresh</a></font></center>
							 "; 
						   }
					  }
               if(isset($_GET['pageno'])){
						  $pag_no = $_GET['pageno'];
					  }
					   if(isset($_GET['info'])){
		                   if($_GET['info'] == "suc")
		                   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Your question was posted on timeline successfully!!!.
							   <a href='general.php'>Refresh</a></font></center>
							 ";
						   } elseif($_GET['info'] == "fai")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to post on timeline..Try Again!!!.
							   <a href='general.php'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['info'] == "succ")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Commented Successfully!!!.
							   <a href='general.php?pageno=$pag_no'>Refresh</a></font></center>
							 "; 
						   }elseif($_GET['info'] == "faii")
						   {
							   echo "<center><font style = 'color: Black; font-size: 20px;'>Failed to Comment!!!.
							   <a href='general.php?pageno=$pag_no'>Refresh</a></font></center>
							 "; 
						   }
					  }
					  ?>
        
					   <div id="Right_rightContent5"><!-- Right_rightContent_Navigation pane-->
					   
					   
							    <form action="computer.php?table_name=generalposts" method="POST">
								 <?php
					   if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "ged")
		                   {
							   echo "<font style = ' margin-left: 20px;color: red;'>Choose subject please.</font><br/>";
							
						   } 
					  }
					  ?>
									<select  id = "fname"  name = "topic" required = "required">				                        
										    <option value = "disabledField" >Choose Subject here.</option>
					                       <?php getTopics($tab_name="generaltopic") ?>
					            </select>					 
								 <input id = "post_input" type = "text" name = "title" required = "required" Placeholder = "Enter title of your Question here."/>
								 <font id = "tit">'General Section'</font>
								 <br/>
								 <textarea id = "post_content" type = "text" name = "content" Placeholder="Enter Content of your Question Here." required="required"></textarea>
									<br/>
                                   <center>
								   <input id="post_submit" type="submit" name="postq" value="Post your Question!!.">
									</center>								   
								</form>
														
								<hr id="seperator"> 
								
								
								<!-- display posts from here-->
								<div id="postContainer">
								      <text style="Font-size: 20px; font-style: italic; color: #120073; margin:10px; ">Recent Discussion...!</text>
								<?php dislayPosts($tableName="generalposts",$Topictable="generaltopic",$sec="General") ?>
								</div>
								
						</div>
				
</body>
</html>