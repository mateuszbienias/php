<?php

$servername = 'localhost';
$dbname = 'addressbook';
$username = 'root';
$password = '';


$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (is_int((int)$_POST['id']) == True) {
	$id =  mysqli_real_escape_string($conn, $_POST['id']);
} else{
	echo "ID is not a num";
}

$sql = "SELECT * FROM contacts WHERE id='$id'";
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
				<li><a href="add_kart.html">Dodaj kartę</a></li>
				</ul>
			<!--/LINKI-->
			</nav>
			<div id="TRESC">
			<article class="ZAWARTOSC">
			<!--TRESC-->

			<form action="update_contact.php" method="post">
			<?php
			if ($result) {
				foreach($result as $contact) {
			?>
				<div>	
					<div>
						<label>id
							<input name="id" type="text" value="<?php echo $contact['id'];?>"/>
						</label>
					</div>
					<div>
						<label>Imie
							<input name="first_name" type="text" placeholder="Enter frist_name" value="<?php echo $contact['first_name'];?>" />
						</label>
					</div>
					<div>
						<label>Nazwisko
							<input name="last_name" type="text" placeholder="Enter last_name" value="<?php echo $contact['last_name'];?>" />
						</label>
					</div>
				</div>	
					<div>
						<label>Telefon
							<input name="phone" type="text" placeholder="Enter phone" value="<?php echo $contact['phone'];?>" />
						</label>
					</div>
					<div>
						<label>email
							<input name="email" type="text" placeholder="Enter email" value="<?php echo $contact['email'];?>" />
						</label>
					</div>
					
					<div>
						<div>
							<label>Adres 1
								<input name="address1" type="text" placeholder="Enter address1" value="<?php echo $contact['address1'];?>"/>
							</label>
						</div>
						<div>
							<label>Adres 2
								<input name="address2" type="text" placeholder="Enter address2" value="<?php echo $contact['address2'];?>"/>
							</label>
						</div>
					</div>
						<div>
							<label>Miasto
								<input name="city" type="text" placeholder="Enter city" value="<?php echo $contact['city'];?>"/>
							</label>
						</div>
						<div>
							<label>Kod pocztowy
								<input name="zipcode" type="text" placeholder="Enter zipcode" value="<?php echo $contact['zipcode'];?>" />
							</label>
						</div>
					<div>
						<label>Grupa
								<select name="contact_group">
									<option value="rodzina" <?php if($contact['contact_group'] == 'rodzina'){echo 'selected';} ?>>Rodzina</option>
									<option value="przyjaciele" <?php if($contact['contact_group'] == 'przyjaciele'){echo 'selected';} ?>>Przyjaciele</option>
									<option value="biznes" <?php if($contact['contact_group'] == 'biznes'){echo 'selected';} ?>>Biznes</option>
								</select>
						</label>
					</div>
					<div">
							  <label>Notes
								<textarea name="notes" placeholder="Enter Optional Notes"><?php echo $contact['notes']; ?></textarea>
							  </label>
					</div>
					<input name="submit" type="submit" value="Zapisz"></input>
			<?php
								} 
				} else {
					echo '0 result';
				}

				mysqli_close($conn);
			?>

			</form>

			<!--/TRESC-->
			</article>
			</div>
			<footer id="STOPKA"><!--STOPKA-->&copy; <!--/STOPKA--></footer>
		</div>
	</div>
	</body>
</html>

