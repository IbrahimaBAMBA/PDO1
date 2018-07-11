<?php
    $patient = new patients();
    $patientList = $patients->getPatientsList();
?>
<?php

$success = false;
if (isset($_GET['del'])) {
    $deletePatient = new patients();
    $deletePatient->id = $_GET['del'];
    if ($deletePatient->deletePatientById()){
        $success = true;
    }
}
$patients = new patients();
$patientsList = $patients->getPatientsList();
?>
<?php

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
    $patientsList = $patients->getPatientsList();
}
?>