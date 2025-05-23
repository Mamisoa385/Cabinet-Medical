<?php
    namespace App\Database;
    class Database{
        private $db;
        public function __construct(){
            $this->db = new \PDO('mysql:host=localhost;dbname=encadrement', 'root', '');
        }
        public function query($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $req;
        }
        public function insert($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $this->db->lastInsertId();
        }
        public function update($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $req->rowCount();
        }
        public function delete($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $req->rowCount();
        }
        public function get($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $req->fetch(\PDO::FETCH_ASSOC);
        }
        public function getAll($sql, $params = []){
            $req = $this->db->prepare($sql);
            $req->execute($params);
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
?>