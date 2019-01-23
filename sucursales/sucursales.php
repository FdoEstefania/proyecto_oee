<?php


session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | Sucursales";

?>
<!DOCTYPE html>
<html lang="es">
    <!-- Cabezera HTML-->
    <?php include "../inc/cabezera.php" ?>

    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>
            <div id="page-wrapper">
                <div class="container-fluid bdModulos">
                    <!-- /.row -->
                    <hr>
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <a class="btn btn-primary btnHome col-offset-md-10" data-toggle="modal" data-target="#mdSuc" href="#"><i class="fa fa-plus"></i> Añadir</a>
                        </div>
                    </div>
                    <!-- Metodos POST para agragar suscursales-->
                    <?php include "formSucursal.php"; ?>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-block">
                                <!-- Funciones PHP que carga los datos de sucursales existentes-->
                                <?php include '../inc/tblSucursal.php'; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Modal emergente para registrar una nueva sucursal-->
                    <div class="modal fade" id="mdSuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title txtIni" id=""><i class="fa fa-edit"></i> Añadir sucursal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form method="post" id="frmSuc">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="txtIni" for="">Nombre sucursal</label>
                                            <input type="text" class="form-control" name="txtNom" id="txtNom" placeholder="Nombre"  autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label class="txtIni" for="">Direccion sucursal</label>
                                            <input type="text" class="form-control" name="txtDir" id="txtDir" placeholder="Direccion" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btnclose" data-dismiss="modal">cerrar</button>
                                        <button type="submit" class="btn btn-primary btnHome">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Pie de pagina -->
        <?php include '../inc/footer.php'; ?>

        <!--Funcion ajax metodo POST para buscar sucursales-->
        <script src="../js/sucursal.js"></script>
    </body>
</html>
