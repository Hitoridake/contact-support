<?php
include('../db.php');

$sql = "
  SELECT 
    i.ID_Interaccion,
    i.Fecha_Creacion AS Fecha,
    i.ID_Cliente,
    i.ID_Agente,
    i.Descripcion_Inicial,
    c.Nombre AS Cliente,
    a.Nombre AS Agente
  FROM Interaccion i
  JOIN Cliente c ON i.ID_Cliente = c.ID_Cliente
  JOIN Agente a ON i.ID_Agente = a.ID_Agente
";
$result = $conn->query($sql);

$interacciones = [];

while ($row = $result->fetch_assoc()) {
    $interacciones[] = $row;
}

header('Content-Type: application/json');
echo json_encode($interacciones);
?>
