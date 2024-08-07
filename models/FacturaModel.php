<?php
include '../config/db.php';

class FacturaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($fecha, $sub_total, $sub_total_iva, $valor_iva, $cliente_id) {
        $stmt = $this->pdo->prepare("INSERT INTO Factura (Fecha, Sub_total, Sub_total_iva, Valor_IVA, Clientes_idClientes) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$fecha, $sub_total, $sub_total_iva, $valor_iva, $cliente_id]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Factura");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $fecha, $sub_total, $sub_total_iva, $valor_iva, $cliente_id) {
        $stmt = $this->pdo->prepare("UPDATE Factura SET Fecha = ?, Sub_total = ?, Sub_total_iva = ?, Valor_IVA = ?, Clientes_idClientes = ? WHERE idFactura = ?");
        return $stmt->execute([$fecha, $sub_total, $sub_total_iva, $valor_iva, $cliente_id, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Factura WHERE idFactura = ?");
        return $stmt->execute([$id]);
    }
}
?>
