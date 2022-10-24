<?php
 session_start();
 if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
 {
	 header("Location: ../index.php?Message=lgoot");
  }
  $key = $_SESSION['key'];
  $pas = $_SESSION['pass'];



function GetId()
{
	global $mycon;
	global $key;
	global $pas;
	$getName = "SELECT * FROM user WHERE cnumber = '".$key."' AND password = '".$pas."' limit 1 ";
	$run_getName = mysqli_query($mycon, $getName);
	if($run_getName)
	{
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$user_id = $name_array['user_id'];
		return $user_id;
		
	}
}



//module for display posts written by HYDER NABI 10 july 2019 06:20pm
function dislayPosts($tableName,$Topictable,$sec)
{
	   if($tableName == "computerposts")
		{
			$pageloc = "mycomputer.php";
			$commentTableName ="computercomments";
		}elseif($tableName == "scienceposts")
		{
			$pageloc = "myscience.php";
			$commentTableName = "sciencecomments";
		}elseif($tableName == "islamicposts")
		{
			$pageloc = "myislamic.php";
			$commentTableName = "islamiccomments";
		}
		elseif($tableName == "artsposts")
		{
			$pageloc = "myarts.php";
			$commentTableName = "artscomments";
		}elseif($tableName == "otherposts")
		{
			$pageloc = "myother.php";
			$commentTableName = "othercomments";
		}elseif($tableName == "generalposts")
		{
			$pageloc = "mygeneral.php";
			$commentTableName = "generalcomments";
		}
	global $mycon;
	//////////////////////////////////////////////////////////////////
	///////////////code between lines is for pagination///////////////
	//////////////////////////////////////////////////////////////////
	$offset = 0;
    $page_result = 8; 
    $page_value = 1;
	if(isset($_GET['pageno']))
    {
      $page_value = $_GET['pageno'];
        if($page_value > 1)
        {	
          $offset = ($page_value - 1) * $page_result;
        }
      }
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	$idden = GetId();
			$getposts = "SELECT * FROM $tableName WHERE user_id = '".$idden."' order by 1 DESC limit $offset, $page_result ";
		$run_getposts= mysqli_query($mycon, $getposts);
	if($run_getposts)
	{
		if(mysqli_num_rows($run_getposts)>0)
		{
		  while($posts_array = mysqli_fetch_array($run_getposts, MYSQLI_ASSOC))
		   {
		$post_id = $posts_array['id'];
		$user_id = $posts_array['user_id'];
		$topic_id = $posts_array['topic_id'];
		$title = $posts_array['title'];
		$content = $posts_array['content'];
		$date = $posts_array['date'];
		$time = $posts_array['time'];
		//getting user info 
		$getName = "SELECT * FROM user WHERE user_id = '".$user_id."' limit 1 ";
	      $run_getName = mysqli_query($mycon, $getName);
	     if($run_getName)
	      {
		$name_array = mysqli_fetch_array($run_getName, MYSQLI_ASSOC);
		$fname = $name_array['fname'];
		$lname = $name_array['lname'];
		$gender = $name_array['gender'];
		
					      
								
							
							
		
		
	     }
		 //end getting user info
		 ///getting media info/////////
		 
		 
		 //module for extracting the data from media table..
      
	$getmedia = "SELECT * FROM media WHERE user_id = '".$user_id."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		$source= 'src = "../profle/uploads/'.$profilepic.'"';
	}
		 //////////////////////
		 //getting topic info
		
	$getTopic = "SELECT * FROM $Topictable WHERE id = '".$topic_id."'";
	$run_getTopic = mysqli_query($mycon, $getTopic);
	if($run_getTopic)
	{
	$topic_name_array = mysqli_fetch_array($run_getTopic, MYSQLI_ASSOC);
		
		
		$top_name = $topic_name_array['topic_name'];
		
	}
	//checking date with current date
	if($date ==date('Y-m-d'))
	{
		$date = "Today";
		
	}
	$userR_id = GetId();
		//counting the number of answers to each question
		$countComment = "SELECT * FROM $commentTableName WHERE post_id = '".$post_id."'";
	$run_countComment = mysqli_query($mycon, $countComment);
	if($run_countComment)
	{
	$count = mysqli_num_rows($run_countComment);
	  if($count==1)
	  {
		  $rep = "Reply";
	  } else{
		  $rep = "Replies";
	  }
	}
	//module for checking wheather the post is posted by current user....if yes then set option for delete
	if($user_id == GetId())
	{
		$delete = "<a href='../components/delete.php?post_id=$post_id&postTableName=$tableName&pass'><button id='replies_button'>Delete</button></a>";
	} else
	{
		$delete = NULL;
	}
		
		echo "<div id='post_display'>
								   <div id='post_heading_container'>
								            <img id='post_profile' $source> 
											  &nbsp;
											<a href='../profle/profile.php?userID=$user_id' style='text-decoration: none;'>
							                        <text id='post_text'>
                                                             $fname"." "."$lname
                                                      </text>
							               </a>
										   <div id='date_and_time'>
										    <font id='__date_style'>Section:</font> <font id='__time_style'>$sec</font>|
										   <font id='__date_style'>Subject:</font> <font id='__time_style'>$top_name</font>|
										   <font id='__date_style'>Post Date:</font> <font id='__time_style'> $date</font>|
										   <font id='__date_style'>Post Time:</font> <font id='__time_style'>$time</font>
										   </div>
							       </div>
								   
								    <div id='content_of_posts'>
										             <div id='post_display_title'>
													   $title
													 </div>
													 <hr id='sseperator'>
													 <div id='post_display_content'>
													 $content
													 </div>
									 </div>
									 <div id='post_footer'>
									
									               <form style='float: left ; ' action='mycomputer.php?p_id=$post_id&u_id=$userR_id&comtabName=$commentTableName&pagno=$page_value' method='POST'>
									                      <input id='comment' type='text' name='answer' placeholder='Write your answer here...' required='required'>
									                      
											              <input id='comment_submit' type='submit' name='answerq' value='Post Your Answer'>
									                       
									               </form>
												   
										           <a href='../components/comments.php?po_id=$post_id&tableNAME=$tableName&sec=$sec&topic=$top_name'><button id='replies_button'> View All Answers OR Replies | $count"." $rep</button></a>
												   $delete
										
									</div>
                                </div> <br>";
								
		     }
			 /////////////////////////////////////////////////////
			 ////////////////////////////////////////////////////
			 /////////////////////////////////////////
			 echo "<div id ='pagination'><center>";
			 $postcounter = "SELECT * FROM $tableName";
			 $run_postcounter= mysqli_query($mycon, $postcounter);
			 $pagecount = mysqli_num_rows($run_postcounter);
			
			 $num = $pagecount / $page_result;
             settype($num, 'integer');
			 if($pagecount % $page_result != 0)
				{
					$num = $num+1;
	
				}

				$nextpage_value = $page_value+1;
				$prevpage_value = $page_value-1;

				if($page_value > 1)
				{
					echo "<a href = '$pageloc?pageno=1' style='text-decoration: none;'><font id='page'>First.</font></a>";
				}

				if($page_value>1)
				{
					echo "<a href = '$pageloc?pageno=$prevpage_value' style='text-decoration: none;'><font id='page'>Prev.</font></a>";
				}
				if($page_value <=3)
				{
					$first = 1;
				}else{
						$first = ($page_value-3);
					}
				for($i = $first; ($i <= ($page_value+3)&&($i <=$num)); $i++)
				{
					if($i == $page_value)
					{
						echo "<a href='$pageloc?pageno=$i' style='text-decoration: none;'><font id='pagecurrent'>$i</font></a>";
					}
					else{
						echo "<a href='$pageloc?pageno=$i' style='text-decoration: none;'><font id='page'>$i</font></a>";
					}
				}
				if($num!=1 && $page_value!=$num)
					{
						echo "<a href = '$pageloc?pageno=$nextpage_value' style='text-decoration: none;'><font id='page'>Next.</font></a>";
					}
					if($page_value!=$num)
					{
						echo "<a href = '$pageloc?pageno=$num' style='text-decoration: none;'><font id='page'>Last.</font></a>";
					}
					echo "</center></div>";
			 //////////////////////////////////////////////////
			 ////////////////////////////////////////////////
			 //////////////////////////////////////
		
		}
		  else 
		  {
			  echo'<center><br/><font style="color: white; font-size: 40px;">NO POSTS. SECLECT SECTION AND ASK SOME QUESTION.</font></center>';
	      }
	}

	
}
//module for inserting comments into database 
  //                               //////////////////.............................///////////...........//////////////////......................................................
  //this module is coded by HYDER NABI (11 july 2019     09:06am)
if(isset($_POST['answerq']))
{
	if(isset($_GET['p_id']) && isset($_GET['u_id']) && isset($_GET['comtabName']))		
	{ 
       if(isset($_GET['pagno']))
	   {
		   $pageno = $_GET['pagno'];
	   }
	
       $commentTable = $_GET['comtabName'];
		$post_id_for_comment = $_GET['p_id'];
		$user_id_for_comment = $_GET['u_id'];
	    $comment_content = mysqli_real_escape_string($mycon, $_POST['answer']);
	
		if($commentTable == "computercomments")
		{     
           
			$loc = "Location:mycomputer.php";
		  
		}elseif($commentTable == "sciencecomments")
		{	    
			$loc = "Location:myscience.php";
		   
			
		}elseif($commentTable == "islamiccomments")
		{ 	
			$loc="Location:myislamic.php";
		   
		}
		elseif($commentTable == "artscomments")
		{
			 
			$loc="Location:myarts.php";
		   
			
		}elseif($commentTable == "othercomments")
		{
			
			$loc="Location:myother.php";
		   
			
		}elseif($commentTable == "generalcomments")
		{
			
			$loc="Location:mygeneral.php";
		   
		}
    
               function insertComments($post_id_for_comment,$user_id_for_comment,$comment_content,$commentTable,$loc,$pageno)
	           {	
			    global $mycon;
				$insert_Comment = "INSERT INTO $commentTable (post_id,user_id,comment_content,date, time) VALUES ('".$post_id_for_comment."', '".$user_id_for_comment."','".$comment_content."', NOW(), NOW() )";
				$run_insert_comment = mysqli_query($mycon, $insert_Comment);
				          if($run_insert_comment == TRUE)
									   {
										 header($loc."?info=succ&pageno=$pageno");
									   }
									   else 
									   {
										  header($loc."?info=faii&pageno=$pageno");
									   }
				}
				insertComments($post_id_for_comment,$user_id_for_comment,$comment_content,$commentTable,$loc,$pageno);
	}
}
?>
	