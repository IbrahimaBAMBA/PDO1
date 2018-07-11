<?php
class dataBase {
    //L'attribut $db sera disponible dans ses enfants
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=127.0.0.1;dbname=HospitalE2N;charset=utf8', 'root', 'AsBc80@0');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function __destruct() {        
        $db = NULL;
    }
}
?>