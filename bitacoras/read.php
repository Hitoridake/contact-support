<?php
include('../db.php');

$sql = "SELECT 
          b.ID_Bitacora,
          b.Fecha,
          b.Detalles,
          b.ID_Interaccion,
          c.Nombre AS Cliente,
          a.Nombre AS Agente
        FROM Bitacora b
        JOIN Interaccion i ON b.ID_Interaccion = i.ID_Interaccion
        JOIN Cliente c ON i.ID_Cliente = c.ID_Cliente
        JOIN Agente a ON i.ID_Agente = a.ID_Agente
        ORDER BY b.Fecha DESC";

$result = $conn->query($sql);

$bitacoras = [];

while ($row = $result->fetch_assoc()) {
    $bitacoras[] = $row;
}

header('Content-Type: application/json');
echo json_encode($bitacoras);
?>
