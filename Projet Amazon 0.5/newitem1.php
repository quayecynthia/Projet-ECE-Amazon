<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Accueil.css">

<script type="text/javascript">
$(document).ready(function(){
$('.header').height($(window).height());
});

	function afficherVar1() {
		if(document.variation1.categorie.selectedIndex == 3){
			<?php echo "oui"?>
			document.getElementById('afficher1').style.visibility = 'visible';
		}
		else{<?php echo "non"?>
			document.getElementById('afficher1').style.visibility = 'hidden';
		}
}
</script>

</head>
<body>
<nav class="navbar navbar-expand-md">

<a class="navbar-brand" href="Accueil.php">ECE Amazon</a>
<button class="navbar-toggler navbar-dark" type="button" datatoggle="collapse" data-target="#main-navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="main-navigation">
<ul class="navbar-nav">
<li class="nav-item"><a class="nav-link" href="ConnexionAdmin1.php">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="connexionvendeur.php">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>
<li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
</ul>
</div>

</nav>
	<h1> Ajouter un item sur ECE Amazon </h1>
				<form name = "variation1" action = "" method ="post">

		<table>
			<tr>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom"/></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><textarea type="text" name="description" rows=4 cols=25>Aucune description.</textarea></td>
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
				<td><select name="categorie" OnChange="afficherVar1();">
				<option value="Intro"> Sélectionner votre catégorie</option>
				<option value="Livres"> Livres</option>
				<option value="Musique"> Musique</option>
				<option value="Vetements"> Vêtements</option>
				<option value="Sport et Loisir"> Sport et Loisir</option>
				</select></td>
				</form>
			</tr>
			<tr>
				<span id = "afficher1" style = "visibility:hidden">
				<form action = "" method = "post">
				<td>Couleur: </td>
				<td>
					<select name="couleur">
						<option value="Intro"> Sélectionner la couleur</option>
						<option value="Rouge"> Rouge</option>
						<option value="Bleu"> Bleu</option>
						<option value="Vert"> Vert</option>
					</select>
				</td>
				</form>
				</span>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Ajouter un item"  />
				</td>
			</tr>
		</table>
</body>
</html>