<?php 
include "../controles/dnProgramadasControl.php";

$control = new DnProgramadasControl();

/*****Metodo que permite eliminar una detencion programada****/
if(isset($_POST["codD"]))
{
    $cod = $_POST["codD"];
    echo $cod;
    /*$results = $control->getDetencion($cod);
    $rs_d = $results[0];
    $id = $rs_d['fk_cod_suc'];
    $control->deleteDp($cod);
    $resul = $control->getDetenciones($id);*/
}
/**-------------------------------------------------------------*/

/*Metodo GET para obtener datos de detenciones no programadas*/
if(isset($_POST['codm']))
{
    $id = $_POST['codm'];
    $resul = $control->getDnProgramadas($id);
}

    $salida = '
    <table class="table table-bordered table-hover table-striped" id="">
    <tr class="text-info">
        <th colspan="" >Nombre detenciones</th>
        <th colspan="" >#</th>
    </tr>';

    if($resul)
    {
        foreach($resul as $row){
            $salida .= '
            <tr>
                <td style="width: 20%;">'.$row["nom_dnprog"].'</td>
                <!--<td style="width: 10%;">
                    <a type="button" href="maquinas.php?cod_maq='.$row["cod_dnprog"].'" name="btnEditar" class="btn btn-warning" id="'.$row["cod_dnprog"].'" title="Editar"><i class="fa fa-edit"></i></a>
                </td>-->
                <td style="width: 10%;">
                    <button type="button" name="btnElimina" class="btn btn-primary btnHome deletednp" id="'.$row["cod_dnprog"].'" title="Eliminar"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        ';
        }
    }
    else
    {
        $salida .= '
        <tr>
            <td colspan="2" style="text-align: center;"><p class="text-info">No hay detenciones registradas</p></td>
        </tr>
    ';
    }
    $salida .= '</table>';
    echo $salida; 


?>

