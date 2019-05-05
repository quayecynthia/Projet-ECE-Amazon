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
		if(document.variation1.categorie.selectedIndex == 2){
			document.getElementById('cate').style.display = 'block';
		}
		else{
			document.getElementById('cate').style.display = 'none';
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
	<form name="variation1" action="" method="post">
 
 <table>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom"/></td>
			</tr>

			<tr>
				<td>Description:</td>
				<td><textarea type="text" name="description" rows=4 cols=25>Aucune description.</textarea></td>
			</tr>
			<tr>
				<td>Photo:</td>
    			<td><input type="file" id="fond" name="photo" accept="image/png, image/jpeg"></td>
			</tr>
			<tr>
				<td>Prix</td>
				<td><input type="number" name="prix"/></td>
			</tr>

			<tr>
				<td><label><strong>Votre activité :</strong></label> <select name="categorie" OnChange="afficherVar1();">
 
					<option value="particulier">Particulier</option>
					<option value="association">Association</option>
					<option value="entreprise">Entreprise</option>
                                               		</select>
                </td>
            </tr>  
</table>

<input type="text" name="cate" style="display:none">

</form>
</span>
</form>
</body>
</html>