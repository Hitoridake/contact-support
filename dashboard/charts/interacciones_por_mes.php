<?php
include('../../db.php');
$sql = "SELECT MONTH(Fecha_Creacion) AS Mes, COUNT(*) AS Total FROM Interaccion GROUP BY Mes ORDER BY Mes";
$result = $conn->query($sql);

$labels = [];
$data = [];

$months = [
  1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril",
  5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
  9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
];

while ($row = $result->fetch_assoc()) {
  $labels[] = $months[(int)$row['Mes']];
  $data[] = (int)$row['Total'];
}

echo json_encode(["labels" => $labels, "data" => $data]);
?>
