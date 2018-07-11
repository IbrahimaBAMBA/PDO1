<?php

$success = false;
if (isset($_GET['del'])) {
    $deletePatient = new patients();
    $deletePatient->id = $_GET['del'];
    if ($deletePatient->deletePatientById()){
        $success = true;
    }
}

    $patient = new patients();
    $patientList = $patient->getPatientList();
    
    
$success = false;
if (isset($_GET['del'])) {
    $deletePatient = new patients();
    $deletePatient->id = $_GET['del'];
    if ($deletePatient->deletePatientById()){
        $success = true;
    }
}
$patients = new patients();


if(isset($_POST['submitSearch'])){
    if (isset($_POST['searchPatient'])){
        $patientsList = $patients->searchPatients($_POST['searchPatient']);
    }
} else {
    $patientsList = $patients->getPatientList();
}

//Par défaut première page
$page = 1;
//On limite l'affichage à 5 patients
$limit = 5;
$patient = new patients();
if(!empty($_GET['page'])) {
    $page = $_GET['page']; 
}
//Permet de calculer le offset en fonction de la page sélectionné
$start = ($page - 1) * $limit;
//appel de la méthode getPatientListPagination
$patientList = $patient->getPatientListPagination($start);
//appel de la méthode countPatient
$patientCount = $patient->countPatient();
$maxPagination = ceil($patientCount->numberPatient/$limit);

?>