<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Leave empty – confirmed from terminal
$db   = 'contact_support_db';

$conn = new mysqli($host, $user, $pass, $db);

/**
*if ($conn->connect_error) {
*    die("❌ Error de conexión: " . $conn->connect_error);
*} else {
*    echo "✅ Conexión exitosa";
*}
*/
?>