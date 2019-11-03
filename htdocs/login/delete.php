<?php
include './src/lib/session.php';
// Mise à jour de la table
$req = $bdd->prepare('DELETE FROM student WHERE id = :id');
$req->execute(array(
  'id' => $donnees['id']
));
header("location: logout.php");
?>
