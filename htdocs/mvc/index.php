<?php
require('./controller/frontend.php');
try {
  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'signup') {
      signup();
    }
    elseif ($_GET['page'] == 'profile') {
      if (isset($_POST['username']) && isset($_POST['password'])) {
        newSession($_POST['username'],$_POST['password']);
      }
    }
    elseif ($_GET['page'] == 'logout') {
      logout();
    }
    elseif ($_GET['page'] == 'delete') {
      delete();
    }
    elseif ($_GET['page'] == 'update') {
      update();
    }
  }
  else {
    login();
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();
  $errorMessage = "ERROR : $errorMessage";
  if ($_GET['page'] == 'signup') {
    require('./view/frontend/signup.php');
  } else {
    require('./view/frontend/login.php');
  }
}
