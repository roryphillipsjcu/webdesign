<?php
//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Login</title>
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
            if (isset($_SESSION['username'])) {
                header("Location: userCP.php");
            }
            ?>
            <div id="signup">
                <h2>Sign Up</h2>
                <form id="signupForm" method="post" action="userProcess.php">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <br>
                    <input type="submit" name="submit" value="SignUp">
                </form>
            </div>

            <div id="login">
                <h2>Login</h2>
                <form id="loginForm" method="post" action="userCP.php">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username">
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    <br>
                    <input type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
</html>