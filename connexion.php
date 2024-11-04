<?php


$host = 'localhost'; // Nom du serveur
$dbname = 'hotelreservation'; // Nom de la base de données
$username = 'root'; 
$password = ''; 


try {
    //cnx a la base de donnnes
    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>