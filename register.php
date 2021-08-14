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
	<title>Register</title>
</head>
<body>

	<?php
		include 'config.php';

		if(isset($_POST['submit']))
		{
			$fname=$_POST['fname'];
    		$midname=$_POST['mname'];
    		$lname=$_POST['lname'];
    		$address=$_POST['addr'];
    		$email=$_POST['email'];
    		$contact=$_POST['contact'];
    		$username=$_POST['uname'];
    		$password=$_POST['pass'];

    		if(empty($fname) || empty($lname) || empty($address) || empty($email) || empty($contact) || empty($username) || empty($password)) 
    	{    
            
        	if(empty($fname)) 
        	{
            	echo "<font color='red'>Firstname field is empty!</font><br/>";
        	}

        	
        
        	if(empty($lname)) 
        	{
            	echo "<font color='red'>Lastname field is empty!</font><br/>";
        	}

        	if(empty($address)) 
        	{
            	echo "<font color='red'>Address field is empty!</font><br/>";
        	}

        	if(empty($email)) 
        	{
            	echo "<font color='red'>Email field is empty!</font><br/>";
        	}

        	if(empty($contact)) 
        	{
            	echo "<font color='red'>Contact field is empty!</font><br/>";
        	}
        
        	if(empty($username)) 
        	{
            	echo "<font color='red'>Username field is empty!</font><br/>";
        	}    

        	if(empty($password)) 
        	{
            	echo "<font color='red'>Password field is empty!</font><br/>";
        	}    
    }

    	else
    	{
    		$query = " INSERT INTO users (fname, midname, lname, uname, contact, email, pw, address) 
                VALUES ('$fname','$midname','$lname','$username','$contact','$email','$password','$address') ";

        	$result = mysqli_query($dbconn,$query);

        	if($result){
            //redirecting to the display page. In our case, it is index.php
        	header("Location: index.php");
        	}
    	}
	}
	mysqli_close($dbconn);

	?>
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg'); background-attachment:fixed;">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form action="" method="post" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">SIGN UP</span>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-user"></i>
					<span class="label-input100">First Name</span>
					<input type="text" name="fname" placeholder="First name" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-user"></i>
					<span class="label-input100">Middle Name</span>
					<input type="text" name="mname" placeholder="Middle Name" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-user"></i>
					<span class="label-input100">Last Name</span>
					<input type="text" name="lname" placeholder="Last Name" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-envelope"></i>
					<span class="label-input100">Email Name</span>
					<input type="email" name="email" placeholder="Institute email" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-id-card"></i>
					<span class="label-input100">Contact</span>
					<input type="text" name="contact" placeholder="Contact info" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-address-book"></i>
					<span class="label-input100">Addresss</span>
					<input type="text" name="addr" placeholder="Room no. & Hostel" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-user"></i>
					<span class="label-input100">Create username</span>
					<input type="text" name="uname" placeholder="username" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<i class="fas fa-unlock"></i>
					<span class="label-input100">Create Password</span>
					<input type="password" name="pass" placeholder="Enter password" class="input100">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="submit" value="Register">
								Signup
							</button>
						</div>
				</div>
				<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
						Already have an ACCOUNT
						</span>
						<a href="index.php" class="txt2">
						Login
						</a>
				</div>
				
				

				

				</form>
	
				
		</div>
	</div>
</div>

</body>
</html>