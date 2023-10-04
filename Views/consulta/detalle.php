<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Views/consulta/css/style2.css">
</head>

<body>
    <?php require 'Views/header.php'; ?>

    <div id="main">
        <h1 class="center">Detalle de Producto</h1>
        <div class="center">
            <?php echo $this->mensaje; ?>
        </div>
        <div class="moda">
            <div class="cont">
                <form action="<?php echo constant('URL'); ?>consulta/actualizarProducto" method="post" class="forms">
                    <div class="parrafos">
                        <p>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" value=<?php echo $this->producto->nombre; ?> required>
                        </p>
                        <p>
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" value=<?php echo $this->producto->precio; ?> required>
                        </p>
                        <p>
                            <label for="categoria">Categoria:</label>
                            <select name="idCategoria" required>
                                <?php
                                include_once 'Models/categorias.php';
                                include_once 'Models/consultamodel.php';
                                foreach ($this->categorias as $row) {
                                    $categoria = $row;
                                    $selected = ($categoria['idCategoria'] == $this->producto->idCategoria) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $categoria['idCategoria']; ?>" <?php echo $selected; ?>>
                                        <?php echo $categoria['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </p>
                    </div>
                    <div class="acciones">
                        <p>
                            <input type="submit" value="Actualizar">
                            <button type="button" onclick="regresarConsulta()">Regresar</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require 'Views/footer.php'; ?>
    <script>
        function regresarConsulta() {
            window.location.href = '<?php echo constant('URL'); ?>consulta';
        }
    </script>
</body>

</html>