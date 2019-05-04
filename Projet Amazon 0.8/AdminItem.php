<?php
session_start();
include('header.php');
?>

	<title>Toutes les ventes</title>
	<form action="newitem1.php" method="post">
	<table>	
			<tr>
			 	<td><a href="ChoixAdmin.php"> 
				<img src="retour.jpg" alt ="retour" height="50" width ="50"></a></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value ="Nouvelle vente ?" />
				</td>
			</tr>
	</table>
	</form>
<?php

 //paire (utilisateur => mot de passe) stockés dans le serveur
 //on utilise 3 paires juste pour montrer un exemple
$database = "ECEAmazon";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );	//connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
$db_found = mysqli_select_db($db_handle, $database);

//erreurs
$error = 0;

if ($db_found) {

$sql = "SELECT * FROM item";

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

$result = mysqli_query($db_handle, $sql);

if (mysqli_num_rows($result) != 0) {
if($error){

}
else{
	//Afficher toutes les ventes
 	echo "<h3>Voici tous les items</h3>";
	$result = mysqli_query($db_handle, $sql);
 	while ($data = mysqli_fetch_assoc($result)) {
	echo "Id: " . $data['Id'] . '<br>';
 	echo "Prix: " . $data['Prix'] . '<br>';
	echo "Stock: " . $data['Stock'] . '<br>';
 	echo "Description: " . $data['Description'] . '<br>';
	echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>". '<br>';
	echo "<div id ='liste'><a href = 'AdminItem.php?Id=".$data['Id']." '>
		 <img src = 'suppression.png'height='50' width ='50'/> </a> </div><br>";
	}
	
}
}
else{//Informations saisies incorrectes
	echo "<h3>Il n'y a pas d'item.</h3>";
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