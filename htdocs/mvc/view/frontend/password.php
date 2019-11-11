<?php $title = 'New registration'; ?>

<?php ob_start(); ?>
<header>
  <nav>
    <a href="?page=profile">[ CANCEL ]</a>
  </nav>
</header>
<h1>Change password</h1>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<p>All the fields are required</p>
<form name="changepass" action="?page=update" method="POST">
  <table>
    <tr height="30px">
      <td width="150px"><label for="password_old">Old Password</label></td>
      <td><input type="password" name="password_old" value="" required></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="password_new">New Password</label></td>
      <td><input type="password" name="password_new" value="" required></td>
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
