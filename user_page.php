<?php

	session_start();
	include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/user_page.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>User Page</title>
</head>
<body>
	<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
	<a class="navbar-brand" href="#">
    <img src="images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
    <span class="nav-brand1">Hostler Mart</span>
  </a>
  <div  id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="sellsection.php">Sell <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="buysection.php">Buy</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="report_product.php">Report</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link " href="claim_product.php">Claim</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link " href="add_cat.php">Add category</a>
	  </li>
	  
	  <li class="nav-item usern" >
		  <a class="nav-link usera" href="user_page.php">
	  	<?php
		//$uid = $_SESSION['id'];
        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
        $row=mysqli_fetch_array($query);
        echo ''.$row['fname'].' '.$row['lname'].'';;
		?>
		</a>
      </li>
	  <li class="nav-item">
        <button class=" btn btn-light" ><a href="logout.php" class="logout">logout</a></button>
      </li>
    </ul>
	</div>
	</nav>
	

	<br><br><br>
<div class="margin-box">
<hr class="hr">
	<h4>Your Advertisements</h4>
	<?php
		include 'config.php';
		$query = "SELECT * FROM advertisement WHERE user_id = '".$_SESSION['id']."' ORDER BY prod_name ASC";
        $result = mysqli_query($dbconn,$query);

	?>
	<br>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th>Category</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Product Price(in Rs.)</th>
			<th>Option</th>
		</tr>
		</thead>
		<?php
		if($result)
		{
            while($res = mysqli_fetch_array($result)) {     
            echo "<tr>";
            echo "<td>".$res['category_name']."</td>";
            echo "<td>".$res['prod_name']."</td>";
            echo "<td>".$res['prod_desc']."</td>";
            echo "<td>".$res['prod_price']."</td>"; 
            echo "<td><a href=\"ad_update.php?ad_id=$res[ad_id]\">Update</a> | <a href=\"ad_delete.php?ad_id=$res[ad_id]\">Delete</a></td>";
        }
    }

		?>
	</table>
<br><br><br>
<hr class="hr">
	<h4>Reported Products by you</h4>
	<?php
		include 'config.php';
		$query = "SELECT * FROM foundproduct WHERE user_id = '".$_SESSION['id']."' ORDER BY prod_name ASC";
        $result = mysqli_query($dbconn,$query);

	?>
	<br>
	<table class="table table-striped">
	<thead class="thead-dark">
		<tr>
			<th>Category</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Location</th>
			<th>Option</th>
		</tr>
		</thead>
		<?php
		if($result)
		{
            while($res = mysqli_fetch_array($result)) {     
            echo "<tr>";
            echo "<td>".$res['category_name']."</td>";
            echo "<td>".$res['prod_name']."</td>";
            echo "<td>".$res['prod_desc']."</td>";
            echo "<td>".$res['location']."</td>"; 
            echo "<td><a href=\"delete_prod.php?prod_id=$res[prod_id]\">Delete</a></td>";
        }
    }

		?>
	</table>
</div>
</body>
</html>