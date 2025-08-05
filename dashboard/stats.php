<?php
include('../db.php');

$data = [];

$tables = [
    'clientes' => 'Cliente',
    'agentes' => 'Agente',
    'interacciones' => 'Interaccion',
    'bitacoras' => 'Bitacora'
];

foreach ($tables as $key => $table) {
    $result = $conn->query("SELECT COUNT(*) as total FROM $table");
    $row = $result->fetch_assoc();
    $data[$key] = $row['total'];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
