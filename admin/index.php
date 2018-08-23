<?php
require_once('../config.php');

$users = getUsers();
$bErreur = false;
if (isset($_POST["password"])){
	$bErreur = true;
	foreach ($users as $user){
		if ($_POST["password"] == $user["password"] and $_POST["login"] == $user["email"] ){
			header("location:admin.php");
			exit();
		}
	}	
}

?>

<html>
	<head>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />		
		<link rel="stylesheet" href="../css/app.css" />
		<link rel="stylesheet" href="../css/styles.css" />
		<link rel="stylesheet" href="../css/font-awesome.min.css" />
		
		<title id="title">Sécurisez moi ca :)</title>
		
		<script type="text/javascript" src="../js/jquery.min.js"></script>
	</head>
	<body>		
		<div class="container" style="padding-top:10px"> 	
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 id="h1">Administration</h1>							
						</div>			
						<div class="panel-body">
							<?php
							if ($bErreur){
								?>
								<div class="alert alert-danger">Mot de passe incorrect</div>
								<?php
							}
							?>
							<form method="post">
								<input type="text" name="login" value="" placeHolder="Login"/>
								<input type="text" name="password" value="" placeHolder="Password"/>
								<input type="submit" class="btn btn-primary" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>