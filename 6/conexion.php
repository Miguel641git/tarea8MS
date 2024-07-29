<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "AGENCIA";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión correcta";
} catch(PDOException $e) {
    echo "Error conexion: " . $e->getMessage();
}
?>