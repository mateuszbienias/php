<?php

$servername = 'localhost';
$dbname = 'addressbook';
$username = 'root';
$password = '';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
<<<<<<< HEAD

// Check id
if (is_int((int)$_REQUEST['id']) == True) {
	$id =  mysqli_real_escape_string($conn, $_REQUEST['id']);
} else{
	echo "ID is not a num";
}
=======
// w takich miejsca warto zwalidować czy id  jest faktycznie tym czego się spodziewamy. w tym wypadkuy integerem
// w innych miejscach użyłeś więc zakładam, że tu zapomniałeś o mysqli_real_escape_string :) 
$id = $_REQUEST['id'];
>>>>>>> 0ead1154cf6aa600993aa0e9c378c3212b22f49d

// Attempt insert query execution
$sql = "DELETE FROM contacts WHERE id='$id'";
if(mysqli_query($conn, $sql)){
	echo header('Location: http://localhost/addressbook_new/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
<<<<<<< HEAD
=======


?>
>>>>>>> 0ead1154cf6aa600993aa0e9c378c3212b22f49d
