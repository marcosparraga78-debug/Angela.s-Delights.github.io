<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Guardar mensaje en archivo (opcional)
    $archivo = fopen("mensajes.txt", "a");
    fwrite($archivo, "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje\n--------------------------\n");
    fclose($archivo);
} else {
    header("Location: contacto.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mensaje Enviado | Angela's Delights</title>
  <link rel="stylesheet" href="css/contacto.css" />
  <style>
    /* Estilo adicional para la página de confirmación */
    .confirmacion {
      max-width: 600px;
      margin: 60px auto;
      background: #fff0f5;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      text-align: center;
      padding: 40px;
      animation: aparecer 0.6s ease-in-out;
    }

    @keyframes aparecer {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .confirmacion h2 {
      color: #c2185b;
      margin-bottom: 15px;
    }

    .confirmacion p {
      color: #444;
      font-size: 16px;
      margin-bottom: 25px;
    }

    .confirmacion a {
      display: inline-block;
      background-color: #ec407a;
      color: #fff;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .confirmacion a:hover {
      background-color: #c2185b;
    }
  </style>
</head>
<body>

  <!-- ENCABEZADO -->
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
        <li><a href="login.php">Iniciar Sesión</a></li>
      </ul>
    </nav>
  </header>

  <!-- CONTENIDO PRINCIPAL -->
  <main>
    <section class="confirmacion">
      <h2>¡Gracias por contactarnos, <?php echo $nombre; ?>!</h2>
      <p>Hemos recibido tu mensaje correctamente. En breve nos pondremos en contacto contigo a través del correo <strong><?php echo $email; ?></strong>.</p>
      <p>🍰 ¡Gracias por confiar en <strong>Angela's Delights</strong>! 🍰</p>
      <a href="contacto.html">Volver contacto</a>
    </section>
  </main>

  <!-- PIE DE PÁGINA -->
  <footer>
    <p>&copy; 2025 Angela's Delights | Babahoyo, Ecuador</p>
  </footer>

</body>
</html>
