<?php
$dbhost= "localhost";
$dbuser= "root";
$dbpass= "";
$dbname= "broking";

$bd = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
   if(! $bd ) {
      die('Could not connect: ' .  mysqli_connect_error());
   }

?>

