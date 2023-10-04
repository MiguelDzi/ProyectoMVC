<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>Views/nuevo/css/style.css">
</head>

<body>
    <?php require 'Views/header.php'; ?>

    <div id="main" class="main">
        <h1 class="center">Crear</h1>
        <div class="center">
            <?php echo $this->mensaje; ?>
        </div>
        <div class="modal" id="registrarProductos">
            <div class="titulo">
                <h2>Registrar Producto</h2>
            </div>
            <div class="cont">
                <form action="<?php echo constant('URL'); ?>nuevo/registrarProducto" method="post" class="forms">
                    <div class="parrafos">
                        <p>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="" required>
                        </p>
                        <p>
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" id="" required>
                        </p>
                        <p>
                            <label for="categoria">Categoria:</label>
                            <select name="idCategoria" id="" require>
                                <?php
                                include_once 'Models/categorias.php';
                                foreach ($this->categorias as $row) {
                                    $categoria = $row;
                                    ?>
                                    <option value="<?php echo $categoria['idCategoria']; ?>">
                                        <?php echo $categoria['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </p>
                    </div>
                    <div class="acciones">
                        <p>
                            <input type="submit" value="Agregar">
                            <button type="button" onclick="cerrarModal('registrarProductos')">Cancelar</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="registrarCategorias">
            <div class="titulo">
                <h2>Registrar Categorias</h2>
            </div>
            <div class="cont">
                <form action="<?php echo constant('URL'); ?>nuevo/registrarCategoria" method="post" class="forms">
                    <div class="parrafos">
                        <p>
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="" required>
                        </p>
                    </div>
                    <div class="acciones">
                        <p>
                            <input type="submit" value="Agregar">
                            <button type="button" onclick="cerrarModal('registrarCategorias')">Cancelar</button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="botones">
            <div class="som">
                <button onclick="mostrarModal('registrarProductos')" class="btn">Registrar Producto</button>
            </div>
            <div class="som">
                <button onclick="mostrarModal('registrarCategorias')" class="btn">Registrar Categoria</button>
            </div>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
    <?php require 'Views/footer.php'; ?>
    <script>
        function mostrarModal(idModal) {
            document.getElementById(idModal).style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }
        function cerrarModal(idModal) {
            document.getElementById(idModal).style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
</body>

</html>