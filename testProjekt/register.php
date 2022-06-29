<?php 
session_start();
include("./functions/config.php");
include("./functions/functions.php");
include("./functions/registerFunctions.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <label for="username">Username:</label>
            <span class="error">* <?php echo $Erruser_name;?></span><br>
            <input type="text" name="username" id="name" class="form-control" placeholder="Username" value="<?php echo $username;?>">
          </div>
          <div class="formGroup">
            <label for="email">Email:</label>
            <span class="error">* <?php echo $Erremail;?></span><br>
            <input type="text" name="email" id="email" class="form-control" placeholder="Your email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="<?php echo $email;?>">
          </div>
          <div class="formGroup">
            <label for="password">Password:</label>
            <span class="error">* <?php echo $Errpassword1;?></span><br>
            <input type="password" name="password1" id="geslo1" class="form-control" placeholder="Password" value="<?php echo $password1;?>">
          </div>
          <div class="formGroup">
            <label for="password">Confirm password:</label>
            <span class="error">* <?php echo $Errpassword2;?></span><br>
            <input type="password" name="password2" id="geslo2" class="form-control" placeholder="Confirm password" value="<?php echo $password2;?>">
          </div>
          <div class="formGroup">
            <label for="password">Phone number:</label>
            <span class="error">* <?php echo $Errphone;?></span><br>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter your phone number" value="<?php echo $phoneNumber;?>">
          </div>
          <div class="formGroup">
            <label for="password">Country:</label>
            <span class="error">* <?php echo $Errcountry;?></span><br>
            <input type="text" name="country" id="country" class="form-control" placeholder="Enter your country" value="<?php echo $country;?>">
          </div>
          <div class="formGroup">
            <label for="password">City:</label>
            <span class="error">* <?php echo $Errcity;?></span><br>
            <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" value="<?php echo $city;?>">
          </div>
          <div class="formGroup">
            <label for="password">Age:</label>
            <span class="error">* <?php echo $Errage;?></span><br>
            <input type="number" name="age" id="age" class="form-control" placeholder="Enter your age" value="<?php echo $age;?>">
          </div>
          <div class="formGroup">
            <button type="submit" name="register" value="NewAccount" class="btn">Create account</button>
            <span class="error"><?php echo $ErrRandom;?></span>
            <a href="login.php" class="link">Login</a>
          </div>
        </form>
      </div>
    </div>
    
  </body>
</html>