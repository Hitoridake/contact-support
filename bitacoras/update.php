<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $id_interaccion = $_POST['id_interaccion'];

    $stmt = $conn->prepare("UPDATE Bitacora SET ID_Interaccion = ?, Fecha = ?, Detalles = ? WHERE ID_Bitacora = ?");
    $stmt->bind_param("issi", $id_interaccion, $fecha, $detalles, $id);

    if ($stmt->execute()) {
        echo "Bitácora actualizada correctamente.";
    } else {
        http_response_code(500);
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
}
?>
