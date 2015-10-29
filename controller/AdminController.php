<?php
// Contrôleur de l'affichage hors connexion

// dependencies
require 'model/MaPDOClass.php';
// require 'model/Periode.php';
require 'model/Livre.php';
require 'model/Ecrivain.php';
require 'model/PeriodeManager.php';
require 'model/LivreManager.php';
require 'model/EcrivainManager.php';
require 'model/EcrivainAdminManager.php';
require 'model/LivreAdminManager.php';

// connexion
$pdo = MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE);

if(isset($_GET['manage'])){

    // traitement des suppressions
    if(isset($_GET['del']) XOR isset($_GET['dellivre'])){
        if(isset($_GET['del'])){
            // traitement suppression écrivains
            $id = (int) $_GET['del'];
            $ecrivain_a_m = new EcrivainAdminManager($pdo);
            $ecrivain_a_m->deleteWriter($id);
            header('Location: ./');
        }

        if(isset($_GET['dellivre'])){
            // traitement suppression livres
            $id = (int) $_GET['dellivre'];
            $livre_a_m = new LivreAdminManager($pdo);
            $livre_a_m->deleteBook($id);
            header('Location: ./');
        }
    }

    // chargement des dépendances pour modifications
    if(isset($_GET['mod']) XOR isset($_GET['modlivre'])){
        if(isset($_GET['mod'])){
            $id = (int) $_GET['mod'];
            $ecrivain_m = new EcrivainManager($pdo);
            $ecrivain = $ecrivain_m->recupUn($id);

            $periode_m = new PeriodeManager($pdo);
            $siecles = $periode_m->recupTous();
        }

        if(isset($_GET['modlivre'])){
            $ecrivain_m = new EcrivainAdminManager($pdo);
            $ecrivains = $ecrivain_m->recupTous();

            $id = (int) $_GET['modlivre'];
            $livre_m = new LivreManager($pdo);
            $livre = $livre_m->recupUn($id);
        }
    }

    // traitement des modifications
    if(isset($_POST['submitmodifierecrivain']) XOR isset($_POST['submitmodifierlivre'])){
        // traitement modification écrivain
        if(isset($_POST['submitmodifierecrivain'])){
            $modifieE = new Ecrivain($_POST);
            $ecrivain_a_m = new EcrivainAdminManager($pdo);
            $ecrivain_a_m->updateWriter($modifieE);
        }
        // traitement modification livre
        if(isset($_POST['submitmodifierlivre'])){
            $modifieL = new Livre($_POST);
            $livre_a_m = new LivreAdminManager($pdo);
            $livre_a_m->updateBook($modifieL);
        }
    }

    // affichage de la liste
    
    $ecrivain_m = new EcrivainAdminManager($pdo);
    $ecrivains = $ecrivain_m->recupTous();
    
    $livre_m = new LivreManager($pdo);
    $livres = $livre_m->recupTous();
    
    include 'view/manage.php';

}else{
    // treat add writer and add book
    if(isset($_POST['submitajouterecrivain'])){
        $lenom = htmlentities(strip_tags($_POST['lenom']),ENT_QUOTES, "UTF-8");
        $labio = htmlentities(strip_tags($_POST['labio']),ENT_QUOTES, "UTF-8");
        $siecle = (int) htmlentities(strip_tags($_POST['siecle']),ENT_QUOTES, "UTF-8");

        // traitement ajout écrivain
        $ecrivain_a_m = new EcrivainAdminManager($pdo);
        $ecrivain_a_m->insertWriter($lenom,$labio,$siecle);

    }elseif(isset($_POST['submitajouterlivre'])){
        $letitre = htmlentities(strip_tags($_POST['letitre']),ENT_QUOTES, "UTF-8");
        $ladescription = htmlentities(strip_tags($_POST['ladescription']),ENT_QUOTES, "UTF-8");
        $lasortie = htmlentities(strip_tags($_POST['lasortie']),ENT_QUOTES, "UTF-8");
        $lecrivain = (int) htmlentities(strip_tags($_POST['lecrivain']),ENT_QUOTES, "UTF-8");

        // traitement ajout livres
        $livre_a_m = new LivreAdminManager($pdo);
        $livre_a_m->insertBook($letitre, $ladescription, $lasortie, $lecrivain);
    }

    // to show form select fields

    $periode_m = new PeriodeManager($pdo);
    $siecles = $periode_m->recupTous();

    $ecrivain_m = new EcrivainManager($pdo);
    $ecrivains = $ecrivain_m->recupTous();

    include 'view/admin.php';
}

