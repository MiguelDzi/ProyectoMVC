<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL');?>Views/public/css/default.css">
    <title>Document</title>
</head>
<body>
    <div id="header">
        <div class="imagen">
            <a href="#"><img src="<?php echo constant('URL');?>Views/public/img/logotipo.png" alt="">Proyecto</a>
        </div>
        <div class="nav">
            <ul>
                <li><a href="<?php echo constant('URL'); ?>nuevo">Nuevo</a></li>
                <li><a href="<?php echo constant('URL'); ?>consulta">Consulta</a></li>
                <li><a href="<?php echo constant('URL'); ?>main">Cerrar sesion</a></li>
            </ul>
        </div>
    </div>
</body>
</html>