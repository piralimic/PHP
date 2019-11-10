<?php

require('./model/frontend.php');

function signup()
{
  if (isset($_POST['action']))
  {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $addNew = dbconnect();
    $request = $addNew->prepare('INSERT INTO student(username, email, password) VALUES(?,?,?)');
    $request->execute([$username,$email,$password]);

    login();
  } else {
    require('./view/frontend/signup.php');
  }
}

function profile()
{
  $user = getUser($_GET['id']);
  $profile = getProfile($_GET['id']);

  require('./view/frontend/profile.php');
}

function login()
{
  require('./view/frontend/login.php');
}
