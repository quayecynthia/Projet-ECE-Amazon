<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Création nouveau Vendeur</title>
</head>
<body>
	<h1> Créer un compte vendeur sur ECE Amazon </h1>
	<form action="NewVendeur.php" method="post">
		<table>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="email"/></td>
			</tr>
			<tr>
			<tr>
				<td>Pseudo:</td>
				<td><input type="text" name="pseudo"/></td>
			</tr>
			<tr>
				<td>Mot de passe:</td>
				<td><input type="password" name="mdp"/></td>
			</tr>
			<tr>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom"/></td>
			</tr>
			<tr>
			<tr>
				<td>Prénom:</td>
				<td><input type="text" name="prenom"/></td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
    			<td><input type="file" id="fond" name="photo" accept="image/png, image/jpeg"></td>
			</tr>
			<tr>
			<tr>
				<td>Fond:</td>
    			<td><input type="file" id="fond" name="fond" accept="image/png, image/jpeg"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="S'inscire"  />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>