<?php
session_start();
$_SESSION['error_message'] = "";
if(!isset($_SESSION['connected'])) $_SESSION['connected'] = '0';
if(!isset($_SESSION['nom_connected'])) $_SESSION['nom_connected'] = "";
if(!isset($_SESSION['prenom_connected'])) $_SESSION['prenom_connected'] = "";
if(!isset($_SESSION['email_connected'])) $_SESSION['email_connected'] = "";
if(!isset($_SESSION['image_connected'])) $_SESSION['image_connected'] = "";
if(!isset($_SESSION['admin'])) $_SESSION['admin'] = '0';
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
</script>

</head>
<body>
<nav class="navbar navbar-expand-md">

<?php
if($_SESSION['connected']==2){
	$connexion = 1;
}
else{
	$connexion = 0;
}
?>


<a class="navbar-brand" href="Accueil.php">ECE Amazon</a>

<button class="navbar-toggler navbar-dark" type="button" datatoggle="collapse" data-target="#main-navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="main-navigation">
<ul class="navbar-nav">
<?php

if($connexion && $_SESSION['image_connected']=="") echo '<li class="nav-item"><a class="nav-link" href="#">Bienvenue, '.$_SESSION['prenom_connected'].' '.$_SESSION['nom_connected'].'</li>';
else if($connexion && $_SESSION['image_connected']!="") echo '<li class="nav-item"><a class="nav-link" href="#">Bienvenue, '.$_SESSION['prenom_connected'].' '.$_SESSION['nom_connected'].' <img src='. $_SESSION['image_connected']. ' alt="Image non trouvée" height="30" width ="30"/></a></li>';

?>
<li class="nav-item"><a class="nav-link" href="ConnexionAdmin1.php">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="ConnexionVendeur.php">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="#"><img src= "Panier.png" alt='Image non trouvée' height='30' width ='60'/></a></li>
<?php
if(!$connexion)echo '<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>';
else if($connexion) echo '<li class="nav-item"><a class="nav-link" href="Deconnexion.php">Deconnexion</a></li>';
?>
</ul>
</div>

</nav>

<div id="Catégorie">

	<div id="CateHeader">
		<h1>Nos Catégories</h1>
	</div>

	<div class="thumbnail" id="Case1">
		<a href="vetement.png" target="_blank">
		<img src="vetement.png" style="width: 100%;">
		</a>
	</div>

	<div class="thumbnail" id="Case2">
		<a href="musique.png" target="_blank">
		<img src="musique.png" style="width: 100%;">
		</a>
	</div>

	<div class="thumbnail" id="Case3">
		<a href="books.png" target="_blank">
		<img src="books.png" style="width: 100%;">
		</a>
	</div>

	<div class="thumbnail" id="Case4">
		<a href="Sport.png" target="_blank">
		<img src="Sport.png" style="width: 100%;">
		</a>
	</div>

</div>	
</body>
</html>