<?php

$userData = checkLogin($con);
$id = $userData["id"];

$ErrpackName = $ErrpackPrice = $Errrandom = "";
$packName = "";
$packPrice = 0;

if(isset($_POST["createPack"])){
    if(empty($_POST["packName"])){
        $ErrpackName = "Pack name is required";
    }else{
        $packName = $_POST["packName"];
    }
    if(empty($_POST["packPrice"])){
        $ErrpackPrice = "Pack price is required";
    }else{
        $packPrice = $_POST["packPrice"];
    }
    if($_POST["packPrice"]){
        $ErrpackPrice = "Pack price is cannot be negative";
    }else{
        $packPrice = $_POST["packPrice"];
    }
    
    if(!empty($_POST["packName"]) && !empty($_POST["packPrice"]) && $_POST["packPrice"] > 0){
        $packName = $_POST["packName"];
        $packPrice = $_POST["packPrice"];
    
        $stmt = $con ->prepare("insert into packs (title, price, userId) values (?,?,?)");
        $stmt ->bind_param("sii", $packName, $packPrice, $id);
        $stmt -> execute();
        header("Location: UserProfile.php");
    }
}

if(isset($_POST["submitEdit"])){
    if(!empty($_POST["description"])){
        $desc = $_POST["description"];
        $stmt = $con ->prepare("update uporabniki set description=? where id=?");
        $stmt ->bind_param("si", $desc, $id);
        $stmt -> execute();
        header("Location: UserProfile.php");
    }else{
        echo "Error";
    }
}

function getUserPacks($con, $id){
	$query = "select * from packs where userId='$id'";
    $result = mysqli_query($con, $query);

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_array($result)){
			echo '<div class="pack">';
			echo '<h1>' . $row["title"] . '</h1>';
			echo '<br>';
			echo '<a href="editPack.php">Edit</a>';
			echo '</div>';
		}
	}else{
		echo "After you create a pack it will be displayed here.";
	}
}