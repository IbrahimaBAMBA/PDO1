<?php 
// Je crée une variable query dans laquelle je mets ma requête SQL
// J'affiche le nom des spectacles,des artistes,la date et l'heure par ordre aphabetique
$query = 'SELECT `title`, `performer`, DATE_FORMAT(`date`, "%d/%m/%Y") AS `date`, `startTime` FROM `shows` ORDER BY `title` ASC';
// On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
    // On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
} catch (Exception $ex) { // On attrape l'exception, qui est une erreur de PHP
    // Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
    die('Erreur : ' . $ex->getMessage());
}
// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$customersResult = $db->query($query);
/* fetchAll() va retourner le résultat sous la forme du paramètre demandé
 * PDO::FETCH_OBJ est le paramètre qui permet d\'avoir un tableau d'objets. Les clés sont les noms des colonnes de la table
 */
$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);

?>