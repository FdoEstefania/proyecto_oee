<?php


$id = $_SESSION['fk_empresa'];
$control = new OrdenesControl();
$retorno = $control->getOrdenes($id);

?>
 <!-- Tabla HTML que muestar los datos de ordenes existentes-->
<table class="table table-hover table-bordered table-striped" id="tblOrden">
    <thead>
        <tr>
            <th scope="col">N° orden</th>
            <th scope="col">Cod. articulo</th>
            <th scope="col">T. lote</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($retorno as $row){ ?>
        <tr>
            <td scope="row"><?php echo $row["num_orden"] ;?></td>
            <td><?php echo $row["cod_articulo"] ;?></td>
            <td><?php echo $row["tamano_lote"] ;?></td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>