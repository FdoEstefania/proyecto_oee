<?php
include_once "../controles/dProgramadasControl.php";
include "../controles/sucursalesControl.php";

$control_d = new DProgramadasControl();
$control_s = new SucursalesControl();

session_start();
$fr = $_SESSION['fk_empresa'];
$total = $control_s->getSucursales($fr);

/*-Metodo POST que permite registrar una nueva detencion-*/

$nom = isset($_POST['txtNp']) ? $_POST['txtNp'] : '';
$suc = isset($_POST['cbxSuc']) ? $_POST['cbxSuc'] : '';

$control_d->addDprogramada(ucwords($nom), $suc);
$resul = $control_d->getDetenciones($suc);

/**--=======================================--*/

/*****Metodo que permite eliminar una detencion programada****/
if(isset($_POST["codD"]))
{
    $cod = $_POST["codD"];
    $results = $control_d->getDetencion($cod);
    $rs_d = $results[0];
    $id = $rs_d['fk_cod_suc'];
    $control_d->deleteDp($cod);
    $resul = $control->getDetenciones($id);
}
/**-------------------------------------------------------------*/

?>


<script type="text/javascript">

    /*** Funcion ajax para eliminar una detencion  programada****/
    $(document).ready(function(){

        $(document).on('click', '.delete_dp', function(){
            var codD = $(this).attr("id");
            if(confirm("Eliminar detencion programada?"))
            {
                //alert(codD);
                $.ajax({
                    url:"../inc/tblDprogramadas.php",
                    method:"POST",
                    data:{codD:codD},
                    success:function(data){
                        $("#tb").html(data);

                    }
                });
            }
            else
            {
                return false;	
            }
        });
    });
    /*=============================================================*/


    /*funcion ajax javascrip para poblar combobox*/
    $(document).ready(function(){
        $("#cbxSuc").change(function(){
            $("#cbxSuc option:selected").each(function () {
                var cod_sucursal = $(this).val();
                if(cod_sucursal == 'Seleccionar'){
                    alert('Selecione una socursal');
                    return false;
                }
                $.post("../inc/tblDprogramadas.php", 
                       { cod_sucursal: cod_sucursal }
                       , function(data){
                    $("#tb").html(data);
                });         
            });
        })
    });
    /* -----------------------------------------*/
</script>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-lg-4 col-md-offset-2">
        <h6 class="txtIni" for="">Seleccione para ver detenciones programadas</h6>
        <form class="form" action="" method="post" id="frmDet">
            <div class="">
                <select class="selec" name="cbxSuc" id="cbxSuc">
                    <option>Seleccionar</option>
                    <?php foreach($total as $row) { ?>
                    <option value="<?php echo $row['cod_sucursal']; ?>" <?php if($row['cod_sucursal']==$suc) { echo 'selected'; } ?>><?php echo $row['nom_sucursal']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <label class="txtIni" for="txtProgra">Agregar detencion programada</label>
            <div class="form-inline">
                <input type="text" class="form-control" name="txtNp" id="txtNp" required>
                <input type="submit" class="btn btn-primary btnHome" title="añadir detencion" id="btnDetencion" value="+">
                <a class="btn btn-primary btnclose" href="dProgramadas.php" role="button"><i class="fa fa-retweet"></i></a>
            </div>
        </form>
        <hr>
    </div>
</div>
<span id="tb">
    <div class="row">
        <div class="col-lg-8"> 
            <!-- Tabla HTML que muestar los datos de detenciones -->
            <table class="table table-bordered table-hover table-striped" id="tbl">
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
                        <button type="button" name="btnCod" class="btn btn-primary btnHome delete_dp" id="<?php echo $row["cod_dprog"];?>" title="Eliminar"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <?php 
                    }
                }
                else
                {
                ?>
                <tr>
                    <td colspan="2" style="text-align: center;"><p class="text-danger">No hay detenciones registradas</p></td>
                </tr>
                <?php 
                }

                ?>
            </table>
        </div>
    </div>
</span>