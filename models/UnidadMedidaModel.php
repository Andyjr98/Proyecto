<?php
include '../config/db.php';

class UnidadMedidaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($detalle, $tipo) {
        $stmt = $this->pdo->prepare("INSERT INTO Unidad_Medida (Detalle, Tipo) VALUES (?, ?)");
        return $stmt->execute([$detalle, $tipo]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Unidad_Medida");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $detalle, $tipo) {
        $stmt = $this->pdo->prepare("UPDATE Unidad_Medida SET Detalle = ?, Tipo = ? WHERE idUnidad_Medida = ?");
        return $stmt->execute([$detalle, $tipo, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Unidad_Medida WHERE idUnidad_Medida = ?");
        return $stmt->execute([$id]);
    }
}
?>
