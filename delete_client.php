<?php
include 'connexion.php'; 
include 'Client.php'; 

if (isset($_GET['CIN'])) {

    $CIN = $_GET['CIN'];
    $clientObj = new Client($cnx);

    $clientObj->delete($CIN);

    header("Location: client_info.php");
    exit;
} else {
    // CIN not set in URL
    echo "CIN not set in URL.";
}
?>
