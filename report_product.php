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
	<title>Report Product</title>
</head>
<body>


<?php
	include 'config.php';
	if(isset($_POST['submit']))
	{
		$prod_name = $_POST['prod_name'];
		$prod_desc = $_POST['prod_desc'];
		$location = $_POST['loc'];
		$category = $_POST['category'];
		//$user_id = $_POST['user_id'];
		//$contact = $_POST['contact'];

		if(empty($prod_name) || empty($prod_desc) || empty($location) || empty($category))
		{    
            
        if(empty($prod_name)) 
        {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($prod_desc)) 
        {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }   

        if(empty($location)) 
        {
            echo "<font color='red'>location field is empty!</font><br/>";
        }   

        if(empty($category)) 
        {
            echo "<font color='red'>Category field is empty!</font><br/>";
        }  

    }
    else
    {
    	//echo $_SESSION['id'];
    	$query1 = "SELECT * FROM users WHERE user_id = '".$_SESSION['id']."'" ;
    	$result1 = mysqli_query($dbconn, $query1);
    	while($row = mysqli_fetch_array($result1))
    	{

    	$query = "INSERT INTO foundproduct (prod_desc, prod_name, location, category_name, user_id, contact) VALUES ('$prod_desc','$prod_name','$location','$category', {$row['user_id']}, {$row['contact']}) ";  

        $result = mysqli_query($dbconn,$query);

        if($result)
        {

        //redirecting to the display page.
        header("Location: user_page.php");
        }
    }
    }

		

	}



	?>
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

	
  <form action="" method="POST" enctype="multipart/form-data" style="max-width:600px;margin:auto">
  <be><br>
  <h3 class = "heading">Report Product that you found</h3>
  <br>
        <div class="input-container">
        <i class="fab fa-product-hunt icon fa-2x"></i>
          <input class="input-field" type="text" placeholder="Product name" name="prod_name">
        </div>
        <div class="input-container">
        <i class="fas fa-info icon fa-2x"></i>
          <input class="input-field" type="text" placeholder="Description" name="prod_desc">
        </div>
        <div class="input-container">
        <i class="fas fa-map-marked-alt icon fa-2x"></i>
          <input class="input-field" type="text" placeholder="Location" name="loc">
        </div>
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
        <button type="submit" name="submit" value="Report Product" class="btn btn-primary btnsell">Submit</button><br>
        

       

	</form>

	
</body>
</html>