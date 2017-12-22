<?php
require_once('config.php');

$cnx = openConnection();

if (isset($_POST["comment"])){
	addComment($_POST["email"],$_POST["comment"],$_GET["id"]);
}

$posts = getPosts("where id=".$_GET["id"]);
$comments = getComments("where post_id=".$_GET["id"]);
foreach ($posts as $post){
	//Recupere le post	
}
?>

<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />		
		<link rel="stylesheet" href="css/app.css" />
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		
		<title id="title"><?php echo $post["title"];?></title>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body>		
		<div class="container" style="padding-top:10px"> 	
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h1 id="h1"><?php echo $post["title"];?></h1>							
						</div>			
						<div class="panel-body">
							<article>				
								<?php echo $post["content"];?>								
							</article>
							<div>
								<h2>Commentaires</h2>
								<form method='post' action="article.php?id=<?php echo $post["id"];?>">
									<table>
										<tr>
											<td>
												Email:
											</td>
											<td>
												<input type="text" name="email" value="" required />
											</td>
										</tr>
										<tr>
											<td>Commentaire</td>
											<td><textarea rows="4" cols="60" name="comment"></textarea>
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
								<ul>
									<?php 
									foreach ($comments as $comment){
										?>
										<li><?php echo $comment["email"];?>:<br/><?php echo $comment["content"];?></li>
										<?php
									}
									?>
								</ul>
								
							</div>
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