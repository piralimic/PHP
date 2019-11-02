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
	<h1>Ajouter</h1>
	<form action="confirm-create.php" method="POST">
		<p>
			<label for="name">Nom</label>
			<input type="text" name="name" value="">
		</p>

		<p>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="1">Très facile</option>
				<option value="2">Facile</option>
				<option value="3">Moyen</option>
				<option value="4">Difficile</option>
				<option value="5">Très difficile</option>
			</select>
		</p>

		<p>
			<label for="distance">Distance (en mètres)</label>
			<input type="number" name="distance" value="">
		</p>
		<p>
			<label for="duration">Durée (en minutes)</label>
			<input type="time" name="duration" value="">
		</p>
		<p>
			<label for="height_difference">Dénivelé (en mètres)</label>
			<input type="number" name="height_difference" value="">
		</p>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
