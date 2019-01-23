

<meta charset="utf-8">
<link rel='icon' href='http://example.com/favicon.ico' type='image/x-icon'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="SVG" content="">

<title><?php echo $title;?></title>

<!--Estilo de tabla de datos-->
<link rel="stylesheet" href="../lib/css/datatables.min.css">

<!--Jquery version 2.4-->
<script src="../lib/js/jquery.min.js"></script>
<script src="../lib/js/highcharts.js"></script>
<script src="../lib/js/exporting.js"></script>
<!--<script src="../lib/jquery-ui/jquery-ui.js"></script>-->

<script type="text/javascript" src="../lib/js/datatables.min.js"></script>

<link href="../lib/jquery-ui/jquery-ui.css" rel="stylesheet">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="../lib/css/bootstrap.min.css">

<link href="../lib/css/sb-admin.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<style type="text/css">

</style>
<script>
    function cerrar(){
        var x = confirm("Cerrar sesion");
        if(x){
            location.href ="../index.php";
        }
    }
</script>
