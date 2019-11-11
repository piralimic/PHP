<?php
require('./controller/frontend.php');
try {
  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'signup') {
      signup();
    }
    elseif ($_GET['page'] == 'profile') {
      if (isset($_SESSION['userID'])){
        profile($_SESSION['userID']);
      }
      if (isset($_POST['username']) && isset($_POST['password'])) {
        newSession($_POST['username'],$_POST['password']);
      }
    }
    if (isset($_SESSION['userID'])) {
      if ($_GET['page'] == 'logout') {
        logout();
      }
      if ($_GET['page'] == 'delete') {
        delete();
      }
      if ($_GET['page'] == 'update') {
        if (isset($_POST['password_new'])) {
          changePassword($_POST['password_old'],$_POST['password_new'],$_POST['password_confirm']);
        } else {
          update();
        }
      }
      if ($_GET['page'] == 'password') {
        password();
      }
    } else {
      login();
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
  } elseif ($_GET['page'] == 'update') {
    $userDatas = getUser($_SESSION['userID']);
    require('./view/frontend/profile.php');
  } else {
    require('./view/frontend/login.php');
  }
}
