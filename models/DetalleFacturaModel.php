<?php
include '../config/db.php';

class DetalleFacturaModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($cantidad, $factura_id, $kardex_id, $precio_unitario, $sub_total_item) {
        $stmt = $this->pdo->prepare("INSERT INTO Detalle_Factura (Cantidad, Factura_idFactura, Kardex_idKardex, Precio_Unitario, Sub_Total_item) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$cantidad, $factura_id, $kardex_id, $precio_unitario, $sub_total_item]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Detalle_Factura");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $cantidad, $factura_id, $kardex_id, $precio_unitario, $sub_total_item) {
        $stmt = $this->pdo->prepare("UPDATE Detalle_Factura SET Cantidad = ?, Factura_idFactura = ?, Kardex_idKardex = ?, Precio_Unitario = ?, Sub_Total_item = ? WHERE idDetalle_Factura = ?");
        return $stmt->execute([$cantidad, $factura_id, $kardex_id, $precio_unitario, $sub_total_item, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Detalle_Factura WHERE idDetalle_Factura = ?");
        return $stmt->execute([$id]);
    }
}
?>
