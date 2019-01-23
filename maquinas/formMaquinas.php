<?php
include "../controles/maquinasControl.php";

$control_m = new MaquinasControl();


/*-Metodo POST que permite registrar una nuev maquina-*/
if (isset($_POST['txtNom']) && isset($_POST['txtVel']) && isset($_POST['txtMod']))
{
    $suc = $_POST['cbxModal'];
    $nom = ucwords($_POST["txtNom"]);
    $vel = $_POST["txtVel"];
    $mod = ucwords($_POST['txtMod']);
    $control_m->addMaquina($nom, $vel, $mod, $suc);
    echo "Maquina guardada correctamente!!";
}
/**-- =======================================--*/

/*Metodo GET que permite selecionar una maquina */
$show_form = false;
if(isset($_GET["cod_maq"]))
{
    $show_form = TRUE;
    $id = isset($_GET["cod_maq"]) ? $_GET["cod_maq"] : 0;
    $results = $control_m->getMaquina($id);
    $rs_d = $results[0];
    
}
/**-- =======================================--*/

/**-- Metodo POST para actualizar una maquina--*/
if(isset($_GET['close'])){
    $show_form = FALSE;
}

if(isset($_POST['txtNombre']) && isset($_POST['txtVelocidad']) && isset($_POST['txtModelo']))
{
    if(!empty($_POST['txtNombre']) && !empty($_POST['txtVelocidad']) && !empty($_POST['txtModelo']))
    {
        $id = isset($_GET["cod_maq"]) ? $_GET["cod_maq"] : 0;
        $nom = $_POST['txtNombre'];
        $vel = $_POST['txtVelocidad'];
        $mod = $_POST['txtModelo'];
        $control_m->setMaquina($nom, $vel, $mod, $id);
        $show_form = FALSE;
    }
    else
    {
        echo "<script type='text/javascript'>
               $('document').ready(function(){

               $('#mdMaquina').modal('show');

               });
               </script>";
    }
}

if($show_form)
{
 /**-- =======================================--*/   
?>
<div class="row ">
    <div class="col-xs-4 col-md-4 col-lg-4 col-md-offset-3">
        <form method="post">
            <h2 class="text-info"><i class="fa fa-edit"></i> Actualizar datos</h2>
            <div class="form-group">
                <label for="txtNombre" class="">Nombre:</label>
                <input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="" value="<?php echo $rs_d['nom_maq'];?>">
            </div>
            <div class="form-group">
                <label for="txtVelocidad" class="">Velocidad:</label>
                <input type="text" name="txtVelocidad" class="form-control " id="txtVelocidad" placeholder="" value="<?php echo $rs_d['vel_func_maq'];?>">
            </div>
            <div class="form-group">
                <label for="txtModelo" class="">Modelo:</label>
                <input type="text" name="txtModelo" class="form-control " id="txtModelo" placeholder="" value="<?php echo $rs_d['mod_maq'];?>">
            </div>
            <div class="col-md-offset-4">
                <input class="btn btn-primary btnHome" type="submit" value="Actualizar">
                <a class="btn btn-primary btnclose" href="maquinas.php?close"><i class="fa fa-times"></i></a>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="modal fade" id="mdMaquina" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<?php } ?>