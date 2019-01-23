<?php
include_once "../controles/sucursalesControl.php";
$control = new SucursalesControl();

$fr = $_SESSION['fk_empresa'];
$total = $control->getSucursales($fr);

?>
<!-- Tabla HTML que muestar los datos de sucursales existentes -->
<table class="table table-bordered table-hover table-striped" id="tblS">
    <thead>
        <tr>
            <th scope="col">Nombre sucursal</th>
            <th scope="col">Direccion</th>
            <th>#</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($total as $row){ ?>
        <tr>
            <td><?php echo $row["nom_sucursal"] ;?></td>
            <td><?php echo $row["direc_sucursal"] ;?></td>
            <td style="width: 10%;">
                <a type="button" href="sucursales.php?cod_sucursal=<?php echo $row["cod_sucursal"] ;?>" name="btnEditar" class="btn btn-primary btnHome" id="" title="Editar"><i class="fa fa-edit"></i></a>
            </td>
            <td style="width: 10%;">
                <button type="button" name="btnElimina" class="btn btn-primary btnHome delete" id="<?php echo $row["cod_sucursal"] ;?>" title="Eliminar"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>

