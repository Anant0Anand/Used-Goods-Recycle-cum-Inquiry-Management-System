<?php
//including the database connection file
include 'config.php';
$id = $_GET['ad_id'];
$result = mysqli_query($dbconn, "DELETE FROM advertisement WHERE ad_id='$id' ");
header("Location: user_page.php");
?>