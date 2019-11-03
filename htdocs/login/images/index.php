<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
     <?php
         //include ("transfert.php");

         if ( isset($_GET['id']) ){
             $id = intval ($_GET['id']);
             include ("connexion.php");
             $bdd = openConnection();

             $reponse = $bdd->query('SELECT img_id, img_type, img_blob FROM images WHERE img_id ='.$id);

             $donnees = $reponse->fetch();

             if ( !$donnees ){
                 echo "Id d'image inconnu";
             } else {

                 echo("<img src='data:image/png;base64,".base64_encode($donnees['img_blob'])."' />");
             }

         } else {
             echo "Mauvais id d'image";
         }

      ?>
      <h3>Envoi d'une image</h3>
      <form enctype="multipart/form-data" action="" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="fic" size=50 />
         <input type="submit" value="Envoyer" />
      </form>
      <p><a href="liste.php">Liste</a></p>
   </body>
</html>
