<?php
require("authenticate.php");

//Check if the logged in user is an admin
if ($_SESSION['level'] == "1"){
    header("Location: userHome.php");
}


?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Music Centre - New Artist</title>
</head>

<body>
<h1>The Music Centre</h1>

<h2>Add new Artist</h2>
<?php

if (isset($_SESSION['log'])){
echo "<p>$_SESSION[log]</p>";
}

?>
<form id="newForm" method="post" action="artistProcess.php">
    <p>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone">
    </p>
    <p>
        <label for="content">Content: </label>
        <input type="text" name="content" id="content">
    </p>
    <p>
        <label for="contact">Contact Name: </label>
        <input type="text" name="contact" id="contact">
    </p>

    <p>
        <label for="image">Image: </label>
        <input type="text" name="image" id="image">
    </p>

    <p>
        <label for="web">Website: </label>
        <input type="text" name="web" id="web">
    </p>

    <p>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
    </p>

    <p>
        <input type="submit" name="submit" id="submit" value="Add">
    </p>
</form>
<a href="userHome.php">Return</a>
</body>
</html>