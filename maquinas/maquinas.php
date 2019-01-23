<?php
session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | Maquinas";

include "../controles/sucursalesControl.php";

$control_s = new SucursalesControl();

$fr = $_SESSION['fk_empresa'];
$total = $control_s->getSucursales($fr);


?>
<!DOCTYPE html>
<html lang="es">
    <!-- Cabezera HTML-->
    <?php 
    include "../inc/cabezera.php";
    ?>
    <!--javascript para el modulo maquina-->
    <script type="text/javascript" src="../js/maquina.js"></script>
    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- /.row -->
                    <hr>
                    <div class="row">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2" align="right">
                            <a class="btn btn-primary btnHome" href="#" data-toggle="modal" data-target="#mdMaq"><i class="fa fa-plus"></i>Añadir</a>
                        </div>
                    </div>
                    <!-- Metodos POST para agragar maquinas-->
                    <?php include "formMaquinas.php"; ?>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-4">
                            <h6 class="txtIni" for="">Seleccione para ver maquinas</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4">
                            <form action="post">
                                <div class="form-group">
                                    <select class="form-control" name="cbxSuc" id="cbxSuc">
                                        <option>Seleccionar</option>
                                        <?php foreach($total as $row){ ?>
                                        <option value="<?php echo $row['cod_sucursal']; ?>"><?php echo $row['nom_sucursal']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="card-block">
                                <!-- Funciones PHP que carga los datos de maquinas existentes-->
                                <div class="table-responsive" id="tblMaquinas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal emergente que añade una suursal nueva -->
                    <div class="modal fade" id="mdMaq"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-3">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id=""><i class="fa fa-edit"></i> Añadir maquina</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form method="post" id="frmMaq">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="txtNom">Sucursal</label>
                                                        <select class="form-control" name="cbxModal" id="cbxModal">
                                                            <option>Seleccionar</option>
                                                            <?php foreach($total as $row){ ?>
                                                            <option value="<?php echo $row['cod_sucursal']; ?>"><?php echo $row['nom_sucursal']; ?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtNom">Nombre maquina</label>
                                                        <input type="text" class="form-control" name="txtNom" id="txtNom" placeholder="Nombre"  autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtVel">Volocidad Funcionaniento</label>
                                                        <input type="text" class="form-control" name="txtVel" id="txtVel" placeholder="velocidad" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtMod">Modelo de maquina</label>
                                                        <input type="text" class="form-control" name="txtMod" id="txtMod" placeholder="modelo" >
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btnclose" data-dismiss="modal">cerrar</button>
                                                    <button type="submit" class="btn btn-primary btnHome">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- Pie de pagina -->
        <?php include '../inc/footer.php'; ?>
    </body>
</html>
