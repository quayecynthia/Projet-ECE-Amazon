

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

	if (mysqli_num_rows($result) != 0) {
		echo "<h3>Les informations entrées ne sont pas correctes.</h3>";
	}	
	else{
		$error = 1;
	}

	if($error){
		$_SESSION['error_message'] = "Les informations entrées sont incorrectes";
		header('Location: ConnexionAdmin1.php');
		exit();
	}
	else{

 		echo "<h3>Les informations sont correctes.</h3>";
		while ($data = mysqli_fetch_assoc($result)) {
 			echo "Admin: " . $data['Admin'] . '<br>';
 			echo "Email: " . $data['Email'] . '<br>';
 			echo "Mdp: " . $data['Mdp'] . '<br>';

 			$_SESSION['email_connected'] = $data['Email'];
			$_SESSION['nom_connected'] = $data['Nom'];
			$_SESSION['prenom_connected'] = $data['Prenom'];	//UTILE POUR AFFICHAGE SUR LE HEADER A CHAQUE FOIS
			$_SESSION['image_connected'] = $data['Photo'];
			$_SESSION['admin'] = $data['Admin'];
			$_SESSION['connected'] = 2;

			$_SESSION['verif'] = 2;
			$_SESSION['email'] = $data['Email'];		//UTILE POUR NE PAS SE RECONNECTER EN TANT QUE VENDEUR
			$_SESSION['pseudo'] = $data['Pseudo'];
			$_SESSION['mdp'] = $data['Mdp'];


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