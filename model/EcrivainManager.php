<?php

class EcrivainManager {
    // attr
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }
    
    // meth
    public function recupTous(){
        $query = $this->db->query("SELECT * FROM ecrivain ORDER BY id");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function recupUn($int){
        $int = (int) $int;
        $query = $this->db->query("SELECT * FROM ecrivain WHERE id = $int");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function recupUnRandom(){
        $query = $this->db->query("SELECT * FROM ecrivain ORDER BY RAND() LIMIT 1");
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
