<?php
	session_start();
	include 'config.php';

                        $ad_id=$_GET['ad_id'];
                        $query = "SELECT * FROM advertisement WHERE ad_id='$ad_id'";
                        $result = mysqli_query($dbconn,$query);
                        while($res = mysqli_fetch_array($result)){

                                    $ad_id=$res['ad_id'];
                                    $prod_price=$res['prod_price'];
                                    $user_id = $_SESSION['id'];

                                    if (isset($_POST['submit']))
                                    {

                                        $ad_id=$ad_id;
                                        $prod_price=$prod_price;                                                
                                        $user_id = $user_id;
                                    }
                                }
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/user_page.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Product Details</title>
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

	<h2 class="heading">Product Details</h2>
	<?php
    include 'config.php';
    $ad_id=$_GET['ad_id'];
    $query = "SELECT * FROM advertisement WHERE ad_id='$ad_id'";
    $result = mysqli_query($dbconn,$query);
    while($res = mysqli_fetch_array($result)) 
    {  
        //getting product id
        if($res['prod_pic1'] != "")
        {
        
    
    ?> 
    <div class="card" style="width:300px;margin:auto;">
    <div class="w3-content w3-display-container">
        <img src="uploads/<?php echo $res['prod_pic1']; ?>" alt="First slide" width="300px" height="200px" class="mySlides">
    <?php } ?>
    <?php 
    if($res['prod_pic2'] != "")
        {
      ?>
      <img src="uploads/<?php echo $res['prod_pic2']; ?>" alt="Second slide" width="300px" height="200px" class="mySlides">
  <?php } ?>
  <?php 
    if($res['prod_pic3'] != "")
        {
      ?>
      <img src="uploads/<?php echo $res['prod_pic3']; ?>" alt="Third slide" width="300px" height="200px" class="mySlides">
  <?php } ?>
  
        </div>
        <div class="card-body">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <b>Product name: </b> 
        <?php echo $res['prod_name']; ?>
        </li>
        <li class="list-group-item">
        <b>Description: </b>
        <?php echo $res['prod_desc']; ?>
        </li>
        <li class="list-group-item">
        <b>Type: </b>
        <?php echo $res['category_name']; ?>
        </li>
        <li class="list-group-item">
        <b>Price: </b>
        <?php echo 'Rs.'.$res['prod_price'].''; ?>
        </li>
        <li class="list-group-item">
        <b>Contact: </b>
        <?php echo $res['contact'].'  '; ?><i>(Only if Interested)</i>
        </li>
        
        
        
        
        </ul>
    <?php } ?>
        </div>
        </div>
    <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
</body>
</html>

