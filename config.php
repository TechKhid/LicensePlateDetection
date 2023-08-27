<?php 

$dbHost = 'localhost';
$dbName = 'stolen_cars';
$dbUser = 'trevillion';
$dbPasw = 'trev';
try {
    $dbConn = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPasw);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
