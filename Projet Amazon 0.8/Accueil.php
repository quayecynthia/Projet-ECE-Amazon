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

include('header.php');
?>



<div id="Catégorie">

	<div id="CateHeader">
		<h1>Nos Catégories</h1>
	</div>

	<div id="Case1">
		<a href="Item.php?Categorie=Vetement">
		<img src="vetement.png" style="width: 100%;">
		</a>
	</div>

	<div id="Case2">
		<a href="Item.php?Categorie=Musique">
		<img src="musique.png" style="width: 100%;">
		</a>
	</div>

	<div id="Case3">
		<a href="Item.php?Categorie=Livres">
		<img src="books.png" style="width: 100%;">
		</a>
	</div>

	<div id="Case4">
		<a href="Item.php?Categorie=Sport et Loisir">
		<img src="Sport.png" style="width: 100%;">
		</a>
	</div>

</div>

<?php
	include('footer.php');
?>	
</body>
</html>