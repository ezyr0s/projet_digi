

<?php
if(!isset($_SESSION['utilisateur'])) { header('Location:./php/connexion.php');exit();}?>
Bienvenue <?=$_SESSION['utilisateur']?>. <br> Voici vos annonces : <br>

<?php
    $connexion = new mysqli('localhost','root','','projet_digi','3306');
    $req = $connexion ->prepare('SELECT id,nom,adresse,code_postal,ville,numero_tel,image FROM salon2 WHERE compte_ID ="'.$_SESSION['utilisateur'].'"');
    $req -> bind_result($id,$nom, $adresse, $code_postal, $ville, $numero_tel,$image);
    $req -> execute();
    ?><div class='list'><?php
    while($req->fetch()){?>
         <a href="http://localhost/projet_digi/php/affichage.php?id=<?php echo $id ?>"><div class="item"><?php echo '<img class="image" src="'.$image.'"><br> Nom : ' . $nom . '<br> Adresse : ' . $adresse . '<br> Code Postal : ' . $code_postal . '<br> Ville : ' . $ville . ' <br>Numéro de téléphone : ' . $numero_tel.'<br>'; ?></div></a>
    <?php }?>
      </div><br><br>
<a href="./php/deconnexion.php"><input type="button" class="btn btn-danger" value="Déconnexion"></a>