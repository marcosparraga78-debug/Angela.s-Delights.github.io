<?php
session_start();
require_once("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $stmt = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            if (password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];

                header("Location: index.html");
                exit;
            } else {
                $error = "Contraseña incorrecta";
            }

        } else {
            $error = "El usuario no existe";
        }

        $stmt->close();

    } else {
        $error = "Completa todos los campos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Angela's Delights</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="logo">
        <img src="images/logo.jpg" alt="Angela's Delights">
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

<main class="login">
    <h2>Iniciar Sesión</h2>

    <?php if ($error): ?>
        <p style="color:red; text-align:center;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST" class="formulario-login">

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit" class="btn">Entrar</button>

        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </form>
</main>

<footer>
    <p>&copy; 2025 Angela's Delights | Babahoyo, Ecuador</p>
</footer>

</body>
</html>

