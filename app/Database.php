<?php
require('Config.php');
$dbconnect=mysql_connect($host,$user,$pass);
$dbselect=mysql_select_db($data_base,$dbconnect);
$sql=mysql_query($dbselect);

?>