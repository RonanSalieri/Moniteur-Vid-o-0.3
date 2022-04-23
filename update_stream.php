<?php
$id = $_POST['id'];
$titre = $_POST['titre'];
$service = $_POST['service'];
$url = $_POST['url'];

echo 

include('connect.php');

$sql = "UPDATE stream SET titre = '$titre', url = '$url', service = '$service' WHERE stream.id = '$id'";
$req = $bdd->query($sql);
header('Location: links.php?id='.$id);
?>