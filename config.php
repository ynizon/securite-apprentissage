<?php
//Parameters

define("DB_NAME","securite");
define("DB_SERVER","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");


function openConnection(){
	$cnx = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
	
	if (!$cnx) {
		die('Connexion impossible : ' . mysql_error());
	}else{
		mysql_select_db(DB_NAME,$cnx) or die ("erreur de connexion base");
	}
	return $cnx;
	
}

function closeConnection($cnx){
	mysql_close($cnx);
}

function getPosts($sWhere = ""){
	$sql = "select * from posts ".$sWhere;
	$result = mysql_query($sql); 
	$rows = array();
	while ( $row = mysql_fetch_array($result)){
		$rows[]= $row;
	}
	return $rows;
}

function getComments($sWhere = ""){
	$sql = "select * from comments ".$sWhere;
	$result = mysql_query($sql); 
	$rows = array();
	while ( $row = mysql_fetch_array($result)){
		$rows[]= $row;
	}
	return $rows;
}

function getUsers($sWhere = ""){
	$sql = "select * from users ".$sWhere;
	$result = mysql_query($sql); 
	$rows = array();
	while ( $row = mysql_fetch_array($result)){
		$rows[]= $row;
	}
	return $rows;
}


function addComment($sEmail = "", $sContent = "", $sPostId = 0){
	$sql = "insert into comments (email,post_id,content) VALUES ('".$sEmail."',".$sPostId.",'".$sContent."')";
	$result = mysql_query($sql);
}

function addPost($sTitle = "", $sContent = ""){
	$sql = "insert into posts (title,content) VALUES ('".$sTitle."','".$sContent."')";
	$result = mysql_query($sql);
}
?>