<?php
$connexion = new mysqli('localhost', 'root', '', 'projet_digi', '3306');
?>
<form action="" method="post">
    <input type="radio" name="recherche" id="choix1" value="showAll"> Afficher tout <br>
    <input type="radio" name="recherche" id="choix2" value="showSearch">
    <select name="tri" id="triage">
        <option>Choisir un tri</option>
        <option value="nom">Tri par nom</option>
        <option value="adresse">Tri par adresse</option>
        <option value="code_postal">Tri par code postal</option>
        <option value="ville">Tri par ville</option>
        <input type="text" name="champ_recherche" id="champ_recherche">
        <input type="submit" id="submit" value='Rechercher'>
</form>
<?php
if (isset($_POST['recherche'])) {
    $recherche = $_POST['recherche'];
    if ($recherche == 'showAll') { //si radio coché pour tout afficher
        $sql = 'SELECT id,nom,adresse,code_postal,ville,numero_tel,image FROM salon2 ORDER BY nom';
        $req = $connexion->prepare($sql);
        $req->execute();
        $req->bind_result($id,$nom, $adresse, $code_postal, $ville, $numero_tel,$image);
        echo 'Résultats de la recherche pour affichage complet <br>';
?>
        <div class='list'><?php
                            while ($req->fetch()) { ?>
                <a href="http://localhost/projet_digi/php/affichage.php?id=<?php echo $id ?>"><div class="item"><?php echo '<img class="image" src="'.$image.'"><br> Nom : ' . $nom . '<br> Adresse : ' . $adresse . '<br> Code Postal : ' . $code_postal . '<br> Ville : ' . $ville . ' <br>Numéro de téléphone : ' . $numero_tel.'<br>'; ?></div></a>
            <?php
                            }
            ?></div><?php
                } else if ($recherche == 'showSearch') { // radio coché pour recherche
                    if (isset($_POST['tri'])) {
                        $sql = "SELECT id,nom,adresse,code_postal,ville,numero_tel,image FROM salon2 WHERE " . $_POST['tri'] . " LIKE ? ORDER BY nom ";
                        $req = $connexion->prepare($sql);

                        $champ_recherche = $_POST['champ_recherche'] . '%';
                        $req->bind_param('s', $champ_recherche);
                        $req->execute();
                        $req->bind_result($id,$nom, $adresse, $code_postal, $ville, $numero_tel,$image);
                        echo 'Résultat de la recherche pour ' . $_POST['tri'] . ' commencant par "' . $_POST['champ_recherche'] . '"';
                    ?> <div class='list'>
                <?php
                        while ($req->fetch()) {
                ?><a href="http://localhost/projet_digi/php/affichage.php?id=<?php echo $id ?>"><div class="item"><?php echo '<img class="image" src="'.$image.'"><br> Nom : ' . $nom . '<br> Adresse : ' . $adresse . '<br> Code Postal : ' . $code_postal . '<br> Ville : ' . $ville . ' <br>Numéro de téléphone : ' . $numero_tel.'<br>'; ?></div></a>
                <?php }
                ?></div>
<?php
                    }
                }
            }

?>