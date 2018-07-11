<?php include 'partieQuery.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice 1 Correction</title>
    </head>
    <body>
        <h1>Correction de l'exercice5</h1>

        <?php foreach ($customersList AS $customers) { ?>

            <p><strong>Nom : </strong><?= $customers->lastName; ?></p>
            <p><strong>Prenom : </strong><?= $customers->firstName; ?> </p><hr/>
        <?php }
        ?>
    </body>
</html>

//<?php
//include 'queryEx5.php';                                                       CORRECTION
//include '../../header.php';
//
?>
//<?php foreach ($customersList AS $customers) { ?>
    <!--        <div class="col-lg-12 separate">
                <p><span>Nom : </span>//<?= $customers['lastName']; ?></p>
                <p><span>Prénom : </span>//<?= $customers['firstName']; ?></p>
            </div>-->
    //<?php
   }  
    ?>
    