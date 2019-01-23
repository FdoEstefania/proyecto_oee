<?php
session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | detenciones programadas";


include "../controles/sucursalesControl.php";
$control_s = new SucursalesControl();
$fr = $_SESSION['fk_empresa'];
$total = $control_s->getSucursales($fr);

include_once "../controles/dProgramadasControl.php";
$control = new DProgramadasControl();


/*$id = isset($_POST['cbxSuc']) ? $_POST['cbxSuc'] : '';
$resul = $control->getDetenciones($id);

$nom = isset($_POST['txtNp']) ? $_POST['txtNp'] : '';
$ms = $nom. $id;*/

?>
<!DOCTYPE html>
<html lang="es">
    <!-- Cabezera HTML-->
    <?php include "../inc/cabezera.php" ?>
    <script type="text/javascript">

        /****Funcion javaScript para selecionar detenciones programadas****/  
        $(document).ready(function(){

            $("#cbxSuc").change(function(){
                $("#cbxSuc option:selected").each(function () {
                    var cod_sucursal = $(this).val();
                    if(cod_sucursal == 'Seleccionar'){
                        alert('Selecione una socursal');
                        return false;
                    }
                    $.post("../inc/tblDprogramadas.php", { cod_sucursal: cod_sucursal }, function(data){
                        $("#tblDetenciones").html(data);
                    });         
                });
            })

        });
        /*=============================================================*/

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
                            $("#tblDetenciones").html(data);

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

        /*** Funcion ajax para agregar una detencion programada****/
        $(document).ready(function(){

            $(document).on('submit', '#frmDet', function(event){
                event.preventDefault();
                var cbx_suc = $('#cbxSuc').val();
                var txtNp = $('#txtNp').val();
                if(cbx_suc == 'Seleccionar'){
                    alert('Selecione sucursal');
                }else{
                    $.ajax({
                        type: 'POST',
                        url:"formDp.php",
                        data:{
                            'cbxSuc':cbx_suc,
                            'txtNp':txtNp
                        }
                    })
                        .done(function(data){
                        $("#test").html(data);
                    })
                    //alert(cbx_suc);
                }
            });
        });
        /*=============================================================*/
    </script>
    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>
            <div id="page-wrapper">

                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!--Combobox para selecionar una sucursal-->
                    <span id="test">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-lg-4 col-md-offset-2">
                                <h6 class="txtIni" for="">Seleccione para ver detenciones programadas</h6>
                                <form class="form-inline" action="" method="post" id="frmDet" name="frmDet">
                                    <div class="">
                                        <select class="selec" name="cbxSuc" id="cbxSuc">
                                            <option>Seleccionar</option>
                                            <?php foreach($total as $row) { ?>
                                            <option value="<?php echo $row['cod_sucursal']; ?>"><?php echo $row['nom_sucursal']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-inline">
                                        <label class="txtIni" for="txtProgra">Agregar detencion programada</label>
                                        <input type="text" class="form-control" name="txtNp" id="txtNp" required>
                                        <input type="submit" class="btn btn-primary btnHome" title="añadir detencion" id="btnDetencion" value="+">
                                        <a class="btn btn-primary btnclose" href="dProgramadas.php" role="button"><i class="fa fa-retweet"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="table-responsive" id="tblDetenciones"></div>
                            </div>
                        </div>
                    </span>
                </div>
                <!-- /.container-fluid -->
            </div>
            <?php include '../inc/footer.php'; ?>
            <!-- /#page-wrapper -->
        </div>
        <!-- Pie de pagina -->

        <!-- /#wrapper -->
    </body>
</html>