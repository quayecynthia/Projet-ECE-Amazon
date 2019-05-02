<?php
session_start();
$_SESSION['verif']=0;
echo $_SESSION['verif'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Compte Vendeur</title>
</head>
<body>
	<form action="Vendeur.php" method="post">
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
				<td colspan="2" align="center">
				<input type="submit" value="Connection" />
				</td>
			</tr>
			<tr>
				<td><a href="NewVendeur1.php">Pas de compte ?</a></td>
			</tr>
		</table>
	</form>
</body>
</html>