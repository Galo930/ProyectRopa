<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Prenda</h1>
    <form action="index.php?accion=editar&id=<?= $prenda->getId() ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= $prenda->getNombre() ?>" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="<?= $prenda->getMarca() ?>" required><br><br>
        <label for="precioBase">Precio Base:</label>
        <input type="number" step="0.01" name="precioBase" id="precioBase" value="<?= $prenda->getPrecioBase() ?>" required><br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" value="<?= $prenda->getStock() ?>" required><br><br>
        <label for="tipo">Tipo:</label>

        <label for="talla">Talla:</label>
        <select name="talla" id="talla" required>
            <option value="">Selecciona una talla</option>
            <option value="S" <?= ($prenda->getTalla() === 'S') ? "selected" : "" ?>>S</option>
            <option value="M" <?= ($prenda->getTalla() === 'M') ? "selected" : "" ?>>M</option>
            <option value="L" <?= ($prenda->getTalla() === 'L') ? "selected" : "" ?>>L</option>
            <option value="XL" <?= ($prenda->getTalla() === 'XL') ? "selected" : "" ?>>XL</option>
        </select><br><br>
        <?php if ($prenda instanceof Camiseta): ?>
        <label for="tipoCuello">Tipo de Cuello:</label>
        <select name="tipoCuello" id="tipoCuello" required>
            <option value="">Selecciona un tipo de cuello</option>
            <option value="redondo" <?= ($prenda->getTipoCuello() === 'redondo') ? "selected" : "" ?>>Redondo</option>
            <option value="v" <?= ($prenda->getTipoCuello() === 'v') ? "selected" : "" ?>>En V</option>
            <option value="polo" <?= ($prenda->getTipoCuello() === 'polo') ? "selected" : "" ?>>Polo</option>
        </select><br><br>
        <label for="tejido">Tejido:</label>
        <input type="text" name="tejido" id="tejido" value="<?= $prenda->getTejido() ?>" required><br><br>
        <?php elseif ($prenda instanceof Pantalon): ?>
        <label for="tallaNumerica">Talla Numérica:</label>
        <input type="number" name="tallaNumerica" id="tallaNumerica" value="<?= $prenda->getTallaNumerica() ?>" required>
        <br><br>
        <label for="largura">Largo:</label>
        <input type="text" name="largura" id="largura" value="<?= $prenda->getLargura() ?>" required><br><br>
        <label for="estilo">Estilo:</label>
        <select name="estilo" id="estilo" required>
            <option value="">Selecciona un estilo</option>
            <option value="recto" <?= ($prenda->getEstilo() === 'slim') ? "selected" : "" ?>>Slim</option>
            <option value="pitillo" <?= ($prenda->getEstilo() === 'regular') ? "selected" : "" ?>>Regular</option>
            <option value="acampanado" <?= ($prenda->getEstilo() === 'baggy') ? "selected" : "" ?>>Baggy</option>
        </select><br><br>
        <?php endif; ?>
        <button type="submit">Actualizar Prenda</button>
</body>
</html>