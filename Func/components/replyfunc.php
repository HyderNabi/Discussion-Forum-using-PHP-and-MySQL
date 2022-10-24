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


  
if(isset($_GET['c_id']) && isset($_GET['cc_table']))
{
	$_SESSION['c_id'] = $_GET['c_id'];
	$_SESSION['cc_table']= $_GET['cc_table'];
	
	
}
$comment_id = $_SESSION['c_id'];
$OneCommentTableName = $_SESSION['cc_table'];

//display the comments of a particulat post

function displaycomment($comment_id,$OneCommentTableName){

	global $mycon;
	 if($OneCommentTableName == "computercomments")
		{
			$replyTableName ="computerreply";
		}elseif($OneCommentTableName == "sciencecomments")
		{
			$replyTableName = "sciencereply";
		}elseif($OneCommentTableName == "islamiccomments")
		{
			$replyTableName = "islamicreply";
		}
		elseif($OneCommentTableName == "artscomments")
		{
			$replyTableName = "artsreply";
		}elseif($OneCommentTableName == "othercomments")
		{
			$replyTableName = "otherreply";
		}elseif($OneCommentTableName == "generalcomments")
		{
			$replyTableName = "generalreply";
		}
	$getcomment = "SELECT * FROM $OneCommentTableName  Where comment_id = '".$comment_id."' limit 1";
	$run_getcomment= mysqli_query($mycon, $getcomment);
	if($run_getcomment)
	{
	    $comment_array = mysqli_fetch_array($run_getcomment, MYSQLI_ASSOC);
		
	    $comment_id = $comment_array['comment_id'];
		$post_id = $comment_array['post_id'];
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
										    <font id='__date_style'>Post Date:</font> <font id='__time_style'> $date</font>|
										   <font id='__date_style'>Post Time:</font> <font id='__time_style'>$time</font>
										   </div>
					 </div>
							     
								
						<div id='content_of_posts'>
										             <div id='post_display_content'>
													 $comment_content
													 
													 </div>
						</div>	
						
						<div id='post_footer'>
						                          <form style='float: left ; ' action='reply.php?cmt_id=$comment_id&pst_id=$post_id&reply_tab=$replyTableName' method='POST'>
									                      <input id='comment' type='text' name='reply' placeholder='Write your answer here...' required='required'>
									                      
											              <input id='comment_submit' type='submit' name='replyq' value='Post Your Answer'>
									                       
									               </form>
												<button id='replies_button'>$count"." $rep </button>
		               </div>
					   </div>
		<br/>
						
							";
          	}	
}



//module for inserting replies of answers into database
if(isset($_POST['replyq']))
{
	if(isset($_GET['cmt_id']) && isset($_GET['pst_id']) && isset($_GET['reply_tab']))		
	{ 
       
	
       $replyTable = $_GET['reply_tab'];
		$comment_id_for_reply = $_GET['cmt_id'];
		$user_id_for_reply = GetId();
		$post_id_for_reply = $_GET['pst_id'];
	    $reply_content = mysqli_real_escape_string($mycon, $_POST['reply']);
	
		    
     function insertreply($comment_id_for_reply,$post_id_for_reply,$user_id_for_reply,$reply_content,$replyTable)
	           {	
			    global $mycon;
				$insert_reply = "INSERT INTO $replyTable (comment_id,post_id,user_id,reply_content,date, time) VALUES ('".$comment_id_for_reply."', '".$post_id_for_reply."','".$user_id_for_reply."','".$reply_content."', NOW(), NOW() )";
				$run_insert_reply = mysqli_query($mycon, $insert_reply);
				          if($run_insert_reply == TRUE)
									   {
										 header("Location:reply.php?info=succ");
									   }
									   else 
									   {
										   header("Location:reply.php?info=faii");
									   }
				}
				insertreply($comment_id_for_reply,$post_id_for_reply,$user_id_for_reply,$reply_content,$replyTable);
	}
}
//displayng the replies of an answer
function displayreplies($comment_id,$OneCommentTableName){

global $mycon;
	 if($OneCommentTableName == "computercomments")
		{
			$replyTableName ="computerreply";
		}elseif($OneCommentTableName == "sciencecomments")
		{
			$replyTableName = "sciencereply";
		}elseif($OneCommentTableName == "islamiccomments")
		{
			$replyTableName = "islamicreply";
		}
		elseif($OneCommentTableName == "artscomments")
		{
			$replyTableName = "artsreply";
		}elseif($OneCommentTableName == "othercomments")
		{
			$replyTableName = "otherreply";
		}elseif($OneCommentTableName == "generalcomments")
		{
			$replyTableName = "generalreply";
		}
	$getreplies = "SELECT * FROM $replyTableName Where comment_id = '".$comment_id."' order by 1 DESC";
	$run_getreplies= mysqli_query($mycon, $getreplies);
	if($run_getreplies)
	{
		if(mysqli_num_rows($run_getreplies)>0)
		{
		  while($reply_array = mysqli_fetch_array($run_getreplies, MYSQLI_ASSOC))
		   {
	      $reply_id = $reply_array['reply_id'];
		 $user_idd = $reply_array['user_id'];
		$reply_content = $reply_array['reply_content'];
		$date = $reply_array['date'];
		$time = $reply_array['time'];
		//getting user info 
		$getName = "SELECT * FROM user WHERE user_id = '".$user_idd."' limit 1 ";
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
      
	$getmedia = "SELECT * FROM media WHERE user_id = '".$user_idd."' limit 1";
	$run_getmedia = mysqli_query($mycon, $getmedia);
	if($run_getmedia)
	{
		$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		$profilepic = $media_array['profilepic'];
		$source= 'src = "../profle/uploads/'.$profilepic.'"';
	}
		 //////////////////////
	//module for checking wheather the post is posted by current user....if yes then set option for delete
	if($user_idd == GetId())
	{
		$delete = "<a href='delete.php?rep_id=$reply_id&repTabName=$replyTableName'><button id='replies_button'>Delete</button></a>";
	} else
	{
		$delete = NULL;
	}
	echo "<br/>
	     <div id='post_display'>
				       <div id='post_heading_container'>
								            <img id='post_profile' $source> 
											  &nbsp;
											<a href='../profle/profile.php?userID=$user_idd' style='text-decoration: none;'>
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
													 $reply_content
													 </div>
									 </div>
									 $delete
									
			</div>
							<br/>
							<hr id='sseperator'>
							";
		   }
		   }else 
		    {
			  echo'<center><br/><font style="color: white; font-size: 40px;">No reply... .Be first to reply this question... .</font></center>';
	          }	
	    }



}
?>