<?php
include_once("conexion.php");

class MaquinaDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

    /**Funcion que permita registrar una nueva maquina a la base de datos */
    public function addMaquina($nom, $vel, $mod, $suc)
    {
        $query = "INSERT INTO maquinas(nom_maq, vel_func_maq, mod_maq, fk_sucursal) VALUES (?, ?, ?, ?)";
        $statement = $this->con->Prepare($query);
        $statement->execute(array($nom, $vel, $mod, $suc));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    
    /*Funcion para obtener datos todas las maquinas*/
    public function getMaquinas($cod){ 
        $retorno = null;
        $sql = "SELECT * FROM maquinas WHERE maquinas.fk_sucursal = '".$cod."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $retorno = $statement->fetchAll();
        $total = $statement->rowCount();
        return $retorno;
    }

    /*Funcion para selecionar una maquina*/
    public function getMaquina($id){
        $sql = "SELECT * FROM maquinas WHERE cod_maq = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*Funcion para actualizar una maquina*/
    public function setMaquina($nom, $vel, $mod, $id)
    {
        $sql = "UPDATE maquinas SET nom_maq = '".$nom."', vel_func_maq = '".$vel."', mod_maq = '".$mod."' WHERE cod_maq = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $retorno = $statement->execute(array($nom, $vel, $mod, $id));
        return $retorno;
    }
    /*Funcion para eliminar una maquina */
    public function deleteMaquina($id)
    {
        $sql = "DELETE FROM maquinas WHERE cod_maq = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
}

?>