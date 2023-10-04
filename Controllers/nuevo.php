<?php
require_once 'Models/categoriamodel.php';
class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->obtenerTodasCategorias();
        $this->view->categorias = $categorias;
        $this->view->mensaje = "";
    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function registrarProducto(){
        $nombre= $_POST['nombre'];
        $precio= $_POST['precio'];
        $categoria= $_POST['idCategoria'];
        $mensaje="Producto creado";
        if($this->model->insert(['nombre' => $nombre, 'precio' => $precio, 'idCategoria' => $categoria])){
            $mensaje="Producto creado";
        }
        $this->view->mensaje = $mensaje;
        $this->render();
    }
    function registrarCategoria(){
        $nombre= $_POST['nombre'];
        if($this->model->insert2(['nombre' => $nombre])){
            $mensaje="Categoria creado";
        }
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}
?>