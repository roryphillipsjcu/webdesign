<?php
    include("dbConnect.php");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Artist Detail</title>
</head>
<body>

<h1>Artist Detail</h1>

<?php
$id = $_GET['i'];
$sql = "SELECT * FROM artists WHERE id='$id'";

echo "<table>";
foreach ($dbh->query($sql) as $row) {
    echo "  <tr><td>Name: </td><td>$row[name]</td></tr>
            <tr><td>Phone: </td><td>$row[phone]</td></tr>
            <tr><td>Content: </td><td>$row[content]</td></tr>
            <tr><td>Contact: </td><td>$row[contact]</td></tr>
            <tr><td>Image: </td><td><img src='$row[image]'></td></tr>
            <tr><td>Web: </td><td>$row[web]</td></tr>
            <tr><td>Email: </td><td>$row[email]</td></tr>";
}
echo "</table>";
?>

<a href="artists.php">Return to artists</a>
</body>