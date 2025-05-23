<?php
namespace App\Model;
class Professeurs extends Model
{
    public function getProfesseurs(){
        return $this->db->getAll('SELECT * FROM professeurs');
    }
    public function search($prompt){
        return $this->db->getAll('SELECT * FROM professeurs WHERE LOWER(nom) LIKE LOWER(?)', ["%" . strtolower($prompt) . "%"]);
    }
}
?>