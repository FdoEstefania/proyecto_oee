<?php
include_once "conexion.php";

class DnProgramadasDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

    /*Query que obtiene una maquina desde su FK_ */
    public function getMaquina($id){
        $sql = "SELECT * FROM maquinas WHERE fk_sucursal = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*===============================================================*/

    /*Query para obtener datos todas las detenciones no programadas*/
    public function getDnProgramadas($cod){ 
        $retorno = null;
        $sql = "SELECT * FROM det_nprog WHERE fk_cod_maq = '".$cod."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*===============================================================*/

    /*Query sql para registrar detenciones no programadas en la bases de datos*/
    public function addDnprogramada($nom, $maq)
    {
        $query = "INSERT INTO det_nprog(nom_dnprog, fk_cod_maq) VALUES (?, ?)";
        $statement = $this->con->Prepare($query);
        $statement->execute(array($nom, $maq));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*===============================================================*/
    
    /*Query sql para eliminar detenciones no programadas*/
    public function deleteDnp($id)
    {
        $sql = "DELETE FROM det_nprog WHERE cod_dnprog = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*===============================================================*/

}
?>