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

<a class="navbar-brand" href="Accueil.php">ECE Amazon</a>
<button class="navbar-toggler navbar-dark" type="button" datatoggle="collapse" data-target="#main-navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="main-navigation">
<ul class="navbar-nav">
<li class="nav-item"><a class="nav-link" href="Admin.php">Admin</a></li>
<li class="nav-item"><a class="nav-link" href="ConnexionVendeur">Vendre</a></li>
<li class="nav-item"><a class="nav-link" href="Panier.php">Panier</a></li>
<li class="nav-item"><a class="nav-link" href="VotreCompte.php">Votre Compte</a></li>
</ul>
</div>

</nav>
<div id="signup">
        <h2 class="text-center text-black pt-5">Confirmation bancaire</h2>
        <div class="contain">
            <div id="signup-row" class="row justify-content-center align-items-center">
                <div id="signup-column" class="col-md-6">
                    <div id="signup-box" class="col-md-12">
                        <form id="signup-form" class="form" action="Paiement.php" method="post">
        <table>
                <td>
                    <label for="typecarte">Type de carte</label>
                    <td>
                        <select name="typecarte" id="typecarte">
                            <option value="Intro">Selectionner votre type de carte</option>
                            <option value="VISA">VISA</option>
                            <option value="MASTERCARD">MASTERCARD</option>
                            <option value="PAYPAL">PAYPAL</option>
                            <option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
                        </select>
                    </td>
                </td>
            </tr>
            
            <tr>
                <td>Numero carte:</td>
                <td><input type="text" name="Numero_carte" max ="9999999999999999"/></td>
            </tr>
            <tr>
                <td>Date expiration carte:</td>
                <td><input type="date" name="Expiration_carte"/></td>
            </tr>
            <tr>
                <td>Proprietaire carte:</td>
                <td><input type="text" name="Nom_carte"/></td>
            </tr>
            <tr>
                <td>Securite:</td>
                <td><input type="number" name="Crypto" max = "9999"/></td>
            </tr>
    
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Valider" />
                    <input type="reset" name="Réinitialiser" value="Réinitialiser" />
                </td>
            </tr>
        </table>

    </form>
</div>
</div>
</body>
</html>