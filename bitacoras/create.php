<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $id_interaccion = $_POST['id_interaccion'];

    $stmt = $conn->prepare("INSERT INTO Bitacora (Fecha, Detalles, ID_Interaccion) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $fecha, $detalles, $id_interaccion);

    if ($stmt->execute()) {
        echo "Entrada registrada.";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
