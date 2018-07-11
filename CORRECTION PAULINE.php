<!--...........................MODELE....................................-->

<?php
public function getPatientById() {
    $isCorrect = false;
    $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
    $patientResult = $this->db->prepare($query);
    $patientResult->bindValue(':id', $this->id, PDO::PARAM_INT);
    //on met if pour prevenir en cas d'erreur
    if ($patientResult->execute()) {
        $patientInfo = $patientResult->fetch(PDO::FETCH_OBJ);
        $this->lastname = $patientInfo->lastname;
        $this->firstname = $patientInfo->firstname;
        $this->birthdate = $patientInfo->birthdate;
        $this->phone = $patientInfo->phone;
        $this->mail = $patientInfo->mail;
        $isCorrect = true;
    }
    return $isCorrect;
}
?>
<!--..............................CONTROLLER........................................-->
<?php
// On instancie $patient qui devient un objet
$patient = new patients();
if(isset($_GET['patientId'])){
    $patient->id = $_GET['patientId'];
}
$isFind = $patient->getPatientById();
?>
<!--.................................VUE............................................-->

<?php
include_once 'models/dataBase.php';
include_once 'models/patients.php';
include_once 'controllers/profil-patientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Profil patient</title>
    </head>
    <body>
        <?php
        if($isFind){
        ?>
        <h1>Profil de : <?= $patient->lastname ?> <?= $patient->firstname ?></h1>
        <p>Date de naissance : <?= $patient->birthdate ?></p>
        <p>Numéro de téléphone : <?= $patient->phone ?></p>
        <p>Mail : <?= $patient->mail ?></p>
        <?php
        } else {
            ?><p>Le patient n'a pas été trouvé.</p><?php
        }
        ?>
    </body>
</html>

<!--.................................AJOUT DU BOUTON DANS LISTE PATIENT............................................... -->

<?php
include 'models/dataBase.php';
include 'models/patients.php';
include 'controllers/list-patientController.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>List-patient</title>
    </head>
    <body>
        <p><a href="index.php">Accueil</a></p>
        <p><a href="ajout-patient.php">Ajout-patient</a></p>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Numéro Tel</th>
                    <th>Mail</th>
                    <th></th>
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
                        <td><a href="profil-patient.php?patientId=<?= $patient->id ?>">Voir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
