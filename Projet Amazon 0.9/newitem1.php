<?php
session_start();
$_SESSION['nom_item'] = "";
$_SESSION['description'] = "";
$_SESSION['photo_item'] = "";
$_SESSION['stock'] = "";
$_SESSION['prix'] = "";
$_SESSION['categorie'] = "";

include('header.php');
?>
	<h1> Ajouter un item sur ECE Amazon </h1>
	<form action = "NewItemTraitement.php" method ="post">

		<table>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom"/></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><textarea type="text" name="description" rows=4 cols=25></textarea></td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
    			<td><input type="file" id="fond" name="photo" accept="image/png, image/jpeg"></td>
			</tr>
			<tr>
			<tr>
				<td>Prix</td>
				<td><input type="number" name="prix"/></td>
			</tr>
			<tr>
				<td>Stock</td>
				<td><input type="number" name="stock"/></td>
			</tr>
			<tr>
				<td>Catégorie: </td>
				<td><select name="categorie">
				<option value="Intro"> Sélectionner votre catégorie</option>
				<option value="Livres"> Livres</option>
				<option value="Musique"> Musique</option>
				<option value="Vetements-Chaussures"> Vêtements-Chaussures</option>
				<option value="Vetements-Habits"> Vêtements-Habits</option>
				<option value="Sport et Loisir"> Sport et Loisir</option>
				</select></td>
				</form>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Ajouter un item"  />
				</td>
			</tr>
		</table>
</body>
</html>