<?php

//Add this on any pages that require a database connection
include("dbConnect.php");

//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

//Add artist

if ($_REQUEST['submit'] == "Add") {

    //Building and escaping an SQL query to add this artist to the database
    $sql = sprintf("INSERT INTO artists (artist_name, artist_phone, artist_content, artist_contact, artist_image, artist_website, artist_email, posterID)
                    VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '$_SESSION[userID]')",
        SQLite3::escapeString($_REQUEST[name]),
        SQLite3::escapeString($_REQUEST[phone]),
        SQLite3::escapeString($_REQUEST[content]),
        SQLite3::escapeString($_REQUEST[contact]),
        SQLite3::escapeString($_REQUEST[image]),
        SQLite3::escapeString($_REQUEST[web]),
        SQLite3::escapeString($_REQUEST[email])
        );

    //See if the SQL will execute
    if ($dbh->exec($sql)){
        header("Location: artistAdd.php");
        $_SESSION['log'] = "Successfully added $_REQUEST[name] to the database";
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

} elseif ($_REQUEST['submit'] == "Update") {

    //Building and escaping an SQL query to update this artist to the database
    $sql = sprintf("UPDATE artists SET artist_name = '%s', artist_phone = '%s', artist_content = '%s', artist_contact = '%s', artist_image = '%s', artist_website = '%s', artist_email = '%s'
                    WHERE artist_id = '$_REQUEST[id]'",
        SQLite3::escapeString($_REQUEST[name]),
        SQLite3::escapeString($_REQUEST[phone]),
        SQLite3::escapeString($_REQUEST[content]),
        SQLite3::escapeString($_REQUEST[contact]),
        SQLite3::escapeString($_REQUEST[image]),
        SQLite3::escapeString($_REQUEST[web]),
        SQLite3::escapeString($_REQUEST[email])
    );

    //See if the SQL will execute
    if ($dbh->exec($sql)){
        header("Location: artistEdit.php");
        $_SESSION['log'] = "Successfully updated $_REQUEST[name] to the database";
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

} elseif ($_REQUEST['submit'] == "Delete") {

    $sql = "DELETE FROM artists WHERE artist_id = '$_REQUEST[id]'";
    if ($dbh->exec($sql)) {
        header("Location: artistEdit.php");
        $_SESSION['log'] = "Successfully deleted $_REQUEST[name] from the database";
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

} else {

    $_SESSION['user_debug'] = "Unexpected error has occured!";

}
?>