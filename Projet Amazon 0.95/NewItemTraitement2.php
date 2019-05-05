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
	$_SESSION['error_message'] = "Les informations entrées sont incorrectes";
	header('Location: newitem2.php');
	exit();
}
else{
	if($sexe=="" && strlen($categorie)>15){
		if($categorie == "Vetements-Chaussures"){
			echo '<section class="jumbotron text-center">
				    <div class="container">
				        <h1 class="jumbotron-heading">Veuillez entrer les informations</h1>
				    </div>
				</section>

				<form action = "NewItemTraitement2.php" method ="post">
				<table>
				<tr>
				  <div class="form-group">
				    <td><label for="nom">Nom du produit :</label></td>
				    <td><label>'.$_SESSION['nom_item'].'</label></td>
				  </div>
				</tr>
				<tr>
				  <div class="form-group">
				    <td><label for="exampleFormControlTextarea1">Description : </label></td>
				    <td><textarea>'.$_SESSION['description'].'</textarea></td>
				  </div>
				 <tr>

				 <tr>
				  <div class="form-group">
				    <td><label for="photo">Photo : </label><br></td>
				    <td><img src="'.$_SESSION['photo_item'].'" height="30" width ="60"></td>
				  </div>
				 </tr>

				 <tr>
				  <div class="form-group">
				    <td><label for="prix">Prix :</label></td>
				    <td><textarea>'.$_SESSION['prix'].'€</textarea></td>
				  </div>
				 </tr>

				 <tr>
				  <div class="form-group">
				    <td><label for="quantite">Stock :</label></td>
				    <td><textarea>'.$_SESSION['stock'].'€</textarea></td>
				  </div>
				 </tr>

				 <tr>
				  <div class="form-group">
				    <td><label for="taille">Pointure :</label></td>
				    <td><input type="number" name="taille" value="38" min="32" max="48"></td>
				  </div>
				 </tr>

				 <tr>
				  <div class="form-group">
				    <td><label for="sexe">Sexe :</label></td>
				    <td><select class="form-control" id="exampleFormControlSelect1" name="sexe">
				      <option value="Intro"> Sexe</option>
				      <option value="Homme"> Homme</option>
				      <option value="Femme"> Femme</option>
				      <option value="Unisex"> Unisex</option>
				    </select></td>
				  </div>
				 </tr>

				  <div class="form-group">
				    <label for="couleur">Couleur :</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="couleur">
				      <option value="Intro"> Sélectionner la couleur de votre article</option>
				      <option value="Rouge"> Rouge</option>
				      <option value="Bleu"> Bleu</option>
				      <option value="Jaune"> Jaune</option>
				      <option value="Vert"> Vert</option>
				      <option value="Noir"> Noir</option>
				      <option value="Blanc"> Blanc</option>
				    </select>
				  </div>

				  <div class="form-group row text-center">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary">Valider la vente</button>
				    </div>
				  </div>
				  </table>';

				  $_SESSION['categorie'] = "Vetement";
				echo '</form>';
		}
		else if($categorie == "Vetements-Habits"){
			echo '<section class="jumbotron text-center">
				    <div class="container">
				        <h1 class="jumbotron-heading">Veuillez entrer les informations</h1>
				    </div>
				</section>

				<form action = "NewItemTraitement2.php" method ="post">
				  <div class="form-group">
				    <label for="nom">Nom du produit :</label>
				    <label>'.$_SESSION['nom_item'].'</label>
				  </div>

				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Description : </label>
				    <textarea>'.$_SESSION['description'].'</textarea>
				  </div>

				  <div class="form-group">
				    <label for="photo">Photo : </label><br>
				    <img src="'.$_SESSION['photo_item'].'" height="30" width ="60">
				  </div>

				  <div class="form-group">
				    <label for="prix">Prix :</label>
				    <textarea>'.$_SESSION['prix'].'€</textarea>
				  </div>

				  <div class="form-group">
				    <label for="quantite">Stock :</label>
				    <textarea>'.$_SESSION['stock'].'€</textarea>
				  </div>

				  <div class="form-group">
				    <label for="taille">Taille :</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="taile">
				      <option value="Intro"> Taille</option>
				      <option value="XS"> XS</option>
				      <option value="S"> S</option>
				      <option value="M"> M</option>
				      <option value="L"> L</option>
				      <option value="XL"> XL</option>
				      <option value="XXL"> XXL</option>
				    </select>
				  </div>

				  <div class="form-group">
				    <label for="sexe">Sexe :</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="sexe">
				      <option value="Intro"> Sexe</option>
				      <option value="Homme"> Homme</option>
				      <option value="Femme"> Femme</option>
				      <option value="Unisex"> Unisex</option>
				    </select>
				  </div>

				  <div class="form-group">
				    <label for="couleur">Couleur :</label>
				    <select class="form-control" id="exampleFormControlSelect1" name="couleur">
				      <option value="Intro"> Sélectionner la couleur de votre article</option>
				      <option value="Rouge"> Rouge</option>
				      <option value="Bleu"> Bleu</option>
				      <option value="Jaune"> Jaune</option>
				      <option value="Vert"> Vert</option>
				      <option value="Noir"> Noir</option>
				      <option value="Blanc"> Blanc</option>
				    </select>
				  </div>

				  <div class="form-group row text-center">
				    <div class="col-sm-10">
				      <button type="submit" class="btn btn-primary">Valider la vente</button>
				    </div>
				  </div>';
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
