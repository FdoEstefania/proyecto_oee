<?php
include_once ("../datos/maquinaDatos.php");

class MaquinasControl{

    private $datosMaquinas;
    
    function __construct() 
    {
        $this->datosMaquinas = new MaquinaDatos();
    }

    //Funcion que verifica los datos de una maquina
    public function addMaquina($nom, $vel, $mod, $suc)
    {
        $retorno = FALSE;
        if(!is_null($nom) && !empty($nom))
        {
            if(!is_null($vel) && !empty($vel))
            {
                if(!is_null($mod) && !empty($mod))
                {
                    if(!is_null($suc) && !empty($suc))
                    {
                        $retorno = $this->datosMaquinas->addMaquina($nom, $vel, $mod, $suc);
                    }       
                }
            }
        }
        return $retorno;
    }
    
    /*Funcion que valida la selecion de todos las maquinas*/
    public function getMaquinas($cod)
    { 
        if(!is_null($cod) && !empty($cod))
        {
            $retorno = $this->datosMaquinas->getMaquinas($cod);
        }
        return $retorno;    
    }

    /*Funcion que valida la selecion de una maquina*/
    public function getMaquina($id){
        $retorno = FALSE;
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosMaquinas->getMaquina($id);
        }
        return $retorno;
    }
    /*Funcion que valida la actualizacion de una maquina*/
    public function setMaquina($nom, $vel, $mod, $id){
        $retorno = false;
        if(!is_null($nom) && !empty($nom))
        {
            if(!is_null($vel) && !empty($vel))
            {
                if(!is_null($mod) && !empty($mod))
                {
                    if(!is_null($id) && !empty($id))
                    {
                        $retorno = $this->datosMaquinas->setMaquina($nom, $vel, $mod, $id);
                    }
                }
            }
        }
        return $retorno;
    }
    
    /*Funcion que valida la eliminacion de una maquina*/
    public function deleteMaquina($id)
    {
        if(!is_null($id) && !empty($id))
        {
            $retorno = $this->datosMaquinas->deleteMaquina($id);
        }
        return $retorno;
    }
    /*================================================*/
}

/*$x = new MaquinaDatos();
$x->addMaquina('estuchadora AV5', '20', 'EAV5', 'IBRMac002');*/
/*
$x = new MaquinasControl();
$y = $x->getMaquinas('newtecSao003');
echo '<pre>';
    var_dump($y);
*/

?>