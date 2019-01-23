<?php
include "conexion.php";

class CuentaDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

    public function getUsuario($correo){

        $retorno = null;
        $sql = 'SELECT * FROM usuario WHERE correo_usu = ?';
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($correo));
        $count = $statement->rowCount();
        if($count > 0){
            $retorno = $statement->fetchAll();
        }
        return $retorno;
    }

    
}
?>