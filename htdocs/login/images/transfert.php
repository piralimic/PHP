<?php

            include ("connexion.php");
            $conn = openConnection();



if (isset($_FILES['fic']) && $_FILES['fic']['size'] > 0)
{
  $tmpName  = $_FILES['fic']['tmp_name'];

   $fp = fopen($tmpName, 'r');
   $data = fread($fp, filesize($tmpName));
   $data = addslashes($data);
   fclose($fp);}

try
{
  $stmt = $conn->prepare("INSERT INTO images ( img_blob ) VALUES ( '$data' )");
//          $stmt->bindParam(1, $data, PDO::PARAM_LOB);
           $conn->errorInfo();
           $stmt->execute();
       }
catch(PDOException $e)
{
   'Error : ' .$e->getMessage();
}
?>
