<?php
//Creéation d'une classe ou d'un modèle qui se connecte quand on l'instancie (appelle) la connexion est une fois dans le modèle / classe database (fichier séparé). On étend la classe database pour avoir accès à ses méthodes 
class appointments extends dataBase {

    public $id = 0;
    public $dateHours = '01/01/1900 00:00';
    public $idPatients = 0;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Ajout d'un rendez-vous. Fonction qui permet d'enregistrer un rendez-vous dans la base.
     * Paramètres :
     * dateHour La méthode a besoin de la date et de l'heure dans l'attribut dateHour de l'objet qui l'appelle,
     * idPatients La méthode a besoin de l'id du patient dans l'attribut idPatients de l'objet qui l'appelle
     * @return bool Retourne true si l'insertion s'est faite ou false si il y a eu un problème
     */
    public function addAppointment() {
        /*
         * La méthode est "public" parce qu'on doit pouvoir l'appeler depuis le controller 
         * Une méthode "private" ne peut être appelée que depuis la classe où elle est créée (model)
         * Une méthode protected ne peut être appelée que par la classe où elle a été crée ou une classe qui l'"extends"
         */
        //On écrit notre requête avec des marqueurs nominatifs (:dateHour) qui fonctionnent comme des paramètres, il prennent la place d'une valeur qu'on donnera plus tard
        $query = 'INSERT INTO `appointments`( `dateHour`, `idPatients`) VALUES ( :dateHour, :idPatients)';
        //Si l'on a des marqueurs nominatifs on prépare la requête en attendant d'avoir les valeurs des marqueurs
        $rendezVous = $this->db->prepare($query);
        //Quand on a des marqueurs nominatifs, on a des bindValue. Les bindValue donne la valeur des marqueurs. 1 marqueur nominatif = 1 binValue.
        $rendezVous->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $rendezVous->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        //On éxecute la requête qui était en attente. Execute retourne true (si ça a marché) ou false. Si on return execute, la méthode retournera true ou false.
        return $rendezVous->execute();
    }

    /**
     * Permet de savoir si l'heure et la date demandé dans le formulaire est bien disponible.
     * Paramètres: 
     * dateHour La méthode a besoin de la date et de l'heure dans l'attribut dateHour de l'objet qui l'appelle,
     * idPatients La méthode a besoin de l'id du patient dans l'attribut idPatients de l'objet qui l'appelle
     * @return bool Retourne 1 s'il y a un rendez-vous à l'heure et date donnée en paramètre ou false s'il n'y a pas de rendez-vous
     */
    public function checkFreeAppointment() {
        //COUNT(*) compte et renvoie le nombre de résultats trouvé pour la colonne entre ses parenthèses. Ici tous = *
        $query = 'SELECT COUNT(*) AS `takenAppointment` FROM `appointments` WHERE `dateHour` = :dateHour AND `idPatients` = :idPatients';
        $freeAppointment = $this->db->prepare($query);
        $freeAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $freeAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($freeAppointment->execute()) {
            $freeAppointmentCheck = $freeAppointment->fetch(PDO::FETCH_OBJ);
        } else {
            $freeAppointmentCheck = false;
        }
        return $freeAppointmentCheck;
    }

    /**
     * Permet de récupérer la liste des rendez-vous.
     * @return array Retourne un tableau vide s'il n'y a pas de résultat
     */
    public function getAppointmentslist() {
        $listRendezvous = array();
        $query = 'SELECT `id`, `dateHour`, `idPatients` FROM `appointments`';
        $rendezvousResult = $this->db->query($query);
        if (is_object($rendezvousResult)) {
            $listRendezvous = $rendezvousResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $listRendezvous;
    }
    
    /**
     * Permet récupérer un rendez-vous grâce à son id
     * Paramètres :
     * id : Identifiant du rendez-vous
     * @return object
     */
    public function getAppointmentById() {
        $query = 'SELECT DATE_FORMAT(`dateHour`, "%Y-%m-%d") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour`, `idPatients` FROM `appointments` WHERE `id` = :id';
        $appointmentResult = $this->db->prepare($query);
        $appointmentResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $appointmentResult->execute();
        return $appointmentResult->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Permet de modifier le rendez-vous d'un patient
     * Paramètres :
     * id : identifiant du rendez-vous
     * dateHour : date et heure du rendez-vous
     * idPatients : identifiant du patient
     * @return bool True si ça a fonctionné ou false si ça n'a pas fonctionné
     */
    public function updateAppointment() {
        $query = 'UPDATE `appointments` SET `dateHour` = :dateHour ,`idPatients` = :idPatients WHERE `id` = :id';
        $modifyRendezvous = $this->db->prepare($query);
        $modifyRendezvous->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $modifyRendezvous->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $modifyRendezvous->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyRendezvous->execute();
    }

    /**
     * Permet de récupérer un rendez-vous pour un patient donné
     * Paramètres : 
     * idPatients : identifiant du patient qui a le rendez-vous (de la table appointments)
     */
    public function getAppointmentByIdPatients(){
        $queryResult = array();
        $query = 'SELECT DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `time` FROM `appointments` WHERE `idPatients` = :idPatients';
        $queryExecute = $this->db->prepare($query);
        $queryExecute->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if($queryExecute->execute()){
            $queryResult = $queryExecute->fetchAll(PDO::FETCH_OBJ);
        }
        return $queryResult;
    }


    public function __destruct() {
        
    }

}

?>