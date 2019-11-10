<?php
require('./controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'signup') {
        signup();
    }
    elseif ($_GET['action'] == 'profile') {
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
