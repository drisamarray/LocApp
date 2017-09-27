<?php
header('Access-Control-Allow-Origin: *');
require 'config.php';

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

$pdo= new PDO("mysql:dbname=google;host=localhost","root","root");
$requete="SELECT * FROM donnees ";
$res=$pdo->query($requete);


function ChercherId($value)
{
    //$x="";
    $pdo= new PDO("mysql:dbname=google;host=localhost","root","root");
    $rqt = "SELECT path FROM files,donnees WHERE files.idannonce='$value' LIMIT 1 ";
    $res = $pdo->query($rqt);
    if (!$res) {
        echo "nada";
    }
    foreach ($res as $row) {
        $x= $row['path'];
    }
    return $x;
}

header("Content-type: text/xml");

echo '<markers>';
foreach ($res as $row){

    echo '<marker ';
    echo 'path="' . ChercherId($row['id']). '" ';
    echo 'lat="' . $row['latitude'] . '" ';
    echo 'lng="' . $row['longitude'] . '" ';
    echo 'name="' . parseToXML($row['prenom']) . '" ';
    echo 'address="' . parseToXML($row['adresse']) . '" ';
    echo 'type="' . $row['prix'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';
