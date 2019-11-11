<?php $title = 'New registration'; ?>

<?php ob_start(); ?>
<header>
  <nav>
    <a href="./">[ HOME ]</a>
  </nav>
</header>
<h1>New registration</h1>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<p>All the fields are required</p>
<form name="signup" action="?page=signup" method="POST">
  <table>
    <tr height="30px">
      <td width="150px"><label for="username">Username</label></td>
      <td><input type="text" name="username" value="<?php if(isset($_POST['username'])){echo($_POST['username']);} ?>" required></td>
    </tr>
    <tr height="50px">
      <td width="150px"><label for="email">Email</label></td>
      <td><input type="email" name="email" value="<?php if(isset($_POST['email'])){echo($_POST['email']);} ?>" required></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="password">Password</label></td>
      <td><input type="password" name="password" value="" required></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="password_confirm">Confirm Password</label></td>
      <td><input type="password" name="password_confirm" value="" required></td>
    </tr>
    <tr height="50px">
      <td width="150px"></td>
      <td><button type="submit" value="Submit" name="button">Submit</button></td>
    </tr>
  </table>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
