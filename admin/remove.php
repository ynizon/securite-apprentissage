<?php
require_once('../config.php');

$cnx = openConnection();

$sTable = $_GET["mode"];
$id  = $_GET["id"];
$sql = "DELETE FROM ".$sTable." where id=".$id;
$result = mysql_query($sql); 
closeConnection($cnx);

header ("location:index.php");
?>