<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mantenimientos Preventivos</title>
    <?php
        include("../complements.php");
   ?>
</head>

<script type="text/javascript" charset="utf-8" async defer>
    $(function() {

        // elementos de la lista
        var menues = $(".nav li");

        // manejador de click sobre todos los elementos
        menues.click(function() {
            // eliminamos active de todos los elementos
            menues.removeClass("active");
            // activamos el elemento clicado.
            $(this).addClass("active");
        });

    });

</script>

<body>

    <div id="wrapper">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="principal_it.php">ADMINISTRACION IT PREVENTIVOS</a>
            </div>
            <!-- Top Menu Items MENSAJES -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> IT <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="../cerrar.php?v=it"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <li >
                <center><img src="../img/it.png" width="100%" height="100%">
                      <p><font color="white">Bienvenido </font></p>
                      </center>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-suitcase fa-fw"></i> KOLBENSCHMIDT <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="usuarios.php?em=ksmx"><i class="glyphicon glyphicon-user text-info"></i><b class="text-info"> Usuarios</b></a>
                            </li>
                            <li>
                                <a href="Departamentos.php?em=ksmx"><i class="glyphicon glyphicon-folder-close text-warnning"></i><b class="text-warnning"> Departamento</b></a>
                            </li>
                            <li>
                                <a href="mantenimientos.php?em=ksmx"><i class="fa fa-fw fa-wrench text-success"></i><b class="text-success"> Mantenimientos</b></a>
                            </li>
                            <li>
                                <a href="aceptacion.php?em=ksmx"><i class="fa fa-fw fa-thumbs-up text-danger"></i><b class="text-danger"> Aceptacion</b></a>
                            </li>
                            <li>
                                <a href="eficacia.php?em=ksmx"><i class="fa fa-bar-chart-o text-warning"></i><b class="text-warning"> Eficacia</b></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-suitcase"></i> GLEITLAGER<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="usuarios.php?em=ksgl"><i class="glyphicon glyphicon-user text-info"></i><b class="text-info"> Usuarios</b></a>
                            </li>
                            <li>
                                <a href="Departamentos.php?em=ksgl"><i class="glyphicon glyphicon-folder-close text-warnning"></i><b class="text-warnning"> Departamento</b></a>
                            </li>
                            <li>
                                <a href="mantenimientos.php?em=ksgl"><i class="fa fa-fw fa-wrench text-success"></i><b class="text-success"> Mantenimientos</b></a>
                            </li>
                            <li>
                                <a href="aceptacion.php?em=ksgl"><i class="fa fa-fw fa-thumbs-up text-danger"></i><b class="text-danger"> Aceptacion</b></a>
                            </li>
                            <li>
                                <a href="eficacia.php?em=ksgl"><i class="fa fa-bar-chart-o text-warning"></i><b class="text-warning"> Eficacia</b></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-suitcase"></i> PIERBURG<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                           <li>
                                <a href="Usuarios.php?em=ppt"><i class="glyphicon glyphicon-user text-info"></i><b class="text-info"> Usuarios</b></a>
                            </li>
                            <li>
                                <a href="Departamentos.php?em=ppt"><i class="glyphicon glyphicon-folder-close text-warnning"></i><b class="text-warnning"> Departamento</b></a>
                            </li>
                             <li>
                                <a href="mantenimientos.php?em=ppt"><i class="fa fa-fw fa-wrench text-success"></i><b class="text-success"> Mantenimientos</b></a>
                            </li>
                            <li>
                                <a href="aceptacion.php?em=ppt"><i class="fa fa-fw fa-thumbs-up text-danger"></i><b class="text-danger"> Aceptacion</b></a>
                            </li>
                            <li>
                                <a href="eficacia.php?em=ppt"><i class="fa fa-bar-chart-o text-warning"></i><b class="text-warning"> Eficacia</b></a>
                            </li>
                        </ul>
                    </li>
                     <li>
                    <a href="ingenieros.php?em=ksmx"><i class="glyphicon glyphicon-globe"></i> Ingenieros</a>
                    </li>
                    <li>
                        <a href="#ModalContacto" data-toggle="modal" data-target="#ModalContacto" id="footertext"><i class="fa fa-fw fa-wrench"></i> Contactar</a>
                    </li>

             
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    </div>
    <!--Fin del div wrapper-->




    <!-- Modal Contacto-->
    <div id="ModalContacto" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Contacto</h4>
                </div>

                <div class="modal-body">
                    <pre id="contacto"><b>Fernando Velázquez</b>
           Gerente de Infraestructura de TI
           <a href="mailto:fernando.velazquez@mx.rheinmetall.com?Subject=Hola Fernando Velázquez" target="_top" id="email">fernando.velazquez@mx.rheinmetall.com</a></pre>

                    <pre id="contacto"><b>Félix Flores</b>
          Ingeniero en Infraestructura de TI
           <a href="mailto:felix.flores@mx.rheinmetall.com?Subject=Hola Félix Flores" target="_top" id="email">felix.flores@mx.rheinmetall.com</a></pre>

                    <pre id="contacto"><b>Raúl Arroyo</b>
          Ingeniero en Soporte de TI
           <a href="mailto:raul.arroyo@mx.rheinmetall.com?Subject=Hola Raúl Arroyo" target="_top" id="email">raul.arroyo@mx.rheinmetall.com</a></pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal Contacto-->

</body>

</html>
