<?php
require('./controller/frontend.php');

if (isset($_GET['page'])) {
    if ($_GET['page'] == 'signup') {
        signup();
    }
    elseif ($_GET['page'] == 'profile') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : identifiant non valide';
        }
    }
}
else {
    login();
}
