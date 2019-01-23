<?php  
$db_name = "OEE_v1_Demo";  
$mysql_user = "root";  
$mysql_pass = "usbw";  
$server_name = "127.0.0.1";

$con = mysqli_connect($server_name,$mysql_user,$mysql_pass,$db_name);
if (!$con) {
    die("imposible conectarse: " . mysqli_connect_errno($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}
?>  