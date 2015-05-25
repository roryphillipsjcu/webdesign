<?php

//Add this on any pages that require a database connection
include("dbConnect.php");

//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

//Add user Code

if ($_REQUEST['submit'] == "Add") {

    if ($_REQUEST[username] != ""){

        $sql = "SELECT account_user FROM auth";
        $multipleUser = false;

        //Search the database to ensure the username is not a duplicate
        foreach ($dbh->query($sql) as $row){
            if ($row[account_user] == $_REQUEST[username]) {
                $multipleUser = true;
            }
        }

        /*
         * as long as the username is not blank or a duplicate
         * Hash and salt the password, then add the user to the DB
         */

        //See if there are multiple users in the database
        if ($multipleUser == false) {
            $toHashStr = $_REQUEST[username].$_REQUEST[password];
            $toDBHash = md5($toHashStr);
            //Escape the string
            $sql = sprintf("INSERT INTO auth (account_username, account_password, account_level) VALUES ('%s', '$toDBHash' , '$_REQUEST[level]')",
                SQLite3::escapeString($_REQUEST[username]));

            //If the SQL executes
            if ($dbh->exec($sql)) {
                $_SESSION['log'] = "Successfully added $_REQUEST[username] to the database";
                header("Location: userCP.php");
            }
            //If the SQL fails
            else {
                $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
                $_SESSION['sql'] = $sql;
                header("Location: debug.php");
            }

        //If there are multiple users in the database
        } else {
            $_SESSION['user_debug'] = "Multiple users found in DB";
            header("Location: debug.php");
        }
    }
    //If the username is blank
    else {
        $_SESSION['user_debug'] = "Username is blank";
    }

//Update user Code
} elseif ($_REQUEST['submit'] == "Update") {

    $sql = sprintf("UPDATE auth SET account_username = '%s', account_level = '$_REQUEST[level]' WHERE account_id = '$_REQUEST[id]' ",
        SQLite3::escapeString($_REQUEST[username]));

    if ($dbh->exec($sql)){
        $_SESSION['log'] = "Successfully updated $_REQUEST[username] to the database";
        header("Location: userEdit.php");
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

//Delete user code
} elseif ($_REQUEST['submit'] == "Delete") {

    $sql = "DELETE FROM auth WHERE account_id = '$_REQUEST[id]'";
    if ($dbh->exec($sql)) {
        $_SESSION['log'] = "Successfully deleted $_REQUEST[username] from the database";
        header("Location: userEdit.php");
    } else {
        $_SESSION['user_debug'] = "SQL Command was not sucessfully executed";
        $_SESSION['sql'] = $sql;
        header("Location: debug.php");
    }

//If an unexpected error occurs
} else {

    $_SESSION['user_debug'] = "Unexpected error has occured!";

}
