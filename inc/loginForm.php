<?php
$control = new CuentaControl();

if(isset($_SESSION["tipo"])){
    header("location: home/home.php");
}
/*--Funcion que consulta la base de datos para el inicio de session --*/
$msg = '';
if(isset($_REQUEST["btnLogin"]))
{
    $email = $_REQUEST['txtMail'];
    $retorno = $control->getCuenta($email);
    if($retorno)
    {
        foreach($retorno as $row)
        {
            if(password_verify($_POST["txtPass"], $row["contrasena_usu"]) or $_POST["txtPass"] == $row["contrasena_usu"])
            {
                session_start();
                $_SESSION['tipo'] = $row['tipo_usu'];
                $_SESSION['correo_usu'] = $row['correo_usu'];
                $_SESSION["nom_usu"] = $row['nom_usu'];
                $_SESSION["ape_usu"] = $row['ape_usu'];
                $_SESSION['tel_usu'] = $row['tel_usu'];
                $_SESSION['fk_empresa'] = $row['fk_empresa'];
                header("location: home/home.php");
            }else{
                $msg = '<p class="alert alert-danger small" role="alert"><b>acceso denegado, </b>no se pudo comprobar la contraseña</p>';
            }
        }
    }else{
        $msg = '<p class="alert alert-danger small" role="alert"><b>acceso denegado, </b>no se pudo comprobar el correo</p>';
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-offset-4">
            <span><?php echo $msg;?></span>
            <div class="card card-outline-info mb-2 text-center">
                <h1 class=""><img src="lib/images/logo-png.png" style="margin-left:10%" alt="logo"></h1>
                <div class="card-block">
                    <form method="post">
                        <label for="txtMail" class="txtIni">Correo <span>*</span></label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-square"></i></span>
                            <input type="email" class="form-control" name="txtMail" id="txtMail" placeholder="e-mail" required autofocus>
                        </div>
                        <label for="txtPass" class="txtIni">Contraseña <span>*</span></label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="password" >
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btnLogin" class="btn btn-sm btnini" style="margin-left: 30%;" value="Iniciar sesión" title="inicio">
                        </div>
                        <div class="form-group">
                            <a href="#" data-toggle="modal" style="margin-left: 30%;" data-target="#">Recuperar contraseña</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
