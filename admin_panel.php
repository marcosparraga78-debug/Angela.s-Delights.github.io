<?php
session_start();
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración | Angela's Delights</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Panel de Administración</h1>
</header>

<main style="padding:20px">

<!-- ================= USUARIOS ================= -->
<h2>👥 Usuarios Registrados</h2>

<?php
$sqlUsuarios = "SELECT id, nombre, email, fecha_registro FROM usuarios ORDER BY id DESC";
$resultUsuarios = $conn->query($sqlUsuarios);

if ($resultUsuarios && $resultUsuarios->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha Registro</th>
          </tr>";

    while ($row = $resultUsuarios->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['email']}</td>
                <td>{$row['fecha_registro']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay usuarios registrados.</p>";
}
?>

<hr>

<!-- ================= PEDIDOS ================= -->
<h2>🧁 Pedidos Realizados</h2>

<?php
$sqlPedidos = "SELECT * FROM pedidos ORDER BY fecha_pedido DESC";
$resultPedidos = $conn->query($sqlPedidos);

if ($resultPedidos && $resultPedidos->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Teléfono</th>
            <th>Producto</th>
            <th>Entrega</th>
            <th>Fecha Pedido</th>
          </tr>";

    while ($row = $resultPedidos->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['producto']}</td>
                <td>{$row['fecha_entrega']}</td>
                <td>{$row['fecha_pedido']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay pedidos registrados.</p>";
}
?>

</main>

<footer>
    <p>&copy; 2025 Angela's Delights</p>
</footer>

</body>
</html>
