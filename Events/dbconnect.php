<?php
try {
    $dbh = new PDO("sqlite:events.sqlite"); 
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>