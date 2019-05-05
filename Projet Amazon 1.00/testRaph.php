<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ECE Amazon - Créer votre compte</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<div class="page-content">
		<div class="form-v1-content">
			<div class="wizard-form">
		        <form class="form-register" action="NewAcheteur.php" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>01</span></p>
			            	<span class="step-text">Infomations Personelles</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Infomations Personelles</h3>
									<p>S'il vous plait entrez vos informations et procéder à l'étape suivante afin que nous puissions créer votre compte.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<fieldset>
											<legend>Prenom</legend>
											<input type="text" class="form-control" id="first-name" name="Prenom" placeholder="First Name" required>
										</fieldset>
									</div>
									<div class="form-holder">
										<fieldset>
											<legend>Nom</legend>
											<input type="text" class="form-control" id="last-name" name="Nom" placeholder="Last Name" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Email</legend>
											<input type="email" name="Email" id="your_email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Mot de Passe</legend>
											<input type="password" class="form-control" id="mdp" name="Mdp" placeholder="password" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Numéro Téléphone</legend>
											<input type="text" class="form-control" id="phone" name="Telephone" placeholder="+330601010101" required>
										</fieldset>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>02</span></p>
			            	<span class="step-text">Votre domicile</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Votre domicile</h3>
									<p>S'il vous plait entrez vos informations et procéder à l'étape suivante afin que nous puissions créer votre compte.  </p>
								</div>
								
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Adresse</legend>
											<input type="text" name="Adresse1" id="your_address" class="form-control" placeholder="Ligne1" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<input type="text" name="Adresse2" id="your_address2" class="form-control" placeholder="Ligne2">
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Ville</legend>
											<input type="text" name="Ville" id="your_city" class="form-control" placeholder="Ville" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Code Postal</legend>
											<input type="number" name="Code_postale" id="your_zip" class="form-control" placeholder="Code Postal" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Pays</legend>
											<input type="country" name="Pays" id="your_country" class="form-control" placeholder="Pays" required>
										</fieldset>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>03</span></p>
			            	<span class="step-text">Vos infos bancaires</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="wizard-header">
									<h3 class="heading">Vos infos bancaires</h3>
									<p>S'il vous plait entrez vos informations et procéder à l'étape suivante afin que nous puissions créer votre compte.  </p>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Type de carte</legend>
											<select id="typecarte" name="typecarte">
										      <option value="Intro">Selectionner votre type de carte</option>
                                              <option value="VISA">VISA</option>
                                              <option value="MASTERCARD">MASTERCARD</option>
                                              <option value="PAYPAL">PAYPAL</option>
                                              <option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
										    </select>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Votre Numéro de Carte</legend>
											<input type="number" name="Numero_carte" id="your_cardnumber" class="form-control" placeholder="Card number" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Date d'expiration</legend>
											<input type="date" name="Expiration_carte" id="your_expdate" class="form-control" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Propriétaire</legend>
											<input type="text" name="Nom_carte" id="your_cardname" class="form-control" placeholder="Prénom Nom" required>
										</fieldset>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<legend>Cryptogramme</legend>
											<input type="number" name="Crypto" id="your_cardcrypto" class="form-control" placeholder="XXX" max = "999" required>
										</fieldset>
									</div>
								</div>	

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<input type="submit" value="Valider" />
                                		</fieldset>
									</div>
								</div>

								<div class="form-row">
									<div class="form-holder form-holder-2">
										<fieldset>
											<input type="reset" name="Réinitialiser" value="Réinitialiser" />
                                		</fieldset>
									</div>
								</div>		
								

							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery.steps.js"></script>
	<script src="js/main.js"></script>
</body>
</html>