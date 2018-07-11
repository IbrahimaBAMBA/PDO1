<?php
$query = 'SELECT `lastName`,`firstName` FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName` ASC';
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
$customersResult = $db->query($query);
$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>