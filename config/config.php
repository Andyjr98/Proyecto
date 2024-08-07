<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sexto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    echo "Error: " . $conn->connect_error;
} else {
    echo "Conexión exitosa";
}

$conn->close();
?>
