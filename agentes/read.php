<?php
include('../db.php');

$result = $conn->query("SELECT * FROM agente");
$agentes = [];

while ($row = $result->fetch_assoc()) {
  $agentes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($agentes);
?>
