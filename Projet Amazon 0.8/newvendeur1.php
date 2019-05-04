<?php
session_start();
include('header.php');
?>
	<div id="signup">
        <h2 class="text-center text-black pt-5">Inscription</h2>
        <div class="contain">
            <div id="signup-row" class="row justify-content-center align-items-center">
                <div id="signup-column" class="col-md-6">
                    <div id="signup-box" class="col-md-12">
                        <form id="signup-form" class="form" action="newvendeur.php" method="post">
		<table>
			<tr>
				<td>Email:</td>
				<td>
				<div class="form-group">
                	<input type="email" name="email" id="email" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
				<td>Pseudo:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="pseudo" id="pseudo" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
				<td>Mot de Passe:</td>
				<td>
				<div class="form-group">
                	<input type="password" name="mdp" id="mdp" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Nom:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="nom" id="nom" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Prenom:</td>
				<td>
				<div class="form-group">
                	<input type="text" name="prenom" id="prenom" class="form-control">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Photo:</td>
				<td>
				<div class="form-group">
                	<input type="file" id="fond" name="photo" accept="image/png, image/jpeg">
                </div>
            	</td>
			</tr>
			<tr>
			<tr>
				<td>Fond:</td>
				<td>
				<div class="form-group">
                	<input type="file" id="fond" name="fond" accept="image/png, image/jpeg">
                </div>
            	</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value="Inscription"  />
				</td>
			</tr>

		</table>
	</form>
</body>
</html>