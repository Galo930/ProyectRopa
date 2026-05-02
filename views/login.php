<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    <!-- Muestra errores si las credenciales fallan -->
    <?php if (isset($error)): ?>
        <p style="color: red;"><b>Error:</b> <?= $error ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?accion=login">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Entrar</button>
    </form>
    <br>
    <p>¿No tienes cuenta? <a href="index.php?accion=registro">Regístrate aquí</a></p>
    <a href="index.php">Volver al inicio</a>
</body>
</html>