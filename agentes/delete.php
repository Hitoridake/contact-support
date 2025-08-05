<?php
include('../db.php');

$id = $_POST['id'];

$stmt = $conn->prepare("DELETE FROM agente WHERE ID_Agente = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  http_response_code(500);
  echo json_encode(["error" => "Error al eliminar"]);
}

$stmt->close();
$conn->close();
?>
