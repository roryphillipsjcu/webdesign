<?php

include("dbConnect.php");
//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

//Check the user is not logged in
if (!isset($_SESSION['username'])) {
	
	//Check that we came from a form
	if (isset($_REQUEST['username'])) {
		
		//Check we came from the login form
		if ($_REQUEST['submit'] == "Login"){

            $user = $_REQUEST['username'];
            $pass = $_REQUEST['password'];
			
			/* Check that the user credentials added are correct.
			We are doing this by building a SQL query that will get
			the account_id for the username entered, and then getting
			the account_password (in a hash form) for the account_id
			that was retrieved. In all cases we will be escaping any
			user inputs that is submited to prevent SQL injection
			and other security/integrity issues */
			
			$sql = sprintf("SELECT * FROM auth WHERE account_username = '%s'",
			SQLite3::escapeString($user));
			
			$validUser = false;
			foreach ($dbh ->query($sql) as $result) {



                $inputToHash = $user.$pass;
				$inputHash = md5($inputToHash);
				$fromDBHash = $result['account_password'];

                //DEBUG
                $_SESSION['inHash'] = $inputHash;
                $_SESSION['dbHash'] = $fromDBHash;
				
				//Check the hashes. They are the same if the input was the same
				if ($inputHash === $fromDBHash) {
					$validUser = true;
                    $actLevel = $result['account_level'];
                    $id = $result['account_id'];
				}
			}
			
			if ($validUser == true) {
				$_SESSION['username'] = $user;
				$_SESSION['msg'] = "Logged In!";
                $_SESSION['level'] = $actLevel;
                $_SESSION['userID'] = $id;
				
				//Generate a new session ID for the successful login
				session_regenerate_id();
			} else {
				$_SESSION['msg'] = "Invalid username and/or password!";
				
				//redirect to the login page, protecting the current page
				header("Location: login.php");
				exit();				
			}
		} else {
			$_SESSION['msg'] = "You must use OUR login page to login";
			
			//Redirect
			header("Location: login.php");
			exit();	
		}
				
	} else {
		$_SESSION['msg'] = "You must log in first";
		
		//Redirect
		header("Location: login.php");
		exit();	
	}
	
}
?>