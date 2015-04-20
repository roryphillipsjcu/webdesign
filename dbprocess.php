<?php
include("dbConnect.php");
$debugOn = true;

if ($_REQUEST['submit'] == "Delete Entry") {
	$sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
	if ($dbh->exec($sql)) header("Location: manage.php");
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
    <title>Artists</title>
</head>

<body>
	<h1>Results</h1>
    <?php
	echo "<h2>Form Data</h2>";
	echo "<pre>";
	print_r($_REQUEST);
	echo "</pre>";
	
	if ($_REQUEST['submit'] == "Insert Entry") {
		$sql = "INSERT INTO artists (name, phone, content, contact, image, web, email) VALUES ('$_REQUEST[name]', '$_REQUEST[phone]', '$_REQUEST[content]','$_REQUEST[contact]','$_REQUEST[image]','$_REQUEST[web]','$_REQUEST[email]')";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql))
			echo "Inserted $_REQUEST[name]";
		else
			echo "Not Inserted";
        } else if ($_REQUEST['submit'] == "Update Entry") {
		$sql = "UPDATE artists SET name = '$_REQUEST[name]', phone = '$_REQUEST[phone]', content = '$_REQUEST[content]', contact = '$_REQUEST[contact]', image = '$_REQUEST[image]', web = '$_REQUEST[web]', email = '$_REQUEST[email]' WHERE id = '$_REQUEST[id]'";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql))
			echo "Inserted $_REQUEST[name]";
		else
			echo "Not Inserted";
    }
    else {
		echo "This page did not come from a a valid form submission.<br/>\n";
	}
	echo "</strong></p>\n";
    echo "<h2>Artist Records in Database Now</h2>\n";
	$sql = "SELECT * FROM artists";
	$result = $dbh->query($sql);
	$resultCopy = $result;
	
	if ($debugOn) {
		echo "<pre>";	
		$rows = $result->fetchall(PDO::FETCH_ASSOC);
		echo count($rows) . " records in table<br />\n";
		print_r($rows);
		echo "</pre>";
		echo "<br />\n";
	}
	foreach ($dbh->query($sql) as $row)
	{
		print $row[name] .' - '. $row[phone] .' - '. $row[content] .' - '. $row[contact] .' - '. $row[image] .' - '. $row[web] .' - '. $row[email] .' - '. $row[id] . "<br/>\n";
	}
	
	// close the database connection 
	$dbh = null;
	?>
	<p><a href="manage.php">Return to database test page</a></p>
</body>
</html>