<?php
$patient = new patients();
$patientsList = $patient->getPatientList();
$regexDate = '/([0-9]{4})\-(([0]{1}[0-9]{1})|([1]{1}[0-2]{1}))\-(([0-2]{1}[0-9]{1})|([3]{1}[0-1]))/';
$regexTime = '/(([0-1]{1}[0-9]{1})|([2]{1}[0-3]{1}))\:([0-5]{1}[0-9]{1})/';
$insertSuccess = false;
$errors = array();

if (isset($_POST['submit'])) {
    $appointment = new appointments();
    if (empty($_POST['appointmentDate']) || !preg_match($regexDate, $_POST['appointmentDate'])) {
        $errors['date'] = 'La date n\'est pas valide';
    }
    if (empty($_POST['appointmentTime']) || !preg_match($regexTime, $_POST['appointmentTime'])) {
        $errors['time'] = 'L\'heure n\'est pas valide';
    }
    if (!empty($_POST['appointmentPatient'])) {
        if (is_nan($_POST['appointmentPatient'])) {
            $errors['idPatient'] = 'La valeur du patient est incorrect';
        } else {
            $appointment->idPatients = $_POST['appointmentPatient'];
        }
    } else {
        $errors['appointmentPatient'] = 'Veuillez renseigner un patient';
    }
    if (count($errors) == 0) {
        $appointment->dateHour = $_POST['appointmentDate'] . ' ' . $_POST['appointmentTime'];
        $appointment->addAppointment();
    }
}
?>