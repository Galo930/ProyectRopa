<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Prendas</h1>
        <div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px;">
        <?php if (isset($_SESSION['usuario_id'])): ?>
            Bienvenido, <b><?= $_SESSION['usuario_email'] ?></b> | 
            <a href="index.php?accion=logout">Cerrar Sesión</a>
        <?php else: ?>
            <a href="index.php?accion=login">Iniciar Sesión</a> | 
            <a href="index.php?accion=registro">Registrarse</a>
        <?php endif; ?>
    </div>
    <?php if (isset($_SESSION['usuario_id'])): ?>
        <a href="index.php?accion=crear">Añadir Nueva Prenda</a><br><br>
    <?php endif; ?>
    
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio Base</th>
                <th>Stock</th>
                <th>Tipo</th>
                <th>Talla</th>
                <th>Tipo de Cuello</th>
                <th>Tejido</th>
                <th>Talla Numerica</th>
                <th>Largo</th>
                <th>Estilo</th>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <th>Acciones</th>
            <?php endif; ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach($prendas as $p): ?>

            <tr>
                <td><?= $p->getNombre() ?></td>
                <td><?= $p->getMarca() ?></td>
                <td><?= $p->getPrecioBase() ?></td>
                <td><?= $p->getStock() ?></td>
                <td><?= ($p instanceof Camiseta) ? "Camiseta" : "Pantalon" ?></td>
                <td><?= ($p instanceof Camiseta) ? $p->getTalla() : "-" ?></td>
                <td><?= ($p instanceof Camiseta) ? $p->getTipoCuello() : "-" ?></td>
                <td><?= ($p instanceof Camiseta) ? $p->getTejido() : "-" ?></td>
                <td><?= ($p instanceof Pantalon) ? $p->getTallaNumerica() : "-" ?></td>
                <td><?= ($p instanceof Pantalon) ? $p->getLargura() : "-" ?></td>
                <td><?= ($p instanceof Pantalon) ? $p->getEstilo() : "-" ?></td>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <td>
                    <a href="index.php?accion=editar&id=<?= $p->getId() ?>">Editar</a> | 
                    <a href="index.php?accion=eliminar&id=<?= $p->getId() ?>">Borrar</a>
                </td>
            <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div style="margin: 20px 0;">
    <form method="POST" action="index.php?accion=cambiar_color">
        <button type="submit" name="color" value="#ffffff" style="background: white; border: 1px solid #ccc;">Blanco</button>
        <button type="submit" name="color" value="#3b3b3b" style="background: #585757; border: 1px solid #7c7c7c;">Oscuro</button>
    </form>
</div>
<body style="background-color: <?= $_SESSION['fondo'] ?? '#ffffff' ?>;">
</body>
</html>