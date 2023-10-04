<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Views/consulta/css/style1.css">
</head>

<body>
    <?php require 'Views/header.php'; ?>

    <div id="main">
        <h1 class="center">Consulta</h1>
        <table width="100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'Models/productos.php';
                foreach ($this->productos as $row) {
                    $producto = new Producto();
                    $producto = $row;
                    ?>
                    <tr>
                        <td>
                            <?php echo $producto->nombre; ?>
                        </td>
                        <td>
                            <?php echo $producto->precio; ?>
                        </td>
                        <td>
                            <?php echo $producto->categoriaNombre; ?>
                        </td>
                        <td><a
                                href="<?php echo constant('URL') . 'consulta/verProducto/' . $producto->idProducto; ?>">Modificar</a>
                        </td>
                        <td><a href="#" onclick="confirmarEliminar(<?php echo $producto->idProducto; ?>)">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require 'Views/footer.php'; ?>
    <script>
        function confirmarEliminar(idProducto) {
            var confirmacion = confirm("¿Estás seguro de que quieres eliminar este producto?");
            if (confirmacion) {
                window.location.href = '<?php echo constant('URL') . 'consulta/eliminarProducto/'; ?>' + idProducto;
            } else {
            }
        }
    </script>
</body>

</html>