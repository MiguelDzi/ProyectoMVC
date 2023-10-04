<?php

class NuevoModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Productos (nombre,precio,idCategoria) VALUES (:nombre, :precio, :idCategoria)');
        $query->execute(['nombre' => $datos['nombre'], 'precio' => $datos['precio'], 'idCategoria' => $datos['idCategoria']]);
        return true;
    }
    public function insert2($datos){
        $query = $this->db->connect()->prepare('INSERT INTO Categorias (nombre) VALUES (:nombre)');
        $query->execute(['nombre' => $datos['nombre']]);
        return true;
    }
}

?>