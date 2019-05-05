<div id="BestSeller">
	 <?php
		$tab1 = array("");
		$sql = "SELECT * FROM item WHERE Categorie LIKE 'Vetement' ORDER BY Vendu DESC ";
		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) {
			array_push($tab1, $data['Photo']);
		}

		echo '
    <div class="row">
		<div id="Vetements" class="carousel slide col-md-3" data-ride="carousel">
      <h3 style="text-align: center">Vetement</h3>
  			<div class="carousel-inner">
    			<div class="carousel-item active">
      			<img src="'.$tab1[1].'" class="d-block w-100" alt="...">
    		</div>
    		<div class="carousel-item">
      			<img src="'.$tab1[2].'" class="d-block w-100" alt="...">
    		</div>
    		<div class="carousel-item">
      			<img src="'.$tab1[3].'" class="d-block w-100" alt="...">
    		</div>
  		</div>
  		<a class="carousel-control-prev" href="#Vetements" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#Vetements" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>';
	?>

   
   <?php
    $tab2 = array("");
    $sql = "SELECT * FROM item WHERE Categorie LIKE 'Sport et Loisir' ORDER BY Vendu DESC ";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
      array_push($tab2, $data['Photo']);
    }

    echo '
    <div id="Sport" class="carousel slide col-md-3" data-ride="carousel">
      <h3 style="text-align: center">Sport</h3>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="'.$tab2[1].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab2[2].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab2[3].'" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#Sport" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Sport" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>';
  ?>

  <?php
    $tab3 = array("");
    $sql = "SELECT * FROM item WHERE Categorie LIKE 'Musique' ORDER BY Vendu DESC ";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
      array_push($tab3, $data['Photo']);
    }

    echo '
    <div id="Musique" class="carousel slide col-md-3" data-ride="carousel">
      <h3 style="text-align: center">Musique</h3>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="'.$tab3[1].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab3[2].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab3[3].'" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#Musique" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Musique" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>';
      ?>

      <?php
    $tab4 = array("");
    $sql = "SELECT * FROM item WHERE Categorie LIKE 'Livres' ORDER BY Vendu DESC ";
    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)) {
      array_push($tab4, $data['Photo']);
    }

    echo '
    <div id="Livres" class="carousel slide col-md-3" data-ride="carousel">
      <h3 style="text-align: center">Livres</h3>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="'.$tab4[1].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab4[2].'" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$tab4[3].'" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#Livres" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Livres" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      </div>';
      ?>

</div>