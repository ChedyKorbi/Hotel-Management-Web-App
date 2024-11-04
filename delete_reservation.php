<?php
include 'connexion.php'; 
include 'Reservation.php';

if (isset($_GET['num_res'])) {
    $num_res = $_GET['num_res'];
    
    $reservation = new Reservation($cnx);
    $reservation->delete($num_res);
    
    header("Location: list_reservation.php");
    exit();
} else {
    header("Location: list_reservation.php");
    exit();
}
?>
