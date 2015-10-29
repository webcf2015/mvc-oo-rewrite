<?php
// Contrôleur de l'affichage hors connexion

// dependencies
require 'model/MaPDOClass.php';
//require 'model/Periode.php';
//require 'model/Livre.php';
//require 'model/Ecrivain.php';
require 'model/PeriodeManager.php';
require 'model/LivreManager.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';

if(isset($_GET['idperiode'])){
    // require all links in menu
    $periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $menu = $periode_m->recupTous();

    $id = (int) $_GET['idperiode'];
    $periode = $periode_m->recupUn($id);

    $ecrivain_m = new EcrivainManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $tous_ecrivains = $ecrivain_m->recupTous();

    foreach($tous_ecrivains AS $key => $value){
        if($value->sciecle_id != $id){
            unset($tous_ecrivains[$key]);
        }
    }

    include 'view/periode.php';
}elseif(isset($_GET['idecrivain'])){
    // require all links in menu
    $periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $menu = $periode_m->recupTous();

    // récupération de l'écrivain en question
    $id = (int) $_GET['idecrivain'];

    $ecrivain_a_m = new EcrivainAdminManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));

    $ecrivain = $ecrivain_a_m->recupJointure($id);
    $ids = explode('||',$ecrivain['ids']);
    $titres = explode('||',$ecrivain['titres']);
    $descriptions = explode('||',$ecrivain['descriptions']);

    include 'view/ecrivain.php';
}elseif(isset($_GET['idlivre'])){
    // require all links in menu
    $periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $menu = $periode_m->recupTous();

    // récupération du livre
    $id = (int) $_GET['idlivre'];
    $livre_m = new LivreManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $livre = $livre_m->recupUn($id);

    include 'view/livre.php';
} else { // accueil
    // require all links in menu
    $periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $menu = $periode_m->recupTous();

    // random writer
    $ecrivain_m = new EcrivainManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));
    $ecrivain_random = $ecrivain_m->recupUnRandom();

    include 'view/accueil.php';
}

?>
