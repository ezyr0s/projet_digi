<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/annuaire.css">
    <link rel="stylesheet" href="../css/general.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
<?php session_start()?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Annu'hair</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="../accueil.php">Accueil<span class="sr-only">(current)</span></a>
                <a class="nav-link active" href="../annuaire.php">L'annuaire</a>
                <a class="nav-link" href="../soumettre.php">Soumettre un salon</a>
                <a class="nav-link" href="../compte.php">Mon compte</a>
            </div>
        </div>
    </nav>

    <input type="button"  onclick="history.back()" value="Retour">
    <?php 
    if (isset($_GET['id'])){
    $connexion = new mysqli('localhost','root','','projet_digi','3306');
    $sql = 'SELECT nom,adresse,code_postal,ville,numero_tel,latitude,longitude,web,mail,description,image,image2,image3 FROM salon2 WHERE id='.$_GET['id'].'';
    $req = $connexion->prepare($sql);
    $req -> execute();
    $req -> bind_result($nom,$adresse,$code_postal,$ville,$numero_tel,$lat,$lon,$web,$mail,$description,$image,$image2,$image3);

        while ($req->fetch()){
            include "carte.php";
}
}
if (isset($image)==false){
    $image ="../assets/coif.jpg";
}?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=$image?>" class="d-block w-100" alt="...">
    </div>
    <?php if(isset($image2)){?>
    <div class="carousel-item">
      <img src="<?=$image2?>" class="d-block w-100" alt="...">
    </div>
    <?php }?>
    <?php if(isset($image3)){?>
    <div class="carousel-item">
      <img src="<?=$image3?>" class="d-block w-100" alt="...">
    </div>
    <?php }?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</body>

</html>