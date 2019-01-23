<?php
include "../controles/ordenesControl.php";


session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
$title = "Admin Oee | Graficos";


?>
<!DOCTYPE html>
<html lang="es">
    <!-- Cabezera HTML-->
    <?php 
    include "../inc/cabezera.php";
    ?>
    <script type="text/javascript">
        $(function () {
            $('#container').highcharts({
                chart: {
                    zoomType: 'xy'
                },
                title: {
                    text: 'Estadisticas de produccion por turnos y fechas por maquinas'
                },
                subtitle: {
                    text: '-----------------------------------------------------------'
                },
                xAxis: [{
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Produccion',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, { // Secondary yAxis
                    title: {
                        text: 'Fecha',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value} ',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true
                }],
                tooltip: {
                    shared: true
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    x: 120,
                    verticalAlign: 'top',
                    y: 100,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                series: [{
                    name: 'Turno',
                    type: 'column',
                    yAxis: 1,
                    data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                    tooltip: {
                        valueSuffix: ' mm'
                    }

                }, {
                    name: 'Produccion',
                    type: 'spline',
                    data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                    tooltip: {
                        valueSuffix: '°C'
                    }
                }]
            });
        });
    </script>
    <body>
        <div id="wrapper">
            <!-- Navegacion HTML-->
            <?php include "../inc/navbar.php"?>

            <div id="page-wrapper" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h5 class="txtIni" for="">Graficos</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="card-block">
                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

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
        <script type="text/javascript" src="../js/">
        </script>
    </body>
</html>
