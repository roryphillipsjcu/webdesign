<?php

include("dbconnect.php");
$debugOn = true;

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Results Page</title>
</head>

<body>
<ul>
     <li>
         <a href="event.php">Create New Event</a>
      </li>
      <li>
         <a href="eventIndex.html">Home</a>
      </li>
 </ul>
<h1>Results</h1>
<?php
echo "<h2>Form Data</h2>";
echo "<pre>";
print_r($_REQUEST); 
echo "</pre>";


if ($_REQUEST['submit'] == "Delete") {
        $sql = "DELETE FROM event_info WHERE id = '$_REQUEST[id]'";
        if ($dbh->exec($sql)) header("Location: event.php");
    }
	if ($_REQUEST['submit'] == "Insert") {
		$sql = "INSERT INTO event_info (name, date, venue, time, description, phone, image) VALUES ('$_REQUEST[name]', '$_REQUEST[date]', '$_REQUEST[venue]','$_REQUEST[time]','$_REQUEST[description]','$_REQUEST[phone]','$_REQUEST[image]')";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql))
			echo "Inserted $_REQUEST[name]";
		else
			echo "Not Inserted";
        } else if ($_REQUEST['submit'] == "Update") {
		$sql = "UPDATE event_info SET name = '$_REQUEST[name]', date = '$_REQUEST[date]', venue = '$_REQUEST[venue]', time = '$_REQUEST[time]', description = '$_REQUEST[description]', phone = '$_REQUEST[phone]', image = '$_REQUEST[image]' WHERE id = '$_REQUEST[id]'";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql))
			echo "Inserted $_REQUEST[name]";
		else
			echo "Not Inserted";
    }
    else {
		echo "Invalid form submission.<br/>\n";
	}
	echo "</strong></p>\n";
    echo "<h2>Event in Database Now</h2>\n";
	$sql = "SELECT * FROM event_info";
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
		print $row[name] .' - '. $row[date] .' - '. $row[venue] .' - '. $row[time] .' - '. $row[description] .' - '. $row[phone] .' - '. $row[image] .' - '. $row[id] . "<br/>\n";
	}
	
	
	$dbh = null;
	?>
	<p><a href="event.php">Back</a></p>
</body>
</html>