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
        <h1>Correction de l'exercice6</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Spectacle</th>
                    <th>Artiste</th>
                    <th>Date</th>
                    <th>Heure</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersList AS $customers) { ?>
                    <tr>
                        <td><?= $customers->title; ?></td>
                        <td><?= $customers->performer; ?></td>
                        <td><?= $customers->date; ?></td>
                        <td><?= $customers->startTime; ?></td>
                     
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>