<?php

    if ( isset($_GET['id']) ){
        $id = intval ($_GET['id']);
        include ("connexion.php");
        $bdd = openConnection();

        $reponse = $bdd->query('SELECT img_id, img_type, img_blob FROM images WHERE img_id ='.$id);

        $donnees = $reponse->fetch();

        if ( !$donnees ){
            echo "Id d'image inconnu";
        } else {
            header ("Content-type: " . $donnees['img_type']);
            echo $donnees['img_blob'];
        }

    } else {
        echo "Mauvais id d'image";
    }

?>
