<?php
include './src/lib/dbconnect.php';
session_start();

$user_check = $_SESSION['login_user'];

$bdd = openConnection();
$reponse = $bdd->query('SELECT * FROM student WHERE username="'.$user_check.'"');

$donnees = $reponse->fetch();

$login_session = $donnees['username'];

if(!isset($_SESSION['login_user'])){
  header("location:./");
  die();
}
?>
