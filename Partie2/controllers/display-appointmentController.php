<?php
$insertSuccess = false;
$appointmentsOne = false;
$appointmentError = array();
$appointments = new appointments();
if (isset($_GET['id'])) {
    $appointments->id = $_GET['id'];
}
if(!empty($_POST['appointmentDate']) && !empty($_POST['appointmentTime'])){
    $appointments->dateHour = $_POST['appointmentDate'] . ' ' . $_POST['appointmentTime'];
}
if(!empty($_POST['appointmentPatient'])){
    $appointments->idPatients = $_POST['appointmentPatient'];
}
if (isset($_POST['modifyAppointment']) && count($appointmentError) == 0) {
    if (!$appointments->modifyAppointment()) {
        $appointmentError['add'] = 'Erreur lors de la modification du rendez-vous.';
    } else {
        $insertSuccess = true;
        $appointments->dateHour = '';
        $appointments->idPatients = '';
    }
}

// On instancie $appointment qui devient un objet
if (isset($_GET['id'])) {
    $appointment = new appointments();
    $appointment->id = $_GET['id'];
    //$appointmentsOne contient displayAppointment() appelé par $patient
    $appointmentsOne = $appointment->displayAppointment();
}
?>