<?php
session_start();
include('header.php');

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
$_SESSION['verif']=2;
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


error_reporting(0);
	$Id = $_GET['Id'];
	$suppitem = is_numeric($Id) ? $Id : false;
	if($suppitem){

	$sql5 = "SELECT * FROM varie WHERE varie.IdItem LIKE '$Id'";
	$result5 = mysqli_query($db_handle, $sql5);
	while ($data = mysqli_fetch_assoc($result5)) {
		$IdVar = $data['IdVar'];
		$sql6 = "DELETE FROM variation WHERE variation.Id LIKE '$IdVar'";
		$result6 = mysqli_query($db_handle, $sql6);
	}
	$sql4 = "DELETE FROM varie WHERE varie.IdItem LIKE '$Id'";
	$sql3 = "DELETE FROM item WHERE item.Id LIKE '$Id'";
	$result3 = mysqli_query($db_handle, $sql3);
	$result4 = mysqli_query($db_handle, $sql4);
	
	}


if (mysqli_num_rows($result) != 0) {
	while ($data = mysqli_fetch_assoc($result)) {
		$_SESSION['email_connected'] = $data['Email'];
		$_SESSION['nom_connected'] = $data['Nom'];
		$_SESSION['prenom_connected'] = $data['Prenom'];
		$_SESSION['image_connected'] = $data['Photo'];
		$fond = $data['Fond'];
		$_SESSION['connected'] = 2;
	}
	

if($error){

}
else{
	//Afficher toutes les ventes
  	$result2 = mysqli_query($db_handle, $sql2);
	echo "<h3><img src= ".$_SESSION['image_connected']." alt='Image vendeur' height='100' width ='100'/>".$pseudo.",voici vos ventes</h3>";

	echo "<form action='newitem1.php' method='post'>
	<table>
			<tr>
				<td colspan='2' align='center'>
				<input type='submit' value ='Nouvelle vente ?' /><br><br>
				</td>
			</tr>
	</table>
	</form>";
 	while ($data = mysqli_fetch_assoc($result2)) {
 	echo "<style type='text/css'>body {background-image: url('$fond');	
 			background-size: cover; 
			background-position: center; 
			position: relative;}
			</style>";
	//echo "<div class='overlay'></div>";
	echo "<h5>".$data['Nom']." </h5>";
	echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>";
 	echo "Description: " . $data['Description'] . " ";
 	echo "Prix: " . $data['Prix'] ." €";
	echo " Stock: " . $data['Stock'] ."          ";
	echo "<a href = 'vendeur.php?Id=".$data['Id']." '>
		 <img src = 'suppression.png'height='50' width ='50'/> </a> <br><br><br>";
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