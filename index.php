<!doctype html>
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

$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);
?>

<html lang="pl">
	<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div id="top">
		<div id="BODY">
			<header id="LOGO">Książka Adresowa</header>
			<nav id="LINKI">
			<!--LINKI-->
				<ul>
				<li><a href="index.php">Książka Adresowa</a></li>
				<li><a href="add_kart.html">Dodaj kontakt</a></li>
				</ul>
			<!--/LINKI-->
			</nav>

			<!--TRESC-->
		<div id="TRESC">
		<article class="ZAWARTOSC">
			<h1>Kontakty</h1>
					<div>
								<div>
									<table>
										<thead>
											<tr>
											<th width="200">Imię</th>
											<th width="200">Tel</th>
											<th width="200">Email</th>
											<th width="200">Adres</th>
											<th width="200">Grupa</th>
											<th width="200">Akcja</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										if (mysqli_num_rows($result) > 0) {
											while($contact = mysqli_fetch_assoc($result)) {
										?>
											<tr>
												<td><a href="#"><?php echo $contact["first_name"] ." ". $contact["last_name"]; ?></a></td>
												<td><?php echo $contact["phone"]; ?></td>
												<td><?php echo $contact["email"]; ?></td>
												<td>
													<ul>
														<li><?php echo $contact['address1']; ?></li>
														<li><?php echo $contact['address2']; ?></li>
														<li><?php echo $contact['zipcode'] ." ". $contact['city']; ?></li>
													</ul>
												</td>
												<td><?php echo $contact['contact_group']; ?></td>
												<td>
												<form action="edit_contact.php" method="post">
														<button name="id" value="<?php echo $contact['id'];?>">edytuj</button>
												</form>
												<form action="delete_contact.php" method="post">
													<button name="id" value="<?php echo $contact['id'];?>">usuń</button>
												</form>
												</td>
										<?php
											}
										} else {
											echo "0 results";
										}
										mysqli_close($conn);
										?>

										</tbody>
									</table>
								</div>
					</div>

					<!--/TRESC-->
		</article>
		</div>
			<footer id="STOPKA"><!--STOPKA-->&copy; <!--/STOPKA--></footer>
		</div>
	</div>
	</body>
</html>
