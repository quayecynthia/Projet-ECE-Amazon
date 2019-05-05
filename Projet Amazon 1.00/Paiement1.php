<?php
session_start();
include('header.php');

if($_SESSION['connected']!=2){
    $_SESSION['ready'] = -1;
    header('Location: VotreCompte.php');
    exit();
}


?>

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