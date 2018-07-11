<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/add-appointmentControllers.php';
include_once 'controllers/list-patientController.php';
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <title>Ajout de rendez-vous</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <h1>Ajoutez un rendez-vous</h1>
        <?php
        foreach ($errors as $error){
            echo $error;
        }
        ?>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="appointmentDate">Date du rendez-vous*</label>
                <input type="date" class="form-control" min="<?= date('Y-m-d') ?>" max="2018-12-31" name="appointmentDate" />
            </div>
            <div class="form-group">
                <label for="appointmentTime">Heure du rendez-vous*</label>
                <input type="time" class="form-control" name="appointmentTime" />
            </div>
            <div class="form-group">
                <label for="appointmentPatient">Patient à prendre en charge*</label>
                <select class="form-control" name="appointmentPatient">
                    <option>Sélectionnez un patient</option>
                    <?php foreach ($patientsList as $patient) { ?> 
                    <option value="<?= $patient->id ?>"><?= $patient->lastname . ', ' . $patient->firstname ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Enregistrer le rendez-vous</button>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="projet.js"></script>
</html>