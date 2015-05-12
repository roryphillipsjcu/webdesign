<?php
try {
	$dbh = new PDO("sqlite:tmc.sqlite");
} catch (PDOException $e) {
	echo $e->getMessage();
}
?>