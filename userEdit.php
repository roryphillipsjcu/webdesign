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

//Check if the logged in user is an admin
if ($_SESSION['level'] != '10'){
    header("Location: userCP.php");
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Edit User</title>
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

        $sql = "SELECT * FROM auth WHERE account_level < 10";
        foreach ($dbh->query($sql) as $row) {
            ?>

            <form id="manageForm" method="post" action="userProcess.php">
                <fieldset>
                    <table>
                        <tr>
                            <td>Username: </td>
                            <td><?php echo"<input type='text' id='username' name='username' value='$row[account_username]'>";?></td>

                            <td>Account Level: </td>
                            <td>
                                <select id='level' name='level'>
                                    <?php /*We want to have the user account level that is currently active
								to be selected by default, to try and reduce the chance of accidental
								down/upgrades of accounts */

                                    if ($row['account_level'] == 1) {
                                        echo "<option value='1' selected>Free user</option>";
                                    } else {
                                        echo "<option value='1'>Free user</option>";
                                    }

                                    if ($row['account_level'] == 2) {
                                        echo "<option value='2' selected>Paid user</option>";
                                    } else {
                                        echo "<option value='2'>Paid user</option>";
                                    }
                                    ?>
                                </select>
                            </td>

                            <td><input type='submit' id='submit' name='submit' value='Update'</td>

                            <td><input type='submit' id='submit' name='submit' value='Delete'></td>

                            <td><?php echo"<input type='hidden' name='id' value='$row[account_id]'>";?></td>
                        </tr>
                    </table>
                </fieldset>
            </form>

        <?php } ?>

        <a href="userCP.php">Return</a>
    </div>


</div>
</body>
</html>