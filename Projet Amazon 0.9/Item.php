<?php
session_start();
include('header.php');

 //paire (utilisateur => mot de passe) stockés dans le serveur
 //on utilise 3 paires juste pour montrer un exemple
$database = "ECEAmazon";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );	//connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

$Categorie = isset($_GET['Categorie']) ? $_GET['Categorie'] : "";
$iditem = isset($_GET['iditem']) ? $_GET['iditem'] : "";


if($iditem!=""){
	$sql = "SELECT * FROM item WHERE item.Id LIKE '$iditem'";
	$result = mysqli_query($db_handle, $sql);
	while ($data = mysqli_fetch_assoc($result)) {
		$Categorie = $data['Categorie'];
	}
}

	$sql2 = "SELECT * FROM item WHERE item.Categorie LIKE '$Categorie'";
	$result2 = mysqli_query($db_handle, $sql2);

 	echo "<h3>Voici les items de la categorie ".$Categorie." </h3>";
 	while ($data = mysqli_fetch_assoc($result2)) {
	echo "Nom: " . $data['Nom'] . '<br>';	
 	echo "Prix: " . $data['Prix'] . '<br>';
	echo "Stock: " . $data['Stock'] . '<br>';
	echo "Email vendeur: " . $data['IdVendeur'] . '<br>';
 	echo "Description: " . $data['Description'] . '<br>';
	echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>";
	echo "<form action='Item.php?iditem=".$data['Id']."' method='post'><a href = 'Item.php?iditem=".$data['Id']."'>
		 <input type='image' src = 'ajout.png'height='40' width ='40'/></a>";
	echo "Quantité :<input type='number' name='quantite' value='0' min='0' max='".$data['Stock']."'/></form>"; //afficher les stocks
	//$prix = $data['Prix'];
	//$stock = $data['Stock'];
	$quantite = isset($_POST["quantite"])?$_POST["quantite"] : "";
	if($quantite == 0 || $quantite == ""){
		echo "Selectionner la quantité".'<br>';
		$ajoutitem = false;

	}
	else{
		$ajoutitem = is_numeric($iditem) ? $iditem : false;
		$ajoutitem = true;
	}
	}

if($ajoutitem){	//si on a cliqué sur ajout item et on regarde si le panier est deja créé
	 
	//recuperer le prix de l'article
	$sql8 = "SELECT * FROM item WHERE item.Id LIKE '$iditem'";
	$result8 = mysqli_query($db_handle, $sql8);
	while ($data = mysqli_fetch_assoc($result8)) {	
		$prix = $data['Prix'];
		$stock = $data['Stock'];
	}

	if($_SESSION['panier'] == ""){//le panier n'est pas créé
		$prixtotal = 0;
		$prixtotal =$prixtotal + $prix*$quantite;
		$sql3 = "INSERT INTO panier(Id, Prix) VALUES(NULL, '$prixtotal')";
		$result3 = mysqli_query($db_handle, $sql3);
		$idpan = mysqli_insert_id($db_handle);
		$_SESSION['panier'] = $idpan;
		}

	else{//le panier est déjà créé on modifie son prix
		$idpan = $_SESSION['panier'];
		$sql5 = "SELECT * FROM panier WHERE panier.Id LIKE '$idpan'";
		$result5 = mysqli_query($db_handle, $sql5);
		while ($data = mysqli_fetch_assoc($result5)) {
			$prixtotal = $data['Prix'];
			$prixtotal =$prixtotal + $prix*$quantite;
			$sql4 ="UPDATE panier SET Prix = '$prixtotal' WHERE Id = '$idpan'";
			$result4 = mysqli_query($db_handle, $sql4);
		}
	}	
	//creation nouveau bon item
	$sql6 = "INSERT INTO bonitem (IdItem, IdPan, Quantite) VALUES ('$iditem', '$idpan', '$quantite')";	
	$result6 = mysqli_query($db_handle, $sql6);

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