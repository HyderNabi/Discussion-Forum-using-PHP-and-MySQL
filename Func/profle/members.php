<?php
include("../../inclFiles/connect.php");
include("memberfunc.php");
?>
<html>
<head>
<title>Members Page | myForum</title>
 <Link  type = "text/css" href = "../../Styles/members.css"  rel = "stylesheet" />
</head>
<body>
<center><a href="../prehome.php" target="none"><img id = "log" src="../../Graphics/logo2.png"/></a></center>
<div id = "bod">
   <?php
    display_users();
	?>
<div>
</body>
</html>