<?php
include '../config/db.php';

class KardexModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida_id1, $unidad_medida_id2, $unidad_medida_id3, $valor_ganancia, $iva_id, $proveedores_id, $productos_id, $tipo_transaccion) {
        $stmt = $this->pdo->prepare("INSERT INTO Kardex (Estado, Fecha_Transaccion, Cantidad, Valor_Compra, Valor_Venta, Unidad_Medida_idUnidad_Medida, Unidad_Medida_idUnidad_Medida1, Unidad_Medida_idUnidad_Medida2, Valor_Ganacia, IVA, IVA_idIVA, Proveedores_idProveedores, Productos_idProductos, Tipo_Transaccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida_id1, $unidad_medida_id2, $unidad_medida_id3, $valor_ganancia, $iva_id, $iva_id, $proveedores_id, $productos_id, $tipo_transaccion]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Kardex");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida_id1, $unidad_medida_id2, $unidad_medida_id3, $valor_ganancia, $iva_id, $proveedores_id, $productos_id, $tipo_transaccion) {
        $stmt = $this->pdo->prepare("UPDATE Kardex SET Estado = ?, Fecha_Transaccion = ?, Cantidad = ?, Valor_Compra = ?, Valor_Venta = ?, Unidad_Medida_idUnidad_Medida = ?, Unidad_Medida_idUnidad_Medida1 = ?, Unidad_Medida_idUnidad_Medida2 = ?, Valor_Ganacia = ?, IVA = ?, IVA_idIVA = ?, Proveedores_idProveedores = ?, Productos_idProductos = ?, Tipo_Transaccion = ? WHERE idKardex = ?");
        return $stmt->execute([$estado, $fecha_transaccion, $cantidad, $valor_compra, $valor_venta, $unidad_medida_id1, $unidad_medida_id2, $unidad_medida_id3, $valor_ganancia, $iva_id, $iva_id, $proveedores_id, $productos_id, $tipo_transaccion, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Kardex WHERE idKardex = ?");
        return $stmt->execute([$id]);
    }
}
?>
