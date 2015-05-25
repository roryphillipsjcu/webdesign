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
         <a href="eventAdd.php">Create New Event</a>
      </li>
      <li>
         <a href="userCP.php">Home</a>
      </li>
 </ul>
<h1>Results</h1>
<?php
echo "<h2>Form Data</h2>";
echo "<pre>";
print_r($_REQUEST); 
echo "</pre>";


if ($_REQUEST['submit'] == "Delete") {
        $sql = "DELETE FROM events WHERE id = '$_REQUEST[event_id]'";
        if ($dbh->exec($sql)) header("Location: eventEdit.php");
    }
	if ($_REQUEST['submit'] == "Insert") {
		$sql = "INSERT INTO events (event_name, event_date, event_venue, event_time, event_description, event_phone, event_image) VALUES ('$_REQUEST[name]', '$_REQUEST[date]', '$_REQUEST[venue]','$_REQUEST[time]','$_REQUEST[description]','$_REQUEST[phone]','$_REQUEST[image]')";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql)) { 
			header("Location: userCP.php");
		} else {
			echo "Not Inserted";
		}
	} else if ($_REQUEST['submit'] == "Update") {
		$sql = "UPDATE events SET event_name = '$_REQUEST[name]', event_date = '$_REQUEST[date]', event_venue = '$_REQUEST[venue]', event_time = '$_REQUEST[time]', event_description = '$_REQUEST[description]', event_phone = '$_REQUEST[phone]', event_image = '$_REQUEST[image]' WHERE event_id = '$_REQUEST[id]'";
		echo "<p>Query:" . $sql . "</p>\n<p><strong>";
		if ($dbh->exec($sql)){
			header("Location: eventEdit.php");
		}else{
			echo "Not Inserted";
		}
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