<?php
include '../config/db.php';

class ProveedoresController {
    public function create($nombre, $direccion, $telefono, $contacto, $telefono_contacto) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO Proveedores (Nombre_Empresa, Direccion, Telefono, Contacto_Empresa, Teleofno_Contacto) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nombre, $direccion, $telefono, $contacto, $telefono_contacto]);
    }

    public function read() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Proveedores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $nombre, $direccion, $telefono, $contacto, $telefono_contacto) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE Proveedores SET Nombre_Empresa = ?, Direccion = ?, Telefono = ?, Contacto_Empresa = ?, Teleofno_Contacto = ? WHERE idProveedores = ?");
        return $stmt->execute([$nombre, $direccion, $telefono, $contacto, $telefono_contacto, $id]);
    }

    public function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM Proveedores WHERE idProveedores = ?");
        return $stmt->execute([$id]);
    }
}
?>
