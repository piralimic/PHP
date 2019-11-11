<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?= $title ?></title>
</head>
<body>
<?= $header ?>
<?php if(isset($errorMessage)){echo($errorMessage);} ?>
<?= $content ?>
</body>
</html>
