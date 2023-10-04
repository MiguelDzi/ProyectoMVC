<?php
require_once 'Models/usuariosmodel.php';
class Main extends Controller {
    function __construct() {
        parent::__construct();
        //echo "<p>Nuevo controlador Main</p>";
    }

    function render() {
        $this->view->render('main/index');
    }

    function saludo() {
        echo "<p>metodo saludo</p>";
    }

    function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $usuarioModel = new UsuariosModel();
            $usuario = $usuarioModel->validar($correo, $contrasena);

            if ($usuario) {
                $_SESSION['nombre'] = $usuario->nombre;
                header("Location: http://localhost/ProyectoMVC/nuevo");
                exit;
            } else {
                $this->view->mensaje = 'Credenciales inválidas';
            }
        }

        $this->view->render('main/index'); 
    }
}
?>
