<?php
$dbHost="localhost";
$dbName="mydata";
$dbUsername="root";
$dbUserPassword="root";
$filename=$_POST['filename'];
$table="files";
$con =  new PDO( "mysql:host=".$dbHost.";"."dbname=".$dbName, $dbUsername, $dbUserPassword);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "DELETE FROM ".$table." WHERE filename = ?";
$q = $con->prepare($sql);

$response = $q->execute(array($filename));
