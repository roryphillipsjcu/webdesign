<?php
    include("dbconnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Details</title>
</head>
<body>

<ul>
     <li>
         <a href="event.php">Create/Modify Event</a>
      </li>
      <li>
         <a href="eventIndex.html">Home</a>
      </li>
 </ul>
 <h1>Events</h1>
 


<?php

$sql = "SELECT * FROM event_info WHERE date > date('now') ORDER BY date";

echo "<table>";
foreach ($dbh->query($sql) as $row) {
    echo "  <tr><td>$row[name]</td></tr>
            <tr><td>$row[date]</td></tr>
            <tr><td>$row[venue]</td></tr>
            <tr><td>$row[time]</td></tr>
            <tr><td>$row[description]</td></tr>
            <tr><td>$row[phone]</td></tr>
            <tr><td>$row[image]</td></tr>";
}
echo "</table>";
?>
</body>
</html>

