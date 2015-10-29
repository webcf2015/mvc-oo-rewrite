<?php

/* 
 * Contrôleur frontal
 */

// Lancement de session
session_start();


// dépendances
require 'config/config.php';

/*
 *  routage vers contrôleurs
 */

// si on essaye de se connecter ou de se déconnecter
if(isset($_GET['connect'])||isset($_GET['deconnect'])){
    require 'controller/ConnectController.php';
}elseif(isset($_SESSION['idsession'])){ // si on est connecté comme admin
    require 'controller/AdminController.php';
} else { // sinon (on est un simple visiteur du site)
    require 'controller/UserController.php';
}

