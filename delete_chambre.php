<?php

include 'connexion.php'; 
include 'Chambre.php';

if (isset($_GET['numch'])) {
    $numch = $_GET['numch'];

    $chambreObj = new Chambre($cnx);

    $chambreObj->delete($numch);

    header("Location: listes_chambre.php");
    exit;
} else {
    echo "Room number not set in URL.";
}
?>
