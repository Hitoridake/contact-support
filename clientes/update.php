<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $stmt = $conn->prepare("UPDATE Cliente SET Nombre=?, Correo=?, Telefono=? WHERE ID_Cliente=?");
    $stmt->bind_param("sssi", $nombre, $correo, $telefono, $id);

    if ($stmt->execute()) {
        echo "Cliente actualizado.";
    } else {
        echo "Error al actualizar cliente: " . $stmt->error;
    }

    $stmt->close();
}
?>
