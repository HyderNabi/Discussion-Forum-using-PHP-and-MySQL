<?php
$server = "localhost";
$user = "HyderNabi";
$password = "haidii1724";
$database = "myforum";
//create connection with the database................................date = 14-feb-2019;;;;;;;;
$mycon = mysqli_connect($server, $user, $password, $database);
if(!$mycon){
 header("Location: ../index.php?Message=fld");
 exit;
}
?>