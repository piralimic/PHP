<?php
include 'bdconnect.php';
// Niveaux de difficultés
$difficultyName = array(
  0 => 'N/A',
  1 => 'Très facile',
  2 => 'Facile',
  3 => 'Moyen',
  4 => 'Difficle',
  5 => 'Très difficile');

  // Requête SQL pour récupérer tout le contenu de la table
  $reponse = $bdd->query('SELECT * FROM randoreunion');

  ?>
  <!DOCTYPE html>
  <html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Randonnées 974 Réunion</title>
  </head>
  <header>
    <nav>
      <a href="create.php">[ + ] AJOUTER UNE RANDO</a>
    </nav>
  </header>
  <body>
    <?php
    // Affichage ligne par ligne
    while ($donnees = $reponse->fetch())
    {

      // Conversion du format TIME 'hh:mm' en heures (exemple 08:30 devient 8,5)
      $time = new DateTime($donnees['duration']);
      $duration =$time->format('G');
      if ($time->format('i')>0) {
        $minutes = $time->format('i');
        $duration = $duration + ($minutes/60);
      }

      ?>
      <div>
        <h1><?php echo($donnees['id'].". ".$donnees['name']); ?></h1><a href="update.php?id=<?php echo($donnees['id']); ?>">[ EDITER ]</a> - <a href="delete.php?id=<?php echo($donnees['id']); ?>">[ EFFACER ]</a>
        <p>Difficulté : <?php echo($difficultyName[$donnees['difficulty']]); ?></p>
        <p>Distance : <?php echo($donnees['distance']/1000); ?> km<br />
          <p>Durée : <?php echo($duration); ?>h</p>
          <p>Dénivelé positif : <?php echo $donnees['height_difference']; ?> m</p>
          <hr>
        </div>
        <?php
      }

      $reponse->closeCursor(); // Termine le traitement de la requête

      ?>
    </body>
    </html>
