<?php
include_once 'Models/productos.php';
class ConsultaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function get(){
        $items=[];
        try{
            $query = $this->db->connect()->query("SELECT * FROM productos");
            while($row = $query->fetch()){
                $item = new Producto();
                $item->idProducto=$row['idProducto'];
                $item->nombre=$row['nombre'];
                $item->precio=$row['precio'];
                $item->idCategoria=$row['idCategoria'];
                $categoriaNombre = $this->getCategoriaNombre($item->idCategoria);
                $item->categoriaNombre = $categoriaNombre;
                array_push($items,$item);
            }
            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function getById($id){
        $item = new Producto();
        $query = $this->db->connect()->prepare("SELECT * FROM productos WHERE idProducto = :idProducto");
        try{
            $query->execute(['idProducto' => $id]);
            while($row = $query->fetch()){
                $item->idProducto = $row['idProducto'];
                $item->nombre = $row['nombre'];
                $item->precio = $row['precio'];
                $item->idCategoria=$row['idCategoria'];
                $categoriaNombre = $this->getCategoriaNombre($item->idCategoria);
                $item->categoriaNombre = $categoriaNombre;
            }
            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function getCategoriaNombre($idCategoria){
        try {
            $query = $this->db->connect()->prepare("SELECT nombre FROM categorias WHERE idCategoria = :idCategoria");
            $query->execute(['idCategoria' => $idCategoria]);

            if ($row = $query->fetch()){
                return $row['nombre'];
            } else {
                return 'Categoria no encontrada';
            }
        } catch(PDOException $e){
            return 'Error al obtener la categoria';
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE productos SET nombre = :nombre, precio = :precio, idCategoria = :idCategoria WHERE idProducto = :idProducto");
        try{
            $query->execute(['nombre' => $item['nombre'],'precio'=>$item['precio'], 'idCategoria'=>$item['idCategoria'],'idProducto' => $item['idProducto']]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        $query = $this->db->connect()->prepare("DELETE FROM productos WHERE idProducto = :id");
        try{
            $query->execute(['id' => $id]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}

?>