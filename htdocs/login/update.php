<?php
include './src/lib/session.php';
// Add new student into the database
$upd = $bdd->prepare('UPDATE student SET username = :username, email = :email, first_name = :first_name, last_name = :last_name, linkedin = :linkedin, github = :github, avatar = :avatar WHERE id = :id');
$upd->execute(array(
	'username' => $_POST['username'],
	'email' => $_POST['email'],
	'first_name' => $_POST['first_name'],
	'last_name' => $_POST['last_name'],
	'linkedin' => $_POST['linkedin'],
	'github' => $_POST['github'],
	'avatar' => addslashes (file_get_contents($_FILES['avatar']['tmp_name'])),
	'id' => $_SESSION['user_id']
	));

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Update profil</title>
</head>
<header>
  <nav>
    <a href="welcome.php">[ BACK TO PROFIL ]</a>
  </nav>
</header>
<body>
  <?php
  echo("<h2>Your profil datas have been updated !</h2>");
 ?>
</body>
</html>
