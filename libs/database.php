<?php 

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect(){
        try{
            $conexion = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $opciones = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO:: ATTR_EMULATE_PREPARES     => false,
            ];
            $pdo = new PDO($conexion, $this->user, $this->password, $opciones);
            return $pdo;
        }catch(PDOException $e){
            throw new Exception('Error de conexión: ' . $e->getMessage());
        }
    }
}

?>