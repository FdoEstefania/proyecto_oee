<?php

$email = isset($_POST['txtMail']) ? $_POST['txtMail'] : ""; 
$pass = isset($_POST['txtPass']) ? $_POST['txtPass'] : "";
//echo $email.' '.$pass;
//$url = 'http://localhost:8080/proyecto_oee/servicios_rest/API/login.php?user=desarrollo3@svg.cl&pwd=12345';
$url = "http://localhost:8080/proyecto_oee/servicios_rest/API/login.php?user={$email}&pwd={$pass}";

//$JSON = ($url);
$datos = json_decode(file_get_contents($url), true);
$users = $datos['usuario'];
if($users)
{
    var_dump($users);
    //header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Servicios | rest</title>
        <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
        <style>
            h1{text-align: center;}
        </style>
    </head>
    <body>
        <h1>Servicios <strong>REST</strong> </h1>
        <div class="container">
            <form class="form-inline" action="index.php" method="POST">
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" class="form-control"  name="txtMail">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="txtPass">
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
            <ul class="list-group">
                <?php
                foreach ($users as $user){
                    echo '<li class="list-group-item">
                    <a href="#" class="list-group-link" title="#">'.$user[0].'</a>
                </li>';
                }
                ?>
            </ul>

        </div>
    </body>
</html>