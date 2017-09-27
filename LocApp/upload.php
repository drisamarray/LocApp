<?php

if(!empty($_FILES)){
    try{

        $pdo=new PDO("mysql:dbname=google;host:localhost","root","root");
    }catch(PDOException $e){
        print "Error: ".$e->getMessage()."<br/>";
        die();
    }
    $requeteId=$pdo->prepare("SELECT MAX(id) as last_publication from donnees");
    $requete=$requeteId->execute();
    $id=$requeteId->fetch(PDO::FETCH_ASSOC);
    $idannonce=$id['last_publication'];
    $requeteId->closeCursor();
    $targetDir="upload/";
    $filename=$_FILES['file']['name'];
    $tmpName=$_FILES['file']['tmp_name'];
    $targetFile=$targetDir.$filename;

    if(move_uploaded_file($tmpName,$targetFile)){
        $smt=$pdo->prepare("INSERT INTO files(idannonce,filename,path) VALUES(?,?,?)");
        $smt->bindParam(1,$idannonce);
        $smt->bindParam(2,$filename);
        $smt->bindParam(3,$targetFile);
        $smt->execute();
        $smt->closeCursor();
    }



}