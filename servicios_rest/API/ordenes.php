<?PHP
require "conexion.php";
$json=array();
//metodos que verifica si se inserta un dato o no
if(isset($_GET["num"]) && isset($_GET["fk"])){
    $num= $_GET['num'];
    $fk= $_GET['fk'];

    //realizad la cunsulta de la tabla tabla_ext a la base de datos
    $consulta="SELECT * FROM tabla_ext WHERE num_orden = '{$num}'AND fk_empresa = '{$fk}'";
    $resultado=mysqli_query($con,$consulta);

    //metodo que verifica que si hay un resultado
    if($consulta){
        
        //metodo que guarda los resultado de la consulta en un array
        if($reg=mysqli_fetch_array($resultado)){
            $json['datos'][]=$reg;
        }
        
        //metodo que muestra los resultado en pantalla
        mysqli_close($con);
        echo json_encode($json);
    }
    else{
        $results["num_orden"]='';
        $results["cod_articulo"]='';
        $results["nom_articulo"]='';
        $results["serie_articulo"]='';
        $results["tamano_lote"]='';
        $results["unidad_medida"]='';
        $results["fk_empresa"]='';
        $json['datos'][]=$results;
        echo json_encode($json);
    }

}
else{
    $results["num_orden"]='';
    $results["cod_articulo"]='';
    $results["nom_articulo"]='';
    $results["serie_articulo"]='';
    $results["tamano_lote"]='';
    $results["unidad_medida"]='';
    $results["fk_empresa"]='';
    $json['datos'][]=$results;
    echo json_encode($json);
}
?>