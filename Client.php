<?php
include 'connexion.php';
class Client {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
      
    public static function getByCIN($pdo, $CIN) {
        $stmt = $pdo->prepare("SELECT * FROM Client WHERE CIN = ?");
        $stmt->execute([$CIN]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($CIN, $Nom, $Prenom, $address) {
        $stmt = $this->pdo->prepare("INSERT INTO Client (CIN, Nom, Prenom, address) VALUES (?, ?, ?, ?)");
        $stmt->execute([$CIN, $Nom, $Prenom, $address]);
    }

    public function read($CIN) {
        $stmt = $this->pdo->prepare("SELECT * FROM Client WHERE CIN = ?");
        $stmt->execute([$CIN]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($CIN, $Nom, $Prenom, $address) {
        $stmt = $this->pdo->prepare("UPDATE Client SET Nom = ?, Prenom = ?, address = ? WHERE CIN = ?");
        $stmt->execute([$Nom, $Prenom, $address, $CIN]);
    }

    public function delete($CIN) {
        $stmt = $this->pdo->prepare("DELETE FROM Client WHERE CIN = ?");
        $stmt->execute([$CIN]);
    }
}
?>
