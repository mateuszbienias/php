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

$first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$address1 = mysqli_real_escape_string($conn, $_REQUEST['address1']);
$address2 = mysqli_real_escape_string($conn, $_REQUEST['address2']);
$city = mysqli_real_escape_string($conn, $_REQUEST['city']);
$zipcode = mysqli_real_escape_string($conn, $_REQUEST['zipcode']);
$contact_group = mysqli_real_escape_string($conn, $_REQUEST['contact_group']);
$notes = mysqli_real_escape_string($conn, $_REQUEST['notes']);
$id = $_REQUEST['id'];

// Attempt insert query execution
$sql = "UPDATE contacts SET 
		first_name='$first_name', 
		last_name='$last_name', 
		email='$email', 
		phone='$phone', 
		address1='$address1', 
		address2='$address2', 
		city='$city', 
		zipcode='$zipcode', 
		contact_group='$contact_group', 
		notes='$notes'
		WHERE id='$id'";
if(mysqli_query($conn, $sql)){
    echo header('Location: http://localhost/addressbook_new/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);