<?php
// including the database connection file
session_start();
include 'config.php';
if(isset($_POST['update']))
{   
    $id = mysqli_real_escape_string($dbconn, $_GET['ad_id']);
    $prod_name = mysqli_real_escape_string($dbconn, $_POST['prod_name']);
    $prod_desc = mysqli_real_escape_string($dbconn, $_POST['prod_desc']);
    $prod_price = mysqli_real_escape_string($dbconn, $_POST['prod_price']); 
    $category = mysqli_real_escape_string($dbconn, $_POST['category']); 

    // checking empty fields
    if(empty($prod_name) || empty($prod_desc) || empty($prod_price) || empty($category)) {    
            
        if(empty($prod_name)) {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($prod_desc)) {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }
        
        if(empty($prod_price)) {
            echo "<font color='red'>Product price field is empty!</font><br/>";
        }     

        if(empty($category)) {
            echo "<font color='red'>Category field is empty!</font><br/>";
        }

    } else {    





        //updating the table
        $query = "UPDATE advertisement SET prod_name='$prod_name', prod_desc='$prod_desc', prod_price='$prod_price',category_name='$category' WHERE ad_id=$id";
        $result = mysqli_query($dbconn,$query);
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
        header("Location: user_page.php");
        }
        
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_page.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Update Advertisement</title>
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
    <form action="" method="POST" style="max-width:600px;margin:auto">
    <h3 class = "heading">Update Product Details</h3>
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
        <i class="fas fa-rupee-sign icon fa-2x"></i>
          <input class="input-field" type="number" placeholder="Product Price(INR)" name="prod_price">
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
        
        
        <button type="submit" name="update" value="Update Product" class="btn btn-primary btnsell">Update</button><br>

        

        </form>
    
</body>
</html>