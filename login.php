
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel='icon' href='http://example.com/favicon.ico' type='image/x-icon'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>- Login Oee -</title>
        <script src="lib/js/jquery.min.js"></script>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link href="lib/css/sb-admin.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <style>
            .text-primary{
                text-align: center;
            }
            a{
                text-decoration:none;
                margin-left: 60%;
                font-size: 12px;
            }

        </style>
    </head>

    <body>

        <?php
          include_once "controles/cuentaControl.php";
        ?>
        <?php
         include 'inc/loginForm.php';
        ?>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>

        <script src="lib/js/particles.min.js"></script>
        <script src="lib/js/app.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="lib/js/bootstrap.min.js"></script>

    </body>

</html>
