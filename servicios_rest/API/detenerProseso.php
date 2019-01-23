<?PHP
require "conexion.php";
$json=array();
//metodos que verifica si se inserta un dato o no
if(isset($_GET["fin"])&&($_GET["nom"])&&($_GET["ape"])&&($_GET['vel'])&&($_GET["fk"]&&($_GET["ord"]))){
    $fin=$_GET['fin'];
    $nom=$_GET['nom'];
    $ape=$_GET['ape'];
    $vel=$_GET['vel'];
    $fk=$_GET['fk'];
    $ord=$_GET['ord'];

    //realizad la accion de insertar datos en la tabla turno en la base de datos
    $consulta="INSERT INTO turno(hora_inicio, fecha_inicio, nom_opera, ape_opera, velocidad_pro, fk_maquina,fk_tab_ext ) VALUES ('{$fin}', '{$nom}', '{$ape}', '{$vel}', '{$fk}', '{$ord}')";
    $resultado=mysqli_query($con,$consulta);

    //metodo que verifica que si hay un resultado
    if($consulta){
        $consulta="SELECT * FROM turno  WHERE nom_opera='{$nom}'";
        $resultado=mysqli_query($con,$consulta);

        //metodo que guarda los resultado de la consulta en un array
        if($reg=mysqli_fetch_array($resultado)){
            $json['datos'][]=$reg;
        }
        //metodo que muestra los resultado en pantalla y cierra la coneccion con la base de datos
        mysqli_close($con);
        echo json_encode($json);
    }

    else{
        $results["fin"]='';
        $results["nom"]='';
        $results["ape"]='';
        $results["vel"]='';
        $results["fk"]='';
        $results["ord"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
    }

}
else{   
    $results["fin"]='';
    $results["nom"]='';
    $results["ape"]='';
    $results["vel"]='';
    $results["fk"]='';
    $results["ord"]='';
    $json['datos'][]=$results;
    echo json_encode($json);
}

?>