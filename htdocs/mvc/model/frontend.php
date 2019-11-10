<?php
function dbconnect()
{
  $dbhost = "remotemysql.com";
	$dbuser = "rqeQIUVSiu";
	$dbpass = "kbrLL0UHdm";
	$db = "rqeQIUVSiu";

  try
  {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$db",$dbuser,$dbpass);
    return $pdo;
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}

function getPost($postId)
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}
