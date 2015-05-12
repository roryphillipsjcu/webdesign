<?php
require ("authenticate.php");
include ("dbConnect.php");

if ($_SESSION['level'] == "1"){
    header("Location: userHome.php");
}
?>

<!doctype html>
<html>

<head>

    <title>The Music Centre - Artists</title>

</head>

<body>

    <h1>The Music Centre</h1>
    <h2>Manage Artists</h2>

    <?php
    if (isset($_SESSION['log'])){
        echo "<p>$_SESSION[log]</p>";
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
                    <td>Created By: </td>

                    <td><?php
                        $sql = "SELECT account_username FROM auth WHERE account_id = '$row[posterID]'";
                        foreach ($dbh->query($sql) as $name){
                            $username = $name['account_username'];
                        }
                        echo $username;
                        ?></td>
                    <td>
                        <input type="submit" name="submit" id="submit" value="Update">
                    </td>

                    <td>
                        <input type="submit" name="submit" id="submit" value="Delete">
                    </td>
                    <?php } ?>
                </tr>
            </table>
            </fieldset>
            <?php echo "<input type='hidden' name='id' id='id' value='$row[artist_id]'>";?>
        </form>
    <?php } ?>

    <a href="userHome.php">Return</a>

</body>

</html>