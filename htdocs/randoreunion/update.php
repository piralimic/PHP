<?php
include 'bdconnect.php';
	$id = $_GET['id'];
  // Requête SQL pour récupérer tout le contenu de la table
  $reponse = $bdd->query('SELECT * FROM randoreunion WHERE id='.$id);

	// Récupération des données
	$donnees = $reponse->fetch();
	$name = $donnees['name'];
	$difficulty = $donnees['difficulty'];
	$distance = $donnees['distance'];
	$duration = $donnees['duration'];
	$height_difference = $donnees['height_difference'];

	$diff1 = ($difficulty == 1) ? 'selected="selected"': '';
	$diff2 = ($difficulty == 2) ? 'selected="selected"': '';
	$diff3 = ($difficulty == 3) ? 'selected="selected"': '';
	$diff4 = ($difficulty == 4) ? 'selected="selected"': '';
	$diff5 = ($difficulty == 5) ? 'selected="selected"': '';
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
	<h1>Mettre à jour</h1>
	<form action="confirm-update.php?id=<?php echo($id); ?>" method="POST">
		<p>
			<label for="name">Nom</label>
			<input type="text" name="name" value="<?php echo($name); ?>">
		</p>

		<p>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="1" <?php echo($diff1); ?>>Très facile</option>
				<option value="2" <?php echo($diff2); ?>">Facile</option>
				<option value="3" <?php echo($diff3); ?>">Moyen</option>
				<option value="4" <?php echo($diff4); ?>">Difficile</option>
				<option value="5" <?php echo($diff5); ?>">Très difficile</option>
			</select>
		</p>

		<p>
			<label for="distance">Distance (en mètres)</label>
			<input type="number" name="distance" value="<?php echo($distance); ?>">
		</p>
		<p>
			<label for="duration">Durée (en minutes)</label>
			<input type="time" name="duration" value="<?php echo($duration); ?>">
		</p>
		<p>
			<label for="height_difference">Dénivelé (en mètres)</label>
			<input type="number" name="height_difference" value="<?php echo($height_difference); ?>">
		</p>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
