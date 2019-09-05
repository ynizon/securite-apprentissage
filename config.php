<?php
//Parameters

define("DB_NAME","securite");
define("DB_SERVER","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");

global $bdd;
$bdd = new PDO( 'mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME , DB_PASSWORD, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

function getPosts($sWhere = ""){
	global $bdd;
		
	$sql = "select * from posts ".$sWhere;
	$result = $bdd -> query($sql);
	$rows = array();
	foreach ( $result as $row){
		$rows[]= $row;
	}
	return $rows;
}

function getComments($sWhere = ""){
	global $bdd;
	
	$sql = "select * from comments ".$sWhere;
	$result = $bdd -> query($sql);
	$rows = array();
	foreach ( $result as $row){
		$rows[]= $row;
	}
	return $rows;
}

function getUser($sLogin = "", $sPassword = ""){
	global $bdd;
	$sql = "select * from users where email = '".$sLogin."' and password = '".$sPassword."'";

	$result = $bdd -> query($sql);
	$row = null;
	foreach ( $result as $row){
	}

	return $row;
}

function getUsers($sWhere = ""){
	global $bdd;
	$sql = "select * from users ".$sWhere;
	$result = $bdd -> query($sql);
	$rows = array();
	foreach ( $result as $row){
		$rows[]= $row;
	}
	return $rows;
}


function addComment($sEmail = "", $sContent = "", $sPostId = 0){
	global $bdd;
	$sql = "insert into comments (email,post_id,content) VALUES ('".$sEmail."',".$sPostId.",'".$sContent."')";
	$result = $bdd -> query($sql);
}

function addPost($sTitle = "", $sContent = ""){
	global $bdd;
	$sql = "insert into posts (title,content) VALUES ('".$sTitle."','".$sContent."')";
	$result = $bdd -> query($sql);
}
?>