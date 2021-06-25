<html>
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
        <link rel="stylesheet" href="../css/general.css">
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
                <a class="nav-link" href="../accueil.php">Accueil<span class="sr-only">(current)</span></a>
                <a class="nav-link" href="../annuaire.php">L'annuaire</a>
                <a class="nav-link" href="../soumettre.php">Soumettre un salon</a>
                <a class="nav-link active" href="../compte.php">Mon compte</a>
            </div>
        </div>
    </nav> 

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form id="connexion" method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="utilisateur" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                    <small id="mdpLost"><a href="accueil.php"> Mot de passe oublié ? Cliquez ici</a></small>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button><br>
                <br><br><br>
                <div class="card" style="width: 19rem;">
                    <div class="card-body">
                        <h5 class="card-title">Vous n'avez pas de compte ?</h5>
                        <a href="./creation_compte.php" class="btn btn-primary">Cliquez ici pour créer un compte</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php
$connexion = new mysqli('localhost', 'root', '', 'projet_digi', '3306');
if (isset($_POST['utilisateur'])) {
    $req = $connexion->prepare('SELECT COUNT(*) FROM compte WHERE utilisateur = ? AND mdp = ?');
    $req->bind_param('ss', $_POST['utilisateur'], $_POST['password']);
    $req->execute();
    $req->bind_result($count);
    while ($req->fetch()) {
        $data = array('count' => $count);
        if ($data['count'] === 1) {
            session_start();
            $_SESSION['utilisateur'] = $_POST['utilisateur'];
            header('Location:../compte.php');
            exit();
        } else {
            echo '<script>window.alert("L\'identifiant ou le mot de passe renseigné n\'est pas bon.");</script>';
        }
    }
}

?>
</body>
</html>