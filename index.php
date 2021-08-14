<?php
    session_start();
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/index_util.css">
	<script src="https://kit.fontawesome.com/210122ad46.js" crossorigin="anonymous"></script>
	<title>Login</title>
</head>
<body >

	<?php
		//session_start();
		//include 'config.php';
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user_unsafe=$_POST['username'];
        	$pass_unsafe=$_POST['password'];

        	$user = mysqli_real_escape_string($dbconn,$user_unsafe);
        	$pass = mysqli_real_escape_string($dbconn,$pass_unsafe);

        	$query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE uname='$user' AND pw='$pass'");
        	$res=mysqli_fetch_array($query);
        	//$id=$res['user_id'];

        	if (mysqli_num_rows($query)<1)
        	{
            	$_SESSION['msg']="Login Failed, User not found!";
            	header('Location: register.php');
        	}
        	else
        	{
        		//$res=mysqli_fetch_array($query);
            	$_SESSION['id']=$res['user_id'];
            	$_SESSION['uname']=$res['uname'];
            	header('Location: user_page.php');
        	}
		}

		//mysqli_close($dbconn);

	?>
<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="" method="post" class="login100-form validate-form">
				<span class="login100-form-title p-b-49">LOGIN</span>
				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
				<i class="fas fa-user"></i>
					<span class="label-input100">Username</span>
					
					<input type="text" name="username" placeholder="Username" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Password is required">
				<i class="fas fa-unlock"></i>
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>
				<br><br><br>
				<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" value="login">
								Login
							</button>
						</div>
				</div>
				<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
						New here! Sign Up
						</span>
						<a href="register.php" class="txt2">
							Sign Up
						</a>
				</div>
				</form>
			</div>
		</div>
</div>
	
	

</body>
</html>