<?php
include '../config/db.php';

class ProductosModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($codigo_barras, $nombre_producto, $graba_iva) {
        $stmt = $this->pdo->prepare("INSERT INTO Productos (Codigo_Barras, Nombre_Producto, Graba_IVA) VALUES (?, ?, ?)");
        return $stmt->execute([$codigo_barras, $nombre_producto, $graba_iva]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $codigo_barras, $nombre_producto, $graba_iva) {
        $stmt = $this->pdo->prepare("UPDATE Productos SET Codigo_Barras = ?, Nombre_Producto = ?, Graba_IVA = ? WHERE idProductos = ?");
        return $stmt->execute([$codigo_barras, $nombre_producto, $graba_iva, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Productos WHERE idProductos = ?");
        return $stmt->execute([$id]);
    }
}
?>
