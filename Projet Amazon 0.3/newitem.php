<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mes ventes</title>
</head>
<body>
		<table>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Nouvelle vente ?" />
				</td>
			</tr>
		</table>

<?php
session_start();
$_SESSION['verif']=2;
$email = $_SESSION['email'];
 $nom = isset($_POST["nom"])?$_POST["nom"] : "";
 $description = isset($_POST["description"])?$_POST["description"] : "";
 $photo = isset($_POST["photo"])?$_POST["photo"] : "";
 $stock = isset($_POST["stock"])?$_POST["stock"] : "";
 $prix = isset($_POST["prix"])?$_POST["prix"] : "";
 $categorie = isset($_POST["categorie"])?$_POST["categorie"] : "";

$database = "ECEAmazon";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

//erreurs
$error = 0;

if($nom==""){
	$error = 1;
	echo "Le nom n'est pas rempli"."<br>";
}
if($description==""){
	$error = 1;
	echo "La description n'est pas remplie"."<br>";
}
if($categorie=="Intro"){
	echo "La categorie n'est pas remplie"."<br>";
	$error =1;
}
if($prix==""){
	$error = 1;
	echo "Le prix n'est pas rempli"."<br>";
}
if($photo==""){
	$error = 1;
	echo "La photo n'est pas remplie."."<br><br>";
}
if($stock==""){
	$error = 1;
	echo "Le stock n'est pas rempli."."<br><br>";
}

if ($db_found) {

 $sql = "SELECT * FROM item WHERE item.IdVendeur LIKE '$email'";

if($error){

}
else{
 	$sql2 = "INSERT INTO item(Id, Nom, Photo, Description, Prix, Stock, Categorie, IdVendeur)
 			 VALUES(NULL, '$nom', '$photo', '$description', '$prix', '$stock', '$categorie', '$email')";
 	
 	$result2 = mysqli_query($db_handle, $sql2);
  	$result = mysqli_query($db_handle, $sql);
 	echo "<h3>Voici vos ventes</h3>";
 	while ($data = mysqli_fetch_assoc($result)) {
 	 	echo "Categorie : " . $data['Categorie'] . '<br>';
 		 echo "Id: " . $data['Id'] . '<br>';
 		 echo "Prix: " . $data['Prix'] . '<br>';
  		 echo "Stock: " . $data['Stock'] . '<br>';
 		 echo "Email vendeur: " . $data['IdVendeur'] . '<br>';
		 echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>". '<br>';
 	}
}

}
else {
 echo "Database not found";
}
mysqli_close($db_handle);
header('Location: vendeur.php');
exit();
?>
</body>
</html>
