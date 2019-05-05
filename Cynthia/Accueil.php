<?php
session_start();
$_SESSION['error_message'] = "";
if(!isset($_SESSION['connected'])) $_SESSION['connected'] = '0';
if(!isset($_SESSION['nom_connected'])) $_SESSION['nom_connected'] = "";
if(!isset($_SESSION['prenom_connected'])) $_SESSION['prenom_connected'] = "";
if(!isset($_SESSION['email_connected'])) $_SESSION['email_connected'] = "";
if(!isset($_SESSION['image_connected'])) $_SESSION['image_connected'] = "";
if(!isset($_SESSION['panier'])) $_SESSION['panier'] = "";
if(!isset($_SESSION['admin'])) $_SESSION['admin'] = '0';
if(!isset($_SESSION['ready'])) $_SESSION['ready'] = '0';

include('header.php');

$database = "ECEAmazon";

$db_handle = mysqli_connect('localhost', 'root', '' );	
$db_found = mysqli_select_db($db_handle, $database);


if ($db_found) {

?>



<div id="Catégorie">

	<div id="CateHeader">
		<h2>Nos Catégories</h2>
	</div>

	<div id="Case1">
		<a href="Item.php?Categorie=Vetement">
		<img src="Vetement.png">
		</a>
	</div>

	<div id="Case2">
		<a href="Item.php?Categorie=Musique">
		<img src="Musique.png">
		</a>
	</div>

	<div id="Case3">
		<a href="Item.php?Categorie=Livres">
		<img src="Livres.png">
		</a>
	</div>

	<div id="Case4">
		<a href="Item.php?Categorie=Sport et Loisir">
		<img src="Sport.png">
		</a>
	</div>

</div>
<br>


<?php

include('BestSeller.php');
}
else{
	 echo "Database not found";
	}
mysqli_close($db_handle);

?>	
</body>
</html>