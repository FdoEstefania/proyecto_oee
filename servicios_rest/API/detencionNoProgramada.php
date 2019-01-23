<?PHP
require "conexion.php";
$fk= $_GET['fk'];
$json=array();
//realizad la cunsulta de la tabla maquina a la base de datos
$consulta="SELECT * FROM det_nprog WHERE fk_cod_maq = '{$fk}'";
$resultado=mysqli_query($con,$consulta);
//un ciclo while que rellena la coleccion con todos los datos encontrados en la consulta
while($row = mysqli_fetch_object($resultado)){
    $json[] = $row;
}
//metodo que muestra los resultado en pantalla
echo json_encode($json);
mysqli_close($con);

?>