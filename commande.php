<?php
require_once('config.php');

if (isset($_POST["quantity"])){                                        
     ?>
     <div class="alert alert-success">
          Vous venez de passer une commande de <?php echo $_POST["quantity"];?> Tee shirt au prix total de <?php echo $_POST["quantity"]*$_POST["price"];?> &euro;<br/>
          Pour en être sur, vérifier le fichier achat.txt à la racine.
     </div>
     <?php
     file_put_contents("achat.txt","total de ". $_POST["quantity"]*$_POST["price"]);
     exit();
}
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
							<h1 id="h1">Commandes</h1>							
						</div>			
						<div class="panel-body">
                                   <?php
                                   $price = 10;                                   
                                   ?>
                                   <div id="info">
                                   </div>
                                   <table class="table">
                                        <tr>
                                             <th>Produit</th>
                                             <th>Prix</th>
                                             <th>Quantité</th>
                                        </tr>
                                        <tr>
                                             <td>Tee shirt</td>
                                             <td><input type="hidden" id="price" name="price" value="<?php echo $price;?>" /><?php echo $price;?> &euro;</td>
                                             <td><input type="text" name="quantity" id="quantity" value="1" /></td>
                                        </tr>
                                   </table>
                                  
                                   <br/>
                                   <input class="btn btn-primary" type="button" value="Commander" onclick="commander()"/>
                                   
                                   <script >
                                        function commander(){
                                             var price = document.getElementById("price").value;
                                             var quantity = document.getElementById("quantity").value;
                                             if (price == "" || price == "0"){
                                                  alert("Le prix est obligatoire. Commande annulée.");
                                             }else{      
                                                 $.ajax({
                                                    url : 'commande.php', // La ressource ciblée
                                                    type : 'POST', // Le type de la requête HTTP.
                                                    data : {'price': price, "quantity":quantity},
                                                    success : function(data){ // code_html contient le HTML renvoyé
                                                           $("#info").html(data);
                                                    }
                                                 });
                                             }

                                        }
                                   </script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>