<?php

    session_start();

    include('header.php');
    
    $type_carte= isset($_POST["typecarte"])?$_POST["typecarte"] : "";
    //$type_carte= echo($_POST['typecarte']); 
    $num_carte= isset($_POST["Numero_carte"])?$_POST["Numero_carte"] : ""; 
    $expiration_carte = isset($_POST["Expiration_carte"])?$_POST["Expiration_carte"] : "";
    $nom_carte = isset($_POST["Nom_carte"])?$_POST["Nom_carte"] : "";
    $crypto = isset($_POST["Crypto"])?$_POST["Crypto"] : "";

    $database = "ECEAmazon";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = 'root'
    $db_handle = mysqli_connect('localhost', 'root', '' );  //connect('serveur', 'login', 'passw'); Ca renvoie un entier 0 = pas de connexion
    $db_found = mysqli_select_db($db_handle, $database);

    //erreurs
    $error = 0;

    if($type_carte=="Intro"){
        $error = 1;
        echo "Le type de carte n'est pas rempli"."<br>";
    }
    if($num_carte==""){
        $error = 1;
        echo "Le numero de carte n'est pas rempli"."<br>";
    }
    if($expiration_carte==""){
        $error = 1;
        echo "La date d'expiration de carte n'est pas remplie"."<br>";
    }
    if($nom_carte==""){
        $error = 1;
        echo "Le nom du proprietaire de carte n'est pas rempli"."<br>";
    }
    if($crypto==""){
        $error = 1;
        echo "Le code securite de carte n'est pas rempli"."<br><br>";
    }



    if ($db_found) {

    if($error){

    }
    else{
        //recuperer l'email du client
        $email = $_SESSION['email_connected'];
        $sql = "SELECT * FROM acheteur WHERE acheteur.Email LIKE '$email'
                AND acheteur.Type_carte LIKE '$type_carte'
                AND acheteur.Num_carte LIKE '$num_carte'
                AND acheteur.Expiration_carte LIKE '$expiration_carte'
                AND acheteur.Nom_carte LIKE '$nom_carte'
                AND acheteur.Crypto LIKE '$crypto'";
        $result = mysqli_query($db_handle, $sql);
        
        if (mysqli_num_rows($result) != 0) {
            echo "valide";

            $sql3 = "SELECT * FROM acheteur WHERE acheteur.Email LIKE '$email'";
            $result3 = mysqli_query($db_handle, $sql3);
            while ($data = mysqli_fetch_assoc($result3)) {
                $idpan = $data['IdPan'];
                $sql2 = "SELECT * FROM bonitem WHERE bonitem.IdPan LIKE '$idpan'";
                $result2 = mysqli_query($db_handle, $sql2);
                while ($data = mysqli_fetch_assoc($result2)) {
                    $quantite = $data['Quantite'];
                    $iditem = $data['IdItem'];
                    echo ' Quantite : '.$data['Quantite'];
                    $sql4 = "SELECT * FROM item WHERE Id LIKE '$iditem'";
                    $result4 = mysqli_query($db_handle, $sql4);
                    while ($data = mysqli_fetch_assoc($result4)) {
                        $stock = $data['Stock'];
                        $vendu = $data['Vendu'];
                        $stock -= $quantite; 
                        $vendu += $quantite;
                        echo 'item number : '.$data['Id'];
                        echo ' Ancien Stock : '.$data['Stock'];

                        $sql5 = "UPDATE item SET Stock = '$stock' WHERE Id = '$iditem'";    
                        $result5 = mysqli_query($db_handle, $sql5);
                        $sql6 = "UPDATE item SET Vendu = '$vendu' WHERE Id = '$iditem'";    
                        $result6 = mysqli_query($db_handle, $sql6);
                    }
                }
            }

            $sql3 = "INSERT INTO panier(Id, Prix) VALUES(NULL, 0)";//prix de base nul
            $result3 = mysqli_query($db_handle, $sql3);
            $idpan = mysqli_insert_id($db_handle);

            $sql4 ="UPDATE acheteur SET IdPan = '$idpan' WHERE Email = '$email'";
            $result4 = mysqli_query($db_handle, $sql4);
            $_SESSION['panier'] = $idpan;

            $sql7 = "DELETE FROM item WHERE Stock = '0'";
            $result7 = mysqli_query($db_handle, $sql7);



            /*$header="MIME-Version: 1.0\r\n";
            $header.=' From : "Cynthia Quaye"<cynthia.quaye77@gmail.com>' . "\n";
            $header.= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header.= 'Content-Transfer-Encoding : 8bit';

            $message='<html>
                        <body>
                            <div align="center">
                                Coucou bizu ! <br/>
                            </div>
                        </body>
                    </html>';
            mail("cynthia.quaye@edu.ece.fr", "message php", $message, $header);*/
        }
        else{
            echo "non valide";
        }
    }

    }
    //si le BDD n'existe pas
    else {
     echo "Database not found";
    }//end else
    //fermer la connection
    mysqli_close($db_handle);
?>