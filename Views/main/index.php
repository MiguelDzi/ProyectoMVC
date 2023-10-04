<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL');?>Views/public/css/LogC1.css">
	<title>Login</title>
</head>
<body>
    <?php //require 'Views/header.php';?>

    <div id="main">
        <h1 class="center">Bienvenido</h1>
        <div class="Login">
		<img src="<?php echo constant('URL');?>Views/public/img/logotipo.png" alt="Logo" class="imaa">
		<h1>Login</h1>
		<form method="post" action="<?php echo constant('URL');?>main/login">
			<label for="username">email:</label>
			<input type="text" placeholder="correo" name="correo" required>
            <br>
			<label for="password">Password</label>
			<input type="password" placeholder="Password" name="contrasena" required>
            <br>
			<input type="submit" value="Login">

			<a href="">Olvidaste tu contrasena?</a><br>
			<a href="">Problemas con acceder a la cuenta?</a>
		</form>
	</div>
    </div>


    <?php require 'Views/footer.php';?>
</body>
</html>