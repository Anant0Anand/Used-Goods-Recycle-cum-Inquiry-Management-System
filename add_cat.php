<?php

	session_start();
	include "config.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/user_page.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Add category</title>
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



	<?php
		include 'config.php';
		if(isset($_POST['add']))
		{
			$category_name = $_POST['category'];
			if(empty($category_name)) 
        	{
        	    echo "<font color='red'>Category field is empty!</font><br/>";
        	} 
        	else
        	{
        		$query = "INSERT INTO category (category_name) VALUES ('$category_name')";
        		$result = mysqli_query($dbconn,$query);

        		if($result)
        		{

        			//redirecting to the display page.
        			header("Location: user_page.php");
        		}
        	}
		}

	?>

	<br><br><br><br>
	<form action="" method="POST" style="max-width:600px;margin:auto">
	<h3 class = "heading">New Category</h3>
	<h5 style="text-align:center;font-size:1rem;font-family: 'Jura', sans-serif;">Add category only if it is not included below.</h5>
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
		<br>

		<div class="input-container">
        <i class="fas fa-info icon fa-2x"></i>
          <input class="input-field" type="text" placeholder="Enter New Category" name="category" id="category">
        </div>
		<br>
		<button type="submit" name="add" value="Add Category" class="btn btn-primary btnsell">Add Category</button><br>
		
	</form>
	
</body>
</html>