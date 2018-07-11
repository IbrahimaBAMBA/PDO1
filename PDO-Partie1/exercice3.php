<?php include 'modele3.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice 3</title>
    </head>
    <body>
        <h1>Exercice 3</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersList AS $customers) { ?>
                    <tr>
                        <td><?= $customers->lastName; ?></td>
                        <td><?= $customers->firstName; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>