<?php
// Contrôleur de l'affichage hors connexion

// dependencies
//require 'model/MaPDOClass.php';
//require 'model/Periode.php';
//require 'model/Livre.php';
//require 'model/Ecrivain.php';
//require 'model/PeriodeManager.php';
//require 'model/LivreManager.php';
//require 'model/EcrivainManager.php';
//require 'model/EcrivainAdminManager.php';
require 'model/Deconnexion.php';

if(isset($_GET['connect'])){
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $user = htmlentities(strip_tags($_POST['user']),ENT_QUOTES, "UTF-8");
        $pass = htmlentities(strip_tags($_POST['pass']),ENT_QUOTES, "UTF-8");

        // check if pass is good
        
        if ($user === ADMIN_LOGIN && $pass === ADMIN_PWD){
            // redirection vers le contrôleur admin
            $_SESSION['idsession'] = session_id();
            header('Location: ./');
        }else{
            $error = 'wrong username or password';
        }
    }

}elseif(isset($_GET['deconnect'])){
    if(Deconnexion::deCo()){
        header('Location: ./');
    }
}

include 'view/connexion.php';

?>
