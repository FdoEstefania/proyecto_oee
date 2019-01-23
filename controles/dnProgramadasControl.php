<?php 
include_once "../datos/dnProgramadasDatos.php";

class DnProgramadasControl{

    private $datosDnp;

    function __construct() 
    {
        $this->datosDnp = new DnProgramadasDatos();
    }

    /* Funcion para verificar datos de registros de detenciones no programadas*/
    public function addDnprogramada($nom, $maq)
    {
        $retorno = FALSE;
        if(!is_null($nom) && !empty($nom))
        {
            if(!is_null($maq) && !empty($maq))
            {
                $retorno = $this->datosDnp->addDnprogramada($nom, $maq);
            }
        }
        return $retorno;
    }
    /*=====================================================*/

    /*Funcion que valida la selecion de todos las detenciones*/
    public function getDnProgramadas($cod)
    { 
        $retorno = $this->datosDnp->getDnProgramadas($cod);
        return $retorno;    
    }
    /*=====================================================*/

    /*Funcion que valida la selecion de una maquinas*/
    public function getMaquina($id)
    { 
        $retorno = $this->datosDnp->getMaquina($id);
        return $retorno;    
    }
    /*=====================================================*/

    /*Funcion que valida la eliminacion de una detencion*/
    public function deleteDnp($id)
    {
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosDnp->deleteDnp($id);
        }
        return $retorno;
    }
    /*=====================================================*/
}

/*$x = new DnProgramadasControl();

$resul = $x->getDnProgramadas('IBRMac002-est002');

var_dump($resul);*/
?>