<?php

class Livre {
    // attr
    private $id;
    private $letitre;
    private $ladescription;
    private $lasortie;
    private $ecrivain_id;

    public function __construct(array $valeurs){
        $this->trouveSetter($valeurs);
    }

    // meth

    private function trouveSetter($param) {
        foreach ($param as $clef => $valeur) {
            $nom = 'set' . ucfirst($clef);
            if (method_exists($this, $nom)) {
                $this->$nom($valeur);
            }
        }
    }

    // getters and setters

    // -- id
    public function getId(){
        return $this->id;
    }

    public function setId($int){
        $int = (int) $int;
        $this->id = $int;
    }

    // -- letitre
    public function getLetitre(){
        return $this->letitre;
    }

    public function setLetitre($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->letitre = $string;
    }

    // -- ladescription
    public function getLadescription(){
        return $this->ladescription;
    }

    public function setLadescription($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->ladescription = $string;
    }

    // -- lasortie
    public function getLasortie(){
        return $this->lasortie;
    }

    public function setLasortie($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->lasortie = $string;
    }

    // -- ecrivain_id
    public function getEcrivain_id(){
        return $this->ecrivain_id;
    }

    public function setEcrivain_id($int){
        $int = (int) $int;
        $this->ecrivain_id = $int;
    }
}
