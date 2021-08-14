<?php
//including the database connection file
include 'config.php';
$id = $_GET['prod_id'];
$result = mysqli_query($dbconn, "DELETE FROM foundproduct WHERE prod_id='$id' ");
header("Location: user_page.php");
?>