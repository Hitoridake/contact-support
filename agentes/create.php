<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Verificar si el correo ya existe
    $check = $conn->prepare("SELECT ID_Agente FROM agente WHERE Correo = ?");
    $check->bind_param("s", $correo);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        http_response_code(409); // ❗️Indica conflicto (duplicado)
        echo json_encode(["error" => "Correo duplicado"]);
        exit;
    }
    $check->close();

    // Insertar nuevo agente
    $stmt = $conn->prepare("INSERT INTO agente (Nombre, Correo, Telefono) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $telefono);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => $stmt->error]);
    }

    $stmt->close();
}
?>
