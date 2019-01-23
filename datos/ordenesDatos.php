<?php
include "conexion.php";

class OrdenesDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

    public function getOrdenes($id){ 
        $retorno = null;
        $sql = "SELECT * FROM tabla_ext WHERE fk_empresa = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $total = $statement->rowCount();
        if($total > 0){
             $retorno = $statement->fetchAll();
        }
        return $retorno;
    }

}

?>