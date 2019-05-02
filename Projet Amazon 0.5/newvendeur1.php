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
<li class="nav-item"><a class="nav-link" href="#">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="connexionvendeur.php">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>
<li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
</ul>
</div>

</nav>
	<div id="signup">
        <h2 class="text-center text-black pt-5">Inscription</h2>
        <div class="contain">
            <div id="signup-row" class="row justify-content-center align-items-center">
                <div id="signup-column" class="col-md-6">
                    <div id="signup-box" class="col-md-12">
                        <form id="signup-form" class="form" action="newvendeur.php" method="post">
		<table>
			<tr>
				<td>Email:</td>
				<td>
				<div class="form-group">
                	<input type="email" name="email" id="email" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
				<td>Pseudo:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="pseudo" id="pseudo" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
				<td>Mot de Passe:</td>
				<td>
				<div class="form-group">
                	<input type="password" name="mdp" id="mdp" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Nom:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="nom" id="nom" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Prenom:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="prenom" id="prenom" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
				<td>
				<div class="form-group">
                	<input type="file" id="fond" name="photo" accept="image/png, image/jpeg">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Fond:</td>
				<td>
				<div class="form-group">
                	<input type="file" id="fond" name="fond" accept="image/png, image/jpeg">
                </div>
            	</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Inscription"  />
				</td>
			</tr>

		</table>
	</form>
</body>
</html>