<?php
include_once "../controles/userControl.php";

$control = new UserControl();

$mail = $_SESSION['correo_usu'];
$results = $control->getUser($mail);
$rs_d = $results[0];
$nom = $rs_d['nom_usu'];
$ape = $rs_d['ape_usu'];
$id =  $rs_d['correo_usu'];

?>

<div class="card-block">
    <div class="table-responsive">
        <form action="" id="form_perfil" method="post">
            <table class="table txtIni">
                <tbody>
                    <tr>
                        <td>
                        </td>
                        <td>
                             <span id="msg"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Modificar Telefono</td>
                        <td><div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" class="form-control" name="txtTel" id="txtTel" value="<?php echo $rs_d['tel_usu']; ?>" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Nueva contraseña</td>
                        <td><div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="txtPass"  id="txtPass" pattern=".{4,}" title="Contraseña ( min . 4 caracteres)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Re-enter contraseña</td>
                        <td><input type="password" class="form-control" name="txtRePass" id="txtRePass" pattern=".{4,}"></td>
                        <span id="error"></span>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="" class="text-center">Deje la contraseña en blanco si no se actualiza</label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnPerfil" id="btnPerfil" value="Actualizar" class="btn btn-primary btnHome btn-block"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>