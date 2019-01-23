<?php
include "../controles/dnProgramadasControl.php";

$control = new DnProgramadasControl();

if(isset($_POST['cods']))
{
    $id = $_POST['cods'];
    $resul = $control->getMaquina($id);

    $maq = '<option>Seleccionar</option>';
    foreach($resul as $row){
        if($row["cod_maq"] == $id){
            $maq .= '<option selected value='.$row['cod_maq'].'>'.$row['nom_maq'].'</option>';
        }else{
            $maq .= '<option value='.$row['cod_maq'].'>'.$row['nom_maq'].'</option>';
        }
    }
    echo $maq;
}


/*-Metodo POST que permite registrar una nuev detencion no programada-*/
if (isset($_POST['txtnProgra']))
{
    $nom = ucwords($_POST["txtnProgra"]);
    $maq = $_POST['listMaq'];
    $control->addDnprogramada($nom, $maq );
    echo "Detencion guardada correctamente!!";
}
/**-- =======================================--*/

/*$x = new DnProgramadasControl();

$resul = $x->getMaquina('IBRMac002');

var_dump($resul);*/
?>










