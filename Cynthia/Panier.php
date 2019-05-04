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

<?php //si déjà connecté aller à 
if($_SESSION['connected']==0){
	$connexion = 1;
    header('Location: ConnectionAcheteur.php');
    exit();

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
<li class="nav-item"><a class="nav-link" href="#"><img src= "Panier.png" alt='Image non trouvée' height='30' width ='60'/></a></li>
<?php
if(!$connexion)echo '<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>';
else if($connexion) echo '<li class="nav-item"><a class="nav-link" href="Deconnexion.php">Deconnexion</a></li>';
?>
</ul>
</div>

</nav>
<?php

$email = $_SESSION['email_connected'];
$idpan = $_SESSION['panier'];
echo $_SESSION['panier'];
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
if ($db_found) {

if($error){
	
}
else{
	$sql2 = "SELECT * FROM item WHERE item.Id LIKE '$idpan";
	$iditem = isset($_GET['iditem']) ? $_GET['iditem'] : "";
	$suppitem = is_numeric($iditem) ? $iditem : false;
	if($suppitem){
	$sql3 = "DELETE FROM bonitem WHERE bonitem.IdItem LIKE '$iditem'";
	$result3 = mysqli_query($db_handle, $sql3);
	}
}

//recuperer les items dans le meme panier
	$sql = "SELECT * FROM bonitem WHERE bonitem.IdPan LIKE '$idpan' ";
	$result = mysqli_query($db_handle, $sql);
 	while ($data = mysqli_fetch_assoc($result)) {
 		$iditem = $data['IdItem'];
 		$quantite = $data['Quantite'];
 		$sql4 = "SELECT * FROM bonitem WHERE bonitem.IdItem LIKE '$iditem'";
 		$result4 = mysqli_query($db_handle, $sql4);
		if (mysqli_num_rows($result4) != 0) {
			$sql5 = "SELECT *FROM item WHERE item.Id LIKE '$iditem'";
			 $result5 = mysqli_query($db_handle, $sql5);
 			while($data = mysqli_fetch_assoc($result5)){
 				echo "Id panier: ".$idpan;
 				echo "Id item: ".$iditem;
 				echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>";
 				echo "Description: " . $data['Description'] . " ";
 				echo "Prix: " . $data['Prix'] ." €";
 				echo "Quantite: ".$quantite;
 				echo "Prix total: ".$data['Prix']*$quantite." €";
 				echo "<a href = 'Panier.php?iditem=".$data['Id']." '>
		 		<img src = 'suppression.png'height='50' width ='50'/> </a> <br><br><br>";
 			}
 		}
 		else{
 			echo "<h5> Votre panier est vide<h5>";
 		}	
	}
	//finalisation de la commande
	echo "<form action='Paiement1.php' method='post'>
	<table>
			<tr>
				<td colspan='2' align='center'>
				<input type='submit' value ='Passer la commande' /><br><br>
				</td>
			</tr>
	</table>
	</form>";
}
//si le BDD n'existe pas
else {
 echo "Database not found";
}
$_SESSION['email_connected'] = $email ;

mysqli_close($db_handle);
?>
</body>
</html>