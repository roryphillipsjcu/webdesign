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
    $sql = sprintf("INSERT INTO notice (notice_name, notice_detail, notice_expiry, posterID)
                    VALUES ('%s', '%s', '$_REQUEST[expiry]', '$_SESSION[userID]')",
        SQLite3::escapeString($_REQUEST[name]),
        SQLite3::escapeString($_REQUEST[detail])
    );

    //See if the SQL will execute
    if ($dbh->exec($sql)){
        header("Location: noticeAdd.php");
        $_SESSION['log'] = "Successfully added $_REQUEST[name] to the database";
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

} elseif ($_REQUEST['submit'] == "Update") {

    //Building and escaping an SQL query to update this artist to the database
    $sql = sprintf("UPDATE notice SET notice_name = '%s', notice_detail = '%s', notice_expiry = '$_REQUEST[expiry]', posterID = '$_SESSION[userID]'",
        SQLite3::escapeString($_REQUEST[name]),
        SQLite3::escapeString($_REQUEST[detail])
    );

    //See if the SQL will execute
    if ($dbh->exec($sql)){
        header("Location: noticeEdit.php");
        $_SESSION['log'] = "Successfully updated $_REQUEST[name] to the database";
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

} elseif ($_REQUEST['submit'] == "Delete") {

    $sql = "DELETE FROM notice WHERE notice_id = '$_REQUEST[id]'";
    if ($dbh->exec($sql)) {
        header("Location: noticeEdit.php");
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