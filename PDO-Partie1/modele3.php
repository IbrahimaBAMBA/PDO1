<?php
$query = 'SELECT `lastName`,`firstName` FROM `clients` LIMIT 20';
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
$customers = $db->query($query);
$customersList = $customers->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>