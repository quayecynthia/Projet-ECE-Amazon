<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Voici vos ventes</title>
</head>
<body>
	<form action="NewItem1.php" method="post">
	<table>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value ="Nouvelle vente ?" />
				</td>
			</tr>
	</table>
	</form>
<?php
echo "verif :". $_SESSION['verif'];
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
	echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>". '<br>';
	}
}
}
else{//Informations saisies incorrectes
 	echo "<h3>Les informations ne sont pas correctes.</h3>";
}

$_SESSION['email']= $email ; 
$_SESSION['pseudo'] = $pseudo;
$_SESSION['mdp'] = $mdp ;
}
//si le BDD n'existe pas
else {
 echo "Database not found";
}//end else
//fermer la connection
mysqli_close($db_handle);
?>
</body>
</html>