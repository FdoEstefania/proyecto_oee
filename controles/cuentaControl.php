<?php

include_once "./datos/cuentaDatos.php";

class CuentaControl{

    private $dat;

    function __construct() 
    {
        $this->dat = new CuentaDatos();

    }

    public function getCuenta($mail)
    {   
        $cuentaObtenida = NULL;
        if(!is_null($mail) && !empty($mail))
        {
            $cuentaObtenida = $this->dat->getUsuario($mail);
        }
        return $cuentaObtenida;
    }

}
/*$x = new CuentaControl();
var_dump($x->getCuenta('it@svg.cl'));*/

?>