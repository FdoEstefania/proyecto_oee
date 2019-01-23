<?php
include_once ("../datos/sucursalDatos.php");

class SucursalesControl{

    private $datosSucursal;

    function __construct() 
    {
        $this->datosSucursal = new SucursalDatos();

    }

    public function addSucursal($nom, $dir, $fk)
    {
        $retorno = FALSE;
        if(!is_null($nom) && !empty($nom))
        {
            if(!is_null($dir) && !empty($dir))
            {
                $retorno = $this->datosSucursal->addSucursal($nom, $dir, $fk);
            }
        }
        return $retorno;
    }

    public function setSucursal($nom, $dir, $id){

        $retorno = false;
        if(!is_null($nom) && !empty($nom))
        {
            if(!is_null($dir) && !empty($dir))
            {
                if(!is_null($dir) && !empty($dir))
                {
                    $retorno = $this->datosSucursal->setSucursales($nom, $dir, $id);
                }
            }
        }
        return $retorno;
    }

    public function getSucursal($id){

        $retorno = FALSE;
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosSucursal->getSucursal($id);
        }
        return $retorno;
    }
    
    public function getSucursales($ml)
    {   $retorno = false; 
        if(!is_null($ml) && !empty($ml))
        {
            $retorno = $this->datosSucursal->getSucursales($ml);
        }
        return $retorno;
    }
    /*Funcion que valida la eliminacion de una sucursal*/
    public function deleteSucursal($cod)
    {
        if(!is_null($cod) && !empty($cod))
        {
            $retorno = $this->datosSucursal->deleteSucursal($cod);
        }
        return $retorno;
    }
    /*====================================================*/
}


?>