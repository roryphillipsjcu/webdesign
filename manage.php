<?php 
	/* Connect to the databse */
	include("dbConnect.php")
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Artists Database Management</title>
    </head>
    
    <body>
        <h1>Artists Database Management</h1>
        
        <form id="insertArtist" name="insertArtist" method="post" action="dbprocess.php">
    
        <fieldset class="subtleSet">
    	<h2>Insert new Artist:</h2>
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
        	<input type="submit" name="submit" id="submit" value="Insert Entry">
        </p>
        </form>
        <h2>Modify Existing Artist: </h2>
        <?php $sql = "SELECT * FROM artists";
	   foreach ($dbh->query($sql) as $row) {	
	   ?>
        <form id="modifyForm" name="modifyForm" method="post" action="dbprocess.php">
    <?php 
	echo "
    <label for='name'>Name: </label>
    <input type='text' name='name' value='$row[name]' />
	<label for='phone'>Phone: </label>
	<input type='text' name='phone' value='$row[phone]' />
    <label for='content'>Content: </label>
    <input type='text' name='content' value='$row[content]' />
    <label for='contact'>Contact: </label>
    <input type='text' name='contact' value='$row[contact]' />
    <label for='image'>Image: </label>
    <input type='text' name='image' value='$row[image]' />
    <label for='web'>Web address: </label>
    <input type='text' name='web' value='$row[web]' />
    <label for='email'>Email: </label>
    <input type='text' name='email' value='$row[email]' /> ";
    echo "<input type='hidden' name='id' value='$row[id]' />";
	?>
    
    <input type="submit" name="submit" value="Update Entry">
    <input type="submit" name="submit" value="Delete Entry" class="deleteButton">
   </form>
    
    <?php
	}
	echo "</fieldset>\n";
	//close DB
	$dbh = null;
	?>
        <a href="index.html">Return to main page</a>
    </body>
</html>