<?php
session_start();
 if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
 {
	 header("Location: ../index.php?Message=lgoot");
  }
  $key = $_SESSION['key'];
  $pas = $_SESSION['pass'];
  
  
if(isset($_GET['po_id']) && isset($_GET['tableNAME']) && isset($_GET['topic']) && isset($_GET['sec']))
{
	$_SESSION['po_id'] = $_GET['po_id'];
	$_SESSION['tableNAME']= $_GET['tableNAME'];
	$_SESSION['topic']= $_GET['topic'];
	$_SESSION['sec']= $_GET['sec'];
	
}
$post_id = $_SESSION['po_id'];
$tableName = $_SESSION['tableNAME'];
$top_name = $_SESSION['topic'];
$sec = $_SESSION['sec'];


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
function dislayPost($post_id,$tableName,$top_name,$sec)
{
	 
	   if($tableName == "computerposts")
		{
			$commentTableName ="computercomments";
		}elseif($tableName == "scienceposts")
		{
			$commentTableName = "sciencecomments";
		}elseif($tableName == "islamicposts")
		{
			$commentTableName = "islamiccomments";
		}
		elseif($tableName == "artsposts")
		{
			$commentTableName = "artscomments";
		}elseif($tableName == "otherposts")
		{
			$commentTableName = "othercomments";
		}elseif($tableName == "generalposts")
		{
			$commentTableName = "generalcomments";
		}
		
	global $mycon;
	$getpost = "SELECT * FROM $tableName WHERE id = '".$post_id."' limit 1";
	$run_getpost= mysqli_query($mycon, $getpost);
	if($run_getpost)
	{
		$posts_array = mysqli_fetch_array($run_getpost, MYSQLI_ASSOC);
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
		  $rep = "Answer";
	  } else{
		  $rep = "Answers";
	  }
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
									
									               <form style='float: left ;' action='../computer.php?p_id=$post_id&u_id=$userR_id&i=j&comtabName=$commentTableName' method='POST'>
									                      <input id='comment' type='text' name='answer' placeholder='Write your answer here...' required='required'>
									                      
											              <input id='comment_submit' type='submit' name='answerq' value='Post Your Answer'>
									                       
									               </form>
										           <button id='replies_button'> $count"." $rep</button>
										
									</div>
                                </div><br/>";
		   
		
		
	}

	
}
//display the comments of a particulat post
function displayComments($post_id,$tableName){

	global $mycon;
	 if($tableName == "computerposts")
		{
			$commentTableName ="computercomments";
			$replyTableName = "computerreply";
		}elseif($tableName == "scienceposts")
		{
			$commentTableName = "sciencecomments";
			$replyTableName = "sciencereply";
		}elseif($tableName == "islamicposts")
		{
			$commentTableName = "islamiccomments";
			$replyTableName = "islamicreply";
		}
		elseif($tableName == "artsposts")
		{
			$commentTableName = "artscomments";
			$replyTableName = "artsreply";
		}elseif($tableName == "otherposts")
		{
			$commentTableName = "othercomments";
			$replyTableName = "otherreply";
		}elseif($tableName == "generalposts")
		{
			$commentTableName = "generalcomments";
			$replyTableName = "generalreply";
		}
	$getcomments = "SELECT * FROM $commentTableName Where post_id = '".$post_id."' order by 1 DESC";
	$run_getcomments= mysqli_query($mycon, $getcomments);
	if($run_getcomments)
	{
		if(mysqli_num_rows($run_getcomments)>0)
		{
		  while($comment_array = mysqli_fetch_array($run_getcomments, MYSQLI_ASSOC))
		   {
		$comment_id = $comment_array['comment_id'];
		
		$user_id = $comment_array['user_id'];
		$comment_content = $comment_array['comment_content'];
		$date = $comment_array['date'];
		$time = $comment_array['time'];
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
		 if($date ==date('Y-m-d'))
	{
		$date = "Today";
		
	}
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
		 
	//counting the number of replies to each answer
	$countReply = "SELECT * FROM $replyTableName WHERE comment_id = '".$comment_id."'";
	$run_countReply = mysqli_query($mycon, $countReply);
	if($run_countReply)
	{
	$count = mysqli_num_rows($run_countReply);
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
		$delete = "<a href='delete.php?comment_id=$comment_id&comment_table_name=$commentTableName&reply_table_name=$replyTableName'><button id='replies_button'>Delete</button></a>";
	} else
	{
		$delete = NULL;
	}
	echo "<br/><div id='post_display'>
								    <div id='post_heading_container'>
								            <img id='post_profile' $source> 
											  &nbsp;
											<a href='../profle/profile.php?userID=$user_id'  style='text-decoration: none;'>
							                        <text id='post_text'>
                                                             $fname"." "."$lname
                                                      </text>
							               </a>
										   <div id='date_and_time'>
										    <font id='__date_style'>Post Date:</font> <font id='__time_style'> $date</font>|
										   <font id='__date_style'>Post Time:</font> <font id='__time_style'>$time</font>
										   </div>
										   </div>
							     
								
								    <div id='content_of_posts'>
										             <div id='post_display_content'>
													 $comment_content
													 </div>
									 </div>
									 $delete
									 <a href='reply.php?c_id=$comment_id&cc_table=$commentTableName'><button id='replies_button'>Reply</button></a>
									<button id='replies_button'> $count"." $rep</button>
						</div>
							<br/>
							<hr id='sseperator'>
							";
		   }
		   }else 
		    {
			  echo'<center><br/><font style="color: white; font-size: 40px;">No Answer... .Be first to answer this question... .</font></center>';
	          }	
	    }



}
?>