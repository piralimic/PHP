<html>
   <head>
      <title>Stock d'images</title>
   </head>
   <body>
      <?php
         include ("connexion.php");
         $bdd = openConnection();

         $reponse = $bdd->query('SELECT img_nom, img_id FROM images ORDER BY img_nom');

         while ($donnees = $reponse->fetch())
         {
             echo "<a href=\"apercu.php?id=" . $donnees['img_id'] . "\">" . $donnees['img_nom'] . "</a><br />";
         }
      ?>
   </body>
</html>
