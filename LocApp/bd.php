<?php
/**
 * Created by PhpStorm.
 * User: gt
 * Date: 9/10/2017
 * Time: 5:09 PM
 */
// "lat=" + lat + "&long="+ long+"&prenom="+prenom+"&nfamille="+nomfamille+"&adresse="+adresse+"&prix="+prix,
$lat=$_POST['lat'];
$lgn=$_POST['long'];
$prenom=$_POST['prenom'];
$nfamille=$_POST['nfamille'];
$adresse=$_POST['adresse'];
$prix=$_POST['prix'];

$pdo=new PDO("mysql:dbname=google;host=localhost","root","root");

$request=$pdo->prepare("INSERT INTO donnees (latitude,longitude,prenom,nfamille,adresse,prix)
VALUES (:a,:b,:x,:d,:e,:f)");
$request->execute(array(
    "a"=>$lat,
    "b"=>$lgn,
    "x"=>$prenom,
    "d"=>$nfamille,
    "e"=>$adresse,
    "f"=>$prix,
));


$request->closeCursor();

