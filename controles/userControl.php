<?php
include "../datos/userDatos.php";

class UserControl{

    private $dat;

    function __construct() 
    {
        $this->dat = new UserDatos();

    }


    public function getUser($mail)
    {   
        $cuentaObtenida = NULL;
        if(!is_null($mail) && !empty($mail))
        {
            $cuentaObtenida = $this->dat->getUsuario($mail);
        }
        return $cuentaObtenida;
    }

    public function setUsuario($tel, $pssw, $id)
    {
        $cuentaObtenida = NULL;
        if(!is_null($tel) && !empty($tel))
        {
            if(!is_null($id) && !empty($id))
            {
                $cuentaObtenida = $this->dat->setUsuario($tel, $pssw, $id);
            }
        }
        return $cuentaObtenida;
    }

}


?>