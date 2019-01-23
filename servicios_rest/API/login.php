<?PHP
header('Content-Type: application/json');

require "conexion.php";

$output = array();
//$json=array();
//metodos que verifica si se inserta un dato o no
if(isset($_GET["user"]) && isset($_GET["pwd"])){
    if(!empty($_GET["user"]) && !empty($_GET["pwd"])){
        $user= $_GET['user'];
        $pwd= $_GET['pwd'];

        //realizad la cunsulta de la tabla usuario a la base de datos
        $sql = "SELECT correo_usu, contrasena_usu, nom_usu, ape_usu, fk_empresa FROM usuario WHERE correo_usu = '".$user."'";
        $result = mysqli_query($con, $sql);
        $fila = $result->fetch_assoc();
        $pass = $fila['contrasena_usu'];
        $json[] = $fila['nom_usu'];
        $json[] = $fila['ape_usu'];
        $json[] = $fila['correo_usu'];
        //metodo que verifica que si la contraseña insertada es igual a la encriptada en la base de datos
        if($fila){
            if(password_verify($pwd, $pass)){
                $output = array(
                    "usuario" => $json
                );
                echo json_encode($output);
                //funcion que guarda en una variable el resultado de la consulta
                //$result = mysqli_query($con,$sql);

                //metodo que guarda los resultado de la consulta en un array
                /*if($reg = mysqli_fetch_array($result)){
                    $json['datos'][]=$reg;
                }*/
                //metodo que muestra los resultado en pantalla y el cierre de la conexion
                mysqli_close($con);
                //echo json_encode($json);
            }
        }
        /*else{
            $results["correo_usu"]='';
            $results["contraseña_usu"]='';
            $results["nom_usu"]='';
            $results["ape_usu"]='';
            $results["fk_empresa"]='';
            $json['datos'][]=$results;
            echo json_encode($json);
        }*/
    }
}
/*else{
    $results["user"]='';
    $results["pwd"]='';
    $results["name"]='';
    $results["ape_usu"]='';
    $results["fk_empresa"]='';
    $json['datos'][]=$results;
    echo json_encode($json);
}*/
?>
