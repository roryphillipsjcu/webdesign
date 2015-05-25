<?php
require ("authenticate.php");
include ("dbConnect.php");
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Edit Notice</title>
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

        if ($_SESSION['level'] == "10"){
            $sql = "SELECT * FROM notice";
        } else {
            $sql = "SELECT * FROM notice WHERE posterID = '$_SESSION[userID]'";
        }

        foreach ($dbh->query($sql) as $row) { ?>

            <form id="manageForm" method="post" action="artistProcess.php">
                <fieldset>
                    <table>
                        <tr>
                            <td>Name: </td>
                            <td>
                                <?php echo "<input type='text' id='name' name='name' value='$row[notice_name]'>";?>
                            </td>

                            <td>Detail: </td>
                            <td>
                                <?php echo "<input type='text' id='detail' name='detail' value='$row[notice_detail]'>";?>
                            </td>

                            <td>Expiry: </td>
                            <td>
                                <?php echo "<input type='datetime' id='expiry' name='expiry' value='$row[notice_expiry]'>";?>
                            </td>
                        </tr>
                        <tr>
                            <?php echo "<input type='hidden' name='id' id='id' value='$row[notice_id]'>";?>
                            <?php echo "<input type='hidden' name='postid' id='postid' value='$row[posterID]'>";?>
                            <?php
                            if ($_SESSION['level'] == "10"){
                                ?>
                                <td>Created By: </td>

                                <td><?php
                                    $sql = "SELECT account_username FROM auth WHERE account_id = '$row[posterID]'";
                                    foreach ($dbh->query($sql) as $name){
                                        $username = $name['account_username'];
                                    }
                                    echo $username;
                                    ?></td>
                            <?php } ?>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" id="submit" value="Update">
                            </td>

                            <td>
                                <input type="submit" name="submit" id="submit" value="Delete">
                            </td>
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