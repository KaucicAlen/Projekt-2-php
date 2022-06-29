<?php 

function checkLogin($con){
	if(isset($_SESSION['user_id'])){
		$id = $_SESSION['user_id'];
		$query = "select * from uporabniki where id='$id' limit 1";
		$result = mysqli_query($con,$query);

		if($result && mysqli_num_rows($result) > 0){
			$userData = mysqli_fetch_assoc($result);
			return $userData;
		}
	}
	header("Location: login.php");
	die;
}

function checkUserName($con, $username){
	$query = "select * from uporabniki where username='$username'";
    $result = mysqli_query($con, $query);

	if($result && mysqli_num_rows($result) > 0){
		return 0;
	}else{
		return 1;
	}
}

function checkEmail($con, $email){
	$validEmails = array("gmail", "icloud", "yahoo");
	$query = "select * from uporabniki where email='$email'";
    $result = mysqli_query($con, $query);

	foreach($validEmails as $str){
		if(str_contains($email, $str)){
			if($result && mysqli_num_rows($result) > 0){
				return 0;
			}else{
				return 1;
			}
		}else{
			return 2;
		}
	}
}

function getCreator($con, $id){
	$query = "select * from uporabniki where id='$id'";
	$result = mysqli_query($con, $query);

	$creator = mysqli_fetch_assoc($result);
	return $creator;
}

function displayCreatorPacks($con, $id){
	$query = "select * from packs where userId='$id'";
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($result)){
		echo '<div class="pack">';
        echo '<h1>' . $row["title"] . '</h1>';
        echo '<br>';
		echo $row["price"];
		echo '<img src="./pictures/coin.gif" alt="C" style="height:25px;width:25px;">';
		echo "<br>";
        echo '<a href="viewPack.php?packId='. $row["id"] .'">View</a>';
        echo '</div>';
	}   
}


function getPack($con, $id){
	$query = "select * from packs where id='$id'";
	$result = mysqli_query($con, $query);

	$pack = mysqli_fetch_assoc($result);
	return $pack;
}

function getOwnedPacks($con, $id){
	$query = "select * from uporabniki_packs where idUporabnik='$id'";
	$result = mysqli_query($con, $query);

	$ownedPacks = mysqli_fetch_all($result);
	return $ownedPacks;
}

function checkOwnership($con, $id, $packId){
	$ownedPacks = getOwnedPacks($con, $id);
	$owned = 0;

	foreach($ownedPacks as $ownedPack){
		if($packId == $ownedPack[2]){
			$owned = 1;
		}
	}
	return $owned;
}

function showPackPics($con, $packId, $owned){
	
	if($owned == 1){
		for ($i=0; $i < 10; $i++) { 
			echo "<div>";
				echo '<img src="./pictures/slika1-2.jpg" alt="Picture" style="height: 300px; width: 250px;" class="lockedImg" onclick="showModalPreview(this)">';
			echo "</div>";
		}
	}else{
		for ($i=0; $i < 10; $i++) { 
			echo "<div>";
				echo '<img src="./pictures/locked.jpg" alt="Locked picture" style="height: 300px; width: 250px;" class="lockedImg" onclick="showModalPreview(this)">';
			echo "</div>";
		}
	}
}

function showPackPreviewPics($con, $packId, $owned){
	
	if($owned == 1){
		for ($i=1; $i < 4; $i++) { 
			echo '<div class="column">';
				echo '<img src="./pictures/slika2-'. $i .'.png" alt="Preview picture '.$i .'" style="height: 300px; width: 250px;" class="lockedImg" onclick="showModalPreview(this)">';
			echo '</div>';
		}
	}else{
		for ($i=1; $i < 4; $i++) { 
			echo '<div class="column">';
				echo '<img src="./pictures/slika2-'. $i .'.png" alt="Preview picture '.$i .'" style="height: 300px; width: 250px;" class="prevImg" onclick="showModalPreview(this)">';
			echo '</div>';
		}
	}
}

?>