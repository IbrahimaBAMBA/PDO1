<?php include 'modele2.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice 2</title>
    </head>
    <body>
        <h1>Exercice 2</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Type de spectale</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($showsTypeList AS $showsType) { ?>
                    <tr>
                        <td><?= $showsType->type; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>