<?php
include 'connexion.php';

class Chambre {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public static function getByNumch($pdo, $numch) {
        $stmt = $pdo->prepare("SELECT * FROM Chambre WHERE numch = ?");
        $stmt->execute([$numch]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($numch, $type, $prix) {
        $stmt = $this->pdo->prepare("INSERT INTO Chambre (numch, type, prix) VALUES (?, ?, ?)");
        $stmt->execute([$numch, $type, $prix]);
    }

    public function getAllRooms() {
        $stmt = $this->pdo->query("SELECT * FROM Chambre");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 

    public function update($numch, $type, $prix) {
        $stmt = $this->pdo->prepare("UPDATE Chambre SET type = ?, prix = ? WHERE numch = ?");
        $stmt->execute([$type, $prix, $numch]);
    }

public function delete($numch) {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM Reservation WHERE numch = ?");
    $stmt->execute([$numch]);
    $reservationCount = $stmt->fetchColumn();

    if ($reservationCount > 0) {
        echo "Cannot delete room, it's already reserved.";
        return;
    }

    $stmt = $this->pdo->prepare("DELETE FROM Chambre WHERE numch = ?");
    $stmt->execute([$numch]);
}

}
?>
