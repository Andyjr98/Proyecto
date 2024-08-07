<?php
include '../config/db.php';

class ClientesModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nombre, $direccion, $telefono, $correo) {
        $stmt = $this->pdo->prepare("INSERT INTO Clientes (Nombres, Direccion, Telefono, Cedula, Correo) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nombre, $direccion, $telefono, $correo]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM Clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $direccion, $telefono, $correo) {
        $stmt = $this->pdo->prepare("UPDATE Clientes SET Nombres = ?, Direccion = ?, Telefono = ?, Correo = ? WHERE idClientes = ?");
        return $stmt->execute([$nombre, $direccion, $telefono, $correo, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Clientes WHERE idClientes = ?");
        return $stmt->execute([$id]);
    }
}
?>
