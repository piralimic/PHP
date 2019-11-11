<?php
session_start();

function newSession($username,$password)
{
  $_SESSION['userID'] = getUserId($username,$password);
  profile($_SESSION['userID']);
}

function dbconnect()
{
  $dbhost = "remotemysql.com";
  $dbuser = "rqeQIUVSiu";
  $dbpass = "kbrLL0UHdm";
  $db = "rqeQIUVSiu";
  try {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
    return $pdo;
  } catch (Exception $e) {
    throw new Exception("connexion to the database failed, please try again later.");
  }
}

function addNewUser($username,$email,$password)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('INSERT INTO student(username, email, password) VALUES(?,?,?)');
  $request->execute([$username,$email,password_hash($password, PASSWORD_DEFAULT)]);
}

function isUserName($username)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('SELECT username FROM student WHERE username=?');
  $request->execute([$username]);
  if($request->fetch()){
    throw new Exception("This username is already registered.");
  }
}

function isPassword($password)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('SELECT id, password FROM student WHERE id=?');
  $request->execute([$_SESSION['userID']]);
  $userDatas = $request->fetch();
  if(!password_verify($password, $userDatas['password'])){
    throw new Exception("your Old Password is not correct.");
  }
}

function updatePassword($password)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('UPDATE student SET password=? WHERE id=?');
  $request->execute([password_hash($password, PASSWORD_DEFAULT),$_SESSION['userID']]);
}

function getUserId($username,$password)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('SELECT * FROM student WHERE username=?');
  $request->execute([$username]);
  if($userDatas = $request->fetch()){
    if(password_verify($password, $userDatas['password'])){
      return $userDatas['id'];
    } else {
      throw new Exception("invalid password.");
    }
  } else {
    $_POST['username'] = '';
    throw new Exception("no user found or invalid username.");
  }
}

function getUser($id)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('SELECT * FROM student WHERE id=?');
  $request->execute([$id]);
  return $request->fetch();
}

function deleteUser()
{
  $pdo = dbconnect();
  $request = $pdo->prepare('DELETE FROM student WHERE id=?');
  $request->execute([$_SESSION['userID']]);
}

function updateUser()
{
  $email = checkEmail($_POST['email']);
  $firstName = checkName($_POST['first_name']);
  $lastName = checkName($_POST['last_name']);
  $linkedin = $_POST['linkedin'];
  $github = $_POST['github'];
  $id = $_SESSION['userID'];

  $pdo = dbconnect();

  if (isset($_FILES['avatar']) AND $_FILES['avatar']['tmp_name'] > '') {
    $avatar = base64_encode(file_get_contents(addslashes($_FILES['avatar']['tmp_name'])));
    $request = $pdo->prepare('UPDATE student SET email=?, first_name=?, last_name=?, linkedin=?, github=?, avatar=? WHERE id=?');
    $request->execute([$email,$firstName,$lastName,$linkedin,$github,$avatar,$id]);
  } else {
    $request = $pdo->prepare('UPDATE student SET email=?, first_name=?, last_name=?, linkedin=?, github=? WHERE id=?');
    $request->execute([$email,$firstName,$lastName,$linkedin,$github,$id]);
  }

  return $_SESSION['userID'];
}

function trim_value(&$value)
{
  $value = trim($value);    // this removes whitespace and related characters from the beginning and end of the string
}

function checkEmail($email)
{
  $email = $_POST['email'];
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    throw new Exception("your email adress is not valid.");
  }
  return $email;
}

function checkName($name)
{
  if(preg_match('/[^a-z ]/i', $name)) {
    throw new Exception("only alphabetic characters are allowed.");
  } elseif (preg_match('/[^a-z] {1}/i', $name)) {
    throw new Exception("please check the spaces between your names.");
  } else {
    return $name;
  }
}

function checkPassword($password, $password_confirm)
{
  if ($password !== $password_confirm) {
    throw new Exception("the two passwords do not match.");
  }
  return $password_confirm;
}

function checkUsername($username)
{
  if(preg_match('/[^a-z_\-0-9]/i', $username)) {
    throw new Exception("incorrect username, only alphanumeric characters are allowed.");
  } else {
    return $username;
  }
}
