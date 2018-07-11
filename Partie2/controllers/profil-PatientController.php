<?php
$insertSuccess = false;
$formError = array();
$patients = new patients();
if (isset($_GET['id']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['mail'])) {
    $patients->id = $_GET['id'];
    $patients->lastname = $_POST['lastname'];
    $patients->firstname = $_POST['firstname'];
    $patients->birthdate = $_POST['birthdate'];
    $patients->phone = $_POST['phone'];
    $patients->mail = $_POST['mail'];
}
if (isset($_POST['modifyProfil']) && count($formError) == 0) {
    if (!$patients->modifyPatient()) {
        $formError['add'] = 'Erreur lors de la modification du profil.';
    } else {
        $insertSuccess = true;
        $patients->lastname = '';
        $patients->firstname = '';
        $patients->birthdate = '';
        $patients->phone = '';
        $patients->mail = '';
    }
}

// On instancie $patient qui devient un objet
if (isset($_GET['id'])) {
    $patient = new patients();
    $patient->id = $_GET['id'];
    //$patientOne contient displayProfil() appelé par $patient
    $patientOne = $patient->displayProfil();
}

    //On crée un objet
    $appoint = new appointments();
    //Si on a un id via l'URL, on attribut sa valeur à $appoint->idPatients
    if (isset($_GET['id'])) {
    $appoint->idPatients = $_GET['id'];
    }
    //$appointmentPatientList contient appointmentPatient() appelé par $appoint
    $appointmentPatientList = $appoint->appointmentPatient();
?>