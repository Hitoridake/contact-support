<?php
include('../db.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

$stmt = $conn->prepare("UPDATE agente SET Nombre=?, Correo=?, Telefono=? WHERE ID_Agente=?");
$stmt->bind_param("sssi", $nombre, $correo, $telefono, $id);

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  http_response_code(500);
  echo json_encode(["error" => "Error al actualizar"]);
}

$stmt->close();
$conn->close();
?>
