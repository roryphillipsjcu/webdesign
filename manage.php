<?php 
	/* Connect to the databse */
	include("dbConnect.php")
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <title>Artists Database Management</title>
    </head>
    
    <body>

        <h1>Artists Database Management</h1>
        <a href="index.html">Return to main page</a>
        <form id="insertArtist" name="insertArtist" method="post" action="dbprocess.php">

        <h2>Insert new Artist:</h2>
        <fieldset class="subtleSet">

        <p>
        	<label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </p>
        <p>
        	<label for="phone">Phone: </label>
            <input type="number" name="phone" id="phone">       
        </p>
        <p>
            <label for="content">Content: </label>
            <input type="text" name="content" id="content">
        </p>
        <p>
            <label for="contact">Contact Name: </label>
            <input type="text" name="contact" id="contact">
        </p>
        
        <p>
            <label for="image">Image: </label>
            <input type="text" name="image" id="image">
        </p>
        
        <p>
            <label for="web">Website: </label>
            <input type="text" name="web" id="web">
        </p>
        
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email">
        </p>
        
        <p>
        	<input type="submit" name="submit" id="submit" value="Insert">
        </p>
        </form>
        </fieldset>
        <h2>Modify Existing Artist: </h2>
        <?php $sql = "SELECT * FROM artists";
	   foreach ($dbh->query($sql) as $row) {	
	   ?>
           <fieldset class="subtleSet"
        <form id="modifyForm" name="modifyForm" method="post" action="dbprocess.php">
    <?php 
	echo "<table>
    <tr><td>Name: </td><td><input type='text' name='name' value='$row[name]' /></td>
	<td>Phone: </td><td><input type='text' name='phone' value='$row[phone]' /></td>
    <td>Content: </td><td><input type='text' name='phone' value='$row[content]' /></td>
    <tr><td>Contact: </td><td><input type='text' name='phone' value='$row[contact]' /></td>
    <td>Image: </td><td><input type='text' name='phone' value='$row[image]' /></td>
    <td>Web: </td><td><input type='text' name='phone' value='$row[web]' /></td></tr>
    <tr><td>Email: </td><td><input type='text' name='phone' value='$row[email]' /></td></tr>";
    echo "</table><input type='hidden' name='id' value='$row[id]' />";
	?>
    
    <input type="submit" name="submit" value="Update">
    <input type="submit" name="submit" value="Delete" class="delete">
    </fieldset>
   </form>
    
    <?php
	}
	//close DB
	$dbh = null;
	?>
        <a href="index.html">Return to main page</a>
    </body>
</html>