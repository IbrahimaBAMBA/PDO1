<?php
// Requête SQL
$query = 'SELECT `type` FROM `showTypes`';
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
// On récupère les infos de `type` de la table `showType`
$showsType = $db->query($query);
/*
 *  On récupère les infos sous forme d'objet, on ne récupère que les attributs sélectionné, en l'occurrence 'type', pour ensuite les afficher
 */
$showsTypeList = $showsType->fetchAll(PDO::FETCH_OBJ);
// Ferme la connexion
$db = NULL;
?>