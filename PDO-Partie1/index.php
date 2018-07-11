<?php
try {
    //On crée un objet PDO
	$db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
}
//On envoie un message d'erreur
catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Partie 1</title>
    </head>
    <body>
        <p>
        <?php
        //Pour l'exercice 1, voir le fichier Partie Exercice 1
$customers = $db->query('SELECT `lastName`,`firstName` FROM `clients`');

while ($donnees = $customers->fetch()) {
    echo $donnees['lastName'] . ' ' . $donnees['firstName'] . ', ';
}
echo '<br /><br />';
$customers->closeCursor();

$showTYPES = $db->query('SELECT * FROM `showTypes`');

while ($donnees = $showTYPES->fetch()) {
    echo $donnees['type'] . ', ';
}
echo '<br /><br />';
$showTYPES->closeCursor();

$customers = $db->query('SELECT `lastName`,`firstName` FROM `clients` LIMIT 20');

while ($donnees = $customers->fetch()) {
    echo $donnees['lastName'] . ' ' . $donnees['firstName'] . ', ';
}
echo '<br /><br />';
$customers->closeCursor();

$customers = $db->query('SELECT `lastName`,`firstName` FROM `clients` WHERE `cardNumber`');

while ($donnees = $customers->fetch()) {
    echo $donnees['lastName'] . ' ' . $donnees['firstName'] . ', ';
}
echo '<br /><br />';
$customers->closeCursor();

$customers = $db->query('SELECT `lastName`,`firstName` FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName` ASC');

while ($donnees = $customers->fetch()) {
    echo 'Nom : ' . $donnees['lastName'] . '<br />Prénom : ' . $donnees['firstName'] . '<br /><br />';
}
echo '<br /><br />';
$customers->closeCursor();
?>
        </p>
    </body>
</html>