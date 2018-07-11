<?php include 'partieQuery.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>P1exo7</title>
    </head>
    <body>
        <h1>Correction de l'exercice7</h1>
        
    <?php
        
        foreach ($customersList AS $customers) {
            ?>
            <div>
                <p><strong>Nom :</strong><?= $customers->lastName; ?></p>
                <p><strong>Prenom :</strong><?= $customers->firstName; ?></p>
                <p><strong>Date de naissance :</strong><?= $customers->birthDate; ?></p>
                <p><strong>Carte :</strong><?= $customers->card; ?></p>
             <?php  if($customers->cardNumber != NULL){ ?>
                <p><strong>Numero de carte :</strong><?= $customers->cardNumber; ?></p>
             <?php } ?>
            </div><hr>
<?php } ?>

</body>
</html>