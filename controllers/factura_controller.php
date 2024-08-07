<?php
include '../config/db.php';

class FacturaController {
    public function create($fecha_emision, $total, $cliente, $estado) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Factura (Fecha_Emision, Total, Clientes_idClientes, Estado) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$fecha_emision, $total, $cliente, $estado]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Factura");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $fecha_emision, $total, $cliente, $estado) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Factura SET Fecha_Emision = ?, Total = ?, Clientes_idClientes = ?, Estado = ? WHERE idFactura = ?");
        return $stmt->execute([$fecha_emision, $total, $cliente, $estado, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Factura WHERE idFactura = ?");
        return $stmt->execute([$id]);
    }
}
?>
