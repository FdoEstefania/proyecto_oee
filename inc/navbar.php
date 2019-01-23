<nav class="navbar navbard navbar-fixed-top">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button class="navbar-toggler hidden-sm-up pull-sm-right" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            &#9776;
        </button>
        <a class="navbar-brand" href="../home/home.php"><h1><img src="../lib/images/logo-home-png.png" style="margin-top:-15%" class="img-fluid" alt="logos"></h1></a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-nav top-nav navbar-right pull-xl-right">
        <li class="dropdown nav-item">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i> / <?php echo $_SESSION["nom_usu"]." ".$_SESSION["ape_usu"];?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <a href="../user/user.php" ><i class="fa fa-fw"  onclick="" id=""></i>Actualizar datos</a>
                </li>
            </ul>
        </li>
        <li class="dropdown nav-item">
            <a href="#" onclick="cerrar()" id="btnClose" class="nav-link " data-toggle="dropdown"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar sesion</a>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-toggleable-sm navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav list-group">
            <li class="list-group-item">
                <a href="#"></a>
            </li>
            <li class="list-group-item">
                <a href="../home/home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#suc"><i class="fa fa-fw fa-building"></i> Sucursales <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="suc" class="list-group collapse">
                    <li class="list-group-item">
                        <a href="../sucursales/sucursales.php" class=""> Sucursales existentes</a>
                    </li>
                    <li class="list-group-item">
                        <a href="../sucursales/dProgramadas.php" class=""> D. programadas</a>
                    </li>
                </ul>

            </li>
            <li class="list-group-item">
                <a href="#" data-toggle="collapse" data-target="#maq"><i class="fa fa-fw fa-cogs"></i> Maquinas <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="maq" class="list-group collapse">
                    <li class="list-group-item">
                        <a href="../maquinas/maquinas.php" class=""> Maquinas existentes</a>
                    </li>
                    <li class="list-group-item">
                        <a href="../maquinas/dnProgramadas.php" class=""> D. no programadas</a>
                    </li>
                </ul>
            </li>
            <li class="list-group-item">
                <a href="../graficos/graficos.php"><i class="fa fa-fw fa-bar-chart-o"></i> Graficos</a>
            </li>
            <li class="list-group-item">
                <a href="../ordenes/ordenes.php"><i class="fa fa-briefcase"></i> Ordenes</a>
            </li>
            <li class="list-group-item">
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Otros <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="list-group collapse">
                    <li class="list-group-item">
                        <a href="javascript:;"> Item</a>
                    </li>
                    <li class="list-group-item">
                        <a href="javascript:;"> Item</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
