<?php
session_start();
include("./functions/config.php");
include("./functions/functions.php");
include("./functions/userProfileFunctions.php");
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
        <link rel="stylesheet" href="./css/userProfile.css">
        <link rel="stylesheet" href="./css/navbar.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="shortcut icon" href="./pictures/coin.png" type="image/x-icon">
    </head>
    <body>
        <?php 
        include("header.php");
        include("navbar.php");
        ?>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <form method="post">
                    <label for="description">Description</label><br>
                    <textarea name="description" cols="30" rows="10" id="description" maxlength="500" placeholder="Enter your description..."></textarea>
                    <br>
                    <span id="charCount">500 characters left</span>
                    <br>
                    <button type="submit" name="submitEdit">Save</button>
                    <span class="close">&times;</span>
                </form>

            </div>
        </div>

        <div class="containerUser">
            <div class="headerUser">
                Profile info: 
            </div>
            <div class="userInfo">
                <?php 
                    echo "Username: " .$userData["username"] . "<br>"; 
                    echo "Email: " . $userData["email"] . "<br>";
                    echo "Phone: " . $userData["phone"] . "<br>";
                    echo "City: " . $userData["city"] . "<br>";
                    echo "Country: " . $userData["country"] . "<br>";
                    echo "Description: " . $userData["description"] . "<br>";
                ?>
                <button id="myBtn">Edit</button>
            </div>
            <div class="createPack">
                Add a new pack
            </div>
            <div class="newPack">
                <form method="post" enctype="multipart/form-data">
                    <label for="packName">Pack name</label>
                    <input type="text" name="packName" placeholder="Enter pack name" maxlength="30">
                    <span class="error">* <?php echo $ErrpackName;?></span>
                    <br>
                    <label for="packPrice">Price</label>
                    <input type="number" name="packPrice" placeholder="Enter the pack price">
                    <img src="../pictures/coin.gif" alt="Coins" style="width:25px; height: 25px;">
                    <span class="error">* <?php echo $ErrpackPrice;?></span>
                    <br>
                    <label for="previewImg">Up to 3 preview photos</label><br>

                    <input type="file" name="previewImg[]" multiple>
                    <small>* Note these photos will be visible to anyone without having to pay</small>
                    <br>
                    <label for="payingImg">Upload your photos</label>
                    <input type="file" name="payingImg[]" multiple>
                    <br>
                    <button type="submit" name="createPack">Create new pack</button>
                </form>
            </div>
            <div class="myPacksHeader">
                Your packs
            </div>
            <div class="myPacks">
                <?php 
                    getUserPacks($con, $id);
                ?>

            </div>
        </div>

        <script type="text/javascript" src="./functions/index.js"></script>
    </body>
</html>