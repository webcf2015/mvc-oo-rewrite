<?php

/**
 * Description of Deconnexion
 *
 * @author webform
 */
class Deconnexion {
    //put your code here
    public static function deCo(){
         $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    return session_destroy();
    
    }
}
