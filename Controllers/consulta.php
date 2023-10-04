<?php
include_once 'Models/categoriamodel.php';
class Consulta extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->datos = [];
        $categoriaModel = new CategoriaModel();
        $categorias = $categoriaModel->obtenerTodasCategorias();
        $this->view->categorias = $categorias;
    }
    function render()
    {
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('consulta/index');
    }

    function verProducto($param = null)
    {
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);
        session_start();
        $_SESSION['id_producto'] = $producto->idProducto;
        $this->view->producto = $producto;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarProducto()
    {
        session_start();
        $idProducto = $_SESSION['id_producto'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria = $_POST['idCategoria'];
        unset($_SESSION['id_producto']);
        if ($this->model->update(['idProducto' => $idProducto, 'nombre' => $nombre, 'precio' => $precio, 'idCategoria' => $categoria])) {
            $mensaje = "Actualizado correctamente";
            $producto = new Producto();
            $producto->nombre = $nombre;
            $producto->precio = $precio;
            $producto->idCategoria = $categoria;
            $this->view->producto = $producto;
            $this->view->mensaje = $mensaje;
        } else {
            $this->view->mensaje = "No se pudo actualizar";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarProducto($param = null)
    {
        $idProducto = $param[0];
        if ($this->model->delete($idProducto)) {
            $this->view->mensaje = "producto eliminado";
        } else {
            $this->view->mensaje = "No se pudo eliminar";
        }
        $this->render();
    }
}
?>