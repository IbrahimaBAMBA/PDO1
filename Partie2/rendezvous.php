<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/display-appointmentController.php';
include_once 'controllers/add-appointmentControllers.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Rendez-vous</title>
    </head>
    <body>
        <h1>Rendez-vous</h1>
        <?php
        if($appointmentsOne){
        ?>
                <p><?= $appointment->dateHour . ' ' . $appointment->idPatients; ?></p>
                 <?php
        } else {
            ?><p>Le rendez-vous n'a pas été trouvé.</p><?php
        }
        ?>
        <!--Formulaire de modification du rendez-vous du patient, on affiche un message d'erreur si les informations données ne sont pas correcte et on attribue une valeur à chaque input-->
        <form action="#" method="POST">
            <div class="form-group">
                <label for="appointmentDate">Date du rendez-vous</label>
                <input type="date" class="form-control" name="appointmentDate" />
            </div>
            <div class="form-group">
                <label for="appointmentTime">Heure du rendez-vous</label>
                <input type="time" class="form-control" name="appointmentTime" />
            </div>
            <div class="form-group">
                <label for="appointmentPatient">Patient à prendre en charge</label>
                <select class="form-control" name="appointmentPatient">
                    <option>Sélectionnez un patient</option>
                    <?php foreach ($patientsList as $patient) { ?> 
                    <option value="<?= $patient->id ?>"><?= $patient->lastname . ', ' . $patient->firstname ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="modifyAppointment" class="btn btn-primary">Enregistrer le rendez-vous</button>
        </form>
        <p class="formValid">
            <?php
            //Si l'envoi des infos est réussi, on envoie un message
            if ($insertSuccess) {
                echo 'Modification réussi';
            }
            ?>
        </p>
        <div>
            <?php foreach ($appointmentError as $Error) { ?>
            <!--Sinon un message d'erreur-->
                <p><?= $Error ?></p>
        <?php } ?>
        </div>
</html>