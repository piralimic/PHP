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

function getUserName($username)
{
  $pdo = dbconnect();
  $request = $pdo->prepare('SELECT username FROM student WHERE username=?');
  $request->execute([$username]);
  if($request->fetch()){
      throw new Exception("This username is already registered.");
    }
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
  $email = $_POST['email'];
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
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
