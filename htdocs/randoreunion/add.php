<?php
try
{
	$bdd = new PDO('mysql:host=database;dbname=mydb;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$req = $bdd->prepare('INSERT INTO randoreunion(name, difficulty, distance, duration, height_difference) VALUES(:name, :difficulty, :distance, :duration, :height_difference)');
$req->execute(array(
	'name' => $_POST['name'],
	'difficulty' => $_POST['difficulty'],
	'distance' => $_POST['distance'],
	'duration' => $_POST['duration'],
	'height_difference' => $_POST['height_difference']
	));

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Randonnées 974 Réunion - nouvel ajout</title>
</head>
<header>
  <nav>
    <a href="http://localhost/randoreunion/">[ HOME ]</a>
  </nav>
</header>
<body>
  <?php
  echo("<h2>La randonnée a été ajoutée avec succès.</h2>");
 ?>
</body>
</html>
