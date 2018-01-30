
<?php
$hostName = "localhost";
$userName = "root"; 
$password = "rootroot"; 
$dbName = "roj2009_jobm0n"; 

mysql_connect($hostName,$userName,$password)or die("No Connect Host Now");
mysql_db_query($dbName,"SET NAMES utf8"); 
mysql_select_db($dbName) or die("No Connect Database");
//mysql_query("SET NAMES tis620"); 
?>
