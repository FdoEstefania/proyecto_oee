<?php
include_once "conexion.php";

class DProgramadasDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }

    /*Query sql para obtener detencion programada*/
    public function getDetencion($id){
        $sql = "SELECT * FROM det_prog WHERE cod_dprog = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $retorno = $statement->fetchAll();
        $total = $statement->rowCount();
        return $retorno;
    }
    /*==============================================*/

    /*Query sql para obtener detenciones programadas*/
    public function getDetenciones($id){
        $sql = "SELECT * FROM det_prog WHERE fk_cod_suc = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $retorno = $statement->fetchAll();
        $total = $statement->rowCount();
        return $retorno;
    }
    /*==============================================*/

    /*Query sql para registrar detenciones programadas*/
    public function addDprogramada($nom, $suc)
    {
        $query = "INSERT INTO det_prog(nom_dprog, fk_cod_suc) VALUES (?, ?)";
        $statement = $this->con->Prepare($query);
        $statement->execute(array($nom, $suc));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*==============================================*/

    /*Query sql para eliminar detenciones programadas*/
    public function deleteDp($id)
    {
        $sql = "DELETE FROM det_prog WHERE cod_dprog = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*==============================================*/
}

/*
$x = new DProgramadasDatos();

$resul = $x->getDetenciones('IBRMac002');

var_dump($resul);
*/

?>




