<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $descripcion_inicial = $_POST['descripcion_inicial'];
    $id_cliente = $_POST['id_cliente'];
    $id_agente = $_POST['id_agente'];

    $stmt = $conn->prepare("
        UPDATE Interaccion 
        SET Fecha_Ultima = ?, Descripcion_Inicial = ?, ID_Cliente = ?, ID_Agente = ? 
        WHERE ID_Interaccion = ?
    ");
    $stmt->bind_param("ssiii", $fecha, $descripcion_inicial, $id_cliente, $id_agente, $id);

    if ($stmt->execute()) {
        echo "✅ Interacción actualizada correctamente.";
    } else {
        http_response_code(500);
        echo "❌ Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
}
?>
