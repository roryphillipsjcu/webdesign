<?php
include ("dbConnect.php")
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>List of Artists</title>
</head>

<body>

<h1>List of Artists</h1>

<?php $sql = "SELECT * FROM artists";
foreach ($dbh->query($sql) as $row)
{
?>
    <table>
        <?php
        $index = $row[id];
        echo "  <tr><td><a href='dispArtist.php?i=$index'>$row[name]</a></td>
                <td><img src='$row[image]'></td>
                <td>$row[contact]</td></tr>";
        ?>
    </table>
<?php
}
?>
<a href="index.html">Return to main page</a>
</body>
</html>