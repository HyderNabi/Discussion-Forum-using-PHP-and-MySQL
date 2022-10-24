<?php
include("../../inclFiles/connect.php");
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
//module for deleting replies in corrosponding table.///
if(isset($_GET['rep_id']) && isset($_GET['repTabName'])){
$tableName = $_GET['repTabName'];
$reply_id = $_GET['rep_id'];


function deletereply($tableName,$reply_id)
{
	global $mycon;
	$delete = "DELETE FROM $tableName WHERE reply_id = '".$reply_id."'";
	$run_delete = mysqli_query($mycon,$delete);
	if($run_delete)
	{
	 header("Location:reply.php?del=suc");	
	} else {
	 header("Location:reply.php?del=fai");	
	}
}
 deletereply($tableName,$reply_id);

}

//module for deleting the comments 
if(isset($_GET['comment_id']) && isset($_GET['comment_table_name']) && isset($_GET['reply_table_name'])){
$comment_id = $_GET['comment_id'];
$commentTableName = $_GET['comment_table_name'];
$replyTableName = $_GET['reply_table_name'];

function deletecomment($comment_id,$commentTableName,$replyTableName)
{
	global $mycon;
	$delete = "DELETE FROM $commentTableName WHERE comment_id = '".$comment_id."'";
	$run_delete = mysqli_query($mycon,$delete);
	if($run_delete)
	{
		   $deleter = "DELETE FROM $replyTableName WHERE comment_id = '".$comment_id."'";
	      $run_deleter = mysqli_query($mycon,$deleter);
	       if($run_deleter)
		   {
			   header("Location:comments.php?del=suc");
		   }
		   else{
			  header("Location:comments.php?del=fai");	
		   }
	
	 	
	} else {
		
	 header("Location:comments.php?del=fai");	
	}
}
 deletecomment($comment_id,$commentTableName,$replyTableName);


}
//module for deleting the posts from database tables........
if(isset($_GET['post_id']) && isset($_GET['postTableName'])){
$post_id = $_GET['post_id'];
$postTableName = $_GET['postTableName'];


function deletecomment($post_id,$postTableName)
{
	global $mycon;
	
	
	if($postTableName == "computerposts")
		{
			$commentTableName ="computercomments";
			$replyTableName = "computerreply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/mycomputer.php";
			}else{
			$loc="Location:../computer.php";
			}
		}elseif($postTableName == "scienceposts")
		{
			$commentTableName = "sciencecomments";
			$replyTableName = "sciencereply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/myscience.php";
			}else{
			$loc="Location:../science.php";
			}
		}elseif($postTableName == "islamicposts")
		{
			$commentTableName = "islamiccomments";
			$replyTableName = "islamicreply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/myislamic.php";
			}else{
			$loc="Location:../islamic.php";
			}
		}
		elseif($postTableName == "artsposts")
		{
			$commentTableName = "artscomments";
			$replyTableName = "artsreply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/myarts.php";
			}else{
			$loc="Location:../arts.php";
			}
		}elseif($postTableName == "otherposts")
		{
			
			$commentTableName = "othercomments";
			$replyTableName = "otherreply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/myother.php";
			}else{
			$loc="Location:../other.php";
			}
		}elseif($postTableName == "generalposts")
		{
			$commentTableName = "generalcomments";
			$replyTableName = "generalreply";
			if(isset($_GET['pass']))
			{
				$loc="Location:../myposts/mygeneral.php";
			}else{
			$loc="Location:../general.php";
			}
		}
	
	
	
	
	$deletep = "DELETE FROM $postTableName WHERE id = '".$post_id."'";
	$run_deletep = mysqli_query($mycon,$deletep);
	if($run_deletep)
	{
		
		     $deletec = "DELETE FROM $commentTableName WHERE post_id = '".$post_id."'";
	          $run_deletec = mysqli_query($mycon,$deletec);
	         if($run_deletec)
		     {
			      $deleter = "DELETE FROM $replyTableName WHERE post_id = '".$post_id."'";
	               $run_deleter = mysqli_query($mycon,$deleter);
	                 if($run_deleter)
						{
						header($loc."?del=suc");
						}
						else{
							header($loc."?del=fai");	
						}
		     }
		     else{
			  
			  header($loc."?del=fai");
		    }
	
	 	
	} else {
      header($loc."?del=fai");
	}
}
 deletecomment($post_id,$postTableName);


}
?>