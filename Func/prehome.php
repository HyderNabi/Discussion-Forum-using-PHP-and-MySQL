<?php
include("../inclFiles/connect.php");
include("prehomeFunc.php");
?>
<!Doctype HTML>
<Html>

  <head>
     <title><?php $get_gender = GetName();?>| CONTENT</title>
	 <Link  type = "text/css" href = "../Styles/prehomeStyle.css"  rel = "stylesheet" />
  </head>
  
  <body>
       <div id = "wrapper"><!--Wrapper starts here -->
	   
	      <header id = "header">
		  
                <div id = "left">
				<a href = "prehome.php">  <img id = "log"  src = "../Graphics/logo2.png"  Alt  = "LOGO"></a>
				</div>
				
			         <img id = "profile_picture" src="profle/uploads/<?php echo $profilepic; ?>"alt = "Profile Picture" />
										
					
				<div id = "right">
				<?php
				if (isset($_GET['f']))
				{
					if($_GET['f'] == "hy"){
						echo "
				 <text id = 'p'>Welcome!!!</text> ";
					}
				}
				?><text id = "pp">'<?php GetName(); ?>' </text>
				</div>	
            
		</header>
		  
		  <div id = "content">
		     <table id = "tab">
			    <tr>
				  <td><a href="home.php?id=com" style = "text-decoration: none;"><div id = "con">Computer Science</div></a></td>
				  <td><a href="home.php?id=sci" style = "text-decoration: none;"><div id = "con">Science</div></a></td>
				   <td><a href = "home.php?id=isl" style = "text-decoration: none;"><div id = "con">Islamic</div></a></td>
				</tr>
				
				 <tr>
				  <td><a href = "home.php?id=art" style = "text-decoration: none;"><div id = "con">Arts</div></a></td>
				  <td><a href = "home.php?id=gen" style = "text-decoration: none;"><div id = "con">General</div></a></td>
				   <td><a href = "home.php?id=oth" style = "text-decoration: none;"><div id = "con">1st To 12th Standard</div></a></td>
				</tr>
				
			</table>
		  </div>
		  
		  <footer id = "footer">
		     <center><a href = "../Action/logout.php" style = "text-decoration: none;"><input type = "button" id = "lgut" value = "Log out"></a><center>
		  </footer>
		  
	   </div><!--wrapper ends here -->
  </body>
  

</HTML>