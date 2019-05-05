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
			$q = isset($_GET["q"])?$_GET["q"] : ""; 

			if($q == ""){
				$q = isset($_POST["q"])?$_POST["q"] : ""; 
			}

		    if ($q!="") {
		    	$sql = "SELECT * FROM item  WHERE item.Nom LIKE '%$q%' OR item.Nom LIKE '$q%' OR item.Nom LIKE '%$q'";
		        $result = mysqli_query($db_handle, $sql);
		    }
		    else {
	        	
      		}


			echo '<header class="page-header header container-fluid">	
						<div class="description">
							<h1>Bienvenue !</h1>
							<p>
								Voici ci-dessous une liste de nos articles. Chez nous la qualité prime, pour une fois 
								ne vous souciez de rien à part votre bien-etre.
							</p>
						</div>
					</div>
				</header>
			';

			echo '<div class="container pt-4">
			<div class="row">';

		 	while ($data = mysqli_fetch_assoc($result)) {

		 		if($data['Categorie']=="Vetement"){
			 		$Iditem = $data['Id'];
			 		$sql4 = "SELECT * FROM variation WHERE variation.Id IN (SELECT varie.IdVar FROM varie WHERE varie.IdItem LIKE '$Iditem')";
			 		$result4 = mysqli_query($db_handle, $sql4);
			 		while ($data2 = mysqli_fetch_assoc($result4)) {
			 			$taille = $data2['Taille'];
			 			$sexe =	$data2['Sexe'];
			 			$couleur = $data2['Couleur'];
 					}
 				}

				echo '<div class="col-md-4 shadow mb-4 bg-white">
			 			<div class="card mb-4 shadow-sm">';
			 				echo "<img src= ".$data['Photo']." alt='Image non trouvée' height='200' width =100%/>";
							  echo '</div>';
							  echo '<div class="card-body">
							  			<h3 class="card-text">'.$data['Nom'].'</h3>
							  			<p class="card-text">
				  							'.$data['Description'].'
				  						</p>';
	  			if($data['Categorie']=="Vetement"){
	  				echo '<p class="card-text">
	  					Taille: '.$taille.' Sexe: '.$sexe.'
	  				</p>';
	  			}
	  			echo '<div class="d-flex justify-content-between align-items-center">
	  				<div class="btn-group">
	  					<form action="Item.php?iditem='.$data['Id'].'" method="post">
	  					<button type="button" class="btn btn-sm btn-outline-secondary">'.$data['Prix'].'€</button>
	  					Qté :<input type="number" name="quantite" value="0" min="0" max="'.$data['Stock'].'"/>
	  					Stock :<button type="button" class="btn btn-sm btn-outline-secondary">'.$data['Stock'].'</button>  
	  				</div>					
	  					<a href = "Item.php?iditem='.$data['Id'].'"">
		 				<input type="image" src = "ajout.png" height="40" width ="40"/></a></form>
	  			</div>
	  		</div>
	  	</div>';

	//$prix = $data['Prix'];
	//$stock = $data['Stock'];
	$quantite = isset($_POST["quantite"])?$_POST["quantite"] : "";
	if($quantite == 0 || $quantite == ""){
		$ajoutitem = false;

	}
	else{
		$ajoutitem = is_numeric($iditem) ? $iditem : false;
		$ajoutitem = true;
	}
	}
	echo '</div>
		</div>';
				

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