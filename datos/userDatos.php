<?php
include "conexion.php";

class UserDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

   /*Query para obtener datos de usuario*/
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
    /*Query para actualizar datos de usuario*/
    public function setUsuario($tel, $pssw, $id){
        $sql = null;
        $retorno = null;
        if($pssw != '')
        {
            $sql = "UPDATE usuario SET tel_usu = '".$tel."', contrasena_usu = '".password_hash($pssw , PASSWORD_DEFAULT)."' 
                            WHERE correo_usu = '".$id."'";
            $statement = $this->con->Prepare($sql);
            $statement->execute();
            $retorno = $statement->fetchAll();
        }
        else
        {
            $sql = "UPDATE usuario SET tel_usu = '".$tel."' WHERE correo_usu = '".$id."'";
            $statement = $this->con->Prepare($sql);
            $statement->execute();
            $retorno = $statement->fetchAll();
        }

        return $retorno;
    }

}

?>