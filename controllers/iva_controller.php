<?php
include '../config/db.php';

class IVAController {
    public function create($detalle, $estado, $valor) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO IVA (Detalle, Estado, Valor) VALUES (?, ?, ?)");
        return $stmt->execute([$detalle, $estado, $valor]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM IVA");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $detalle, $estado, $valor) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE IVA SET Detalle = ?, Estado = ?, Valor = ? WHERE idIVA = ?");
        return $stmt->execute([$detalle, $estado, $valor, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM IVA WHERE idIVA = ?");
        return $stmt->execute([$id]);
    }
}
?>
