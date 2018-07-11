<?php
$query = 'SELECT `id`, `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") AS `birthDate`,FLOOR(DATEDIFF(NOW(), `birthDate`) / 365) AS `age`, CASE WHEN `card`= 1  THEN \'oui\' ELSE \'non\' END AS `card`, `cardNumber` FROM `clients`';
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
$customersResult = $db->query($query);
$customersList = $customersResult->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>