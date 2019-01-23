<?php
session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | home";

?>
<!DOCTYPE html>
<html lang="es">
    <?php include "../inc/cabezera.php" ?>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include "../inc/navbar.php"?>

            <div id="page-wrapper">

                <div class="container-fluid" style="">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-xl-12">
                            <hr>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="card-body text-center">
                                <h2 class="text-primary"></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-2">
                            <div class="card-block">
                                <a href="../sucursales/sucursales.php" class="btn btn-sq-lg btn-primary btnHome">
                                    <i class="fa fa-building fa-5x"></i><br/>
                                    Sucursales <br>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="card-block">
                                <a href="../maquinas/maquinas.php" class="btn btn-sq-lg btn-primary btnHome">
                                    <i class="fa fa-cogs fa-5x"></i><br/>
                                    Maquinas <br>
                                </a>
                            </div>
                        </div>
                         <div class="col-lg-2">
                            <div class="card-block">
                                <a href="../ordenes/ordenes.php" class="btn btn-sq-lg btn-primary btnHome">
                                    <i class="fa fa-briefcase fa-5x"></i><br/>
                                    Ordenes <br>
                                </a>
                            </div>
                        </div>
                        <!--<div class="col-md-2">
                            <div class="card-block">
                                <a href="#" class="btn btn-sq-lg btn-primary btnHome">
                                    <i class="fa fa-search fa-5x"></i><br/>
                                    Otros <br>
                                </a>
                            </div>
                        </div>-->
                    </div>
                    <!-- /.row -->

                </div>

                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            

        </div>
        <?php include '../inc/footer.php'; ?>
        <!-- /#wrapper -->

        <!-- jQuery -->
    </body>
</html>