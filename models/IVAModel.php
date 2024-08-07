<?php
include '../config/db.php';

class IVAModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($detalle, $estado, $valor) {
        $stmt = $this->pdo->prepare("INSERT INTO IVA (Detalle, Estado, Valor) VALUES (?, ?, ?)");
        return $stmt->execute([$detalle, $estado, $valor]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM IVA");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $detalle, $estado, $valor) {
        $stmt = $this->pdo->prepare("UPDATE IVA SET Detalle = ?, Estado = ?, Valor = ? WHERE idIVA = ?");
        return $stmt->execute([$detalle, $estado, $valor, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM IVA WHERE idIVA = ?");
        return $stmt->execute([$id]);
    }
}
?>
