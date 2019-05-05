<?php
session_start();
include('header.php');

$email = $_SESSION['email_connected'];
$idpan = $_SESSION['panier'];

if($_SESSION['panier']=="")
{
	//FAIRE UN AFFICHAGE ET UN BOUTON RETOUR POUR QUAND IL VIENT LE PANIER VIDE
	echo 'Votre panier est vide';
}
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

if($error){
	
}
else{

	$iditem = isset($_GET['iditem']) ? $_GET['iditem'] : "";
	$suppitem = is_numeric($iditem) ? $iditem : false;

	if($suppitem){
	$sql8 = "SELECT * FROM bonitem WHERE bonitem.IdItem LIKE '$iditem'";
	$result8 = mysqli_query($db_handle, $sql8);
	$quantitesup = 0;
 		while ($data = mysqli_fetch_assoc($result8)) {
 			$quantitesup = $data['Quantite'];
 		}
	$sql9 = "SELECT * FROM item WHERE item.Id LIKE '$iditem'";
	$result9 = mysqli_query($db_handle, $sql9);
	$prixsup = 0;
 		while ($data = mysqli_fetch_assoc($result9)) {
 			$prixsup = $data['Prix'];
 		}
 	$totalsuppression = $quantitesup*$prixsup;

	$sql3 = "DELETE FROM bonitem WHERE bonitem.IdItem LIKE '$iditem'";
	$result3 = mysqli_query($db_handle, $sql3);
	}
}

//recuperer les items dans le meme panier
	$sql = "SELECT * FROM bonitem WHERE bonitem.IdPan LIKE '$idpan' ";
	$result = mysqli_query($db_handle, $sql);
	echo"<h3 class='d-flex justify-content-between align-items-center mb-3'>
 			<span class = 'text-muted'>Votre Panier</span>
 		</h3>";
 	$sql6=" SELECT * FROM panier WHERE panier.Id LIKE '$idpan'";
	$result6 = mysqli_query($db_handle, $sql6);
	while($data = mysqli_fetch_assoc($result6)){
 		$prixtotal = $data['Prix'];
 	}
 	if($suppitem){
 		$prixtotal = $prixtotal - $totalsuppression;
 		$sql7 ="UPDATE panier SET Prix = '$prixtotal' WHERE Id = '$idpan'";
		$result7 = mysqli_query($db_handle, $sql7);
	}


 	while ($data = mysqli_fetch_assoc($result)) {
 		$iditem = $data['IdItem'];
 		$quantite = $data['Quantite'];
 		$sql4 = "SELECT * FROM bonitem WHERE bonitem.IdItem LIKE '$iditem'";
 		$result4 = mysqli_query($db_handle, $sql4);
		if (mysqli_num_rows($result4) != 0) {
			$sql5 = "SELECT *FROM item WHERE item.Id LIKE '$iditem'";
			$result5 = mysqli_query($db_handle, $sql5);			 
 			 	while($data = mysqli_fetch_assoc($result5)){
 			 		echo" <div class = 'row'>
 							<div class = 'col-md-4 order-md-2 mb-4'>
 			 				<ul class = 'list-group mb-3'>
 								<li class = 'list-group-item d-flex justify-content-between 1h-condensed'>
 								<div>
 									<h6 class='my-0'> ". $data['Nom'] ." </h6>
 									<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/><br>
 									<span class ='text-muted'>Description: " . $data['Description'] . " </span><br>
 									<span class ='text-muted'>Quantité: " . $quantite. " </span><br>
 									<span class = 'text-muted'>Prix unitaire: ".$data['Prix']." €</span><br>
 								</div>
 									<span>Total: </span>
 									<strong>" .$data['Prix']*$quantite." €</strong>
 									<span><a href = 'Panier.php?iditem=".$data['Id']." '><img src = 'suppression.png'height='50' width ='50'/></a></span>
 								</li>
 							</ul></div>
 							</div>";
 			}
 		}
 		else{
 			echo "<h5> Votre panier est vide<h5>";
 		}	
 		echo "<li class = 'list-group-item d-flex justify-content-between'>
				<span>Total panier: </span>
 				<strong>" .$prixtotal." €</strong>
			</li><br>";

	} 					

	//finalisation de la commande

	echo "<form action='Paiement1.php' method='post'>
	<table>
			<tr>
				<td colspan='2' align='center'>
				<input type='submit' class='btn btn-info' value ='Passer la commande' /><br><br>
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