<?php
include_once 'models/dataBase.php';
include_once 'models/appointments.php';
include_once 'controllers/list-appointmentController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Liste des rendez-vous</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    </head>
    <body>
        <p><a href="index.php">Accueil</a></p>
        <p><a href="add-appointment.php">Ajoutez un rendez-vous</a></p>
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Date et heure du rendez-vous</th>
                    <th>ID du patient</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointmentList as $appointment) { ?>
                    <tr>
                        <td><?= $appointment->dateHour ?></td>
                        <td><?= $appointment->idPatients ?></td>
                        <td><a href="rendezvous.php?id=<?= $appointment->id; ?>">Voir</a></td>
                        <td><a href="list-appointment.php?del=<?= $appointment->id; ?>" class="btn" />Supprimer</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>