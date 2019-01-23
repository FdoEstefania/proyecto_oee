<?php

class Conexion{

    //host=oee.svg.cl
    //Ponpon1010!
    private $dns = 'mysql:dbname=OEE_v1_Demo;host=127.0.0.1';
    private $user = "root";
    private $pass = "root";
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO($this->dns, $this->user, $this->pass);
            if($this->pdo){
                // echo 'conectado';
            }
        }catch(PDOException $e){
            echo '<script language="javascript">alert("error de conexion verfique....... ");</script>' .$e->getMessage();
        }
    }

    //Prepara una sentencia para su ejecución y devuelve un objeto sentencia.
    public function Prepare($sql) {
        $statement = $this->pdo->prepare($sql);
        return  $statement;
    }
}

?>
