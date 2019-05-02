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
<li class="nav-item"><a class="nav-link" href="ConnexionAdmin1.php">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="connexionvendeur.php">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>
<li class="nav-item"><a class="nav-link" href="#">Panier</a></li>
</ul>
</div>

</nav>
<?php
session_start();
$email = isset($_POST["email"])?$_POST["email"] : "";
$mdp =  isset($_POST["mdp"])?$_POST["mdp"] : "";
echo $email;

 //paire (utilisateur => mot de passe) stockés dans le serveur
 //on utilise 3 paires juste pour montrer un exemple
$database = "ECEAmazon";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );	//connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
$db_found = mysqli_select_db($db_handle, $database);

//erreurs
$error = 0;

if($email==""){
	$error = 1;
	echo "L'email n'est pas rempli"."<br>";
}
if($mdp==""){
	$error = 1;
	echo "Le mot de passe n'est pas rempli"."<br>";
}


if ($db_found) {

	$sql = "SELECT * FROM vendeur WHERE vendeur.Email LIKE '$email' AND vendeur.Mdp LIKE '$mdp' AND vendeur.Admin = TRUE";
	$result = mysqli_query($db_handle, $sql);

	if (mysqli_num_rows($result) == 0) {
		echo "<h3>Les informations entrées ne sont pas correctes.</h3>";
		$error = 1;
	}	
	else{//Informations saisies incorrectes
		session_destroy();
		session_start();

 		echo "<h3>Les informations sont correctes.</h3>";
		while ($data = mysqli_fetch_assoc($result)) {
 			echo "Admin: " . $data['Admin'] . '<br>';
 			echo "Email: " . $data['Email'] . '<br>';
 			echo "Mdp: " . $data['Mdp'] . '<br>';
		}
		mysqli_close($db_handle);
		header('Location: ChoixAdmin.php');
		exit();
}
}
//si le BDD n'existe pas
else {
 echo "Database not found";
}
mysqli_close($db_handle);
?>
</body>
</html>