<?php

class PeriodeManager {
    // attr
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }
    
    // meth
    public function recupTous(){
        $query = $this->db->query("SELECT * FROM periode ORDER BY id");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function recupUn($int){
        $int = (int) $int;
        $query = $this->db->query("SELECT * FROM periode WHERE id = $int");
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
