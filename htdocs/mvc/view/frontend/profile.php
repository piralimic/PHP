<?php $title = 'My Profile'; ?>

<?php ob_start(); ?>
<header>
  <nav>
    <a href="?page=logout">[ LOG OUT ]</a>
    <span> - </span>
    <a href="?page=delete">[ DELETE ACCOUNT ]</a>
    <span> - </span>
    <a href="?page=password">[ CHANGE PASSWORD ]</a>
  </nav>
</header>
<h1>Hello <?= $userDatas['first_name'] ?> !</h1>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<p>You can edit your profile informations :</p>
<form enctype="multipart/form-data" name="update" action="?page=update" method="POST">
  <table>
    <tr height="30px">
      <td width="150px">Username</td>
      <td><?= $userDatas['username'] ?></td>
    </tr>
    <tr height="50px">
      <td width="150px"><label for="email">Email</label></td>
      <td><input type="email" name="email" value="<?= $userDatas['email'] ?>" required></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="first_name">First Name</label></td>
      <td><input type="text" name="first_name" value="<?= $userDatas['first_name'] ?>"></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="last_name">Last Name</label></td>
      <td><input type="text" name="last_name" value="<?= $userDatas['last_name'] ?>"></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="linkedin">Linkedin</label></td>
      <td><input type="url" name="linkedin" value="<?= $userDatas['linkedin'] ?>"></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="github">GitHub</label></td>
      <td><input type="url" name="github" value="<?= $userDatas['github'] ?>"></td>
    </tr>
    <tr height="30px">
      <td width="150px"><label for="avatar">Choose a profile picture:</label></td>
      <td><input type="file" id="avatar" name="avatar" accept="image/png"></td>
    </tr>
    <?php
      if ($userDatas['avatar']) {
        ?>
        <tr height="30px">
          <td width="150px"></td>
          <td><?php echo("<img src='data:image/png;base64,".$userDatas['avatar']."' />"); ?></td>
        </tr>
        <?php
      }
     ?>
    <tr height="50px">
      <td width="150px"></td>
      <td><button type="submit" value="Submit" name="button">Submit</button></td>
    </tr>
  </table>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
