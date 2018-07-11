<?php
$query = 'SELECT `title`, `performer`, DATE_FORMAT(`date`,"%d/%m/%Y") AS `date`, DATE_FORMAT(`startTime`, "%H:%i") AS `startTime` FROM shows ORDER BY title ASC';
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=colyseum;charset=utf8', 'root', 'AsBc80@0');
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}
$shows = $db->query($query);
$showsList = $shows->fetchAll(PDO::FETCH_OBJ);
$db = NULL;
?>