<?php
require_once('config.php');

$cnx = openConnection();

$posts = getPosts();
?>

<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />		
		<link rel="stylesheet" href="css/app.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		
		<title id="title">Sécurisez moi ca :)</title>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body>		
		<div class="container" style="padding-top:10px"> 	
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 id="h1">Liste des articles</h1>							
						</div>			
						<div class="panel-body">
							<nav>
								<ul class="">
									<?php
									foreach ($posts as $post){
										?>
										<li class=""><a href='article.php?id=<?php echo $post["id"];?>'><?php echo $post["title"];?></a></li>
										<?php
									}
									?>									
								</ul>					
							</nav>
							<br/>
							
							
							<article>				
								Vous devez inspecter le code et corriger toutes les failles de sécurité. Il y en a pas mal ;)<br/>
								L'administration est accessible dans <a href='admin'>admin</a> avec le login admin@ecole.com et le mot de passe azerty.
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
closeConnection($cnx);
?>