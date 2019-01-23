<?php

include "../controles/maquinasControl.php";

$control_m = new MaquinasControl();

$resul = '';

/* Tabla HTML que muestar los datos de maquinas existentes */
if(isset($_POST['fk_sucursal']))
{
    $id = $_POST['fk_sucursal'];
    $resul = $control_m->getMaquinas($id);
}

/*Metodo GET que permite eliminar una maquina */
if(isset($_POST["codm"]))
{
    $cod = $_POST["codm"];
    $result = $control_m->getMaquina($cod);
    $rs_d = $result[0];
    $id = $rs_d['fk_sucursal'];
    $control_m->deleteMaquina($cod);
    $resul = $control_m->getMaquinas($id);

}
/**-- =======================================--*/

?>
<!-- Tabla HTML que muestar los datos de maquinas -->
<table class="table table-bordered table-hover table-striped" id="">
    <tr class="text-info">
        <th>#</th>
        <th>Nombre maquina</th>
        <th>Vol. Funcionaniento</th>
        <th>Modelo maquina</th>
        <th>#</th>
        <th>#</th>
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
        <td style="width: 20%;"><?php echo $row["nom_maq"];?></td>
        <td style="width: 20%;"><?php echo $row["vel_func_maq"];?></td>
        <td style="width: 20%;"><?php echo $row["mod_maq"];?></td>
        <td style="width: 10%;">
            <a type="button" href="maquinas.php?cod_maq='<?php echo $row["cod_maq"];?>'" name="btnEditar" class="btn btn-primary btnHome" id="<?php echo $row["cod_maq"];?>" title="Editar"><i class="fa fa-edit"></i></a>
        </td>
        <td style="width: 10%;">
            <button type="button" name="btnElimina" class="btn btn-primary btnHome delete_maq" id="<?php echo $row["cod_maq"];?>" title="Eliminar"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
    <?php 
        }
    }
    else
    {
    ?>

    <tr>
        <td colspan="5" style="text-align: center;"><h4 class="text-danger">No hay maquinas registradas</h4></td>
    </tr>
    <?php 
    }

    ?>
</table>

