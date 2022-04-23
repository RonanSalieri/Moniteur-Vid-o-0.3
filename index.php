<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Stream Monitor">
<meta name="author" content="Ronan Salieri">
<title>Moniteur de flux vidéo 0.3b</title>
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
<div class="row">
<?php 
	$view = $_GET['view'];
	if ($view=="") $view=4;
	if ($view=="12") include('12views.php');
	if ($view=="9") include('9views.php');
	if ($view=="6") include('6views.php');
	if ($view=="4") include('4views.php');
	if ($view=="3") include('3views.php');
	if ($view=="2") include('2views.php');
	if ($view=="1") include('1view.php');
	if ($view=="0") include('listview.php');
?>
</div>
<footer class="col-12 text-center">
	<br>
	Ronan Salieri - ronansalieri{[AT]}gmail.com - 2022 - 
	<a href="https://github.com/RonanSalieri" target="_new">Github</a>
</footer>

</div>
</body>
</html>
	
	
	
	
	
	
	
	
	
	

</body>
</html>
