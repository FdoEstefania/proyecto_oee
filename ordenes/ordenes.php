<?php
include "../controles/ordenesControl.php";


session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | Ordenes";


?>
<!DOCTYPE html>
<html lang="es">
   <!-- Cabezera HTML-->
    <?php 
    include "../inc/cabezera.php";
    ?>
    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>

            <div id="page-wrapper" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5 class="txtIni" for="">Ordenes de trabajos</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-block">
                               <!-- Funciones PHP que carga los datos de ordenes de trabajo existentes-->
                                <?php include '../inc/tblOrdenes.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

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
        
        <!-- Funciones javascript que carga los datos de ordenes de trabajo existentes-->
        <script type="text/javascript" src="../js/ordenes.js">
        </script>
    </body>
</html>
