<?php
include '../config/db.php';

class ProductosController {
    public function create($codigo_barras, $nombre_producto, $graba_iva) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES (?, ?, ?)");
        return $stmt->execute([$codigo_barras, $nombre_producto, $graba_iva]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $codigo_barras, $nombre_producto, $graba_iva) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Productos SET Codigo_Barras = ?, Nombre_Producto = ?, Graba_IVA = ? WHERE idProductos = ?");
        return $stmt->execute([$codigo_barras, $nombre_producto, $graba_iva, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Productos WHERE idProductos = ?");
        return $stmt->execute([$id]);
    }
}
?>
