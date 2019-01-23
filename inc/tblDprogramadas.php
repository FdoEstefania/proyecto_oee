<?php
include_once "../controles/dProgramadasControl.php";

$control = new DProgramadasControl();

/****Tabla con contenido de datos detenciones programadas existentes*****/
$resul = '';
if(isset($_POST['cod_sucursal']))
{
    $cods = $_POST['cod_sucursal'];
    $resul = $control->getDetenciones($cods);
}
/**------------------------------------------------------------*/

/*****Metodo que permite eliminar una detencion programada****/
if(isset($_POST["codD"]))
{
    $cod = $_POST["codD"];
    $results = $control->getDetencion($cod);
    $rs_d = $results[0];
    $id = $rs_d['fk_cod_suc'];
    $control->deleteDp($cod);
    $resul = $control->getDetenciones($id);
}
/**-------------------------------------------------------------*/

?>
<!-- Tabla HTML que muestar los datos de detenciones -->
<table class="table table-bordered table-hover table-striped" id="tbld">
    <tr class="">
        <th colspan="" >#</th>
        <th colspan="" >Nombre detencion</th>
        <th colspan="" >#</th>
    </tr>

    <?php 
    if($resul)
    {
        $n = 0;
        foreach($resul as $row)
        {
            $n++;
    ?>
    <tr>
        <td style="width: 5%;"><?php echo $n;?></td>
        <td style="width: 20%;"><?php echo $row["nom_dprog"];?></td>
        <td style="width: 10%;">
            <button type="button" name="btnElimina" class="btn btn-primary btnHome delete_dp" id="<?php echo $row["cod_dprog"];?>" title="Eliminar"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
    <?php 
        }
    }
    else
    {
    ?>
    <tr>
        <td colspan="3" style="text-align: center;"><p class="text-danger">No hay detenciones registradas</p></td>
    </tr>
    <?php 
    }

    ?>
</table>

