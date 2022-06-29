<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
$userData = checkLogin($con);
$id = $userData["id"];
$packId = $_GET["packId"];
$owned = checkOwnership($con, $id, $packId);

$pack = getPack($con, $packId);

if(isset($_POST["buyPack"])){
    $userCoins = $userData["coins"];
    $packPrice = $pack["price"];

    if($userCoins - $packPrice < 0){
        echo "Insufficient credit";
    }else{
        $currentCoins = $userCoins - $packPrice;
        $query = "update uporabniki set coins='$currentCoins' where id='$id'";
        mysqli_query($con, $query);
        $query1 = "insert into uporabniki_packs (idUporabnik, idPack) values ('$id','$packId')";
        mysqli_query($con, $query1);
        header("Location: viewPack.php?packId=".$packId);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My private pics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="shortcut icon" href="../pictures/coin.png" type="image/x-icon">
</head>
<body>
    <?php 
    include("header.php");
    include("navbar.php");
    ?>

    <div class="containterViewPack">
        <div class="containerViewPackHeader">
            <?php 
                echo $pack["title"];
            ?>
        </div>
        <div class="containerViewPackDetails">
           Pack details
        </div>
        <div class="containerViewPackPreviewPictures">
            <?php
                showPackPreviewPics($con, $packId, $owned);
            ?>
        </div>
        <div class="containerViewPackDetailsList">
            <form method="post">
                <?php 
                    echo "Cost: " . $pack["price"] . '<img src="./pictures/coin.gif" alt="C" style="height: 25px; width:25px;">';
                    echo "<br>";
                    echo "Description: " . $pack["description"];
                    echo "<br>"; 
                    echo "Number of photos: 10";
                    echo "<br>"; 
                    if($owned == 1){
                        echo "You already own this pack";
                    }else{
                        echo '<button type="submit" name="buyPack">BUY</button>';
                    }
                ?>
            </form>
        </div>
        <div class="containerViewPackPictures">
           <?php 
           showPackPics($con, $packId, $owned);
           ?>
        </div>

    <div class="modal1" id="previewPickModal">
        <span class="close1">&times;</span>
        <img class="modal-content-preview" id="img01">
        <div id="caption"></div>
    </div>
    

    <script type="text/javascript" src="index.js"></script>
</body>
</html>