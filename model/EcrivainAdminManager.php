<?php

class EcrivainAdminManager extends EcrivainManager {

    // meth
    public function recupJointure($int){
        $int = (int) $int;
        $this->db->exec("SET SESSION group_concat_max_len = 1000000;");
        $query = $this->db->query("
        SELECT e.*,
            GROUP_CONCAT(l.id SEPARATOR '||') AS ids,
			GROUP_CONCAT(l.letitre SEPARATOR '||') AS titres,
			GROUP_CONCAT(l.ladescription SEPARATOR '||') AS descriptions
            FROM ecrivain e
            INNER JOIN livre l
            ON l.ecrivain_id = e.id
            WHERE e.id = $int 
			GROUP BY e.id;
        ");
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function insertWriter($lenom, $labio, $siecle){
        return $this->db->exec("
            INSERT INTO ecrivain
            VALUES (NULL, '$lenom', '$labio', $siecle)
            ");
    }

    public function deleteWriter($int){
        return $this->db->exec("
            DELETE FROM ecrivain
            WHERE id = $int
            ");
    }

    public function updateWriter(Ecrivain $obj){
        $req = $this->db->prepare("UPDATE ecrivain SET
            lenom = ?,
            labio = ?,
            sciecle_id = ?
            WHERE id = ?
            ");
        $req->bindValue(1,$obj->getLenom());
        $req->bindValue(2,$obj->getLabio());
        $req->bindValue(3,$obj->getSciecle_id());
        $req->bindValue(4,$obj->getId());
        return $req->execute();
            
    }
}
