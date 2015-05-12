<?php
/**
 * Created by PhpStorm.
 * User: Rory
 * Date: 12-May-15
 * Time: 17:25
 */

//Start the session
session_start();

//Report all error messages
error_reporting(E_ALL);

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Debug Page</title>
</head>

<body>
    <h1>Debug Page</h1>

<?php
/*	<DEBUG>
Display the session data
*/ ?>
<p>Here is the session data:</p>
<pre>
    <?php print_r($_SESSION); ?>
</pre>
<?php
/* </DEBUG>
*/
?>

<a href="userHome.php">Return to the home page</a>
</body>

</html>