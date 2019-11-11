<?php $title = 'Welcome to the jungle'; ?>

<?php ob_start(); ?>
<header>
  <nav>
    <a href="?page=signup">[ SIGN UP ]</a>
  </nav>
</header>
<h1>Welcome visitor</h1>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<p>Please log in or sign up :</p>
<form name="login" action="?page=profile" method="POST">
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
      <td><button type="submit" value="Submit" name="button">Log in</button></td>
    </tr>
  </table>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
