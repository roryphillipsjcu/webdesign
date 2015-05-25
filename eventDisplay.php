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
    <?php

		$sql = "SELECT * FROM events WHERE event_date > date('now') ORDER BY event_date";

		echo "<table>";
		foreach ($dbh->query($sql) as $row) {
    	echo "  <tr><td>$row[event_name]</td></tr>
            <tr><td>$row[event_date]</td></tr>
            <tr><td>$row[event_venue]</td></tr>
            <tr><td>$row[event_time]</td></tr>
            <tr><td>$row[event_description]</td></tr>
            <tr><td>$row[event_phone]</td></tr>
            <tr><td>$row[event_image]</td></tr>";
		}
		echo "</table>";
	?>
    </div>


</div>
</body>
</html>