<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
$userData = checkLogin($con);
$id = $userData["id"];
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

    My collection 
    <script type="text/javascript" src="./functions/index.js"></script>

</body>
</html>