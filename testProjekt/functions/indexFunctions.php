<?php

$userData = checkLogin($con);
$id = $userData["id"];

$Errmsg = "";

if(isset($_POST["buy"])){
    echo "Buying pack";
    $price = 500;
    $currentCoins = $userData["coins"];
    $remainingCoins = $currentCoins - $price;
    if($remainingCoins < 0){
        $Errmsg = "Sorry, you have an insufficient amount of coins, please purchase some to buy this content.";
    }else{
        $query = "update uporabniki set coins='$remainingCoins' where id='$id'";
        mysqli_query($con,$query);
        header("Location: index.php");
    }
}

function getFeaturedCreators($con){
	$query = "select * from uporabniki order by coins desc limit 4";
	$result = mysqli_query($con, $query);

	$creators = mysqli_fetch_all($result);

	foreach ($creators as $creator) {
		echo '<div class="featured">';
        echo '<h1>';
			echo $creator[1];
			if($creator[10] == 1){
				echo ' <img src="./pictures/checkMark.png" alt="Verified" style="height:20px; width:20px;">';
			}
		echo '</h1>';
		echo '<p>';
			echo $creator[9];
		echo '<p/>';
		echo '<a href="creator.php?id='. $creator[0] .'">';
			echo 'view';
		echo '</a>';
    echo '</div>';
	}
}