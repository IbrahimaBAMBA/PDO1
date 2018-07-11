<?php

class appointments extends dataBase {
    public $id = 0;
    public $dateHour = '';
    public $idPatients = '';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Fonction qui perrmet de rentrer un rendez vous dans la base
     * @return 
     */
    public function addAppointment() {
        $query = $this->db->prepare('INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)');
        $query->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $query->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
       return $query->execute();
    }
    
    public function appointmentList() {
        $appointmentList = array();
        $query = 'SELECT `id`, `dateHour`, `idPatients` FROM `appointments`';
        $appointmentResult = $this->db->query($query);
        if (is_object($appointmentResult)) {
            $appointmentList = $appointmentResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $appointmentList;
    }
    
    public function displayAppointment() {
        $isCorrect = false;
        $query = 'SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y %H:%i") AS `dateHour`, `idPatients` FROM `appointments` WHERE `id` = :id';
        $appointmentShow = $this->db->prepare($query);
        $appointmentShow->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($appointmentShow->execute()){
            $appointmentInfo = $appointmentShow->fetch(PDO::FETCH_OBJ);
            if (is_object($appointmentInfo)) {
                //Attribut les valeurs de $appointmentInfo à l'objet qui a appelé la méthode displayAppointment()
                $this->id = $appointmentInfo->id;
                $this->dateHour = $appointmentInfo->dateHour;
                $this->idPatients = $appointmentInfo->idPatients;
                $isCorrect = true;
            }
            return $isCorrect;
        }
    }
    
        public function modifyAppointment() {
        $query = 'UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients` = :idPatients WHERE `id` = :id';
        $modifyAppointments = $this->db->prepare($query);
        $modifyAppointments->bindValue(':id', $this->id, PDO::PARAM_INT);
        $modifyAppointments->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $modifyAppointments->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        return $modifyAppointments->execute();
    }
    
    public function appointmentPatient() {
        //On crée un tableau vide
        $appointmentPatientList = array();
        //On séléctionne les rendez-vous
        $query = 'SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y %H:%i") AS `dateHour`, `idPatients` FROM `appointments` WHERE `idPatients` = :idPatients';
        //On conditionne la requête
        $appointmentDisplayPatient = $this->db->prepare($query);
        //On lie idPatients à la variable
        $appointmentDisplayPatient->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        //On exécute la requête
        $appointmentDisplayPatient->execute();
            if (is_object($appointmentDisplayPatient)) {
                //On lit tout les élément de la variable
                    $appointmentPatientList = $appointmentDisplayPatient->fetchAll(PDO::FETCH_OBJ);
                }
                //On renvoie la valeur de la variable
        return $appointmentPatientList;
        }
        
        public function removeAppointment() {
            $query = 'DELETE FROM `appointments` WHERE `id` = :id';
            $deleteAppointment = $this->db->prepare($query);
            $deleteAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $deleteAppointment->execute();
        }
        
        public function __destruct() {
            parent::__destruct();
        }
    }
    
?>