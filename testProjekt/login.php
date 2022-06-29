<?php 
session_start();
include ("./functions/config.php");
include ("./functions/functions.php");
include ("./functions/loginFunctions.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Login</title>
    	<link rel="stylesheet" href="./css/register.css">
    	<link rel="stylesheet" href="./css/navbar.css">
    	<link rel="stylesheet" href="./css/header.css">
    	<link rel="shortcut icon" href="./pictures/coin.png" type="image/x-icon">
	</head>
	<body>
		<?php 
		include ("header.php"); 
		?>
		<div class="mainDiv">

      		<div class="container">

        		<form method="POST" id="dodajUporabnikaForm" enctype="multipart/form-data">
          			<div class="formGroup">
            			<h2>Register a new account</h2>
            			<label for="exampleInputEmail1">Email:</label>
						<span class="error">* <?php echo $Erremail;?></span>
		    			<input type="text" name="email" id="email" class="form-control" placeholder="Email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
					</div>
          			<div class="formGroup">
		  				<label for="exampleInputEmail1">Password:</label>
						<span class="error">* <?php echo $Errpassword;?></span>
		  			  	<input type="password" name="password" id="geslo" class="form-control" placeholder="Password">
          			</div>
					<div class="formGroup">
						<button type="submit" name="login" class="btn btn-primary" value="Login">Login</button>
						<span class="error"><?php echo $Errrandom;?></span>
						<a href="register.php" class="link">Register</a>
					</div>
					
        		</form>
      		</div>
    	</div>
		
	</body>
</html>
