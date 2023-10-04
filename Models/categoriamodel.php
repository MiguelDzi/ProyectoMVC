<?php

class CategoriaModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function obtenerTodasCategorias() {
        $query = "SELECT * FROM categorias";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
