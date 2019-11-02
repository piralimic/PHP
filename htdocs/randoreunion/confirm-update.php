<?php
include 'bdconnect.php';
// Mise à jour de la table
$req = $bdd->prepare('UPDATE randoreunion SET name = :upname, difficulty = :updifficulty, distance = :updistance, duration = :upduration, height_difference = :upheight_difference WHERE id = :id');
$req->execute(array(
	'upname' => $_POST['name'],
	'updifficulty' => $_POST['difficulty'],
	'updistance' => $_POST['distance'],
	'upduration' => $_POST['duration'],
	'upheight_difference' => $_POST['height_difference'],
  'id' => $_GET['id']
));
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Randonnées 974 Réunion - édition</title>
</head>
<header>
	<nav>
		<a href="http://localhost/randoreunion/">[ HOME ]</a>
	</nav>
</header>
<body>
	<?php
	echo("<h2>La randonnée a été mise à jour avec succès.</h2>");
	?>
</body>
</html>
