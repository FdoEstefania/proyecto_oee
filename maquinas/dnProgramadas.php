<?php

session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | home";

include "../controles/sucursalesControl.php";
$control_s = new SucursalesControl();
$fr = $_SESSION['fk_empresa'];
$total = $control_s->getSucursales($fr);

?>
<!DOCTYPE html>
<html lang="es">
    <!-- Cabezera HTML-->
    <?php include "../inc/cabezera.php" ?>

    <script type="text/javascript">

        $(document).ready(function(){
            ////*******metodo javaScript para selecionar sucursal existente******////
            $('#listSuc').on('change', function(){
                var cods = $('#listSuc').val();
                //alert(cod);
                $.ajax({
                    type: 'POST',
                    url: 'formDnp.php',
                    data: {'cods': cods}
                })
                    .done(function(lisq){
                    //alert(lisq);
                    $('#listMaq').html(lisq);
                })
                    .fail(function(){
                    alert('Hubo un errror al cargar los Datos');
                })
            });
            ////*=============================================*////

            /////******metodo javaScript para selecionar maquina existente*****////
            $('#listMaq').on('change', function(){
                var codm = $('#listMaq').val();
                //alert(codm);
                $.ajax({
                    type: 'POST',
                    url: '../inc/tbldnProgramadas.php',
                    data: {'codm': codm}
                })
                    .done(function(lismaq){
                    //alert(lisq);
                    $('#tblDetencionesNp').html(lismaq);
                })
                    .fail(function(){
                    alert('Hubo un errror al cargar los Datos');
                })
            });
            /////******==================================================*****//////

            ///////*****metodo javaScript para agragar una detenciones no programadas******//////
            $(document).on('submit', '#frmDetnp', function(event){
                event.preventDefault();
                var maq = $('#listMaq').val();
                var nom = $('#txtnProgra').val();
                //alert(nom + maq);
                if(maq == 'Seleccionar'){
                    alert('Selecione una Maquina');
                    return false;
                }
                if(nom != '')
                {
                    $.ajax({
                        type: 'POST',
                        url:"formDnp.php",
                        data:{
                            'txtnProgra':nom,
                            'listMaq':maq
                        }
                    })
                        .done(function(data){
                        alert(data);
                        $('#txtnProgra')[0].reset();
                        //$("#tblDetencionesNp").load(" #tblDetencionesNp");

                    })
                        .fail(function(xhr) {
                        alert('hubo un error!!!');
                    })
                }
                else{
                    alert('Debe ingresar un nombre');
                }
            });
            /////*****================================================****/////

            /*** Funcion ajax para eliminar una detencion no programada****/
            $(document).ready(function(){

                $(document).on('click', '.delete_dp', function(){
                    var codDn = $(this).attr("id");
                    if(confirm("Eliminar detencion programada?"))
                    {
                        //alert(codD);
                        $.ajax({
                            url:"../inc/tbldnProgramadas.php",
                            method:"POST",
                            data:{codDn:codDn},
                            success:function(data){
                                $("#tblDetencionesNp").html(data);

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
        });

    </script>
    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>

            <div id="page-wrapper">

                <div class="container-fluid">
                    <!--Metodoas POST y GET para las detenciones no programadas-->
                    <?php include 'formDnp.php'; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-md-12">
                            <!--<h2 class="text-default col-md-offset-2">Detenciones no programadas</h2>-->
                            <div class="card-block">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                            <h6 class="txtIni" for="">Seleccione sucursal</h6>
                            <div class="form-group">
                                <select class="form-control" name="listSuc" id="listSuc">
                                    <option selected>Seleccionar</option>
                                    <?php foreach($total as $row){ ?>
                                    <option selected value="<?php echo $row['cod_sucursal']; ?>"><?php echo $row['nom_sucursal']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <form action="post" id="frmDetnp">
                                <h6 class="txtIni" for="">Seleccione maquina</h6>
                                <div class="form-group">
                                    <select class="form-control" name="listMaq" id="listMaq"></select>
                                </div>
                                <label class="txtIni" for="txtProgra">Agregar detencion no programada</label>
                                <div class="form-inline">
                                    <input type="text" class="form-control" name="txtProgra" id="txtnProgra" required>
                                    <input type="submit" class="btn btn-primary" value="+" title="añadir detencion">
                                    <input type="reset" class="btn btn-danger" value="X" title="reset">
                                </div>
                            </form> 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="table-responsive" id="tblDetencionesNp"></div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Pie de pagina -->
        <?php include '../inc/footer.php'; ?>
        <!--  -->
    </body>
</html>