<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("INSERT INTO Cliente (Nombre, Correo, Telefono) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $telefono);

    if ($stmt->execute()) {
        echo "Cliente creado correctamente.";
    } else {
        echo "Error al crear cliente: " . $stmt->error;
    }

    $stmt->close();
}
?>
