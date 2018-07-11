<?php
$query = 'SELECT `clients`.`id`, `clients`.`lastName`, `clients`.`firstName`, DATE_FORMAT(`clients`.`birthDate`,"%d/%m/%Y") AS `birthDate`, `clients`.`card`, `clients`.`cardNumber` 
FROM `clients` 
INNER JOIN `cards`
ON `clients`.`cardNumber` = `cards`.`cardNumber`
INNER JOIN `cardTypes`
ON `cards`.`cardTypesId` = `cardTypes`.`id`
WHERE `cardTypes`.`id` = 1;';

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
$customersResult = $db->query($query);
$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>