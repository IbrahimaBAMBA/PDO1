<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'controllers/liste-patientsController.php';
include_once 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="divList">
                <h1>Liste des patients</h1>
                <?php
                if (!empty($success)) {
                    ?>
                    <div class="alert alert-dismissible alert-success col-lg-3 success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?= $success ?>
                    </div>
                    <?php
                } else {
                    ?> <div><?= '' ?></div> <?php
                }
                ?>
                    <form action="#" method="POST">
                        <label for="searchPatient"> Recherche : </label>
                        <input type="text" name="searchPatient" placeholder="Saisir un nom ou un prénom..."/>
                        <input type="submit" name="submitSearch" value="Valider">
                    </form>
                    <?php
                        if(isset($_POST['searchPatient'])){
                            ?> <p>Résultat de la recherche : </p> <?php
                        }
                        if(isset($patientsList) && count($patientsList) == 0){
                            ?> <p>Il n'y a aucun patient qui correspond à votre recherche.</p><?php
                        } else { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patientsList as $patient) { ?>
                            <tr>
                                <td ><?= $patient->lastname ?></td>
                                <td><?= $patient->firstname ?></td>
                                <td><a href="profil-patient.php?patientId=<?= $patient->id ?>" class="btn">Modifier</a></td>
                                <td><a href='list-patients.php?del=<?= $patient->id ?>' class="btn">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> <?php } ?>
                <a href="ajout-patient.php" class="btn btn-circle btn-default">
                    <i class="fa fa-plus"></i><br>
                </a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>