<?php
$conn = new mysqli("localhost", "root", "", "contact_support_db");

if ($conn->connect_error) {
    die("❌ Error: " . $conn->connect_error);
} else {
    echo "✅ Conexión exitosa";
}
?>
