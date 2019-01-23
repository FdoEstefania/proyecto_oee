<?php

include_once "../controles/sucursalesControl.php";

$control = new SucursalesControl();

/*-Metodo POST que permite registrar una nueva sucursal-*/
if (isset($_POST['txtNom']) && isset($_POST['txtDir']))
{
    session_start();
    $fk = $_SESSION['fk_empresa'];
    $nom = ucwords($_POST["txtNom"]);
    $dir = ucwords($_POST["txtDir"]);
    $control->addSucursal($nom, $dir, $fk);
    echo "La sucursal guarda correctamente!!".$nom;
    
}
/**-- =======================================--*/

/*Metodo GET que permite elinar una maquina */
if(isset($_GET["delete_sucursal"]))
{
    $id = $_GET["delete_sucursal"];
    $results = $control->deleteSucursal($id);
}
/**-- =======================================--*/

/*Metodo GET que permite selecionar una maquina */
$show_form = FALSE;
if(isset($_GET["cod_sucursal"]))
{
    $show_form = TRUE;
    $id = isset($_GET["cod_sucursal"]) ? $_GET["cod_sucursal"] : 0;
    $results = $control->getSucursal($id);
    $rs_d = $results[0];
}
/*Metodo GET para cancelar actualizacion */
if(isset($_GET['close'])){
    $show_form = FALSE;
}
/**-- =======================================--*/

/**-- Metodo POST para actualizar una sucursal--*/
if(isset($_POST['txtNombre']) && isset($_POST['txtDireccion']))
{
    if(!empty($_POST['txtNombre']) && !empty($_POST['txtDireccion']))
    {
        $nom = $_POST['txtNombre'];
        $dir = $_POST['txtDireccion'];
        $id = isset($_GET["cod_sucursal"]) ? $_GET["cod_sucursal"] : 0;
        $control->setSucursal($nom, $dir, $id);
        $show_form = FALSE;
    }
    else
    {
        echo "<script type='text/javascript'>
               $('document').ready(function(){
               $('#mdSucrsal').modal('show');
               });
               </script>";
    }
}

if($show_form)
{
/**-- =======================================--*/
?>
<!--Modal formulario para actualizar una sucursal -->
<div class="row ">
    <div class="col-xs-4 col-md-4 col-lg-4 col-md-offset-4">
        <form method="post">
            <h2 class="text-info"><i class="fa fa-edit"></i> Actualizar datos</h2>
            <div class="form-group">
                <label for="" class="">Nombre:</label>
                <input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="" value="<?php echo $rs_d['nom_sucursal'];?>">
            </div>
            <div class="form-group">
                <label for="" class="">Direccion:</label>
                <input type="text" name="txtDireccion" class="form-control " id="txtDireccion" placeholder="" value="<?php echo $rs_d['direc_sucursal'];?>">
            </div>
            <div class="col-md-offset-4">
                <input class="btn btn-primary btnHome" type="submit" value="Actualizar">
                <a class="btn btn-primary btnclose" href="sucursales.php?close"><i class="fa fa-times"></i></a>
            </div>
        </form>
    </div>
</div>
<!--========================================== -->
<hr>
<!--Modal de emergente de alerta de error -->
<div class="modal fade" id="mdSucrsal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="alert alert-danger small">Digite los datos</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!--========================================== -->
<?php } ?>
