<?php
    namespace App\Model;
    class Etudiants extends Model{
        public function getEtudiants(){
            return $this->db->getAll('SELECT e.nom as nom_etudiant, p.nom as nom_professeur FROM etudiants e INNER JOIN professeurs p ON e.id_professeur = p.id_professeur');
        }
        public function getEtudiantsByProfesseur($id){
            return $this->db->getAll('SELECT e.nom as nom_etudiant, p.nom as nom_professeur FROM etudiants e INNER JOIN professeurs p ON e.id_professeur = p.id_professeur WHERE e.id_professeur = ?', [$id]);
        }
        public function search($prompt){
            return $this->db->getAll('SELECT e.nom as nom_etudiant, p.nom as nom_professeur FROM etudiants e INNER JOIN professeurs p ON e.id_professeur = p.id_professeur WHERE LOWER(e.nom) LIKE LOWER(?)', ["%" . strtolower($prompt) . "%"]);
        }
    }
?>