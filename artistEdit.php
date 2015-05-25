<?php
require ("authenticate.php");
include ("dbConnect.php");

if ($_SESSION['level'] == "1"){
    header("Location: userCP.php");
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Edit Artist</title>
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
            echo "<h3 style='color:red'>$_SESSION[log]</h3>";
        }

        if ($_SESSION['level'] == "10"){
            $sql = "SELECT * FROM artists";
        } else {
            $sql = "SELECT * FROM artists WHERE posterID = '$_SESSION[userID]'";
        }

        foreach ($dbh->query($sql) as $row) { ?>

            <form id="manageForm" method="post" action="artistProcess.php">
                <fieldset>
                    <table>
                        <tr>
                            <td>Name: </td>
                            <td>
                                <?php echo "<input type='text' id='name' name='name' value='$row[artist_name]'>";?>
                            </td>

                            <td>Phone: </td>
                            <td>
                                <?php echo "<input type='text' id='phone' name='phone' value='$row[artist_phone]'>";?>
                            </td>

                            <td>Content: </td>
                            <td>
                                <?php echo "<input type='text' id='content' name='content' value='$row[artist_content]'>";?>
                            </td>
                        </tr>

                        <tr>
                            <td>Contact: </td>
                            <td>
                                <?php echo "<input type='text' id='contact' name='contact' value='$row[artist_contact]'>";?>
                            </td>

                            <td>Image: </td>
                            <td>
                                <?php echo "<input type='text' id='image' name='image' value='$row[artist_image]'>";?>
                            </td>

                            <td>Website: </td>
                            <td>
                                <?php echo "<input type='text' id='web' name='web' value='$row[artist_website]'>";?>
                            </td>
                        </tr>

                        <tr>
                            <td>Email: </td>
                            <td>
                                <?php echo "<input type='text' id='email' name='email' value='$row[artist_email]'>";?>
                            </td>
                            <?php echo "<input type='hidden' name='id' id='id' value='$row[artist_id]'>";?>
                            <?php echo "<input type='hidden' name='postid' id='postid' value='$row[posterID]'>";?>
                            <?php
                            if ($_SESSION['level'] == "10"){
                            ?>
                        </tr>

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
                <?php echo "<input type='hidden' name='id' id='id' value='$row[artist_id]'>";?>
            </form>
        <?php } ?>
        <a href="userCP.php" id="editButton">Return</a>
    </div>
</div>
</body>
</html>