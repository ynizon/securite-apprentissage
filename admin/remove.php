<?php
require_once('../config.php');

$sTable = $_GET["mode"];
$id  = $_GET["id"];
global $bdd;
$sql = "DELETE FROM ".$sTable." where id=".$id;
$result = $bdd -> query($sql);

header ("location:admin.php");
?>