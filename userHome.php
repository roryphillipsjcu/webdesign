<?php
require("authenticate.php");
include("dbConnect.php");
/*
Using require to save time and not have to duplicate code
authenticate will be used on all pages that are being protected
dbConnect will be used on all pages that require a sqlite connection

if users are not authenticated they will have to login before they can
access the page
*/

if (isset($_SESSION['log'])){
    $_SESSION['log'] = "";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Music Centre - User Home</title>
</head>

<body>

<h1>The Music Centre</h1>
<h2>Signed In Home</h2>
<?php

if ($_SESSION['level'] >= "1") {

    /*
     *
     * TODO Registered User Home Page
     * Add links to submit notices
     * Add link to edit their notices
     *
    */

?>

    <a href="noticeAdd.php">Add new Notice</a><br>
    <a href="noticeEdit.php">Manage a Notice</a><br>

<?php

} if ($_SESSION['level'] >= "2") {

    /*
    *
    * TODO Paid User Home Page
    * Add link to submit a new artist
    * Add link to edit artists they create
    *
    *
    */

?>

    <a href="artistAdd.php">Add new Artist</a><br>
    <a href="artistEdit.php">Manage an Artist</a><br>

<?php

} if ($_SESSION['level'] == "10") {

    /*
    *
    * TODO Administrator User Home Page
    * Add link to create new users
    * Add link to edit any users
    *
   */

?>

    <a href="userAdd.php">Add new User</a><br>
    <a href="userEdit.php">Manage a User</a><br>

<?php } ?>

<a href="logout.php">Logout</a>

</body>
</html>