<?php
session_start();
$_SESSION['verif']=0;
if($_SESSION['image_connected']!=""){
    $_SESSION['verif'] = 2;
    header('Location: vendeur.php');
    exit();
}
include('header.php');

?>
<div id="login">
        <h3 class="text-center text-black pt-5">Connectez vous à votre compte vendeur</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="vendeur.php" method="post">
                            <h3 class="text-center">Connexion</h3>
                            <div class="form-group">
                                <label for="email">Adresse email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pseudo">Pseudo:</label><br>
                                <input type="pseudo" name="pseudo" id="pseudo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Mdp">Mot de Passe:</label><br>
                                <input type="password" name="mdp" id="mdp" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-md" id="bouton" value="Connexion">
                            </div>
                            <br>
                            <div id="register-link" class="text-right">
                                <a href="newvendeur1.php">Pas de compte ? Enregistrez vous</a>	
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>