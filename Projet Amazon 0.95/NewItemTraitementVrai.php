<?php
session_start();

include('header.php');

?>

<?php

 $_SESSION['verif']=2;
 $_SESSION['nom_item'] = isset($_POST["nom"])?$_POST["nom"] : $_SESSION['nom_item'];
 $_SESSION['description'] =  isset($_POST["description"])?$_POST["description"] : $_SESSION['description'];
 $_SESSION['photo_item'] = isset($_POST["photo"])?$_POST["photo"] : $_SESSION['photo_item'];
 $_SESSION['prix'] = isset($_POST["prix"])?$_POST["prix"] : $_SESSION['prix'];
 $_SESSION['stock'] = isset($_POST["stock"])?$_POST["stock"] : $_SESSION['stock'];
 $_SESSION['categorie'] = isset($_POST["categorie"])?$_POST["categorie"] : $_SESSION['categorie'];
 if(!isset($_SESSION['type'])) $_SESSION['type'] = "";

 if($_SESSION['categorie']=="Vetements-Chaussures")$_SESSION['type'] = "Chaussure";
 else if($_SESSION['categorie']=="Vetements-Habits")$_SESSION['type'] = "Habits";


 $email = $_SESSION['email'];
 $nom = $_SESSION['nom_item'];
 $description = $_SESSION['description'];
 $photo = $_SESSION['photo_item'];
 $prix = $_SESSION['prix'];
 $stock = $_SESSION['stock'];
 $categorie = $_SESSION['categorie'];
 $type = $_SESSION['type'];

 $taille = isset($_POST["taille"])?$_POST["taille"] : "";
 $sexe = isset($_POST["sexe"])?$_POST["sexe"] : "";
 $couleur = isset($_POST["couleur"])?$_POST["couleur"] : "";



$database = "ECEAmazon";

$db_handle = mysqli_connect('localhost', 'root', '' );	
$db_found = mysqli_select_db($db_handle, $database);

$error = 0;

if($nom==""){
	$error = 1;
	echo "Le nom n'est pas rempli"."<br>";
}
if($description==""){
	$error = 1;
	echo "La description n'est pas rempli"."<br>";
}

if($photo==""){
	$error = 1;
	echo "La photo n'est pas rempli"."<br>";
}
if($prix==""){
	$error = 1;
	echo "Le prix n'est pas rempli"."<br>";
}

if($stock==""){
	$error = 1;
	echo "Le stock n'est pas rempli"."<br>";
}
if($categorie==""){
	$error = 1;
	echo "La categorie n'est pas rempli"."<br>";
}

if ($db_found) {

if($error){

}
else{
	if($sexe=="" && strlen($categorie)>15){
		if($categorie == "Vetements-Chaussures"){
			echo '<form action="NewItemTraitement.php" method="post">
				<table>
				<tr>
				<td>Nom:</td>
				<td>'.$_SESSION['nom_item'].'</td>
			</tr>
			<tr>
				<td>Description:</td>
				<td>'.$_SESSION['description'].'</textarea></td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
    			<td><img src="'.$_SESSION['photo_item'].'" height="30" width ="60"</td>
			</tr>
			<tr>
			<tr>
				<td>Prix</td>
				<td>'.$_SESSION['prix'].'€</td>
			</tr>
			<tr>
				<td>Stock</td>
				<td>'.$_SESSION['stock'].'</td>
			</tr>

					<tr>
					<td>Pointure:</td>
					<td><input type="number" name="taille" value="38" min="32" max="48"></td>
					<tr>
					<tr>
						<td>Sexe: </td>
						<td><select name="sexe">
						<option value="Intro"> Sexe</option>
						<option value="Homme"> Homme</option>
						<option value="Femme"> Femme</option>
						<option value="Unisexe"> Unisexe</option>
						</select></td>
					</tr>
					<tr>
						<td>Couleur: </td>
						<td><select name="couleur">
						<option value="Intro"> Sélectionner la couleur de votre article</option>
						<option value="Rouge"> Rouge</option>
						<option value="Bleu"> Bleu</option>
						<option value="Jaune"> Jaune</option>
						<option value="Vert"> Vert</option>
						</select></td>
					</tr>
					<tr>
				<td colspan="2" align="center">
				<input type="submit" name="validation" value="Ajouter un item"  />
				</td>
			</tr>
				</table>
			</form>';
			$_SESSION['categorie'] = "Vetement";
	}
	else if($categorie == "Vetements-Habits"){
		echo '<form action="NewItemTraitement.php" method="post">
				<table>
				<tr>
				<td>Nom:</td>
				<td>'.$_SESSION['nom_item'].'</td>
			</tr>
			<tr>
				<td>Description:</td>
				<td>'.$_SESSION['description'].'</textarea></td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
    			<td><img src="'.$_SESSION['photo_item'].'" height="30" width ="60"</td>
			</tr>
			<tr>
			<tr>
				<td>Prix</td>
				<td>'.$_SESSION['prix'].'€</td>
			</tr>
			<tr>
				<td>Stock</td>
				<td>'.$_SESSION['stock'].'</td>
			</tr>
					<tr>
					<td>Taille:</td>
					<td><select name="taille">
						<option value="Intro"> Taille</option>
						<option value="XS"> XS</option>
						<option value="S"> S</option>
						<option value="M"> M</option>
						<option value="L"> L</option>
						<option value="XL"> XL</option>
						<option value="XXL"> XXL</option>
						</select></td>
					<tr>
					<tr>
						<td>Sexe: </td>
						<td><select name="sexe">
						<option value="Intro"> Sexe</option>
						<option value="Homme"> Homme</option>
						<option value="Femme"> Femme</option>
						<option value="Unisexe"> Unisexe</option>
						</select></td>
					</tr>
						<td>Couleur: </td>
						<td><select name="couleur">
						<option value="Intro"> Sélectionner la couleur de votre article</option>
						<option value="Rouge"> Rouge</option>
						<option value="Bleu"> Bleu</option>
						<option value="Jaune"> Jaune</option>
						<option value="Vert"> Vert</option>
						</select></td>
					</tr>
					<tr>
				<td colspan="2" align="center">
				<input type="submit" name="validation" value="Ajouter un item"  />
				</td>
			</tr>
				</table>';
				$_SESSION['categorie'] = "Vetement";
			echo '</form>';
			
	}
	}
	else if($sexe=="" && strlen($categorie)<=15){
		$sql = "INSERT INTO item(Id, Nom, Photo, Description, Prix, Stock, Categorie, IdVendeur)
 			 VALUES(NULL, '$nom', '$photo', '$description', '$prix', '$stock', '$categorie', '$email')";
 		$result = mysqli_query($db_handle, $sql);
 		header('Location: vendeur.php');
		exit();
	}

	
	if($categorie == "Vetement"){
		$sql = "INSERT INTO item(Id, Nom, Photo, Description, Prix, Stock, Categorie, IdVendeur)
 			 VALUES(NULL, '$nom', '$photo', '$description', '$prix', '$stock', '$categorie', '$email')";
 		$result = mysqli_query($db_handle, $sql);

 		$id_item = mysqli_insert_id($db_handle);

 		$sql2 = "INSERT INTO variation(Id, Sexe, Couleur, Taille, Type)VALUES(NULL, '$sexe', '$couleur', '$taille', '$type')";
 		$result2 = mysqli_query($db_handle, $sql2);

 		$id_variation = mysqli_insert_id($db_handle);

 		$sql3 = "INSERT INTO varie(IdItem, IdVar)VALUES('$id_item', '$id_variation')";
 		$result3 = mysqli_query($db_handle, $sql3);
 		header('Location: vendeur.php');
		exit();
	}
}
}

	//si le BDD n'existe pas
	else {
	 echo "Database not found";
	}
	mysqli_close($db_handle);
?>
