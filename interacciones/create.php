<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha_creacion'];
    $id_cliente = $_POST['id_cliente'];
    $id_agente = $_POST['id_agente'];
    $descripcion = $_POST['descripcion_inicial'];

    // Use the same description for the first bitácora entry
    $detalles = $descripcion;

    // 1. Insert interacción
    $stmt = $conn->prepare("INSERT INTO Interaccion (Fecha_Creacion, Fecha_Ultima, ID_Cliente, ID_Agente, Descripcion_Inicial) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $fecha, $fecha, $id_cliente, $id_agente, $descripcion);

    if ($stmt->execute()) {
        $id_interaccion = $conn->insert_id;

        // 2. Insert bitácora entry
        $stmt2 = $conn->prepare("INSERT INTO Bitacora (ID_Interaccion, Fecha, Detalles) VALUES (?, ?, ?)");
        $stmt2->bind_param("iss", $id_interaccion, $fecha, $detalles);
        $stmt2->execute();
        $stmt2->close();

        echo "Interacción y primera bitácora creadas.";
    } else {
        http_response_code(500);
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
