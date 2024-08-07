<?php
include '../config/db.php';

class ClientesController {
    public function create($nombre, $direccion, $telefono, $correo, $estado) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Clientes (Nombre, Direccion, Telefono, Correo, Estado) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nombre, $direccion, $telefono, $correo, $estado]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $direccion, $telefono, $correo, $estado) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Clientes SET Nombre = ?, Direccion = ?, Telefono = ?, Correo = ?, Estado = ? WHERE idClientes = ?");
        return $stmt->execute([$nombre, $direccion, $telefono, $correo, $estado, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Clientes WHERE idClientes = ?");
        return $stmt->execute([$id]);
    }
}
?>
