<?php
session_start();
include('header.php');

$database = "ECEAmazon";

$db_handle = mysqli_connect('localhost', 'root', '' );	
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {

 $email = $_SESSION['email_connected'];
 $sql = "SELECT * FROM acheteur WHERE acheteur.Email LIKE '$email'";
 $result = mysqli_query($db_handle, $sql);

 if (mysqli_num_rows($result) != 0) {
    echo "<h3>Les informations entrées sont correctes.</h3>";
}

 while ($data = mysqli_fetch_assoc($result)) {
        $Num_Carte = substr($data['Num_carte'], 0, 4);
        echo "Nom:" . $data['Nom'] . '<br>';
            echo "Prénom: " . $data['Prenom'] . '<br>';
            echo "Email: " . $data['Email'] . '<br>';
            echo "Mot de Passe: " . $data['Mdp'] . '<br>';
            echo "Adresse1: " . $data['Adresse1'] . '<br>';
            echo "Adresse2: " . $data['Adresse2'] . '<br>';
            echo "Ville: " . $data['Ville'] . '<br>';
            echo "Code_Postal: " . $data['Code_Postal'] . '<br>';
            echo "Pays: " . $data['Pays'] . '<br>';
            echo "Tel: " . $data['Tel'] . '<br>';
            echo "Type_carte: " . $data['Type_carte'] . '<br>';
            echo "Num_carte: " . $Num_Carte . "-****-****-****" .'<br>';
            echo "Expiration_carte: " . $data['Expiration_carte'] . '<br>';
            echo "Nom_carte: " . $data['Nom_carte'] . '<br>';
            echo "Crypto: " . $data['Crypto'] . '<br><br>';
        }

}
else {
echo "Database not found";
}
mysqli_close($db_handle);

?>
