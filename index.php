<?php
session_start();
if(isset($_SESSION['key']) && isset($_SESSION['pass']))
{
	header("Location: Func/prehome.php");
}
?>
<!Doctype Html>
<HTML>

   <HEAD>
     <Title>
	   Log in or Sign up to MyForum
	 </Title>
     <Link  type = "text/css" href = "Styles/indexStyles.css"  rel = "stylesheet" />
   </HEAD>
   
   <BODY>
    <?php 
	 if(isset($_GET['Message'])){
		 if($_GET['Message'] == "fld")
		 {
			echo "Oops Connection Failed. Something went wrong!!!!!!
			<a href = 'index.php'><button>Refresh</button></a>
			";
		 } else  if($_GET['Message'] == "incomp")
		 {
			echo " please fill up all fields and try again!!!!!!
			<a href = 'index.php'><button>Refresh</button></a>
			";
		 } else  if($_GET['Message'] == "dnt")
		 {
			echo " Oh.....Something Went Wrong ....OR Connection Is Down....Try Refresh!!!!!!
			<a href = 'index.php'><button>Refresh</button></a>
			";
		 }
		 
	 }
	 
	 ?>
     <div id = "wrapper"><!--Wrapper starts here -->
	 
	    <header id = "header"><!--header starts here -->
		 
		    <a href = "index.php"> <img id = "logo" src = "Graphics/logo.png" alt = "LOGO" />  </a>
			  
		   <form id = "LogIn" action = "Action/loginAction.php" method = "POST">
		     <label id = "label" >Log In:</label>
		   		<?php 
	            if(isset($_GET['Message'])){
		            if($_GET['Message'] == "nt")
		              {
			             echo "<font id = 'haid'>This number is not Regestered...!!!</font>
			            <br/> ";
		               }  else if($_GET['Message'] == "inc")
		              {
			             echo "<font id = 'haid'>Something Happen Wrong. Give it Another go!!!</font>
			            <br/> ";
		               }  else if($_GET['Message'] == "inpas")
		              {
			             echo "<font id = 'haid'>Incorrect Password. Give it another go.!!!</font>
			            <br/> ";
		               }   else if($_GET['Message'] == "lgot")
		              {
			             echo "<font id = 'haid'>Log out successfully.!!!</font>
			            <br/> ";
		               }   else if($_GET['Message'] == "lgoot")
		              {
			             echo "<font id = 'haid'>You are loged out. To continue please log in.!!!</font>
			            <br/> ";
		               } 
				}
				?>
	            <input id = "login_input" type = "number" name = "contactNumber" required = "required" Placeholder = "Enter Your Contact Number?" maxlength = "10" />	
                <input id = "login_input" type = "password" name = "Password" required = "required" Placeholder = "Enter Your Password?" />	
                <input id = "login_submit" type  = "submit" name = "login" value = "Log in" />
                <a href="#"><label>Forgot password?</label>	</a>			
		   </form>
		</header><!--header ends here-->
		<div id = "content"><!--content starts here-->
		     <div id = "left">
	             	<img id = "back" src = "Graphics/contentLogo.jpg" alt = "Background image" />
			 </div>
		  	 <div id = "right">
			<font style=" margin-left: 230px; font-size: 30px;"> Sign Up.</font>
	             <form  id = "signup" action = "Action/actionSignup.php" method = "POST">
				    <font id = "req">*</font>
				    <input id = "fname" type = "text" name = "fname" required = "required" placeholder = "First Name." />		
                    <font id = "req">*</font>					
                    <input  id = "fname" type = "text" name = "lname" required = "required" placeholder = "Last Name." /><br/>
					<?php
      					if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "notnum")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Wrong Format. Enter again in write format.</font>
							   <br/>";
						   } else if($_GET['Message'] == "cont")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Contact number should be of 10 digits.</font>
							   <br/>";
						   } else if($_GET['Message'] == "alr")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Contact number is already regestered.</font>
							   <br/>";
						   } 
						}
							   
							   
					   ?>
                    <font id = "req">*</font>
					<input  id = "input_feilds" type = "number" name = "cnumber" required = "required" placeholder = "Contact Number. (only 10 digits)" />	
					<Br/>
					<font id = "req">*</font>
                    <input  id = "input_feilds" type = "email" name = "email" required = "required" placeholder = "E-mail." />	<br/>
				     
					 <?php
					 if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "shrr")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Password should be 8-21 characters long.</font>
							   <br/>";
						   }  else if($_GET['Message'] == "alrr")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Try another Password.</font>
							   <br/>";
						   } 
					  }
					  ?>
					<font id = "req">*</font>
                    <input  id = "input_feilds" type = "password" name = "password" required = "required" placeholder = "Password (Minimum 8 characters)." />	
                    <br/>
					
				 <?php
					 if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "dmat")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Password does not match.</font>
							   <br/>";
						   } 
					  }
					  ?>
					  <font id = "req">*</font>
					<input  id = "input_feilds" type = "password" name = "retype" required = "required" placeholder = "Re-type Password." />	
                   <br/>
				   <?php
					 if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "ged")
		                   {
							   echo "<font style = 'margin-left: 20px; color: red;'>Select gender.</font>
							   <br/>";
						   } 
					  }
					  ?>
					  
					  <?php
					 if(isset($_GET['Message'])){
		                   if($_GET['Message'] == "fd")
		                   {
							   echo "<font style = 'margin-right: 140px; color: red; float: right;'>Select field.</font>
							   <br/>";
						   } 
					  }
					  ?>
				   <font id = "req">*</font>
				   <select  id = "fname"  name = "gender" required = "required">
					   <option value = "disabled">Gender.</option>
					   <option value = "Male">Male.</option>
					   <option value = "Female">Female.</option>
					</select>
					&nbsp; &nbsp; &nbsp; &nbsp; 
					
                 <font id = "req">*</font>					
                   <select  id = "fname"  name = "feild" required = "required">
				       <option value = "disabledField" >Choose Your Field.</option>
					   <option value = "General">General.</option>
					   <option value = "Science">Science.</option>
					   <option value = "Computer Science">Computer Science.</option>
					   <option value = "Islamic">Islamic.</option>
					   <option value = "Arts">Arts.</option>
					   <option value = "1st to 12th Standard">1st To 12th Standard.</option>
				   </select>
				 <input  id = "fsubmit" type = "submit" name = "signup_submit" value = "Sign up." />&nbsp; &nbsp; &nbsp; &nbsp;
				 <font id = "req">*</font>(Required Fields)
				 </form>
			 </div>   
		  
		  </div><!--content ends here-->
				
		
	
	 </div><!--Wrapper ends here -->
   </BODY>
   
</HTML>