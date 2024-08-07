<?php
include '../config/db.php';

class UnidadMedidaController {
    public function create($detalle, $tipo) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Unidad_Medida (Detalle, Tipo) VALUES (?, ?)");
        return $stmt->execute([$detalle, $tipo]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Unidad_Medida");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $detalle, $tipo) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Unidad_Medida SET Detalle = ?, Tipo = ? WHERE idUnidad_Medida = ?");
        return $stmt->execute([$detalle, $tipo, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Unidad_Medida WHERE idUnidad_Medida = ?");
        return $stmt->execute([$id]);
    }
}
?>
