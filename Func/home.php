 <?php 
include("../inclFiles/connect.php");
include("homeFunc.php");
 if(isset($_GET['id'])){
		 if($_GET['id'] == "com")
		 {
	        $path = 'src="computer.php"';
			$hpath='src="header.php?stid=c"';
		 } elseif($_GET['id'] == "sci")
		 {
			 $path = 'src="science.php"';
			 $hpath='src="header.php?stid=s"';
		 }
		 elseif($_GET['id'] == "isl")
		 {
			 $path = 'src="islamic.php"';
			 $hpath='src="header.php?stid=i"';
		 }
		 elseif($_GET['id'] == "art")
		 {
			 $path = 'src="arts.php"';
			 $hpath='src="header.php?stid=a"';
		 }
		 elseif($_GET['id'] == "gen")
		 {
			 $path = 'src="general.php"';
			 $hpath='src="header.php?stid=g"';
		 }
		 elseif($_GET['id'] == "oth")
		 {
			 $path = 'src="other.php"';
			 $hpath='src="header.php?stid=o"';
		 }
 }
?>
<!DCOTYPE HTML>
<html>

<head><title>Home Page | <?php $username = GetName(); echo "$username"; ?></title></head>
   <FRAMESET Rows = "10%, *" Framespacing="0">
   
      <Frame Name = "header" <?php echo $hpath; ?> FrameBorder="1" Noresize="disable">
	  
	  <FRAMESET Cols = "15%, *">
	    <Frame Name = "nav" src = "navigation.php" FrameBorder = "1" Noresize="disable">
	    <Frame Name = "body" <?php echo $path; ?> FrameBorder = "1" Noresize="disable" >
	  </FRAMESET>  
   
   </FRAMESET>
</html> 