<?php
	session_start();
	include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/buy_section.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Homepage</title>
  <style>
.margin
	{margin-left:30% !important;}
.color
	{background-color:#f2f2f2;}
.para
	{padding-bottom:5vh;}
.heading1
	{padding-bottom:3vh;}
.link
	{color:#0054a5;font-weight:500;}
.link:hover
	{text-decoration:none;color:black;transition:all 0.5s;}
.card
	{padding-bottom:3vh !important;}
.container
	{width:85% !important;}
.over:hover .img-fluid
	{transform:scale(1.1);transition:all 0.6s;}
.over:hover .pstn
	{opacity:1;transition:all 0.6s;}
.over
  {overflow:hidden;position:relative;max-width:100%;max-height:100%;}
  .img-fluid{
    width:370px;
    height:300px;
  }
.pstn
	{opacity:0;padding-top:40%;position:absolute;font-size:32pt;top:0;left:0;right:0;bottom:0;text-align:center;color:white;background-color:rgba(0,0,0,0.7);margin-bottom:0 !important;}

</style>
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
	

	<br><br><br>
	<form action="ad_search.php" method="POST" style="max-width:600px;margin:auto">
  <h2 class="heading">Product Deals</h2>
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
		<button type="submit" name="submit" value="Search" class="btn btn-primary btnsell">Search</button><br>
        
        
	</form>

	<ul>
  <div class="container mt-5">
	<div class="card-columns color">
	<?php
        $query = "SELECT * FROM advertisement ORDER BY prod_name ASC";
        $result = mysqli_query($dbconn,$query);
        while($res = mysqli_fetch_array($result)) 
        {  
        	$ad_id=$res['ad_id'];
        	if($res['prod_pic1'] != "")
        	{
                        
    ?>
    <div class="card">
		<div class="over"><img src="uploads/<?php echo $res['prod_pic1']; ?>" class="img-fluid"/><p class="pstn">...</p></div>
    		
        <?php } ?>
        <div class="card-body">
			<p>Rs. <?php echo $res['prod_price']; ?></p>
			<h3 class="heading1"><?php echo $res['prod_name'];?></h3>
			
			<a href="prod_details.php?ad_id=<?php echo $res['ad_id'];?>" class="link">View <span>Product</span></a>
			</div>
    		
    		
    		

    </div>
    	<?php 
    	}
    	?> 

    </div>
    </div>
    </ul>
</body>
</html>