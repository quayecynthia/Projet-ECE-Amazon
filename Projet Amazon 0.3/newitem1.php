<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Création nouveau item</title>
</head>
<body>
	<h1> Ajouter un item sur ECE Amazon </h1>
	<form action="newitem.php" method="post">
		<table>
			<tr>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom"/></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><input type="text" name="description"/></td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
    			<td><input type="file" id="fond" name="photo" accept="image/png, image/jpeg"></td>
			</tr>
			<tr>
			<tr>
				<td>Prix</td>
				<td><input type="text" name="prix"/></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td><input type="text" name="stock"/></td>
			</tr>
			<tr>
				<td>Catégorie:</td>
				<label for="categorie"></label>
				<td><select name="categorie" id="categorie">
				<option value="Intro"> Sélectionner votre catégorie</option>
				<option value="Livres"> Livres</option>
				<option value="Musique"> Musique</option>
				<option value="Vetements"> Vêtements</option>
				<option value="Sport et Loisir"> Sport et Loisir</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Ajouter un item"  />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>