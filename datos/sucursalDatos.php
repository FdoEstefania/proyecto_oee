<?php

include_once ("conexion.php");

class SucursalDatos{

    private $con;

    function __construct() 
    {
        $this->con = new Conexion();

    }
    /*Query que permite agragar de una sucursal*/
    public function addSucursal($nom, $dir, $fk)
    {
        $query = "INSERT INTO sucursal(nom_sucursal, direc_sucursal, fk_empresa) VALUES (?, ?, ?)";
        $statement = $this->con->Prepare($query);
        $statement->execute(array($nom, $dir, $fk));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*Query que permite actualizar sucursales*/
    public function setSucursales($nom, $dir, $id){
        $sql = "UPDATE sucursal SET nom_sucursal = '".$nom."', direc_sucursal = '".$dir."' WHERE cod_sucursal = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $retorno = $statement->execute(array($nom, $dir, $id));
        return $retorno;
    }
    /*Query que permite obtener de una sucursal*/
    public function getSucursal($id){
        $sql = "SELECT * FROM sucursal WHERE cod_sucursal = '".$id."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($id));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*=================================================*/

    /*Query que permite la eliminacion de una sucursal*/
    public function deleteSucursal($cod){
        $sql = "DELETE FROM sucursal WHERE cod_sucursal = '".$cod."'";
        $statement = $this->con->Prepare($sql);
        $statement->execute(array($cod));
        $retorno = $statement->fetchAll();
        return $retorno;
    }
    /*=================================================*/

    /*Query que permite obtener de una sucursales*/
    public function getSucursales($ml){
        $retorno = null;
        $sql = "SELECT * FROM sucursal WHERE fk_empresa = '".$ml."'  ORDER BY cod_sucursal DESC";
        $statement = $this->con->Prepare($sql);
        $statement->execute();
        $total = $statement->rowCount();
        if($total > 0){
            $retorno = $statement->fetchAll();
        }
        return $retorno;
    }
}
$x = new SucursalDatos();
$x->deleteSucursal('IBRMer001');

?>