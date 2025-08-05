<?php
include('../db.php');

$sql = "SELECT COUNT(*) as total FROM Interaccion";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);
?>
