
<?php

$servername = 'localhost';
$dbname = 'addressbook';
$username = 'root';
$password = '';

<<<<<<< HEAD
=======
// chyba zapomniany var_dump
var_dump($_POST);
>>>>>>> 0ead1154cf6aa600993aa0e9c378c3212b22f49d

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

// Attempt insert query execution
// Czy to działa? w valuse jest '$first_name' zmienna w pojedynczych ciapkach, w ten sposób zmienna raczej nie bedzie podstawiona
$sql = "INSERT INTO contacts (first_name, last_name, email, phone, address1, address2, city, zipcode, contact_group, notes) 
VALUES ('$first_name', '$last_name', '$email', '$phone', '$address1', '$address2', '$city', '$zipcode', '$contact_group', '$notes')";
if(mysqli_query($conn, $sql)){
    echo header('Location: http://localhost/addressbook_new/index.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
<<<<<<< HEAD
mysqli_close($conn);
=======
mysqli_close($conn);
?>
>>>>>>> 0ead1154cf6aa600993aa0e9c378c3212b22f49d
