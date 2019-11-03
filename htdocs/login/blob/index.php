<?php

$servername = "database";
$username = "root";
$password = "root";
$conn = mysqli_connect($servername, $username, $password);
if ($conn) {
  echo "Connected to server successfully";
} else {
  echo die("Failed to connect to server ".mysqli_connect_error());
}

$selectalreadycreateddatabase = mysqli_select_db($conn, "becode");
if ($selectalreadycreateddatabase) {
  echo "<br><br>Existing database selected successfully";
} else {
  echo "<br><br>Selected database not found";
}

if(isset($_POST['submit'])){
  if (getimagesize($_FILES['avatar']['tmp_name']) == false) {
    echo "Please select an image";
  } else {
    $image = $_FILES['avatar']['tmp_name'];
    $name = $_FILES['avatar']['name'];
    $image = base64_encode(file_get_contents(addslashes($image)));

    $sqlInsertimageintodb = "INSERT INTO `avatars`(`name`, `image`) VALUES ('$name','$image')";
    if (mysqli_query($conn, $sqlInsertimageintodb)) {
      echo "<br><br>Image uploaded successfully";
    } else {
      echo "<br><br>Image failed to upload";
    }
  }
}

if (mysqli_close($conn)) {
  echo "<br><br>Connection closed.....";
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload</title>
  </head>
  <body>
    <h3>Envoi d'une image</h3>
    <form enctype="multipart/form-data" action="" method="post">
       <input type="file" name="avatar" />
       <input type="submit" name="submit" value="submit" />
    </form>
  </body>
</html>
