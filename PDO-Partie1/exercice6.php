<?php include 'modele6.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice6 </title>
    </head>
    <body>
        <h1>Exercice 6</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Artiste</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showsList AS $show) { ?>
                    <tr>
                        <td><?= $show->title; ?></td>
                        <td><?= $show->performer; ?></td>
                        <td><?= $show->date; ?></td>
                        <td><?= $show->startTime; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>