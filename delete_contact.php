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

// Check id
if (is_int((int)$_REQUEST['id']) == True) {
	$id =  mysqli_real_escape_string($conn, $_REQUEST['id']);
} else{
	echo "ID is not a num";
}

// Attempt insert query execution
$sql = "DELETE FROM contacts WHERE id='$id'";
if(mysqli_query($conn, $sql)){
	echo header('Location: http://localhost/addressbook_new/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
