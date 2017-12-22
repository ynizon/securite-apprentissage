<?php
require_once('../config.php');

$cnx = openConnection();

if (isset($_POST["title"])){
	addPost($_POST["title"], $_POST["content"]);
}

if (isset($_POST["url_image"])){
	$fp = fopen("../images/".basename($_POST["url_image"]),"w+");
	fputs($fp,file_get_contents($_POST["url_image"]));
	fclose($fp);
}

$posts = getPosts();
$comments = getComments();
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
							<nav>
								<h2>Articles</h2>
								<ul class="">
									<?php
									foreach ($posts as $post){
										?>
										<li class=""><a href='remove.php?mode=posts&id=<?php echo $post["id"];?>'>Supprimer <?php echo $post["title"];?></a></li>
										<?php
									}
									?>									
								</ul>	
								
								<form method='post' action="">
									<table>
										<tr>
											<td>
												Titre:
											</td>
											<td>
												<input type="text" name="title" value="" required />
											</td>
										</tr>
										<tr>
											<td>Contenu</td>
											<td><textarea rows="4" cols="60" name="content"></textarea>
											</td>
										</tr>
										<tr>
											<td>
											</td>
											<td >
												<input type="submit" class="btn btn-primary" value="Envoyer" />
											<td>
										<tr>
									</table>
								</form>
								<hr/>
								<h2>Commentaires</h2>
								<ul class="">
									<?php
									foreach ($comments as $comment){
										?>
										<li class=""><a href='remove.php?mode=comments&id=<?php echo $comment["id"];?>'>Supprimer <?php echo $comment["content"];?></a></li>
										<?php
									}
									?>									
								</ul>	
								<hr/>
								<h2>Images</h2>
								<form method="post">
									<input type="text" value="http://" name="url_image" /><input type="submit" class="btn btn-primary" value="Importer"/>
								</form>
							</nav>							
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