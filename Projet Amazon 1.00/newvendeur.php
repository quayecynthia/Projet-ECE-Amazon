<?php
session_start();

 $email = isset($_POST["email"])?$_POST["email"] : "";
 $pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
 $mdp =  isset($_POST["mdp"])?$_POST["mdp"] : "";

 if($_SESSION['connected']=='0'){
 $_SESSION['email'] = $email;
 $_SESSION['pseudo'] = $pseudo;
 $_SESSION['mdp'] = $mdp;
 $_SESSION['verif'] = 2;
}

 ?>
<title>Les vendeurs</title>
<?php
 $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
 $nom = isset($_POST["nom"])?$_POST["nom"] : "";
 $photo = isset($_POST["photo"])?$_POST["photo"] : "";
 $fond = isset($_POST["fond"])?$_POST["fond"] : "";?>
 <?php

$database = "ECEAmazon";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

//erreurs
$error = 0;

if($prenom==""){
	$error = 1;
	echo "Le prenom n'est pas rempli";
}?> 
<br>
<?php
if($nom==""){
	$error = 1;
	echo "Le nom n'est pas rempli";
}?>
<br>
<?php
if($email==""){
	$error = 1;
	echo "L'adresse mail n'est pas remplie"."<br>";
}
if($pseudo==""){
	$error = 1;
	echo "Le pseudo n'est pas rempli"."<br>";
}
if($fond==""){
	$error = 1;
	echo "Le fond n'est pas rempli"."<br>";
}
if($photo==""){
	$error = 1;
	echo "La photo n'est pas remplie."."<br><br>";
}

if ($db_found) {

 $sql = "SELECT * FROM vendeur WHERE vendeur.Email LIKE '$email' OR vendeur.Pseudo LIKE '$pseudo'";

 $result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
	echo "<h3>L'email est déjà utilisé.</h3>";
	$error = 1;
}

if($error){

}
else{
 		$sql2 = "INSERT INTO vendeur(Email, Pseudo, Mdp, Nom, Prenom, Photo, Fond, Admin)
 				 VALUES('$email', '$pseudo', '$mdp', '$nom', '$prenom', '$photo', '$fond', FALSE)";
 		$result2 = mysqli_query($db_handle, $sql2);
 		header('Location: AdminVendeur.php');
		exit();
}

}
else {
 echo "Database not found";
}
mysqli_close($db_handle);

exit();
?>
</body>
</html>