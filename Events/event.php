   <?php 
	include("dbconnect.php")
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <title>Event Database</title>
    </head>
    
    <body>

    <a href="eventIndex.html">Home</a>
      
        <h1>Events</h1>
        <form id="insertEvent" name="insertEvent" method="post" action="dbprocessevent.php">

        <h2>Insert new Event:</h2>
        <fieldset class="subtleSet">

        <p>
        	<label for="name"><b>Name:</b> </label>
            <input type="text" name="name" id="name">
        </p>
        <p>
        	<label for="date"><b>Date:</b> </label>
            <input type="date" name="date" id="date">       
        </p>
        <p>
            <label for="venue"><b>Venue:</b> </label>
            <input type="text" name="venue" id="venue">
        </p>
        <p>
            <label for="time"><b>Time:</b> </label>
            <input type="text" name="time" id="time">
        </p>
        
        <p>
            <b>Description:</b><br>
            <textarea name="description" id="description" rows="5" cols="30"></textarea>
        </p>
        
        <p>
            <label for="phone"><b>Phone:</b> </label>
            <input type="integer" name="phone" id="phone">
        </p>
        
        <p>
            <label for="image"><b>Image:</b> </label>
            <input type="text" name="image" id="image">
        </p>
        
        <p>
        	<input type="submit" name="submit" id="submit" value="Insert">
        </p>
</fieldset>
</form>

<fieldset class="subtleSet">

<h2>Make Changes to an Existing Event: </h2>
<?php

$sql = "SELECT * FROM event_info";

foreach ($dbh->query($sql) as $row) {
?>
<form id="modifyForm" name="modifyForm" method="post" action="dbprocessevent.php">
<?php 
	echo "<table>
    <tr><td><b>Name:</b> </td><td><input type='text' name='name' value='$row[name]' /></td>
	<td><b>Date:</b> </td><td><input type='date' name='date' value='$row[date]' /></td>
    <td><b>Venue:</b> </td><td><input type='text' name='venue' value='$row[venue]' /></td>
  <tr><td><b>Time:</b> </td><td><input type='text' name='time' value='$row[time]' /></td>
    <td><b>Description:</b> </td><td><input type='text' name='description' value='$row[description]' /></td>
    <td><b>Phone:</b> </td><td><input type='integer' name='phone' value='$row[phone]' /></td></tr>
    <tr><td><b>Image:</b> </td><td><input type='text' name='image' value='$row[image]' /></td></tr>";
    echo "</table><input type='hidden' name='id' value='$row[id]' />";
	?>
    
    <input type="submit" name="submit" value="Update">
    <input type="submit" name="submit" value="Delete" class="delete">
</form>
    
    <?php
	}
	echo"</fieldset>\n";
	
	$dbh = null;
	?>
    <a href="eventIndex.html">Return to main page</a>
</body>
</html>