<?php

include('dbConnect.php');

//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Artists</title>
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
        <form id="insertEvent" name="insertEvent" method="post" action="eventProcess.php">

        <h2>Insert new Event:</h2>
        <fieldset class="subtleSet">

        <p>
        	<label for="name"><b>Name:</b> </label>
            <input type="text" name="name" id="name">
        </p>
        <p>
        	<label for="date"><b>Date:</b> </label>
            <input type="date" name="date" id="date">       
        </p>
        <p>
            <label for="venue"><b>Venue:</b> </label>
            <input type="text" name="venue" id="venue">
        </p>
        <p>
            <label for="time"><b>Time:</b> </label>
            <input type="text" name="time" id="time">
        </p>
        
        <p>
            <b>Description:</b><br>
            <textarea name="description" id="description" rows="5" cols="30"></textarea>
        </p>
        
        <p>
            <label for="phone"><b>Phone:</b> </label>
            <input type="integer" name="phone" id="phone">
        </p>
        
        <p>
            <label for="image"><b>Image:</b> </label>
            <input type="text" name="image" id="image">
        </p>
        
        <p>
        	<input type="submit" name="submit" id="submit" value="Insert">
        </p>
		</fieldset>
		</form>
        <a href="userCP.php">Return</a>
    </div>


</div>
</body>
</html>