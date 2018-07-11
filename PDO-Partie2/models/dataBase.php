<?php
class dataBase {
    //L'attribut $db sera disponible dans ses enfants
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=HospitalE2N;charset=utf8', 'root', 'i271220101127B');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function __destruct() {        
    }
}
?>