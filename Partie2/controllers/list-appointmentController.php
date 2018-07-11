<?php
$success = false;
if(isset($_GET['del'])) {
    $deleteAppointment = new appointments();
    $deleteAppointment->id = $_GET['del'];
    var_dump($deleteAppointment->id);
    if($deleteAppointment->removeAppointment()) {
        $success = true;
    }
}

    $appointment = new appointments();
    $appointmentList = $appointment->appointmentList();
    
?>