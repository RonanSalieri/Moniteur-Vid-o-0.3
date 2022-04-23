<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Stream Monitor">
<meta name="author" content="Ronan Salieri">
<title>Stream Monitor 0.3</title>
<link href="css/style.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<script src="js/bootstrap.js"></script>
<script src="js/jquery-3.6.0.js"></script>
</head>
<body>
<?php include('apropos.html') ?>
<?php include('aide.html') ?>	
<div class="container">
<?php
	include("menu.html");
?>
</div>
<div class="container">
<div class="row">

<div class="col-12">
<?php
$id = $_GET['id'];

	if ($id=="") {
		header('Location: index.php');
	}
?>
	<h3><span class="badge bg-primary">Vidéo <?php echo"$id"; ?></span></h3>	

		<h6>Vidéo actuelle</h6>
		<div class="stream_actuel">
		<?php 
		include('connect.php');
		$sql = "SELECT * FROM stream WHERE id=$id";
		$req = $bdd->query($sql);
		while($row = $req->fetch()) {
		$titre=$row['titre'];
		$service=$row['service'];
		$url=$row['url'];
		}
		$readurl = wordwrap($url, 85, "<br>", true);
		echo $titre;
		echo" - ";
		echo $service;
		echo" - ";
		echo $readurl;
		$bdd=null;
		?>
		</div>
		<hr class="new">
		<h6>Mise à jour de la vidéo</h6>
		<form action="update_stream.php" method="post">
			<label for="titre">Titre</label>
			<input class="form-control" type="text" id="titre" name="titre">
			<label for="service">Service</label>                                         
			<select id="service" name="service" class="form-select" aria-label="select"> 
			<option selected disabled>Choisir le fournisseur</option>  
			<?php 
			include('connect.php');
			$sql = "SELECT * FROM services ORDER BY services.providers ASC";
			$req = $bdd->query($sql);
			while($row = $req->fetch()) {
			$providers=$row['providers'];
			echo"<option>$providers</option>";
			}
			$bdd=null;
			?></select>                                         
			<label for="url" class="form-label">URL de la vidéo</label>                                         
			<textarea class="form-control" id="url" name="url" rows="3"></textarea>
			<?php echo"<input id='id' name='id' type='hidden' value='$id'>"; ?>
			<br>
			<button type="submit" class="btn btn-primary">OK</button>
			</form>

<footer class="col-12 text-center">
	<br>
	Ronan Salieri - ronansalieri{[AT]}gmail.com - 2022 - 
	<a href="https://github.com/RonanSalieri" target="_new">Github</a>
</footer>	
</div>
</div>	
</div>	

</body>
</html>
