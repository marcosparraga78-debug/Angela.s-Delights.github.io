<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 1. Configuración de la Base de Datos ---
    $servidor = "localhost";
    $usuario = "root"; // Usuario por defecto en XAMPP
    $contrasena = ""; // Contraseña por defecto en XAMPP
    $base_de_datos = "angelas_delights"; // El nombre que creaste en el Paso 1

    // --- 2. Crear la conexión ---
    $conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos, 3307);

    // Verificar si la conexión falló
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // --- 3. Obtener los datos del formulario ---
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $producto = $_POST["producto"];
    $fecha_entrega = $_POST["fecha_entrega"];
    $detalles = $_POST["detalles"];

    // --- 4. Preparar la consulta SQL (Forma segura) ---
    // El '?' actúa como un marcador de posición
    $stmt = $conn->prepare(
        "INSERT INTO pedidos (nombre, telefono, direccion, producto, fecha_entrega, detalles) 
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    // "ssssss" significa que estás enviando 6 variables de tipo "string" (texto)
    $stmt->bind_param("ssssss", $nombre, $telefono, $direccion, $producto, $fecha_entrega, $detalles);

    // --- 5. Ejecutar la consulta y redirigir ---
    if ($stmt->execute()) {
        // Si el pedido se guardó correctamente, redirige a la confirmación
        header("Location: confirmacion.html");
        exit();
    } else {
        // Si hubo un error
        echo "Error al guardar el pedido: " . $stmt->error;
    }

    // --- 6. Cerrar todo ---
    $stmt->close();
    $conn->close();

} else {
    // Si alguien intenta acceder al archivo directamente
    echo "Método no permitido";
}
?>