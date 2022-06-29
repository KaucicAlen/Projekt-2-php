<?php

$Erremail = $Errpassword = $Errrandom = "";
$email = $password = "";


if(isset($_POST["login"])){
	if(empty($_POST["email"])){
		$Erremail = "Please enter your email";
	}else{
		$email = $_POST["email"];
	}
	if(empty($_POST["password"])){
		$Errpassword = "Please enter your password";
	}else{
		$password = $_POST["password"];
	}

	if(!empty($email) && !empty($password)){
		$query = "select * from uporabniki where email='$email' limit 1";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0){
			$user_data = mysqli_fetch_assoc($result);
			if($password == $user_data["password"]){
				$_SESSION["user_id"] = $user_data["id"];
				header("Location: index.php");
				die;
			}else{
				$Errrandom = "Wrong email or password";
			}
		}else{
			$Errrandom = "Wrong email or password";
		}
	}
}
