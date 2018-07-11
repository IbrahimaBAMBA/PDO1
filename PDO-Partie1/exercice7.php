<?php include 'modele7.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice 7</title>
    </head>
    <body>
        <h1>Exercice 7</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Age</th>
                    <th>Carte</th>
                    <th>Numéro de carte</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersList AS $customers) { ?>
                    <tr>
                        <td><?= $customers->id; ?></td>
                        <td><?= $customers->lastName; ?></td>
                        <td><?= $customers->firstName; ?></td>
                        <td><?= $customers->birthDate; ?></td>
                        <td><?= $customers->age; ?></td>
                        <td><?php if($customers->card == false) {
                            echo 'Non';
                        } elseif ($customers->card == true) {
                            echo 'Oui';
                        } ?></td>
                        <td><?= $customers->cardNumber; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>