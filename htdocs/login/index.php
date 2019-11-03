<?php
include './src/lib/dbconnect.php';
session_start();

$welcome = 'Welcome visitor';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bigbadaboum = $_POST['username'];
  $bdd = openConnection();
  $reponse = $bdd->query('SELECT * FROM student WHERE username="'.$bigbadaboum.'"');
  if ($donnees = $reponse->fetch()) {
    if (password_verify($_POST['password'], $donnees['password'])) {
      $username = $donnees['username'];
      $welcome = "Welcome $username !";

      $_SESSION['login_user'] = $username;

      header("location: welcome.php");

    } else {
      $error = "Sorry invalid password";
    }
  }else {
    $error = "Sorry user not found";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
</head>
<body>
  <header>
    <nav>
      <a href="signup.html">[ SIGN UP ]</a>
    </nav>
  </header>
  <h1><?php echo($welcome); ?></h1>
  <div id="target">
  <?php
  if ($error) {
    echo("<ul><li>$error</li></ul>");
  }
  ?>
  </div>
  <form name="login" action="" method="POST">
    <table>
      <tr height="30px">
        <td width="150px"><label for="username">Username</label></td>
        <td><input type="text" name="username" value="" required></td>
      </tr>
      <tr height="30px">
        <td width="150px"><label for="password">Password</label></td>
        <td><input type="password" name="password" value="" required></td>
      </tr>
      <tr height="50px">
        <td width="150px"></td>
        <td><button type="submit" value="Submit" name="button">Login</button></td>
      </tr>
    </table>
  </form>
</body>
</html>
