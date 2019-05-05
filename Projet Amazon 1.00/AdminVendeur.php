<?php
session_start();

include('header.php');

 	echo "<h3>Voici tous les vendeurs</h3><br>";
	echo '<form action="newvendeur1.php" method="post">
	<table>	
			<tr>
			 	<td><a href="ChoixAdmin.php"> 
				<img src="retour.jpg" alt ="retour" height="50" width ="50"></a></td>
				<td colspan="2" align="center">
					<button type="button" class="btn btn-info">Ajouter un vendeur ?</button>
				</td>
			</tr>
	</table>
	</form>';

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

$sql = "SELECT * FROM vendeur WHERE vendeur.Admin = FALSE";
$result = mysqli_query($db_handle, $sql);

error_reporting(0);
$email = isset($_GET["Email"])?$_GET["Email"] : "";
$suppvend = $email;
if($suppvend!=""){
	$sql7 = "SELECT * FROM item WHERE item.IdVendeur LIKE '$email'";
	$result7 = mysqli_query($db_handle, $sql7);

	while ($data = mysqli_fetch_assoc($result7)) {
		$Id = $data['Id'];
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

	$sql2 = "DELETE FROM vendeur WHERE vendeur.Email LIKE '$suppvend'";
	$result2 = mysqli_query($db_handle, $sql2);
}
if (mysqli_num_rows($result) != 0) {
if($error){

}
else{
	//Afficher toutes les ventes
	$result = mysqli_query($db_handle, $sql);
 	while ($data = mysqli_fetch_assoc($result)) {
	echo" <div class = 'row'>
 		<div class = 'col-md-4 order-md-2 mb-4'>
 			<ul class = 'list-group mb-3'>
 				<li class = 'list-group-item d-flex justify-content-between 1h-condensed'>
 					<div>
 						<h6 class='my-0'> ". $data['Pseudo'] ." </h6>
 							<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/><br>
 							<span class = 'text-muted'>Nom: ".$data['Nom']."</span><br>
 							<span class = 'text-muted'>Email: ".$data['Email']."</span><br>
 					</div>
 					<span><a href = 'AdminVendeur.php?Email=".$data['Email']." '> <img src = 'suppression.png'height='50' width ='50'/> </a></span>
 				</li>
 			</ul>
 		</div>
 		</div>";
	}
	
}
}
else{//Informations saisies incorrectes
	echo "<h3>Il n'y a pas de vendeur.</h3>";
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