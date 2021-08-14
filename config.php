<?php 
$dbconn = mysqli_connect("localhost","root","","dbms_project");

if(mysqli_connect_errno())
{
	echo "Connection FAILED due to ".mysqli_connect_error();
}

?>