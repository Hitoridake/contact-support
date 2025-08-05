<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM Bitacora WHERE ID_Bitacora = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Registro eliminado.";
    } else {
        http_response_code(500);
        echo "Error al eliminar: " . $stmt->error;
    }

    $stmt->close();
}
?>
