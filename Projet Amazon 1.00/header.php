<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Accueil.css?t=<? echo time(); ?>">

<script type="text/javascript">
$(document).ready(function(){
$('.header').height($(window).height());
});

</script>

</head>
<body>

<nav class="navbar navbar-expand-lg">
	<?php
if($_SESSION['connected']==2){
	$connexion = 1;
}
else{
	$connexion = 0;
}
?>

  <a class="navbar-brand" href="Accueil.php">ECE Amazon</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="ConnexionAdmin1.php">Admin <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ConnexionVendeur.php">Vendre</a>
      </li>
      <li class="nav-item">
      		<a class="nav-link" href="Panier.php"><img src= "Panier.png" alt='Image non trouvée' height='30' width ='60'/></a></li>
      </li>
      <?php
		if(!$connexion)echo '<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>';
		else if($connexion) echo '<li class="nav-item"><a class="nav-link" href="Deconnexion.php">Deconnexion</a></li>';
		?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
          Categorie
        </a>
        <ul class="dropdown-menu">
        	<li><a class="dropdown-item" href="Item.php?Categorie=Musique">Musique</a></li>
        	<li class="dropdown-divider"></li>
        	<li><a class="dropdown-item" href="Item.php?Categorie=Livres">Livres</a></li>
        	<li class="dropdown-divider"></li>
        	<li><a class="dropdown-item" href="Item.php?Categorie=Sport et Loisir">Sport et Loisir</a></li>
        	<li class="dropdown-divider"></li>
        	<li class="dropdown-submenu">
                <a class="dropdown-toggle" data-toggle="dropdown">Vetement</a>
        		<ul class="dropdown-menu">
        			<li class="dropdown-submenu">
                		<a class="dropdown-toggle" data-toggle="dropdown">Sexe</a>
        				<ul class="dropdown-menu">
        					<li><a class ="dropdown-item" href="Item.php?Categorie=Vetement&Sexe=Homme">Homme</a></li>
        					<li class="dropdown-divider"></li>
        					<li><a class ="dropdown-item" href="Item.php?Categorie=Vetement&Sexe=Femme">Femme</a></li>
        					<li class="dropdown-divider"></li>
        					<li><a class ="dropdown-item" href="Item.php?Categorie=Vetement&Sexe=Unisexe">Unisexe</a></li>
        				</ul>
        			</li>
        			<li class="dropdown-divider"></li>
        			<li class="dropdown-submenu">
                		<a class="dropdown-toggle" data-toggle="dropdown">Type</a>
        				<ul class="dropdown-menu">
        					<li><a class ="dropdown-item" href="Item.php?Categorie=Vetement&Type=Habits">Habits</a></li>
        					<li class="dropdown-divider"></li>
        					<li><a class ="dropdown-item" href="Item.php?Categorie=Vetement&Sexe=Chaussures">Chaussures</a></li>
        				</ul>
        			</li>
        		</ul>
      		</li>
      	</ul>
      </li>

      <?php

		

?>	
	<li>
    <form class="form-inline my-2 my-lg-0" action="itemrecherche.php" method="POST">
      <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-info my-2 my-sm-0" type="submit">Chercher</button>
    </form>
	</li>
    </ul>
  </div>
</nav>
