<?php include 'modele5.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Exercice 5</title>
    </head>
    <body>
        <h1>Exercice 5</h1>
        <table class="table table-striped">
            <?php
            foreach ($customersList AS $customers) {
                echo 'Nom : ' . $customers->lastName . '<br />' . 'Prénom : ' . $customers->firstName . '<br /><br />';
            }
            ?>
        </table>
    </body>
</html>