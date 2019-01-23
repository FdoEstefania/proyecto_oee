<?php
include_once "../datos/dProgramadasDatos.php";

class DProgramadasControl{
    
    private $datosDp;

    function __construct() 
    {
        $this->datosDp = new DProgramadasDatos();
    }
    
    /* Funcion para verificar datos detencion programada*/
    public function getDetencion($id){
        $retorno = false;
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosDp->getDetencion($id);
        }
        return $retorno;    
    }
     /* ==================================================*/

   /* Funcion para verificar datos detenciones programadas*/
    public function getDetenciones($id){
        $retorno = false;
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosDp->getDetenciones($id);
        }
        return $retorno;    
    }
     /* ==================================================*/
    
    /* Funcion para verificar datos de registros de detenciones programadas*/
    public function addDprogramada($nom, $suc)
    {
        $retorno = FALSE;
        if(!is_null($suc) && !empty($suc))
        {
            if(!is_null($nom) && !empty($nom))
            {
                $retorno = $this->datosDp->addDprogramada($nom, $suc);
            }
        }
         return $retorno;
    }
    /* ==================================================*/
    
    /*Funcion que valida la eliminacion de una detencion*/
    public function deleteDp($id)
    {
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosDp->deleteDp($id);
        }
        return $retorno;
    }
    /* ==================================================*/
}

/*$x = new DProgramadasControl();

$resul = $x->getDetenciones('IBRMac002');

var_dump($resul);*/

?>