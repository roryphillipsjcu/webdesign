<?php
require("authenticate.php");
include("dbConnect.php");
/*
Using require to save time and not have to duplicate code
authenticate will be used on all pages that are being protected
dbConnect will be used on all pages that require a sqlite connection

if users are not authenticated they will have to login before they can
access the page
*/

if (isset($_SESSION['log'])){
    $_SESSION['log'] = "";
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Manage</title>
    <link type="text/css" href="mainStyle.css" rel="stylesheet">
</head>
<body>

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
        <a href="noticeAdd.php">Add new Notice</a><br>
        <a href="noticeEdit.php">Manage a Notice</a><br>

        <?php

        if ($_SESSION['level'] >= "2") {

            ?>

            <a href="artistAdd.php">Add new Artist</a><br>
            <a href="artistEdit.php">Manage an Artist</a><br>

        <?php

        } if ($_SESSION['level'] == "10") {

            ?>

            <a href="userAdd.php">Add new User</a><br>
            <a href="userEdit.php">Manage a User</a><br>
            
            <a href="eventAdd.php">Add new Event</a><br>
            <a href="eventEdit.php">Manage an Event</a><br>

        <?php } ?>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>