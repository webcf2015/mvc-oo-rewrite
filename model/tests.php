<?php
// Contrôleur de l'affichage hors connexion

// dependencies
require 'model/MaPDOClass.php';
require 'model/Periode.php';
require 'model/Livre.php';
require 'model/Ecrivain.php';

// managers
require 'model/PeriodeManager.php';
require 'model/LivreManager.php';
require 'model/EcrivainManager.php';

$periode_m = new PeriodeManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));

$ecrivain_m = new EcrivainManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));

$livre_m = new LivreManager(MaPDO::getConnection(DB_SELECT, DB_USER, DB_PWD, TRUE));

$obj = $periode_m->recupUn(1);
var_dump($obj);

$obj = $ecrivain_m->recupUn(1);
var_dump($obj);

$obj = $livre_m->recupUn(1);
var_dump($obj);



header('Content-Type: text/html; charset=utf-8');

?>
