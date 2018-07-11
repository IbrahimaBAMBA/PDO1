<?php
// Je crée une variable query dans laquelle je mets ma requête SQL
$query = 'SELECT `clients`.`id`, `clients`.`lastName`, `clients`.`firstName`, DATE_FORMAT(`clients`.`birthDate`,"%d/%m/%Y") AS `birthDate`, `clients`.`card`, `clients`.`cardNumber` 
FROM `clients` 
INNER JOIN `cards`ON `clients`.`cardNumber` = `cards`.`cardNumber`
INNER JOIN `cardTypes`ON `cards`.`cardTypesId` = `cardTypes`.`id` 
WHERE `cardTypes`.`id` = 1;';
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    // On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
} catch (Exception $ex) { // On attrape l'exception, qui est une erreur de PHP
    // Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
    die('Erreur : ' . $ex->getMessage());
}
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$customersResult = $db->query($query);
/* fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_ASSOC est le paramètre qui permet d'avoir un tableau associatif. Les clés sont les noms des colonnes de la table
 */
$customersList = $customersResult->fetchAll(PDO::FETCH_ASSOC);

//on affecte NULL à l'objet PDO pour fermer la conexion à la base de donnée. 
$db = NULL;
?>

//<?php
//include '../../header.php';
//include 'queryEx4.php';
//
?>
<!DOCTYPE html>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <h1>Exercice 4</h1>
        <div class="consigne">
            <p><span>Consigne : </span></p>
            <p>N'afficher que les clients possédant une carte de fidélité.</p>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Carte</th>
                    <th>Numéro de carte</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customersList AS $customers) { ?>
                    <tr>
                        <td><?= $customers['id']; ?></td>
                        <td><?= $customers['lastName']; ?></td>
                        <td><?= $customers['firstName']; ?></td>
                        <td><?= $customers['birthDate']; ?></td>
                        <td><?= $customers['card']; ?></td>
                        <td><?= $customers['cardNumber']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        //<?php
//        include '../../footer.php';
//        ?>
    </body>    
</html>
