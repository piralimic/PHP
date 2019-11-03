<?php
    function transfert(){
        $pdo        = false;
        $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $pdo        = is_uploaded_file($_FILES['fic']['tmp_name']);

        if (!$pdo) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['fic']['size'];

            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['fic']['type'];
            $img_nom  = $_FILES['fic']['name'];

            include ("connexion.php");
            $bdd = openConnection();

            $img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = $bdd->prepare('INSERT INTO images(img_nom, img_taille, img_type, img_blob) VALUES(:nom, :taille, :type, :blob)');
            $req->execute(array(
            	'nom' => $img_nom,
            	'taille' => $img_taille,
            	'type' => $img_type,
              'blob' => addslashes($img_blob)
            	));
              return true;
        }
    }
?>
