<?php
session_start();
$_SESSION['nom_item'] = "";
$_SESSION['description'] = "";
$_SESSION['photo_item'] = "";
$_SESSION['stock'] = "";
$_SESSION['prix'] = "";
$_SESSION['categorie'] = "";

include('header.php');
?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Ajouter un item sur ECE Amazon</h1>
    </div>
</section>

<form action = "NewItemTraitement.php" method ="post">
  <div class="form-group">
    <label for="nom">Nom du produit :</label>
    <?php
      if($_SESSION['error_message']!=""){
        echo '<input type="text" name="nom" id="nom" class="form-control" style="border-color:red">';  
      }
      else{
        echo '<input type="text" name="nom" id="nom" class="form-control"/>';
      }
    ?>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description : </label>
    <?php
      if($_SESSION['error_message']!=""){
        echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Aucune desription" style="border-color:red"></textarea>';  
      }
      else{
        echo '<textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Aucune desription"></textarea>';
      }
    ?>
  </div>

  <div class="form-group">
    <label for="photo">Photo : </label><br>
    <?php
      if($_SESSION['error_message']!=""){
        echo '<input type="file" id="fond" name="photo" accept="image/png, image/jpeg" style="border-color:red">';  
      }
      else{
        echo '<input type="file" id="fond" name="photo" accept="image/png, image/jpeg"/>';
      }
    ?>
    
  </div>
  <div class="form-group">
    <label for="prix">Prix :</label>
    <?php
      if($_SESSION['error_message']!=""){
        echo '<input class="form-control" type="number" name="prix" placeholder="en €" style="border-color:red"/>';  
      }
      else{
        echo '<input class="form-control" type="number" name="prix" placeholder="en €"/>';
      }
    ?>
    
  </div>
  <div class="form-group">
    <label for="quantite">Quantité :</label>
    <?php
      if($_SESSION['error_message']!=""){
        echo '<input class="form-control" type="number" name="stock" style="border-color:red"/>';  
      }
      else{
        echo '<input class="form-control" type="number" name="stock"/>';
      }
    ?>
  </div>

  <div class="form-group">
    <label for="categorie">Catégorie :</label>
    <select class="form-control" id="exampleFormControlSelect1" name="categorie">
      <option value="Intro"> Sélectionner votre catégorie</option>
      <option value="Livres"> Livres</option>
      <option value="Musique"> Musique</option>
      <option value="Vetements-Chaussures"> Vêtements-Chaussures</option>
      <option value="Vetements-Habits"> Vêtements-Habits</option>
      <option value="Sport et Loisir"> Sport et Loisir</option>
    </select>
  </div>
  <div class="form-group row text-center">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Valider la vente</button>
    </div>
  </div>
</form>

<style type="text/css">
  .form-group {
    margin: 20px;
  }
</style>