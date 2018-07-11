<?php

$errors = array();
//Si on a pas d'id dans l'URL, il ne sert à rien d'exécuter ce code
if (isset($_GET['id'])) {
    $patients = new patients();
    $appointment = new appointments();
    //Permet d'afficher la liste des clients dans le select de l'exo 7
    $patientsList = $patients->getPatientsList();
    $appointment->id = $_GET['id'];
    if (count($_POST) > 0) {
        $appointment->dateHour = $_POST['date'] . ' ' . $_POST['time'];
        $appointment->idPatients = $_POST['idPatients'];
        $appointment->updateAppointment();
    }
    $appointmentDetails = $appointment->getAppointmentById();
} else {
    $errors['noId'] = 'Le rendez-vous n\'a pas été trouvé';
}

