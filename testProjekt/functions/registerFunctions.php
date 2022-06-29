<?php

$Erremail = $Errpassword1 = $Errpassword2 = $ErrRandom = $Erruser_name = $Errphone = $Errcountry = $Errcity = $Errage = "";
$username = $password = $password1 = $password2 = $email = $phoneNumber = $city = $country = $age = "";

if(isset($_POST["register"])){

    if(empty($_POST["username"])){
        $Erruser_name = "Username is required";
    }else{
        $username = $_POST["username"];
    }

    if(empty($_POST["email"])){
        $Erremail = "Email is required";
    }else{
        $email = $_POST["email"];
    }

    if(empty($_POST["password1"])){
        $Errpassword1 = "Password is required";
    }elseif($_POST["password2"] != $_POST["password1"]){
        $Errpassword1 = "Passwords don't match";
    }else{
        $password = $_POST["password1"];
    }

    if(empty($_POST["password2"])){
        $Errpassword2 = "Password is required";
    }elseif($_POST["password1"] != $_POST["password2"]){
        $Errpassword2 = "Passwords don't match";
    }else{
       $password = $_POST["password1"];
    }

    if(empty($_POST["phoneNumber"])){
        $Errphone = "Phone number is required";
    }else{
        $phoneNumber = $_POST["phoneNumber"];
    }

    if(empty($_POST["country"])){
        $Errcountry = "Country is required";
    }else{
        $country = $_POST["country"];
    }

    if(empty($_POST["city"])){
        $Errcity = "City is required";
    }else{
        $city = $_POST["city"];
    }

    if(empty($_POST["age"])){
        $Errage = "Age is required";
    }elseif($_POST["age"] < 18){
        $Errage = "You must be at least 18 years old to register an account";
    }elseif($_POST["age"] > 100){
        $Errage = "Please enter a valid age";
    }else{
        $age = $_POST["age"];
    }

    if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password1"]) && !empty($_POST["password2"]) && !empty($_POST["phoneNumber"]) && !empty($_POST["country"]) && !empty($_POST["city"]) && !empty($_POST["age"]) && $_POST["password1"] == $_POST["password2"]){

      $emailVer = checkEmail($con, $email);
      $userNameVer = checkUserName($con, $username);

      if($userNameVer == 1){
        if($emailVer == 1){
          $stmt = $con -> prepare("insert into uporabniki (username, email, password, phone, city, country, age) values (?,?,?,?,?,?,?)");
          $stmt -> bind_param("ssiissi", $username, $email, $password, $phoneNumber, $city, $country, $age);
          if($stmt -> execute() == true){
          header("Location: ./login.php");
          die;
          }else{
          $ErrRandom = "Prislo je do napake, prosim poskusite ponovno!";
          }
        }elseif($emailVer == 2){
          $Erremail = "Please use a valid email address";
        }else{
          $Erremail = "This email is already registered";
        }
      }else{
        $Erruser_name = "Username is already taken";
      }
    }
}