<?PHP
require "conexion.php";
$json=array();
//metodos que verifica si se inserta un dato o no
if(isset($_GET["user"]) && isset($_GET["pwd"])){
    $user= $_GET['user'];
    $pwd= $_GET['pwd'];

    //realizad la cunsulta de la tabla tabla_ext a la base de datos
    $consulta="SELECT correo_usu, contrasena_usu, nom_usu, ape_usu, fk_empresa FROM usuario WHERE correo_usu = '{$user}' AND contrasena_usu = '{$pwd}'";
    $resultado=mysqli_query($con,$consulta);

    //metodo que verifica que si hay un resultado
    if($consulta){
        
        //metodo que guarda los resultado de la consulta en un array
        if($reg=mysqli_fetch_array($resultado)){
            $json['datos'][]=$reg;
        }
        
        //metodo que muestra los resultado en pantalla
        mysqli_close($con);
        var_dump($resultado);
        //echo json_encode($json);
    }
    else{
        $results["correo_usu"]='';
        $results["contrasena_usu"]='';
        $results["nom_usu"]='';
        $results["ape_usu"]='';
        $results["fk_empresa"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
    }

}
else{
    $results["correo_usu"]='';
    $results["contrasena_usu"]='';
    $results["nom_usu"]='';
    $results["ape_usu"]='';
    $results["fk_empresa"]='';
    $json['datos'][]=$results;
    echo json_encode($json);
}
?>