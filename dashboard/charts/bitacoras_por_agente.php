<?php
include('../../db.php');
$sql = "
  SELECT a.Nombre AS Agente, COUNT(b.ID_Bitacora) AS Total
  FROM Bitacora b
  JOIN Interaccion i ON b.ID_Interaccion = i.ID_Interaccion
  JOIN Agente a ON i.ID_Agente = a.ID_Agente
  GROUP BY a.Nombre
  ORDER BY Total DESC
";
$result = $conn->query($sql);

$labels = [];
$data = [];

while ($row = $result->fetch_assoc()) {
  $labels[] = $row['Agente'];
  $data[] = (int)$row['Total'];
}

echo json_encode(["labels" => $labels, "data" => $data]);
?>
