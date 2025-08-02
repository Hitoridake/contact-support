<?php
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM Cliente WHERE ID_Cliente=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Cliente eliminado.";
    } else {
        echo "Error al eliminar cliente: " . $stmt->error;
    }

    $stmt->close();
}
?>
