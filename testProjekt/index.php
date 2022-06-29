<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
include("./functions/indexFunctions.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My private pics</title>
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
        <div class="containerMain">
            <div class="headerMain">
               Featured public creators
            </div>
            <div class="rules">
                <h1>Guide</h1>
                <p>Get MPP coins which you can then use to purchase diffrent creator packs. On the right you can see our most popular creators. To view their packs just click "view" and you will be taken to their page. If you have a creators username or ID you can click "Find creators" and find your favorite one that way. Under the tab "My collection" you can look at all the packs you have and the pictures you've collected. To create your own pack that you can then share click on your name. There you can edit your profile info and add your own packs.</p>
                <h1>Rules</h1>
                <p>All packs and pictures must be in compliance with our TOS. Your profile must be verifed before you can start creating  and selling packs. If you see little checkmark next to a creators name that means that they have provided sufficient identification and are authorized to sell their own packs</p>
            </div>

            <?php getFeaturedCreators($con); ?>
        </div>


        <script type="text/javascript" src="./functions/index.js"></script>
    </body>
</html>