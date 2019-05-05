<?php

	session_start();
	
	$nom= isset($_POST["Nom"])?$_POST["Nom"] : ""; //if then else
	$prenom= isset($_POST["Prenom"])?$_POST["Prenom"] : ""; 
	$email= isset($_POST["Email"])?$_POST["Email"] : "";
	$mdp= isset($_POST["Mdp"])?$_POST["Mdp"] : "";  
	$adresse1= isset($_POST["Adresse1"])?$_POST["Adresse1"] : "";
	$adresse2= isset($_POST["Adresse2"])?$_POST["Adresse2"] : "";
	$ville= isset($_POST["Ville"])?$_POST["Ville"] : ""; 
	$code_postale= isset($_POST["Code_postale"])?$_POST["Code_postale"] : ""; 
	$pays= isset($_POST["Pays"])?$_POST["Pays"] : ""; 
	$tel = isset($_POST["Telephone"])?$_POST["Telephone"] : "";
	$type_carte= isset($_POST["typecarte"])?$_POST["typecarte"] : "";
	//$type_carte= echo($_POST['typecarte']); 
	$num_carte= isset($_POST["Numero_carte"])?$_POST["Numero_carte"] : ""; 
	$expiration_carte = isset($_POST["Expiration_carte"])?$_POST["Expiration_carte"] : "";
	$nom_carte = isset($_POST["Nom_carte"])?$_POST["Nom_carte"] : "";
	$crypto = isset($_POST["Crypto"])?$_POST["Crypto"] : "";

	$database = "ECEAmazon";
	//connectez-vous dans votre BDD
	//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = 'root'
	$db_handle = mysqli_connect('localhost', 'root', '' );	//connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
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
	if($mdp==""){
		$error = 1;
		echo "Le mot de passe n'est pas remplie"."<br>";
	}
	if($adresse1==""){
		$error = 1;
		echo "L'adresse n'est pas remplie"."<br>";
	}
	if($ville==""){
		$error = 1;
		echo "La ville n'est pas remplie"."<br>";
	}
	if($code_postale==""){
		$error = 1;
		echo "Le code postale n'est pas rempli"."<br>";
	}
	if($pays==""){
		$error = 1;
		echo "Le pays n'est pas rempli"."<br>";
	}
	if($tel==""){
		$error = 1;
		echo "Le numéro de tel n'est pas rempli"."<br>";
	}
	if($type_carte=="Intro"){
		$error = 1;
		echo "Le type de carte n'est pas rempli"."<br>";
	}
	if($num_carte==""){
		$error = 1;
		echo "Le numero de carte n'est pas rempli"."<br>";
	}
	if($expiration_carte==""){
		$error = 1;
		echo "La date d'expiration de carte n'est pas remplie"."<br>";
	}
	if($nom_carte==""){
		$error = 1;
		echo "Le nom du proprietaire de carte n'est pas rempli"."<br>";
	}
	if($crypto==""){
		$error = 1;
		echo "Le code securite de carte n'est pas rempli"."<br><br>";
	}



	if ($db_found) {

	 $sql = "SELECT * FROM acheteur WHERE acheteur.Email LIKE '$email'";
	 $result = mysqli_query($db_handle, $sql);

	if (mysqli_num_rows($result) != 0) {
		echo "<h3>Cet utilisateur existe deja</h3>";
		$error = 1;
	}

	if($error){

	}
	else{
		if($_SESSION['panier'] == "")//si panier n'existe pas on en creer un
		{
			$sql3 = "INSERT INTO panier(Id, Prix) VALUES(NULL, 0)";
	 		$result3 = mysqli_query($db_handle, $sql3);
	 		$idpan = mysqli_insert_id($db_handle);

	 	}
	 	else{//panier existe deja
	 		$idpan = $_SESSION['panier'];
	 	}
	 	//creation de l'acheteur avec son panier
	 	$sql2 = "INSERT INTO acheteur(Nom, Prenom, Email, Mdp, Adresse1, Adresse2, Ville, Code_Postal, Pays, Tel, Type_carte, Num_carte, Expiration_carte, Nom_carte, Crypto, IdPan)
	 		VALUES('$nom', '$prenom', '$email', '$mdp', '$adresse1', '$adresse2', '$ville', '$code_postale', '$pays', '$tel', '$type_carte', '$num_carte', '$expiration_carte', '$nom_carte', '$crypto', '$idpan')";
	 	$result2 = mysqli_query($db_handle, $sql2);
	 	
	 	$sql3 = "SELECT * FROM acheteur";
	 	$result3 = mysqli_query($db_handle, $sql3);


	 	echo "<h3>Voici la table acheteur</h3>";	
	 	while ($data = mysqli_fetch_assoc($result3)) {


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
			echo "Num_carte: " . $data['Num_carte'] . '<br>';
			echo "Expiration_carte: " . $data['Expiration_carte'] . '<br>';
			echo "Nom_carte: " . $data['Nom_carte'] . '<br>';
			echo "Crypto: " . $data['Crypto'] . '<br><br>';

	 		$_SESSION['nom_connected'] = $nom;
			$_SESSION['prenom_connected'] = $prenom;
			$_SESSION['email_connected'] = $email;
			}
		
		$_SESSION['panier'] = $idpan;
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