<?php
include('../db.php');

$sql = "SELECT COUNT(*) as total FROM Agente";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>
