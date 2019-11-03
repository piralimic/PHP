<?php
include './src/lib/dbconnect.php';
// Add new student into the database
$bdd = openConnection();
$req = $bdd->prepare('INSERT INTO student(username, email, password) VALUES(:username, :email, :password)');
$req->execute(array(
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
	));

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login - register</title>
</head>
<header>
  <nav>
    <a href="http://localhost/login/">[ HOME ]</a>
  </nav>
</header>
<body>
  <?php
  echo("<h2>Registration completed !</h2>");
 ?>
</body>
</html>
