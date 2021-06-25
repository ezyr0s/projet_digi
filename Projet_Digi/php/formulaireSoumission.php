<h1>Soumettre un salon</h1><br><br><br>
    <form method="post" enctype="multipart/form-data" >
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Nom du salon</label>
      <input type="text" class="form-control" name="nomSalon">
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
    <label for="inputAddress">Addresse</label>
    <input type="text" class="form-control" name="inputAddress">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">Code postal</label>
      <input type="text" class="form-control" name="inputZip">
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name="inputCity">
    </div>
  </div>
  <div class="form-row">
      <div class="from group col-md-3">
          <label for="inputLongitude">Longitude</label>
          <input type="text" class="form-control" name="longitude" >
      </div>
      <div class="form-group col-md-3">
          <label for="inputLatitude">Latitude</label>
          <input type="text" class="form-control" name="latitude">
      </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-3">
          <label for="inputTel">Numéro de téléphone</label>
          <input type="tel" class="form-control" name="inputPhone">
      </div>
      <div class="form-group col-md-3">
        <label for="inputMail">Adresse mail</label>
        <input type="email" class="form-control" name="inputMail">
      </div>
      <div class="form-group col-md-3">
          <label for="inputWeb">Site web</label>
          <input type="url" class="form-control" name="inputWeb">
      </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
          <label for="inputDescription">Description du salon</label>
          <small>(255 caractères maximum)</small>
          <textarea class="form-control" style="width:600px;height:150px;" maxlength="255" name="description"></textarea>
      </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Uploader des images</label>
    <small>(1 image obligatoire, 3 maximum)</small>
    <input type="file" class="form-control-file" name="file1"><br>  
    <input type="file" class="form-control-file" name="file2"><br>
    <input type="file" class="form-control-file" name="file3"><br>
  </div>
<button type="submit" name="soumission" value="ok" class="btn btn-primary">Soumettre le salon</button>
</form>

<?php
$connexion = new mysqli('localhost','root','','projet_digi','3306');
if (isset($_POST['soumission']) && $_POST['soumission'] == 'ok'){
if(isset($_POST['nomSalon']) && isset($_POST['inputAddress']) && isset($_POST['inputZip']) && isset($_POST['inputCity']) && isset($_POST['inputMail']) && isset($_POST['inputWeb']) && isset($_POST['description']) && isset($_POST['longitude']) &&isset($_POST['latitude'])){
    $req = $connexion -> prepare('INSERT INTO salon2 (nom,adresse,code_postal,ville,numero_tel,latitude,longitude,web,mail,description,compte_ID) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
    $req ->bind_param('sssssssssss',$_POST['nomSalon'],$_POST['inputAddress'],$_POST['inputZip'],$_POST['inputCity'],$_POST['inputPhone'],$_POST['latitude'],$_POST['longitude'],$_POST['inputWeb'],$_POST['inputMail'],$_POST['description'],$_SESSION['utilisateur']);
    $req -> execute();
    echo '<script>window.alert("Salon soumis !");</script>';

} else {
    echo '<script>window.alert("Un des champs est vide.");</script>';
}
}
?>