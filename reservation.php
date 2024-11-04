<?php
include 'connexion.php';

class Reservation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($datedebut, $datefin, $CIN, $numch) {
        $stmt = $this->pdo->prepare("INSERT INTO Reservation (datedebut, datefin, CIN, numch) VALUES (?, ?, ?, ?)");
        $stmt->execute([$datedebut, $datefin, $CIN, $numch]);
    }

   
    public function checkAvailability($start_date, $end_date, $room_type) {
        
        $stmt = $this->pdo->prepare("SELECT * FROM Chambre WHERE type = ? AND 
        numch NOT IN (
            SELECT numch FROM Reservation WHERE (? < datefin AND ? > datedebut)
        )");

        $stmt->execute([$room_type, $start_date, $end_date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllReservations() {
        $stmt = $this->pdo->query("SELECT * FROM Reservation");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($num_res, $datedebut, $datefin, $CIN, $numch) {
        $stmt = $this->pdo->prepare("UPDATE Reservation SET datedebut = ?, datefin = ?, CIN = ?, numch = ? WHERE num_res = ?");
        $stmt->execute([$datedebut, $datefin, $CIN, $numch, $num_res]);
    }

    public function delete($num_res) {
        $stmt = $this->pdo->prepare("DELETE FROM Reservation WHERE num_res = ?");
        $stmt->execute([$num_res]);
    }

}
?>
