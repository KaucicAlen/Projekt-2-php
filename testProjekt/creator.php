<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
$userData = checkLogin($con);
$id = $userData["id"];

$creatorID = $_GET["id"];

$creator = getCreator($con, $creatorID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="shortcut icon" href="./pictures/coin.png" type="image/x-icon">
</head>
<body>
    <?php 
        include("header.php");
        include("navbar.php");
    ?>

    <div class="containerCreatorMain">
        <div class="creatorName">
            <?php 
                echo "@" . $creator["username"];
                if($creator["verified"] == 1){
                    echo ' <img src="./pictures/checkMark.png" alt="Verified">';
                }
            ?>

        </div>
        <div class="creatorDescription">
        <?php 
                echo $creator["description"];
            ?>
        </div>
        <div class="creatorPacks">
            <?php 
                displayCreatorPacks($con, $creatorID);
            ?>
            
        </div>

    </div>
    <script type="text/javascript" src="./functions/index.js"></script>
</body>
</html>