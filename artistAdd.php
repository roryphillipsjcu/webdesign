<?php
require("authenticate.php");

//Check if the logged in user is an admin
if ($_SESSION['level'] == "1"){
    header("Location: userCP.php");
}


?>

<!doctype html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Add Artist</title>
    <link type="text/css" href="mainStyle.css" rel="stylesheet">
</head>

<body>
    <div id = 'container' class = "container">

        <div class="header">
            <a href="index.php"><img src="res/img/banner.png" alt="something is broken" width="1024" height="125" id="logo"></a>
        </div>

        <div id="navBar">
            <ul>
                <li><a href="index.php" id="navButton">Home</a></li>
            <li><a href="artistDisplay.php" id="navButton">Artists</a></li>
            <li><a href="eventDisplay.php" id="navButton">Events</a></li>
            <li><a href="noticeDisplay.php" id="navButton">Bulletins</a></li>
            <li><a href="contact.html" id="navButton">Contact Us</a></li>
                <?php
                if (isset($_SESSION['username'])) { ?>
                    <li><a href="userCP.php" id="navButton">Manage Site</a></li>
                <?php } else { ?>
                    <li><a href="login.php" id="navButton">Login / Sign Up</a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="wrapper">

            <?php

            if (isset($_SESSION['log'])){
                echo "<h3>$_SESSION[log]</h3>";
            }

            ?>

            <form id="newForm" method="post" action="artistProcess.php">
                <p>
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name">
                </p>
                <p>
                    <label for="phone">Phone: </label>
                    <input type="text" name="phone" id="phone">
                </p>
                <p>
                    <label for="content">Content: </label>
                    <input type="text" name="content" id="content">
                </p>
                <p>
                    <label for="contact">Contact Name: </label>
                    <input type="text" name="contact" id="contact">
                </p>

                <p>
                    <label for="image">Image: </label>
                    <input type="text" name="image" id="image">
                </p>

                <p>
                    <label for="web">Website: </label>
                    <input type="text" name="web" id="web">
                </p>

                <p>
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email">
                </p>

                <p>
                    <input type="submit" name="submit" id="submit" value="Add">
                </p>
            </form>
            <a href="userCP.php" id="editButton">Return</a>
        </div>
    </div>
</body>
</html>