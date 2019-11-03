<?php
include './src/lib/session.php';
?>
<html>

   <head>
      <title>Welcome</title>
   </head>

   <body>
      <h1>Welcome <?php echo($login_session); ?></h1>
      <a href="logout.php">[ LOG OUT ]</a>
      <span> - </span>
      <a href="delete.php">[ DELETE ACCOUNT ]</a>
      <div id="target"></div>
      <form enctype="multipart/form-data" name="signup" action="update.php" method="POST">
        <table>
          <tr height="30px">
            <td width="150px"><label for="username">Username</label></td>
            <td><input type="text" name="username" value="<?php echo($donnees['username']); ?>" required></td>
          </tr>
          <tr height="50px">
            <td width="150px"><label for="email">Email</label></td>
            <td><input type="email" name="email" value="<?php echo($donnees['email']); ?>" required></td>
          </tr>
          <tr height="30px">
            <td width="150px"><label for="first_name">First Name</label></td>
            <td><input type="text" name="first_name" value="<?php echo($donnees['first_name']); ?>"></td>
          </tr>
          <tr height="30px">
            <td width="150px"><label for="last_name">Last Name</label></td>
            <td><input type="text" name="last_name" value="<?php echo($donnees['last_name']); ?>"></td>
          </tr>
          <tr height="30px">
            <td width="150px"><label for="linkedin">Linkedin</label></td>
            <td><input type="url" name="linkedin" value="<?php echo($donnees['linkedin']); ?>"></td>
          </tr>
          <tr height="30px">
            <td width="150px"><label for="github">GitHub</label></td>
            <td><input type="url" name="github" value="<?php echo($donnees['github']); ?>"></td>
          </tr>
          <tr height="30px">
            <td width="150px"><label for="avatar">Choose a profile picture:</label></td>
            <td><input type="file" id="avatar" name="avatar" accept="image/png"></td>
          </tr>
          <?php
            if ($donnees['avatar']>'') {
              ?>
              <tr height="30px">
                <td width="150px"></td>
                <td><?php echo("<img src='data:image/png;base64,".$donnees['avatar']."' />"); ?></td>
              </tr>
              <?php
            }
           ?>
          <tr height="50px">
            <td width="150px"></td>
            <td><button type="submit" value="Submit" name="button" onclick="ValidateEmail(document.signup.email)">Submit</button></td>
          </tr>
        </table>
      </form>
      <script type="text/javascript" src="./src/js/email-validation.js"></script>
      <script type="text/javascript" src="./src/js/validate.min.js"></script>
      <script type="text/javascript" src="./src/js/validation_rules.js"></script>
   </body>

</html>
