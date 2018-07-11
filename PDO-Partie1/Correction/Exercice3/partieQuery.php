
<!DOCTYPE html>          
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
        <title>Exo3</title>
    </head>
    <body>
        
        <?php
        //connexion a la db
        try {
            $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
            //message si il y a une erreur lors de la connexion a la bdd
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        //La requête SQL
        $reponse = $db->query('SELECT `lastName`, `firstName`, `birthDate`, `card`, `cardNumber`  FROM `clients` LIMIT 20');
        //On parcourt la reponse a notre requête et on affiche chaque valeur
        while ($donnees = $reponse->fetch()) {
            ?>
            <p>
                <strong>NOM</strong>: <?= $donnees['lastName']; ?><br />
                <strong>PRENOM</strong>: <?= $donnees['firstName']; ?><br />
                <strong>DATE DE NAISSANCE</strong>: <?= $donnees['birthDate']; ?><br />
                <strong>CARTE</strong>: <?= $donnees['card'] == 1 ? 'oui' : 'non'; ?><br />
                <?php
                if ($donnees['card'] == 1) {
                    ?>
                    <strong>NUMERO DE CARTE</strong>: <?= $donnees['cardNumber']; ?><br />
                    <?php
                }
                ?>
            <hr></p>
            <?php
        }
        //Termine le traitement de la requête
        $reponse->closeCursor();
        ?>
    </body>
</html>
//<?php
//// Je crée une variable query dans laquelle je mets ma requête SQL
//// J'affiche la liste des 20 premiers nom et prenom de la table clients
//$query = 'SELECT `lastName`, `firstName` FROM `clients` LIMIT 20';
//// On fait un try catch pour être sûr que la connexion à mysql se fasse
//try {
//    // On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
//    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
//} catch (Exception $ex) { // On attrape l'exception, qui est une erreur de PHP
//    // Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
//    die('Erreur : ' . $ex->getMessage());
//}
//// Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
//$customersResult = $db->query($query);
///* fetchAll() va retourner le résultat sous la forme du paramètre demandé
// * PDO::FETCH_OBJ est le paramètre qui permet d'avoir un tableau d'objets. Les clés sont les noms des colonnes de la table
// */
//$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);
//?>