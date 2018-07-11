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
        <h1>Correction de l'exercice4</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Carte</th>
                 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersList AS $customers) { ?>
                    <tr>
                        <td><?= $customers->lastName; ?></td>
                        <td><?= $customers->firstName; ?></td>
                        <td><?= $customers->card; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>