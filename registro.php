<?php
// Incluye la conexión
include("conexion.php");

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Inserta el nuevo usuario en la base de datos
  $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuario registrado con éxito'); window.location='login.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro | Angela's Delights</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="images/logo.jpg" alt="Angela's Delights" />
      <h1>Angela's Delights</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="productos.html">Productos</a></li>
        <li><a href="pedidos.html">Pedidos</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="login.php" class="activo">Iniciar Sesión</a></li>
      </ul>
    </nav>
  </header>

  <main class="registro">
    <h2>Crear una Cuenta</h2>
    <form action="registro.php" method="POST" class="formulario-login">
      <label for="nombre">Nombre completo:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" class="btn">Registrarse</button>
      <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </form>
  </main>

  <footer>
    <p>&copy; 2025 Angela's Delights | Babahoyo, Ecuador</p>
  </footer>
</body>
</html>
