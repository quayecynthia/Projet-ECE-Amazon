<?php
session_start();

if($_SESSION['admin']==1){
    header('Location: ChoixAdmin.php');
    exit();
}

include('header.php');

?>
	<div id="login">
        <h3 class="text-center text-black pt-5">Connectez vous à votre compte Administrateur</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="ConnexionAdmin.php" method="post">
                            <h3 class="text-center">Connexion</h3>
                            <?php
                                echo '<h6 class="text-center">'.$_SESSION['error_message'].'</h6>';
                            ?>
                            <div class="form-group">
                                <label for="email">Adresse email:</label><br>
                                <?php
                                if($_SESSION['error_message']!=""){
                                    echo '<input type="email" name="email" id="email" class="form-control" style="border-color:red">';
                                }
                                else{
                                    echo '<input type="email" name="email" id="email" class="form-control">';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="Mdp">Mot de Passe:</label><br>
                                <?php
                                if($_SESSION['error_message']){
                                    echo '<input type="password" name="mdp" id="mdp" class="form-control" style="border-color: red">';     
                                }
                                else{
                                    echo '<input type="password" name="mdp" id="mdp" class="form-control">';
                                }
                                if($_SESSION['error_message']!=""){
                                    $_SESSION['error_message'] = "";
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-md" id="bouton" value="Connexion">
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>