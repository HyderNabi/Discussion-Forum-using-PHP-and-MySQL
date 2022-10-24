<?php
function display_users(){
	global $mycon;
  ////?///////////////////pagination....
$offset = 0;
$page_result = 5; 
$page_value = 1;
///
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
/////////////////////////////////////////////////pagination....
	$user = "SELECT * FROM user order by 1 DESC limit $offset, $page_result";
	$run_user = mysqli_query($mycon, $user);
		if($run_user)
		{
			while($user_array = mysqli_fetch_array($run_user, MYSQLI_ASSOC))
			{
				$user_id = $user_array['user_id'];
				$fname = $user_array['fname'];
				$lname = $user_array['lname'];
				$email = $user_array['email'];
				$gender = $user_array['gender'];
				$field = $user_array['field'];
				$logind = $user_array['login_date'];
				$logint = $user_array['login_time'];
				//meida
				$getmedia = "SELECT * FROM media WHERE user_id = '".$user_id."' limit 1";
	           $run_getmedia = mysqli_query($mycon, $getmedia);
	             if($run_getmedia)
	              {
	                  	$media_array = mysqli_fetch_array($run_getmedia, MYSQLI_ASSOC);
		                $profilepic = $media_array['profilepic'];
						$source= 'src = "uploads/'.$profilepic.'"';
				  }
				  ////media ends here 
				  //////count the number of posts in every table of a user//////
				     
		               $post_count = "SELECT * FROM computerposts WHERE user_id = '".$user_id."'";
		               $run_post_count = mysqli_query($mycon, $post_count);
		              if($run_post_count)
		               {                  
				             $count1 = mysqli_num_rows($run_post_count);
				            $post2_count = "SELECT * FROM scienceposts WHERE user_id = '".$user_id."'";
		                      $run_post2_count = mysqli_query($mycon, $post2_count);
		                    if($run_post2_count)
							{
								$count2 =mysqli_num_rows($run_post2_count);
								 $post3_count = "SELECT * FROM islamicposts WHERE user_id = '".$user_id."'";
		                         $run_post3_count = mysqli_query($mycon, $post3_count);
		                        if($run_post3_count)
								{
									$count3 = mysqli_num_rows($run_post3_count);
									          $post4_count = "SELECT * FROM artsposts WHERE user_id = '".$user_id."'";
		                                     $run_post4_count = mysqli_query($mycon, $post4_count);
		                                      if($run_post4_count)
								              {
												  $count4 = mysqli_num_rows($run_post4_count);
												      $post5_count = "SELECT * FROM generalposts WHERE user_id = '".$user_id."'";
		                                              $run_post5_count = mysqli_query($mycon, $post5_count);
		                                                 if($run_post5_count)
								                        {
												             $count5 = mysqli_num_rows($run_post5_count);
															 $post6_count = "SELECT * FROM otherposts WHERE user_id = '".$user_id."'";
		                                                      $run_post6_count = mysqli_query($mycon, $post6_count);
		                                                            if($run_post6_count)
								                                  {
																	  $count6 = mysqli_num_rows($run_post6_count);
																	  $count = $count1+$count2+$count3+$count4+$count5+$count6;
																  }
											        }
											  }
											  
									
									
									
								}
							}
		                 	
							
			                 
		                 }
                   
				  //////////////////////////////

	            
				 echo "
                 <div id='card'>
                    <img id='secondaryprofile' $source alt='Profile'/>&nbsp; 
	                <a href='profile.php?userID=$user_id' style='text-decoration: none;'><text id='textsecond'>$fname"." "."$lname</text><a/>&nbsp; &nbsp;|
	                <text id='txt'>$email</text>&nbsp;|
	                <text id='txt'>Gender($gender)</text>&nbsp;|
	                <text id='txt'>Area of intrest($field)</text>&nbsp;|
	                <text id='txt'>Total_posts(<font style = 'color: red;'>$count</font>)</text>&nbsp;|
	                <text id='txt'>Last Login($logind | $logint)</text>
                  </div>";
				
				  
				  
				  
				  
			}
			
		}
		///////////////////////////pagination again
			echo "<div id ='pagination'><center>";
			 $postcounter = "SELECT * FROM user";
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
					echo "<a href = 'members.php?pageno=1' style='text-decoration: none;'><font id='page'>First.</font></a>";
				}

				if($page_value>1)
				{
					echo "<a href = 'members.php?pageno=$prevpage_value' style='text-decoration: none;'><font id='page'>Prev.</font></a>";
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
						echo "<a href='members.php?pageno=$i' style='text-decoration: none;'><font id='pagecurrent'>$i</font></a>";
					}
					else{
						echo "<a href='members.php?pageno=$i' style='text-decoration: none;'><font id='page'>$i</font></a>";
					}
				}
				if($num!=1 && $page_value!=$num)
					{
						echo "<a href = 'members.php?pageno=$nextpage_value' style='text-decoration: none;'><font id='page'>Next.</font></a>";
					}
					if($page_value!=$num)
					{
						echo "<a href = 'members.php?pageno=$num' style='text-decoration: none;'><font id='page'>Last.</font></a>";
					}
					echo "</center></div>";
					echo"
					<center>
					 <div id>
					 <form action='members.php' method='GET'>
					 <label style='color: #000000;'>Total Number Of Pages = $num</label><br/>
					 <input id = 'inp' type='number' name='pageno' max='$num' required='required' placeholder='Enter page no. from 1 to $num .' />
					 <input id = 'inpsub' type='submit' name='pagen' value = 'Go'/>
					 </form>
					
					</div>
					</center>";
			//////////////////////////pagination ends here
	
 
}




?>