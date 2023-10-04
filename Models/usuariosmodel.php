<?php
class usuariosModel extends Model {
    
    private $idUsuario;
    private $nombre;
    private $correo;
    private $contrasena;
    
    public function __construct(){
        parent::__construct();
    }
    public function validar($correo, $contrasena) {
        $query = $this->db->connect()->prepare("SELECT * FROM usuarios WHERE correo = :correo AND contrasena = :constrasena");
        $query->execute(['correo' => $correo, 'constrasena' => $contrasena]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>
