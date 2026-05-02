<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Añadir Prenda Nueva</h1>
    <form action="index.php?accion=crear" method="POST">
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="camiseta">Camiseta</option>
            <option value="pantalon">Pantalón</option>
        </select><br><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" required><br><br>
        <label for="precioBase">Precio Base:</label>
        <input type="number" step="0.01" name="precioBase" id="precioBase" required><br><br>
        <label for="stock">Stock:</label>
        <input type="number" name="stock" id="stock" required><br><br>

        <label for="talla">Talla:</label>
        <select name="talla" id="talla" required>
            <option value="">Selecciona una talla</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select><br><br>
        <label for="tipoCuello">Tipo de Cuello:</label>
        <select name="tipoCuello" id="tipoCuello" required>
            <option value="">Selecciona un tipo de cuello</option>
            <option value="redondo">Redondo</option>
            <option value="v">En V</option>
            <option value="polo">Polo</option>
        </select><br><br>
        <label for="tejido">Tejido:</label>
        <select name="tejido" id="tejido" required>
            <option value="">Selecciona un tejido</option>
            <option value="algodon">Algodon</option>
            <option value="poliester">Poliester</option>
            <option value="mezcla">Mezcla</option>
        </select><br><br>

        <label for="tallaNumerica">Talla Numérica:</label>
        <input type="number" name="tallaNumerica" id="tallaNumerica" required><br><br>

        <label for="largura">Largo:</label>
        <input type="text" name="largura" id="largura" required><br><br>
        
        <label for="estilo">Estilo:</label>
        <select name="estilo" id="estilo" required>
            <option value="">Selecciona un estilo</option>
            <option value="slim">Slim</option>
            <option value="regular">Regular</option>
            <option value="baggy">Baggy</option>
        </select><br><br>
        <button type="submit">Agregar Prenda</button>
</body>
</html>