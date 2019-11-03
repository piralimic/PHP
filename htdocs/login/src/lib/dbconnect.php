<?php


function openConnection() {
	// Try to figure out what these should be for you
	$dbhost = "database";
	$dbuser = "root";
	$dbpass = "root";
	$db = "becode";

	// Try to understand what happens here
  try
  {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
    // Why we do this here
    return $pdo;
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}


?>
