<?php
require("authenticate.php");

//Check if the logged in user is an admin
if ($_SESSION['level'] != '10'){
    header("Location: userCP.php");
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Add User</title>
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
            echo "<p>$_SESSION[log]</p>";
        }

        ?>
        <form id="newForm" method="post" action="userProcess.php">
            <fieldset>
                <table>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" id="username" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" id="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>Account Level: </td>
                        <td>
                            <select id="level" name="level">
                                <option value = '1'>Free user</option>
                                <option value = '2'>Paid user</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" id="submit" name="submit" value="Add">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <a href="userCP.php">Return</a>
    </div>


</div>
</body>
</html>