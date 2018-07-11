<?php
class patients extends dataBase {

    public $id = 0;
    public $lastname = '';
    public $firstname = '';
    public $birthdate = '01/01/1900';
    public $phone = '0000000000';
    public $mail = '';

    public function __construct() {
        //Récupère le contenu _contruct() du parent
        parent::__construct();
    }

    public function addPatient() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES(:lastname, :firstname, :birthdate, :phone, :mail)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $responseRequest->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $responseRequest->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $responseRequest->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $responseRequest->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function getPatientList() {
        $patientList = array();
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`';
        $patientResult = $this->db->query($query);
        if (is_object($patientResult)) {
            $patientList = $patientResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $patientList;
    }

    public function displayProfil() {
        $isCorrect = false;
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        $patientprofil = $this->db->prepare($query);
        $patientprofil->bindValue(':id', $this->id, PDO::PARAM_INT);
        if($patientprofil->execute()){
            $patientInfo = $patientprofil->fetch(PDO::FETCH_OBJ);
            if (is_object($patientInfo)) {
                //Attribut les valeurs de $patientInfo à l'objet qui a appelé la méthode displayProfil()
                $this->lastname = $patientInfo->lastname;
                $this->firstname = $patientInfo->firstname;
                $this->birthdate = $patientInfo->birthdate;
                $this->phone = $patientInfo->phone;
                $this->mail = $patientInfo->mail;
                $isCorrect = true;
            }
            return $isCorrect;
        }
    }
    
    public function modifyPatient() {
        $query = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id';
        $modifyPatient = $this->db->prepare($query);
        $modifyPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $modifyPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $modifyPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $modifyPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $modifyPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $modifyPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $modifyPatient->execute();
    }

    public function deletePatientById() {
//        $query = 'DELETE FROM `patients` WHERE `id` = :id';
//        $deleteResult = $this->db->prepare($query);
//        $deleteResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//        return $deleteResult->execute();
          //Permet d'attraper une erreur avec le catch.
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                // On démarre la transaction, toujours mettre la table enfant avant la table parente pour éviter les soucis de suppression.
                $this->db->beginTransaction();
                    $queryAppointment = 'DELETE FROM `appointments` WHERE `idPatients` = :idPatients';
                $deleteAppointmentResult = $this->db->prepare($queryAppointment);
                $deleteAppointmentResult->bindValue(':idPatients', $this->id, PDO::PARAM_INT);
                $deleteAppointmentResult->execute();
                    $queryPatient = 'DELETE FROM `patients` WHERE `id` = :id';
                $deletePatientResult = $this->db->prepare($queryPatient);
                $deletePatientResult->bindValue(':id', $this->id, PDO::PARAM_INT);
                $deletePatientResult->execute();
                // On valide la transaction.
                $this->db->commit();
            } catch (Exception $ex) {
                //Si une erreur survient, on annule les changements.
                $this->db->rollBack();
                echo 'Erreur : ' . $ex->getMessage();
            }
    }
    /**
     * Cette fonction permet d'établir une barre de recherche et effectuer des recherches sur les patients
     */
    public function searchPatients($search){
        $searchPatientResult = array();
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `lastname` LIKE :search OR `firstname` LIKE :search';
        $searchPatient = $this->db->prepare($query);
        $searchPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        if ($searchPatient->execute()){
            $searchPatientResult = $searchPatient->fetchAll(PDO::FETCH_OBJ);
        }
        return $searchPatientResult;
    }
    
     /**
     * Cette fonction permet de récupérer la liste de patient en fonction d'un offset récupérer dans le controller
     */
    public function getPatientListPagination($offset) {
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` LIMIT 5 OFFSET :offset';
        $patientResult = $this->db->prepare($query);
        $patientResult->bindValue(':offset', $offset, PDO::PARAM_INT);
        if ($patientResult->execute()) {
                $patientList = $patientResult->fetchAll(PDO::FETCH_OBJ);
        } else {
            $patientList = false;
        }
        return $patientList;
    }
    /**
     * Cette fonction permet de récupérer le nombre de patient
     */
    public function countPatient() {
        $query = 'SELECT COUNT(`id`) AS `numberPatient` FROM `patients`';
        $patientCount = $this->db->query($query);
        $patientCountResult = $patientCount->fetch(PDO::FETCH_OBJ);
        return $patientCountResult;
    }

    public function __destruct() {
        parent::__destruct();
    }
}

?>