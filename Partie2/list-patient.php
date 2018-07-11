<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'controllers/list-patientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <title>List-patient</title>
    </head>
    <body>
        <p><a href="index.php">Accueil</a></p>
        <p><a href="ajout-patient.php">Ajout-patient</a></p>
        <?php if (!empty($success)) { ?>
                    <div class="alert alert-dismissible alert-success col-lg-3 success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $success ?>
                    </div>
                    <?php } else { ?>
                        <div><?= '' ?></div>
                    <?php } ?>
                    <form action="#" method="POST">
                        <label for="searchPatient"> Recherche : </label>
                        <input type="text" name="searchPatient" placeholder="Saisir un nom ou un prénom..."/>
                        <input type="submit" name="submitSearch" value="Valider">
                    </form>
                    <?php if(isset($_POST['searchPatient'])) { ?>
                        <p>Résultat de la recherche : </p>
                        <?php }
                        if(isset($patientsList) && count($patientsList) == 0) { ?>
                        <p>Il n'y a aucun patient qui correspond à votre recherche.</p>
                        <?php } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Numéro Tel</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patientList as $patient) { ?>
                    <tr>
                        <td><?= $patient->lastname ?></td>
                        <td><?= $patient->firstname ?></td>
                        <td><?= $patient->birthdate ?></td>
                        <td><?= $patient->phone ?></td>
                        <td><?= $patient->mail ?></td>
                        <td><a href="profil-patient.php?id=<?= $patient->id; ?>">Voir</a></td>
                        <td><a href='list-patient.php?del=<?= $patient->id ?>' class="btn">Supprimer</a></td>
                    </tr>
                <?php } if (!empty($success)) { ?>
                    <div class="alert alert-dismissible alert-success col-lg-3 success">
                        <?= "Le patient est bien supprimé." ?>
                    </div>
                    <?php } else { ?>
            <div><?= '' ?></div>
            <?php } ?>
            </tbody>
        </table>
        <?php } ?>
        <?php for ($pageNumber = 1; $pageNumber <= $maxPagination; $pageNumber++) { ?>
            <a href="list-patient.php?page=<?= $pageNumber ?>" class="btn" <?= $page == $pageNumber?'disabled' : '' ?>><?= $pageNumber ?></a>
        <?php } ?>
    </body>
</html>