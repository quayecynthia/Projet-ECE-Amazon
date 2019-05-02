<?php
session_start();
$_SESSION['verif']=0;
?>

<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon - Compte vendeur</title>
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

<a class="navbar-brand" href="accueil.php">ECE Amazon</a>
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

<div id="login">
        <h3 class="text-center text-black pt-5">Connectez vous à votre compte vendeur</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="vendeur.php" method="post">
                            <h3 class="text-center">Connexion</h3>
                            <div class="form-group">
                                <label for="email">Adresse email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pseudo">Pseudo:</label><br>
                                <input type="pseudo" name="pseudo" id="pseudo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Mdp">Mot de Passe:</label><br>
                                <input type="password" name="mdp" id="mdp" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-md" id="bouton" value="Connexion">
                            </div>
                            <br>
                            <div id="register-link" class="text-right">
                                <a href="newvendeur1.php">Pas de compte ? Enregistrez vous</a>	
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>