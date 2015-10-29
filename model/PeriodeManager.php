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

    public function recupUn($str){
        $str = CreateSlug::slugify($str);
        $query = $this->db->query("SELECT * FROM periode WHERE leslug = '$str'");
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
