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
        <h2>Make Changes to an Existing Event: </h2>
<?php

$sql = "SELECT * FROM events";

foreach ($dbh->query($sql) as $row) {
?>
<form id="modifyForm" name="modifyForm" method="post" action="eventProcess.php">
<?php 
	echo "<table>
    <tr><td><b>Name:</b> </td><td><input type='text' name='name' value='$row[event_name]' /></td>
	<td><b>Date:</b> </td><td><input type='date' name='date' value='$row[event_date]' /></td>
    <td><b>Venue:</b> </td><td><input type='text' name='venue' value='$row[event_venue]' /></td>
  <tr><td><b>Time:</b> </td><td><input type='text' name='time' value='$row[event_time]' /></td>
    <td><b>Description:</b> </td><td><input type='text' name='description' value='$row[event_description]' /></td>
    <td><b>Phone:</b> </td><td><input type='integer' name='phone' value='$row[event_phone]' /></td></tr>
    <tr><td><b>Image:</b> </td><td><input type='text' name='image' value='$row[event_image]' /></td></tr>";
    echo "</table><input type='hidden' name='id' value='$row[event_id]' />";
	?>
    
    <input type="submit" name="submit" value="Update">
    <input type="submit" name="submit" value="Delete" class="delete">
</form>
    
    <?php
	}
	echo"</fieldset>\n";
	
	$dbh = null;
	?>
    
    <a href="userCP.php">Return</a>
    </div>


</div>
</body>
</html>