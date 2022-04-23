<?php 
// Requête SQL des liens
include('connect.php');

$i = 1;
while ($i <= 12) {
		$sql= "SELECT * FROM stream WHERE id=$i";
		$req = $bdd->query($sql);
			while($row= $req->fetch()) {
			$id['$i']=$row['id'];
			$titre['$i']=$row['titre'];
			$url['$i']=$row['url'];
			}
$short_url['$i']=substr($url['$i'], 0, 40);
echo"<div class='col-md-3'>";
echo"<h4>";
echo"<a href='links.php?id=".$id['$i']."'>";	
echo"<span class='badge bg-primary'>#".$i."</span></a> ".$titre['$i']."</h4>";
echo"<div class='ratio ratio-16x9'>";
echo"<iframe src='".$url['$i']."'></iframe></div><br></div>";
$i++;
}
$bdd=null;
?>


