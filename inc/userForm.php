<?php
include "../controles/userControl.php";

$control = new UserControl();

/*Metodo POST actualizar uusarios*/
if(isset($_POST['txtTel']))
{
    $telef = $_POST['txtTel'];
    $pssw = $_POST['txtPass'];

    session_start();
    $id = $_SESSION['correo_usu'];

    $result = $control->setUsuario($telef, $pssw, $id);

    if(isset($result))
    {
        echo '<p class="alert alert-success">Datos actualizados</p>';
    }else{
        echo '<p class="alert alert-danger">Error</p>';
    }

}

?>