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
        if (!$patientOne) {
            ?><p>Le patient n'a pas été trouvé.</p><?php
        }
        ?>
        <!-- pour afficher dans un input on dans la value de l'input-->
        <form action="#" method="POST">
            <p><label for="lastname" class="<?= isset($formError['lastname']) ? 'inputError' : '' ?>">Nom : </label><input type="text" name="lastname" value="<?= $patients->lastname ?>" /></p>
            <p><label for="firstname" class="<?= isset($formError['firstname']) ? 'inputError' : '' ?>">Prénom : </label><input type="text" name="firstname" value="<?= $patients->firstname ?>" /></p>
            <p><label for="birthdate" class="<?= isset($formError['birthdate']) ? 'inputError' : '' ?>">Date de naissance : </label><input type="date" name="birthdate" value="<?= $patients->birthdate ?>" /></p>
            <p><label for="phone" class="<?= isset($formError['phone']) ? 'inputError' : '' ?>">Numéro de tel : </label><input type="text" name="phone" value="<?= $patients->phone ?>" /></p>
            <p><label for="mail" class="<?= isset($formError['mail']) ? 'inputError' : '' ?>">Adresse mail : </label><input type="text" name="mail" value="<?= $patients->mail ?>" /></p>
            <p><input name="modifyProfil" type="submit" value="Valider" /></p>
        </form>

        <p class="formValid"> <?php
            if ($insertSuccess) {
                echo 'Envoi réussi';
                ?>
                <?php
            }
            ?>
        </p>
        <?php if (count($listRendezvous) > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listRendezvous as $rendevous) { ?>
                        <tr>
                            <td><?= $rendevous->date ?></td>
                            <td><?= $rendevous->time ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table> 
        <?php } else { ?>
            <p>Il n'y a aucun rendez-vous pour ce patient</p>
        <?php } ?>
    </body>
</html>