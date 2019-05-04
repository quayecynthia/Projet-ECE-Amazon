<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>ECE Amazon</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="Accueil.css">

<script type="text/javascript">
$(document).ready(function(){
$('.header').height($(window).height());
});
</script>

</head>
<body>
<nav class="navbar navbar-expand-md">

<?php
if($_SESSION['connected']==2){
	$connexion = 1;
}
else{
	$connexion = 0;
}
?>


<a class="navbar-brand" href="Accueil.php">ECE Amazon</a>

<button class="navbar-toggler navbar-dark" type="button" datatoggle="collapse" data-target="#main-navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="main-navigation">
<ul class="navbar-nav">
<?php

if($connexion && $_SESSION['image_connected']=="") echo '<li class="nav-item"><a class="nav-link" href="#">Bienvenue, '.$_SESSION['prenom_connected'].' '.$_SESSION['nom_connected'].'</li>';
else if($connexion && $_SESSION['image_connected']!="") echo '<li class="nav-item"><a class="nav-link" href="#">Bienvenue, '.$_SESSION['prenom_connected'].' '.$_SESSION['nom_connected'].' <img src='. $_SESSION['image_connected']. ' alt="Image non trouvée" height="30" width ="30"/></a></li>';

?>
<li class="nav-item"><a class="nav-link" href="ConnexionAdmin1.php">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="ConnexionVendeur.php">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="Panier.php><img src= "Panier.png" alt='Image non trouvée' height='30' width ='60'/></a></li>
<?php
if(!$connexion)echo '<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>';
else if($connexion) echo '<li class="nav-item"><a class="nav-link" href="Deconnexion.php">Deconnexion</a></li>';
?>
</ul>
</div>

</nav>
<?php
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
		echo "VOICI LE PRIX DU PRODUIT CLIQUE: ".$data['Prix'];
		echo "VOICI LE STOCK DU PRODUIT CLIQUE: ".$data['Stock'];
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

	//reduire les stocks
	$stock = $stock - $quantite; 
	//echo "LES STOCKS" .$stock;
	$sql7 = "UPDATE item SET Stock = '$stock' WHERE Id = '$iditem'";	
	$result7 = mysqli_query($db_handle, $sql7);
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