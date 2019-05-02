<?php
session_start();
?>

<?php

 $email = isset($_POST["email"])?$_POST["email"] : "";
 $mdp =  isset($_POST["Mdp"])?$_POST["Mdp"] : "";

$database = "ECEAmazon";

$db_handle = mysqli_connect('localhost', 'root', '' );	
$db_found = mysqli_select_db($db_handle, $database);

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

 $sql = "SELECT * FROM acheteur WHERE acheteur.Email LIKE '$email' AND acheteur.Mdp LIKE '$mdp'";
 $result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
	echo "<h3>Les informations entrées sont correctes.</h3>";
}
else{
	$error = 1;
}

if($error){
	$_SESSION['error_message'] = "Les informations entrées sont incorrectes";
	header('Location: VotreCompte.php');
	exit();
}
else{
	while ($data = mysqli_fetch_assoc($result)) {
		$Num_Carte = substr($data['Num_carte'], 0, 3);
		echo "Nom:" . $data['Nom'] . '<br>';
			echo "Prénom: " . $data['Prenom'] . '<br>';
			echo "Email: " . $data['Email'] . '<br>';
			echo "Mot de Passe: " . $data['Mdp'] . '<br>';
			echo "Adresse1: " . $data['Adresse1'] . '<br>';
			echo "Adresse2: " . $data['Adresse2'] . '<br>';
			echo "Ville: " . $data['Ville'] . '<br>';
			echo "Code_Postal: " . $data['Code_Postal'] . '<br>';
			echo "Pays: " . $data['Pays'] . '<br>';
			echo "Tel: " . $data['Tel'] . '<br>';
			echo "Type_carte: " . $data['Type_carte'] . '<br>';
			echo "Num_carte: " . $Num_Carte . "-****-****-****" .'<br>';
			echo "Expiration_carte: " . $data['Expiration_carte'] . '<br>';
			echo "Nom_carte: " . $data['Nom_carte'] . '<br>';
			echo "Crypto: " . $data['Crypto'] . '<br><br>';

			$_SESSION['nom_connected'] = $data['Nom'];
			$_SESSION['prenom_connected'] = $data['Prenom'];
			$_SESSION['email_connected'] = $data['email'];
			}

		$_SESSION['connected'] = 2;
		header('Location: Accueil.php');
		exit();

	}
}
	//si le BDD n'existe pas
	else {
	 echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
?>