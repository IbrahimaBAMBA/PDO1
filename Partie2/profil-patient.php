<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'models/appointments.php';
include_once 'controllers/profil-PatientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Profil du patient</title>
    </head>
    <body>
        <h1>Profil du patient</h1>
        <?php
        //On affiche le profil sélectionné
        if($patientOne){
        ?>
                <h1><?= $patient->lastname . ' ' . $patient->firstname ?></h1>
                <p><?= $patient->lastname . ' ' . $patient->firstname . ' ' . $patient->birthdate . ' ' . $patient->phone . ' ' . $patient->mail; ?></p>
                <h2>Liste des rendez-vous :</h2>
                 <?php
        } else {
            ?><p>Le patient n'a pas été trouvé.</p><?php
        }
        if (count($appointmentPatientList) != 0) {
        //On affiche les rendes-vous sélectionnés
        foreach($appointmentPatientList as $appointment) { ?>
                        <p><?= $appointment->dateHour ?></p>
        <?php } } else {
                    ?>
                    <p>Ce patient n'a pas de rendez-vous</p>
                <?php } ?>
            <!--Formulaire de modification du profil du patient, on affiche un message d'erreur si les informations données ne sont pas correcte et on attribue une valeur à chaque input-->
        <form action="#" method="POST">
            <p><label for="lastname" class="<?= isset($formError['lastname']) ? 'inputError' : '' ?>">Nom : </label><input type="text" name="lastname" value="<?= $patients->lastname ?>" /></p>
            <p><label for="firstname" class="<?= isset($formError['firstname']) ? 'inputError' : '' ?>">Prénom : </label><input type="text" name="firstname" value="<?= $patients->firstname ?>" /></p>
            <p><label for="birthdate" class="<?= isset($formError['birthdate']) ? 'inputError' : '' ?>">Date de naissance : </label><input type="date" name="birthdate" value="<?= $patients->birthdate ?>" /></p>
            <p><label for="phone" class="<?= isset($formError['phone']) ? 'inputError' : '' ?>">Numéro de tel : </label><input type="text" name="phone" value="<?= $patients->phone ?>" /></p>
            <p><label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>">Adresse mail : </label><input type="text" name="mail" value="<?= $patients->mail ?>" /></p>
            <p><input name="modifyProfil" type="submit" value="Valider" /></p>
        </form>
        <p class="formValid">
            <?php
            //Si l'envoi des infos est réussi, on anvoie un message
            if ($insertSuccess) {
                echo 'Envoi réussi';
            }
            ?>
        </p>
        <div>
            <?php foreach ($formError as $Error) { ?>
            <!--Sinon un message d'erreur-->
                <p><?= $Error ?></p>
        <?php } ?>
        </div>
</html>
