<?php

include('dbConnect.php');

//Start the session
session_start();

error_reporting(E_CORE_ERROR);

//Report all error messages

$_SESSION['num_Notices'] = 3;
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TMC - Home</title>
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

        <div id="leftBar">
            <h1>About Us</h1>
        </div>

        <div id="rightBar">

            <div id="notices">
                <?php //notice widget goes here
				
				$homeNotice = 3;
				
				$sql = "SELECT notice_name, notice_detail FROM notice ORDER BY notice_expiry ASC";
				
				$i = 0;
				foreach($dbh->query($sql) as $row) {
                        if ($i < $homeNotice) {
                            $i++;
                            $index = $row['notice_id'];
                            echo "	<h3><a href='noticeDetail.php?i=$index'>$row[notice_name]</a></h3>
								<p>$row[notice_detail]</p>";
                        }
				}				
				 ?>
            </div>
            <div>
                <?php if (!isset($_SESSION['username'])){ ?>
                <h2><a href="login.php">Not a Member? Sign up Here</a></h2>
                <?php } ?>
            </div>
        </div>

    </div>


</div>
</body>
</html>