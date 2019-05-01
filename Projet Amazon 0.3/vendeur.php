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
	<title>Voici vos ventes</title>
	<form action="newitem1.php" method="post">
	<table>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value ="Nouvelle vente ?" />
				</td>
			</tr>
	</table>
	</form>
<?php

session_start();
if($_SESSION['verif']==0){
 $email = isset($_POST["email"])?$_POST["email"] : "";
 $pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
 $mdp =  isset($_POST["mdp"])?$_POST["mdp"] : "";

}
else{
$email = $_SESSION['email'];
$pseudo = $_SESSION['pseudo'];
$mdp = $_SESSION['mdp'];
}
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

if($pseudo==""){
	$error = 1;
	echo "Le pseudo n'est pas rempli"."<br>";
}

if ($db_found) {

$sql = "SELECT * FROM vendeur WHERE vendeur.Email LIKE '$email' AND vendeur.Mdp LIKE '$mdp' AND vendeur.Pseudo LIKE '$pseudo'";
$sql2 = "SELECT * FROM item WHERE item.IdVendeur LIKE '$email'";
$sql3 ="DELETE from item WHERE item.Id LIKE 'ok'";
$result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
	echo "<h3>Les informations entrées sont correctes.</h3>";

if($error){

}
else{
	//Afficher toutes les ventes
  	$result2 = mysqli_query($db_handle, $sql2);
 	echo "<h3>Voici mes ventes</h3>";
 	while ($data = mysqli_fetch_assoc($result2)) {
 	echo "Categorie : " . $data['Categorie'] . '<br>';
	echo "Id: " . $data['Id'] . '<br>';
 	echo "Prix: " . $data['Prix'] . '<br>';
	echo "Stock: " . $data['Stock'] . '<br>';
	echo "Email vendeur: " . $data['IdVendeur'] . '<br>';
 	echo "Description: " . $data['Description'] . '<br>';
	echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>". '<br>';
	echo "<img src= 'suppression.png' name='poubelle' alt='Image supp' height='60' width ='60'/>". '<br>';
	}
	
}
}
else{//Informations saisies incorrectes
 	echo "<h3>Les informations ne sont pas correctes.</h3>";
}
}
//si le BDD n'existe pas
else {
 echo "Database not found";
}
$_SESSION['email'] = $email ;
$_SESSION['pseudo'] = $pseudo;
$_SESSION['mdp'] = $mdp;

mysqli_close($db_handle);
?>
</body>
</html>