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
	<title>Claim your Product</title>
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
	  
	  <li class="nav-item usern">
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




	<br><br>
	<form action="claim_search.php" method="POST" style="max-width:600px;margin:auto">
	<h1 class="heading">Search your LOST Product by Category:</h1>
	<br>
	<div class="input-container">
        <i class="fas fa-mouse-pointer icon fa-2x"></i>
          <select class="input-field" name="category" id="category" required placeholder="Category">
          <option value="" selected data-default>Select category</option>
          <?php
            include 'config.php';
            $query=mysqli_query($dbconn,"SELECT category_name FROM category ORDER BY category_name ASC")or die(mysqli_error());
            while($row=mysqli_fetch_array($query))
            {
        ?>
        <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
        <?php
        	}
        ?>
        </select>
    </div>
		
		<br><br>
		<button type="submit" name="submit" value="Search" class="btn btn-primary btnsell">Search</button><br>
        
	</form>
<br><br>

	<h3 style="margin-left:20px;">Information</h3>
	<?php
		include 'config.php';
		$query = "SELECT * FROM foundproduct ORDER BY prod_name ASC";
        $result = mysqli_query($dbconn,$query);

	?>
	<br>
	<br>
	<table class="table table-striped">
		<thead class="thead-dark">
		<tr>
			<th>Category</th>
			<th>Product Name</th>
			<th>Product Description</th>
			<th>Location</th>
			<th>Person who reported</th>
			<th>Contact him(To claim)</th>
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
            $uid = $res['user_id'];
            $query1 = "SELECT fname FROM users WHERE user_id = '$uid' "; 
            $result1 = mysqli_query($dbconn,$query1);
            $row = mysqli_fetch_array($result1);
            echo "<td>".$row['fname']."</td>"; 
            echo "<td>".$res['contact']."</td>";
        }
    }

		?>
	</table>
	
</body>
</html>