<?php session_start();
//	This file simply unsets the session variables we're using to authenticate & destroys the session
	session_unset();
	session_destroy();
?>
<!doctype html>
<html>
<head>
<title>Forms Test Entry Page</title>
<link href="styles.css" rel="stylesheet">
</head>

<body>
<h1>Logged out</h1>
<p>Goodbye.</p>

<a href="login.php">Login</a>

<?php
header("Location: index.php")
?>
</body></html>
