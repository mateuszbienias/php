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
// w takich miejsca warto zwalidować czy id  jest faktycznie tym czego się spodziewamy. w tym wypadkuy integerem
// w innych miejscach użyłeś więc zakładam, że tu zapomniałeś o mysqli_real_escape_string :) 
$id = $_REQUEST['id'];

// Attempt insert query execution
$sql = "DELETE FROM contacts WHERE id='$id'";
if(mysqli_query($conn, $sql)){
    echo header('Location: http://localhost/addressbook_new/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);


?>
