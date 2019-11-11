<?php
require('./model/frontend.php');

function signup()
{
  if (isset($_POST['email']))
  {
    array_filter($_POST, 'trim_value');
    $username = checkUsername($_POST['username']);
    isUserName($username);
    $email = checkEmail($_POST['email']);
    $password = checkPassword($_POST['password'], $_POST['password_confirm']);
    addNewUser($username,$email,$password);
    newSession($username,$password);
  } else {
    require('./view/frontend/signup.php');
  }
}

function profile($userId)
{
  $userDatas = getUser($userId);
  require('./view/frontend/profile.php');
}

function login()
{
  require('./view/frontend/login.php');
}

function logout()
{
  if(session_destroy()) {
    login();
  }
}

function delete()
{
  deleteUser();
  logout();
}

function password()
{
  require('./view/frontend/password.php');
}

function changePassword($password_old, $password_new, $password_confirm)
{
  $password = checkPassword($password_new, $password_confirm);
  isPassword($password_old);
  updatePassword($password);
  profile($_SESSION['userID']);
}

function update()
{
  $userId = updateUser();
  profile($userId);
}
