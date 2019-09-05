<?php
require_once('config.php');

$iframe = "";
if (isset($_GET["iframe"])){
	$iframe = $_GET["iframe"];
}
?>

<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />		
		<link rel="stylesheet" href="css/app.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		
		<title id="title">iFrame</title>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body>		
		<div class="container" style="padding-top:10px"> 	
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 id="h1">Iframe</h1>
						</div>			
						<div class="panel-body">
							<?php
							if ($iframe != ""){
								?>
								<iframe src="<?php echo $iframe;?>" style="width:600px;height:400px;"></iframe>
								<?php
							}
							?>							
						</div>
					</div>
					<!--
					<div>
						<form method="get" action="#">
							<input type="text" name="iframe" value="<?php echo $iframe;?>" />
							<input type="submit" class="btn btn-primary"/>
						</form>
					</div>
					-->
				</div>
			</div>
		</div>
	</body>
</html>