<?php
session_start();
if(isset($_SESSION["tipo"]) != 'desarrollador'){
    header("location: ../index.php");
}
//Varia ble de sesion de inicio

$nom = $_SESSION["nom_usu"];
$ape = $_SESSION["ape_usu"];
$tel = $_SESSION['tel_usu'];

$title = "Admin Oee | index";
?>
<!DOCTYPE html>
<html lang="es">

    <?php include "../inc/cabezera.php" ?>

    <body>
        <div id="wrapper">
            <?php include "../inc/navbar.php";?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-xl-12">
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6 col-md-offset-2">
                            <?php  include 'formUser.php'; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-12">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <?php include '../inc/footer.php'; ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#form_perfil").on('submit', function(event){
                    event.preventDefault();
                    var confir = confirm('Actualizar datos');
                    if(confir){
                        var pssw = $("#txtPass").val();
                        var rpssw = $('#txtRePass').val();
                        if(pssw != "" )
                        {
                            if(pssw != rpssw)
                            {
                                $('#error').html('<label class="text-danger">Las contraseñas no coinciden</label>');
                                return false;
                            }
                            else
                            {
                                $('#error').html('');
                            }
                        }
                        $("#btnPerfil").attr('disabled', 'disabled');
                        var frm = $(this).serialize();
                        $("#txtRePass").attr('required',false);
                        $.ajax({
                            url:"../inc/userForm.php",
                            method:"POST",
                            data:frm,
                            success:function(data)
                            {
                                $("#btnPerfil").attr('disabled', false);
                                $("#txtPass").val('');
                                $("#txtRePass").val('');
                                $("#msg").html(data);
                            }
                        })
                    }
                });
            });
        </script>
    </body>
</html>