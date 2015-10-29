<?php

class Periode {
    // attr
    private $id;
    private $laperiode;

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

    // -- laperiode
    public function getLaperiode(){
        return $this->laperiode;
    }

    public function setLaperiode($string){
        $string = htmlentities(strip_tags($string),ENT_QUOTES, "UTF-8");
        $this->laperiode = $string;
    }
}
