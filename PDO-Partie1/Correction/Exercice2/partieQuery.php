<?php
//connexion a la bdd
try {
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
    //message si il y a une erreur lors de la connexion a la bdd
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//La requete SQL
$response = $db->query('SELECT `id`, `type` FROM `showTypes`');
//On parcourt la reponse a notre requéte et on affiche chaque valeur
$data = $response->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>
<!--<!DOCTYPE html>          
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" />
        <title>Exo2</title>
    </head>
    <body>
        <p class="PExo"><a class="lienExo" href="index.php">Index</a></p>
        <select name="showType">
            //<?php
//            foreach ($customersList AS $customers) {
//                ?>
                <option value="//<?= $customersList->id ?>"><?= $customersList->type ?></option>
                //<?php
//            }
//            ?>
        </select>
    </body>
</html>-->

<?php
//Je crée une variable query dans laquelle je mets ma requête SQL
// J'affiche tous les 'id' et 'type' de la table showTypes 
$query = 'SELECT `id`, `type` FROM `showTypes`';
//On fait un try catch pour être sûr que la connexion à mysql se fasse
try {
// On instancie un objet PDO. Le host est l'adresse locale sur laquelle on se connecte. dbname correspond au nom de la base de données.
  $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'i271220101127B');
} catch (Exception $ex) { // On attrape l'exception, qui est une erreur de PHP
//    Die arrête le script PHP en cas d'erreur et affiche ce qu'on lui met en paramètre
  die('Erreur : ' . $ex->getMessage());
}
//Gràce à ->query($query) on éxécute la requête SQL et on récupère un objet PDO Statement
$customersResult = $db->query($query);
// fetchAll() va retourner le résultat sous la forme du paramètre demandé
// PDO::FETCH_OBJ est le paramètre qui permet d'avoir un tableau d'objets. Les clés sont les noms des colonnes de la table

$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>