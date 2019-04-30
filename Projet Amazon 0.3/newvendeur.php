
<?php

	$nom= isset($_POST["nom"])?$_POST["nom"] : ""; //if then else
	$prenom= isset($_POST["prenom"])?$_POST["prenom"] : ""; 
	$email= isset($_POST["email"])?$_POST["email"] : ""; 
	$pseudo= isset($_POST["pseudo"])?$_POST["pseudo"] : "";
	$mdp= isset($_POST["mdp"])?$_POST["mdp"] : "";
	$photo= isset($_POST["photo"])?$_POST["photo"] : ""; 
	$fond= isset($_POST["fond"])?$_POST["fond"] : ""; 
	

	$database = "ECEAmazon";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = 'root'
	$db_handle = mysqli_connect('localhost', 'root', 'root' );	//connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
	$db_found = mysqli_select_db($db_handle, $database);

	//erreurs
	$error = 0;

	if($nom==""){
		$error = 1;
		echo "Le nom n'est pas rempli"."<br>";
	}
	if($prenom==""){
		$error = 1;
		echo "Le prenom n'est pas rempli"."<br>";
	}
	if($email==""){
		$error = 1;
		echo "L'adresse mail n'est pas remplie"."<br>";
	}
	if($pseudo==""){
		$error = 1;
		echo "Le pseudo n'est pas rempli"."<br>";
	}
	if($mdp==""){
		$error = 1;
		echo "Le mdp n'est pas rempli"."<br>";
	}
	if($photo==""){
		$error = 1;
		echo "Le photo n'est pas rempli"."<br>";
	}
	if($fond==""){
		$error = 1;
		echo "Le fond n'est pas rempli"."<br>";
	}



	if ($db_found) {

	 $sql = "SELECT * FROM vendeur WHERE vendeur.Email LIKE '$email'";
	 $result = mysqli_query($db_handle, $sql);

	if (mysqli_num_rows($result) != 0) {
		echo "<h3>Cet utilisateur existe deja</h3>";
		$error = 1;
	}

	if($error){

	}
	else{
	 	$sql2 = "INSERT INTO vendeur(Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin) VALUES('$email', '$pseudo', '$mdp', '$nom', '$prenom', '$photo', '$fond', FALSE)";
	 	$result2 = mysqli_query($db_handle, $sql2);
	 	

	 	$sql3 = "SELECT * FROM vendeur";
	 	$result3 = mysqli_query($db_handle, $sql3);


	 	echo "<h3>Voici la table vendeur</h3>";	
	 	while ($data = mysqli_fetch_assoc($result3)) {
	 		echo "Nom:" . $data['Nom'] . '<br>';
			echo "Prénom: " . $data['Prenom'] . '<br>';
			echo "Pseudo: " . $data['Pseudo'] . '<br>';
			echo "Email: " . $data['Email'] . '<br><br>';	
	 	}
	}

	}
	//si le BDD n'existe pas
	else {
	 echo "Database not found";
	}//end else
	//fermer la connection
	mysqli_close($db_handle);
?>