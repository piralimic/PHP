<?php
include './src/lib/dbconnect.php';
session_start();

$user_check = $_SESSION['user_id'];

$bdd = openConnection();
$reponse = $bdd->query('SELECT * FROM student WHERE id='.$user_check);

$donnees = $reponse->fetch();

$login_session = $donnees['username'];

if(!isset($_SESSION['user_id'])){
  header("location:./");
  die();
}
?>
