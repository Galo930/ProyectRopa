<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Crear nueva cuenta</h1>
    <form method="POST" action="index.php?accion=registro">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Contraseña:</label><br>
        <input type="password" name="password" required minlength="6"><br><br>
        
        <button type="submit">Registrarse</button>
    </form>
    <br>
    <p>¿Ya tienes una cuenta? <a href="index.php?accion=login">Inicia sesión aquí</a></p>
    <a href="index.php">Volver al inicio</a>
</body>
</html>