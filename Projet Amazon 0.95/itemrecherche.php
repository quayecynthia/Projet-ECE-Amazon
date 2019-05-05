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

			$q = isset($_POST["q"])?$_POST["q"] : ""; ;

		    if ($q!="") {
		    	$sql = 'SELECT * FROM item  WHERE Nom LIKE "%'.$q.'%" ORDER BY Id DESC';
		        $result = mysqli_query($db_handle, $sql);
		    }
		    else {
	        	header('Location: Accueil.php');
	        	exit();
      		}

		 	echo "<h3>Voici les items associés à la recherche : ".$q." </h3>";
		 	while ($data = mysqli_fetch_assoc($result)) {

				echo "Nom: " . $data['Nom'] . '<br>';	
			 	echo "Prix: " . $data['Prix'] . '<br>';
				echo "Stock: " . $data['Stock'] . '<br>';
				echo "Email vendeur: " . $data['IdVendeur'] . '<br>';
			 	echo "Description: " . $data['Description'] . '<br>';
				echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='60' width ='60'/>";
				echo "<form action='Item.php?iditem=".$data['Id']."' method='post'><a href = 'Item.php?iditem=".$data['Id']."'>
					 <input type='image' src = 'ajout.png'height='40' width ='40'/></a>";
				echo "Quantité :<input type='number' name='quantite' value='0' min='0' max='".$data['Stock']."'/></form><br>"; //afficher les stocks
				$prix = $data['Prix'];
				$quantite = isset($_POST["quantite"])?$_POST["quantite"] : "";
				
			}

			error_reporting(0);
			if($ajoutitem){	//si on a cliqué sur ajout item et on regarde si le panier est deja créé

				if($_SESSION['panier'] == ""){//le panier n'est pas créé
					$prixtotal = 0;
					$prixtotal += $prix*$quantite;
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
						$prixtotal += $prix*$quantite;
						$sql4 ="UPDATE panier SET Prix = '$prixtotal' WHERE Id = '$idpan'"; //maybe panier.Prix
						$result4 = mysqli_query($db_handle, $sql4);
					}
				}	
				echo 'IdItem : '.$iditem.' Idpan : '.$idpan.' Quantite : '.$quantite;	
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