<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body>
    <?php session_start() ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="accueil.php">Annu'hair</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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


    <p>
        <h1>Nouveau compte</h1>
    </p>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form method="post" id="connexion">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="newUser">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" name="newPwd">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmer le Mot de passe</label>
                        <input type="password" class="form-control" name="confirmNewPwd">
                    </div>
                    <div class="form-group form-check">
                    </div>
                    <button type="submit" name="inscription" class="btn btn-primary" value="Créer">Créer</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <?php
    if (isset($_POST['inscription']) && $_POST['inscription'] == 'Créer') {
        if (!empty($_POST['newUser'])  && (!empty($_POST['newPwd'])) && (!empty($_POST['confirmNewPwd']))) {
            if ($_POST['newPwd'] !== $_POST['confirmNewPwd']) {
                echo '<script>window.alert("Les 2 mots de passes ne sont pas identiques.");</script>';
            } else {
                $connexion = new mysqli("localhost", "root", "", "projet_digi", "3306");
                $req_find = $connexion->prepare('SELECT COUNT(*) FROM compte WHERE utilisateur = ?');
                $req_find->bind_param('s', $_POST['newUser']);
                $req_find->execute();
                $req_find->bind_result($count_crea);
                $req_find->fetch();
                $data = array('count' => $count_crea);
                $req_find -> free_result();
                    if ($data['count'] === 0) {
                        $req_crea = $connexion->prepare('INSERT INTO compte (utilisateur,mdp) VALUES (?,?)');
                        $req_crea->bind_param("ss", $_POST['newUser'], $_POST['newPwd']);
                        $req_crea->execute();
                        echo '<script>window.alert("Inscription réussie !");</script>';
                    
                    } else {
                        echo '<script>window.alert("Ce nom d\'utilisateur existe déjà.");</script>';
                    }
                
            }
        } else {
            echo '<script>window.alert("Un des champ est vide.");</script>';
        }
    }
    ?>

</body>

</html>