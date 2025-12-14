<?php
$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$database   = "angelas_delights";
$port       = 3307; // 👈 MUY IMPORTANTE

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
