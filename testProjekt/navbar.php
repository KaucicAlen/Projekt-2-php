<ul>
    <li>
        <a href="index.php">Home</a>
    </li>
    <li>
        <a href="findCreators.php">Find creators</a>
    </li>
    <li>
        <a href="collection.php">My collection</a>
    </li>
    <li>
        <a href="buyCoins.php">Buy coins</a>
    </li>
    <li class="navRight">
        <?php echo(" " . $userData["coins"]); ?>
        <img src="./pictures/coin.gif" alt="C">
        <?php
            echo '<a href="logout.php">';
                echo "Logout"; 
            echo " </a>";     
            echo '<a href="userProfile.php">';
                echo($userData['username']); 
            echo " </a>";
        ?>
    </li>
</ul>