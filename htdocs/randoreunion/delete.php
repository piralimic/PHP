<?php
include 'bdconnect.php';
// Mise à jour de la table
$req = $bdd->prepare('DELETE FROM randoreunion WHERE id = :id');
$req->execute(array(
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
	echo("<h2>La randonnée a été supprimée.</h2>");
	?>
</body>
</html>
