<?php
require('./model/frontend.php');

function signup()
{
  if (isset($_POST['email']))
  {
    $username = $_POST['username'];
    $email = $_POST['email'];
    if ($_POST['password'] !== $_POST['password_confirm']) {
      throw new Exception("the two passwords do not match.");
    }
    $password = $_POST['password'];
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

function update()
{
  $userId = updateUser();
  profile($userId);
}
