<?php
/**
 * Created by PhpStorm.
 * User: Rory
 * Date: 12-May-15
 * Time: 17:25
 */

//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Debug</title>
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
            <li><a href="artists.php" id="navButton">Artists</a></li>
            <li><a href="events.php" id="navButton">Events</a></li>
            <li><a href="bulletins.php" id="navButton">Bulletins</a></li>
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
        /*	<DEBUG>
        Display the session data
        */ ?>
        <p>Here is the session data:</p>
    <pre>
    <?php print_r($_SESSION); ?>
    </pre>
        <?php
        /* </DEBUG>
        */
        ?>

        <a href="userCP.php">Return</a>
    </div>


</div>
</body>
</html>