<?php
include "../datos/ordenesDatos.php";

class OrdenesControl{

    private $datosOrdenes;

    function __construct() 
    {
        $this->datosOrdenes = new OrdenesDatos();
    }

    public function getOrdenes($id)
    { 
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosOrdenes->getOrdenes($id);
        }
        return $retorno;    
    }

}


?>