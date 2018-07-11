<?php

$insertSuccess = false;
$patientOne = false;
$formError = array();
$patients = new patients();


$patients->id = $_GET['id'];

if (isset($_GET['id']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['phone']) && isset($_POST['mail'])) {
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

if (isset($_GET['id'])) {
    $patientOne = $patients->displayProfil();
}

$rendezvous = new appointments();
$rendezvous->idPatients = $patients->id;
$listRendezvous = $rendezvous->getAppointmentByIdPatients();
?>

<?php

//                                                                              Correction controller exo 4
//$errors = array();
//// On instancie $patient qui devient un objet
//$patient = new patients();
//if (isset($_GET['patientId'])) {
//    $patient->id = $_GET['patientId'];
//}
//
//$isFind = $patient->getPatientById();
//
//if (count($_POST) > 0) {
//    if (!empty($_POST['lastName'])) {
//        $patient->lastName = $_POST['lastName'];
//    } else {
//        $errors['lastName'] = 'Veuillez renseigner votre nom';
//    }
//
//    if (!empty($_POST['firstName'])) {
//        $patient->firstName = $_POST['firstName'];
//    } else {
//        $errors['firstName'] = 'Veuillez renseigner votre prénom';
//    }
//
//    if (!empty($_POST['birthDate'])) {
//        $patient->birthDate = $_POST['birthDate'];
//    } else {
//        $errors['birthDate'] = 'Veuillez renseigner votre date de naissance';
//    }
//
//    if (!empty($_POST['phone'])) {
//        $patient->phone = $_POST['phone'];
//    } else {
//        $errors['phone'] = 'Veuillez renseigner votre numéro de téléphone';
//    }
//
//    if (!empty($_POST['mail'])) {
//        $patient->mail = $_POST['mail'];
//    } else {
//        $errors['mail'] = 'Veuillez renseigner votre adresse e-mail';
//    }
//
//    if (count($errors) == 0) {
//        $patient->updatePatient();
//    }
//}
//?>