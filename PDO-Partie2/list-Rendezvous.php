<?php
include_once 'models/dataBase.php';
include_once 'models/appointments.php';
include_once 'models/patients.php';
include_once 'controllers/list-RendezvousController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>List-rendezvous</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>dateHour</th>
                    <th>idPatients</th>                
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listRendezvous as $rendevous) { ?>
                    <tr>
                        <td><?= $rendevous->id ?></td>
                        <td><?= $rendevous->dateHour ?></td>
                        <td><?= $rendevous->idPatients ?></td>                        
                        <td><a href="rendezvous.php?id=<?= $rendevous->id; ?>">Voir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
       <p><a href="rendezvous.php">Rendez-vous</a></p>
<!--        .....................Correction.......................................................-->
<!--<table border="2" class="rdvList table table-hover">
    <thead>
        <tr>
            <th>Patients</th>
            <th>Date du RDV</th>
            <th>Heure du RDV</th>
            <th>Modifier le RDV</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($appointmentsList as $appointment) { ?>
            <tr>
                <td><?= $appointment->lastname . ' ' . $appointment->firstname; ?></td>
                <td><?= $appointment->date; ?></td>
                <td><?= $appointment->hour; ?></td>
                <td><a class="btn btn-secondary" href="rendezvous.php?id=<?= $appointment->id; ?>">Voir / Modifier ce RDV</a></td>
                
            </tr>
        <?php } ?>
    </tbody>
</table>-->
    </body>
</html>
