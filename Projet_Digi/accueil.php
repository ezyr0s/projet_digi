<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/general.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="accueil.php">Annu'hair</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" href="accueil.php">Accueil<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="annuaire.php">L'annuaire</a>
                <a class="nav-link" href="soumettre.php">Soumettre un salon</a>
                <a class="nav-link" href="compte.php">Mon compte</a>
            </div>
        </div>
    </nav>
<?php
session_start();
if(isset($_SESSION['utilisateur'])) {?>
   <div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-5"></div>
        <div class="col-md-4">
        <p class="top-right">Vous êtes connecté en tant que <?=$_SESSION['utilisateur']?>. <br><a href="./compte.php"><input type="button" class="btn btn-primary" value="Compte"></a></p>
        </div>
    </div>
</div>
<?php } ?>

    <h1>Bienvenue</h1>
    <p>
        Bienvenue sur le site de recensement des coiffeurs de France ! Ce site a pour but de vous offrir un moyen simple de trouver un coiffeur près de chez vous.
    </p>

    
</body>

</html>