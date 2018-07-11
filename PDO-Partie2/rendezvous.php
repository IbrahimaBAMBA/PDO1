<?php
include_once 'models/dataBase.php';
include_once 'models/appointments.php';
include_once 'models/patients.php';
include_once 'controllers/rendezvousController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Rendez-vous</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <p><a href="index.php">Accueil</a></p>
        <h1>Informations du rendez-vous</h1>
        <?php foreach ($errors as $error) { ?>
            <p><?= $error ?></p>
        <?php } ?>
        <?php if (isset($_GET['id'])) { ?>
            <form action="rendezvous.php?id=<?= $_GET['id'] ?>" method="post">
                <input type="date" name="date" value="<?= $appointmentDetails->date ?>" />
                <input type="time" name="time" value="<?= $appointmentDetails->hour ?>" />
                <select name="idPatients">
                    <option disabled selected> selectionnez un patient</option>
                    <?php foreach ($patientsList as $patients) { ?>
                        <option value="<?= $patients->id ?>" <?= $patients->id == $appointmentDetails->idPatients ? 'selected' : '' ?> > <?= $patients->lastname . ' ' . $patients->firstname ?></option>  
                    <?php } ?>
                </select>
                <input type="submit" name="submit" value="Enregistrer les modifications" />
            </form>
        <?php } ?>
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>

