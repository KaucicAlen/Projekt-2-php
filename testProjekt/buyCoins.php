<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
$userData = checkLogin($con);

$msg = "";

if(isset($_POST["buySmall"])){
    $id = $userData["id"];
    $numberOfCoins = $userData["coins"];
    $allCoins = $numberOfCoins + 1000;
    $query = "update uporabniki set coins='$allCoins' where id='$id'";
    mysqli_query($con,$query);
    $msg = "1000 coins have been added to your account.";
    header("Location: BuyCoins.php"); 
}
if(isset($_POST["buyMedium"])){
    $id = $userData["id"];
    $numberOfCoins = $userData["coins"];
    $allCoins = $numberOfCoins + 2500;
    $query = "update uporabniki set coins='$allCoins' where id='$id'";
    mysqli_query($con,$query);
    $msg = "2500 coins have been added to your account.";
    header("Location: BuyCoins.php"); 
}
if(isset($_POST["buyBig"])){
    $id = $userData["id"];
    $numberOfCoins = $userData["coins"];
    $allCoins = $numberOfCoins + 5000;
    $query = "update uporabniki set coins='$allCoins' where id='$id'";
    mysqli_query($con,$query);
    $msg = "5000 coins have been added to your account.";
    header("Location: BuyCoins.php"); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy coins</title>
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

        <form method="post">
        <table class='table table-hover' style="text-align:center;">
        <thead>
            <tr>
                <th scope="col" style="text-align:center;">Pack</th>
                <th scope="col" style="text-align:center;">Amount</th>
                <th scope="col" style="text-align:center;">Price</th>
                <th scope="col" style="text-align:center;">Purchase</th>
            </tr>
        </thead>
            <tbody >
            <tr>
                <td>Small</td>
                <td>1000 <img src="./pictures/coin.gif" alt="C" style="width: 25px; height: 25px; margin-bottom:3px;"></td>
                <td>10 USD</td>
                <th style="text-align:center;"><button type="submit" name="buySmall">BUY</button></th>
            </tr>
            <tr>
                <td>Medium</td>
                <td>2500 <img src="./pictures/coin.gif" alt="C" style="width: 25px; height: 25px; margin-bottom:3px;"></td>
                <td>25 USD</td>
                <th style="text-align:center;"><button type="submit" name="buyMedium">BUY</button></th>
            </tr>
            <tr>
                <td>Big</td>
                <td>5000 <img src="./pictures/coin.gif" alt="C" style="width: 25px; height: 25px; margin-bottom:3px;"></td>
                <td>50 USD</td>
                <th style="text-align:center;"><button type="submit" name="buyBig">BUY</button></th>
            </tr>
            </tbody>
        </table>
        </form>
        <p style="text-align:center; color:green;"><?php echo $msg ?></p>
        <br>
        
        <script type="text/javascript" src="./functions/index.js"></script>    
</body>
</html>