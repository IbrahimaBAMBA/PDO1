<?php

// Je crée une variable query dans laquelle je mets ma requête SQL
$query = 'SELECT `lastName`, `firstName` FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName` ASC;';
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
$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);

//on affecte NULL à l'objet PDO pour fermer la conexion à la base de donnée. 
$db = NULL;

?>
