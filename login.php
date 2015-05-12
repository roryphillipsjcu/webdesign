<?php
//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Music Centre - Login</title>
</head>

<body>
	<h1>The Music Centre</h1>
	<h2>Login</h2>
    
    <?php
	
	//If the user is not logged in display the login form
	if (!isset($_SESSION['username'])) {
	?>
    
    <form id="loginForm" method="post" action="userHome.php">
    	<label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Login">
	</form>
    <?php } ?>
    
    <nav>
    	<a href="index.html">Home</a>
        <?php if (isset($_SESSION['username']))
			echo '<a href="logout.php">Logout</a>';
		?>
    </nav>
</body>
</html>