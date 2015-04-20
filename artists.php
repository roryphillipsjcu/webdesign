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
    <div id="artists">
        <?php
        echo "  <a href='facebook.com'><p>$row[name]<br>
                <img src='$row[image]'><br>
                $row[contact]</p></a>
                <input type='hidden' id='id' value='$row[id]'>";
        ?>
    </div>
<?php
}
?>

</body>
</html>