<?php
 session_start();
 if(!(isset($_SESSION['key']) AND isset($_SESSION['pass'])))
 {
	 header("Location: ../index.php?Message=lgoot");
  }
  $key = $_SESSION['key'];
  $pas = $_SESSION['pass'];


function getTopics($get_tab_name){
	
	global $mycon;
	$getTopic = "SELECT * FROM $get_tab_name";
	$run_getTopic = mysqli_query($mycon, $getTopic);
	if($run_getTopic)
	{
		while($topic_name_array = mysqli_fetch_array($run_getTopic, MYSQLI_ASSOC))
		{
		$topic_id = $topic_name_array['id'];
		$top_name = $topic_name_array['topic_name'];
	
		echo "<option value='$topic_id'>$top_name</option>";
		}
		
	}
}
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
//This snipt of code is witten by HYDER NABI
//...........................sniptt of code for insert posts............................
if(isset($_POST['postq'])){
	if(isset($_GET['table_name']))
	{
		$get_table_name = $_GET['table_name'];
	}
	if($get_table_name == "computerposts")
	{
		$loc = "Location:computer.php";
	}elseif($get_table_name == "scienceposts")
	{
		$loc = "Location:science.php";
	}elseif($get_table_name == "islamicposts")
	{
		$loc="Location:islamic.php";
	}
	elseif($get_table_name == "artsposts")
	{
		$loc="Location:arts.php";
	}elseif($get_table_name == "otherposts")
	{
		$loc="Location:other.php";
	}elseif($get_table_name == "generalposts")
	{
		$loc="Location:general.php";
	}
	
	
$user_id= GetId();
$topic_id=$_POST['topic'];
  if($topic_id == "disabledField")
  {
	  header($loc."?Message=ged");
  }else{
$title = mysqli_real_escape_string($mycon, $_POST['title']);
$content = mysqli_real_escape_string($mycon, $_POST['content']);

	echo $topic_id;
//module for inset posts into tables.............
function insertPosts($user_id,$topic_id,$title,$content,$get_table_name,$loc){
	
	global $mycon;
	$insert_post = "INSERT INTO $get_table_name (user_id, topic_id, title, content, date, time) VALUES ('".$user_id."', '".$topic_id."', '".$title."', '".$content."', NOW(), NOW() )";
	$run_insert_post = mysqli_query($mycon, $insert_post);
									   if($run_insert_post == TRUE)
									   { 
								   
								           header($loc."?info=suc");
										          
										   
									   }
									   else 
									   {
										    header($loc."?info=fai");
										        
									   }
}
insertPosts($user_id,$topic_id,$title,$content,$get_table_name,$loc);
  }
}
//...........................sniptt of code for insert posts  (Ends here)............................


//module for display posts written by HYDER NABI 10 july 2019 06:20pm
function dislayPosts($tableName,$Topictable,$sec)
{
	   if($tableName == "computerposts")
		{
			$pageloc = "computer.php";
			$commentTableName ="computercomments";
			$upvoteTableName = "computerupvote";
		}elseif($tableName == "scienceposts")
		{
			$pageloc = "science.php";
			$commentTableName = "sciencecomments";
			$upvoteTableName = "scienceupvote";
		}elseif($tableName == "islamicposts")
		{
			$pageloc = "islamic.php";
			$commentTableName = "islamiccomments";
			$upvoteTableName = "islamicupvote";
		}
		elseif($tableName == "artsposts")
		{
			$pageloc = "arts.php";
			$commentTableName = "artscomments";
			$upvoteTableName = "artsupvote";
		}elseif($tableName == "otherposts")
		{
			$pageloc = "other.php";
			$commentTableName = "othercomments";
			$upvoteTableName = "otherupvote";
		}elseif($tableName == "generalposts")
		{
			$pageloc = "general.php";
			$commentTableName = "generalcomments";
			$upvoteTableName = "generalupvote";
		}
	global $mycon;
	//////////////////////////////////////////////////////////////////
	///////////////code between lines is for pagination///////////////
	//////////////////////////////////////////////////////////////////
	$offset = 0;
    $page_result = 8; 
    $page_value = 1;
	if(isset($_GET['pagen']))
	{
		$page_value = $_GET['pageno'];
        if($page_value > 1)
        {	
          $offset = ($page_value - 1) * $page_result;
        }
	}
	///////////
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
	if(isset($_GET['mypost_id']))
	{
		
			$idden = GetId();
			$getposts = "SELECT * FROM $tableName WHERE user_id = '".$idden."' order by 1 DESC limit $offset, $page_result ";
		
	} else{
	   $getposts = "SELECT * FROM $tableName order by 1 DESC limit $offset, $page_result ";
	}
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
		$source= 'src = "profle/uploads/'.$profilepic.'"';
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
		$delete = "<a href='components/delete.php?post_id=$post_id&postTableName=$tableName'><button id='replies_button'>Delete</button></a>";
	} else
	{
		$delete = NULL;
	}
	/*checking wheather the user has upvoted the post or not .............{starts here}*/
	$user_upvote_id = GetId();
	 $Check_vote = "SELECT * FROM $upvoteTableName WHERE post_id = '".$post_id."' AND user_id = '".$user_upvote_id."'";
	 $run_Check_vote = mysqli_query($mycon, $Check_vote);
	if($run_Check_vote)
	{
		$count_vote_user = mysqli_num_rows($run_Check_vote);
		//count the number of likes for every post
		$count_vote = "SELECT upvote FROM $tableName WHERE id='".$post_id."'";
	   $run_count_vote = mysqli_query($mycon, $count_vote);
	     if($run_count_vote)
	      {
		  $vote_count = mysqli_fetch_array($run_count_vote, MYSQLI_ASSOC);
		  $votes = $vote_count['upvote'];
		  }
		////////
	  if($count_vote_user==1)
	  {
		  
		  $but = "<a id='upndownvote' href='computer.php?uv=3040&post_upvote=$post_id&tableName=$tableName&upvoteTableName=$upvoteTableName&loc=$pageloc&pagno=$page_value'><img id='im' height='30' width='30' src='../Graphics/downvote.png' /><span id = 'vote'>$votes</span></a>";
	  }
	  else{
	     $but = "<a id='upndownvote' href='computer.php?uv=1724&post_upvote=$post_id&tableName=$tableName&upvoteTableName=$upvoteTableName&loc=$pageloc&pagno=$page_value'><img id='im' height='30' width='30' src='../Graphics/upvote.png' /><span id = 'vote'>$votes</span></a>";
	  }
		
	}
	 
	
	
	/*	{upvoting ends here} */
	
		
			
		
		echo "<div id='post_display'>
								   <div id='post_heading_container'>
								            <img id='post_profile' $source> 
											  &nbsp;
											<a href='profle/profile.php?userID=$user_id' style='text-decoration: none;'>
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
													 $content<br/>
													
													 </div>
									 </div>
									 <div id='post_footer'>
									
									               <form style='float: left ; ' action='computer.php?p_id=$post_id&u_id=$userR_id&comtabName=$commentTableName&pagno=$page_value' method='POST'>
									                      <input id='comment' type='text' name='answer' placeholder='Write your answer here...' required='required'>
									                      
											              <input id='comment_submit' type='submit' name='answerq' value='Post Your Answer'>
									                       
									               </form>
												   
												   $but		   
												   
												   
												   
										           <a href='components/comments.php?po_id=$post_id&tableNAME=$tableName&sec=$sec&topic=$top_name'><button id='replies_button'> View All Answers OR Replies | $count"." $rep</button></a>
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
					echo"
					<center>
					 <div id>
					 <form action='$pageloc' method='GET'>
					 <label style='color: white;'>Total Number Of Pages = $num</label><br/>
					 <input id = 'inp' type='number' name='pageno' max='$num' required='required' placeholder='Enter page no. from 1 to $num .' />
					 <input id = 'inpsub' type='submit' name='pagen' value = 'Go'/>
					 </form>
					
					</div>
					</center>";
			 //////////////////////////////////////////////////
			 ////////////////////////////////////////////////
			 //////////////////////////////////////
		
		}
		  else 
		  {
			  echo'<center><br/><font style="color: white; font-size: 40px;">There is no any THREAD in this section yet... .Try adding some THREADS above... .</font></center>';
	      }
	}

	
}
//module for inserting comments into database starts here
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
           	if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{
			
			$loc = "Location:computer.php";
		   }
		}elseif($commentTable == "sciencecomments")
		{ 
		 
		  if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{	    
			$loc = "Location:science.php";
		   }
			
		}elseif($commentTable == "islamiccomments")
		{ 
        	if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{	
			$loc="Location:islamic.php";
		   }
		}
		elseif($commentTable == "artscomments")
		{
			  if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{
			$loc="Location:arts.php";
		   }
			
		}elseif($commentTable == "othercomments")
		{
			if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{
			$loc="Location:other.php";
		   }
			
		}elseif($commentTable == "generalcomments")
		{
			if(isset($_GET['i']))
		   {
			$loc="Location:components/comments.php";
		   }else{
			$loc="Location:general.php";
		   }
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
//module for upvoting......... {starts here}.....................written by hyder nabi ..........12 sept 2019
if(isset($_GET['uv']) && isset($_GET['post_upvote']) && isset($_GET['tableName']) && isset($_GET['upvoteTableName']))
{	
/*increment the votes */
   if($_GET['uv'] == "1724")
   {
	   $post_upvote_id = $_GET['post_upvote'];
	   $tabName = $_GET['tableName'];
	   $upvoteTabname = $_GET['upvoteTableName'];
	   $locc = $_GET['loc'];
	    $pageno = $_GET['pagno'];
	   echo "$locc";
	   $get_vote = "SELECT upvote FROM $tabName WHERE id='".$post_upvote_id."'";
	   $run_get_vote = mysqli_query($mycon, $get_vote);
	     if($run_get_vote)
	      {
		  $vote_array = mysqli_fetch_array($run_get_vote, MYSQLI_ASSOC);
		  $vote = $vote_array['upvote'];
		  }
		  
	   $vote++;
	   $update = "UPDATE $tabName SET upvote = '".$vote."' where id = '".$post_upvote_id."'";
	   $run_upvote = mysqli_query($mycon, $update);
	   if($run_upvote)
	      {
			  $us_id = GetId();
			  $upvote_user_insert = "INSERT INTO $upvoteTabname (post_id, user_id, date, time) VALUES ('".$post_upvote_id."', '".$us_id."' , NOW(), NOW())";
	          $run_upvote_user_insert = mysqli_query($mycon, $upvote_user_insert);
	            if($run_upvote_user_insert)
				{
			 
				 header("Location:".$locc."?pageno=$pageno");
		        }
		  }
   }
   /*decrement the votes */
   else if($_GET['uv'] == "3040")
   {
	   $post_upvote_id = $_GET['post_upvote'];
	    $tabName = $_GET['tableName'];
	   $upvoteTabname = $_GET['upvoteTableName'];
	   $locc = $_GET['loc'];
	    $pageno = $_GET['pagno'];
	   $get_vote = "SELECT upvote FROM $tabName WHERE id='".$post_upvote_id."'";
	   $run_get_vote = mysqli_query($mycon, $get_vote);
	     if($run_get_vote)
	      {
		  $vote_array = mysqli_fetch_array($run_get_vote, MYSQLI_ASSOC);
		  $vote = $vote_array['upvote'];
		  }
		  
	   $vote--;
	   $update = "UPDATE $tabName SET upvote = '".$vote."' where id = '".$post_upvote_id."'";
	   $run_upvote = mysqli_query($mycon, $update);
	   if($run_upvote)
	      {
			  $us_id = GetId();
			  $upvote_user_delete = "DELETE FROM $upvoteTabname WHERE post_id = '".$post_upvote_id."' AND user_id = '".$us_id."'";
	          $run_upvote_user_delete = mysqli_query($mycon, $upvote_user_delete);
	            if($run_upvote_user_delete)
				{
			         header("Location:".$locc."?pageno=$pageno");
			       
		        }
		  }
   }
  
}
?>
	