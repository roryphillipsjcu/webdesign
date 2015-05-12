<?php
require("authenticate.php");

//Check if the logged in user is an admin
if ($_SESSION['level'] != '10'){
    header("Location: userHome.php");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>The Music Centre - New User</title>
</head>

<body>
<h1>The Music Centre</h1>

<h2>Add new User</h2>
<?php

if (isset($_SESSION['log'])){
    echo "<p>$_SESSION[log]</p>";
}

?>
<form id="newForm" method="post" action="userProcess.php">
    <fieldset>
        <table>
            <tr>
                <td>Username: </td>
                <td>
                    <input type="text" id="username" name="username">
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
            <tr>
                <td>Account Level: </td>
                <td>
                    <select id="level" name="level">
                        <option value = '1'>Free user</option>
                        <option value = '2'>Paid user</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="submit" name="submit" value="Add">
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<a href="userHome.php">Return</a>
</body>
</html>