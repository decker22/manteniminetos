<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Mantenimiento de Equipo de Computo </title>
    <!--Componentes Adicionales-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Styles Prueba -->

    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 90%;
            margin: auto;
        }

    </style>
    <script>
        //Limpiar formulario de usuarios	
        $(document).ready(function() {
            $('#btncerrar_user').click(function(event) {
                $('#formulario_user').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#btncerrar_user2').click(function(event) {
                $('#formulario_user').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        //fin del limpiador del formulario de usuario 


        //Limpiar formulario de IT 
        $(document).ready(function() {
            $('#btncerrar_it1').click(function(event) {
                $('#formulario_it').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#btncerrar_it').click(function(event) {
                $('#formulario_it').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready
        //fin de limpiar formulario de IT

        //--------------------------------------------------------------------------------------------------------------------
        //funcion que regresa al modal de usuario si es que hay error.
        function funcion_error(valor_empresa) {
            var valor = valor_empresa;
            //document.form_user.empresa.value=valor;
            document.getElementById("input_user").value = valor;

            $("#modalUsuario").modal();
        }
        //funcion que regresa al modal de administrador si es que hay error.
        function funcion_error_it() {
            //var valor=valor_empresa;
            //document.getElementById("input_compras").value=valor;
            $("#modalIt").modal();
        }


        //------------------------------------------------------------------------------------------------------------------
        //Asignacioon del nombre de la empresa al input para saber a cual BD realizar la conexion de usuarios.
        $(document).ready(function() {
            $('#user_ksmx').click(function(event) {
                var valor = "ksmx";
                document.getElementById("input_user").value = valor;
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#user_ksgl').click(function(event) {
                var valor = "ksgl";
                document.getElementById("input_user").value = valor;
            }); //del clic sobre "nuevo"
        }); //de la funcion ready


        $(document).ready(function() {
            $('#user_ppt').click(function(event) {
                var valor = "ppt";
                document.getElementById("input_user").value = valor;
            }); //del clic sobre "nuevo"
        }); //de la funcion ready
        //fin de asignacion de empresas por usuario

    </script>
</head>

<body>
    <!--Parte de la cabecera de la pagina-->
    <header id="header" class="" pos>
        <div class="container">
            <div class="row bottom-rule">
                <div class="col-sm-12">
                    <img src="img/cabecera4.jpg" width="100%" alt="">
                    <br><br>
                    <nav class="navbar navbar-inverse ">
                        <ul class="nav navbar-nav">
                            <li><a href="#modalUsuario" data-toggle="modal" data-target="#modalUsuario" id="user_ksmx">Kolbenschmidt de México</a></li>
                            <li><a href="#modalUsuario" data-toggle="modal" data-toggle="modalUsuario" id="user_ksgl">KS Gleitlager de México</a> </li>
                            <li><a href="#modalUsuario" data-toggle="modal" data-toggle="modalUsuario" id="user_ppt">Pierburg Pump Technology </a> </li>
                            <li><a href="#modalIt" data-toggle="modal" data-target="#modalIt" id="footertext">Administrador de sitio</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--Parte de menu de navegacion-->

    <nav>
        <!--Formulario de usuario -->
        <!-- Modal de usuario-->
        <!-- Modal de usuario-->
        <div id="modalUsuario" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">


                    <div class="modal-body">
                        <button type="button" id="btncerrar_user" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" align="left"> <img src="img/logo.png"> </h4>
                        <center>
                            <img src="img/user2.png" alt="">
                            <div class="input-group">
                                <h4>Ingresa Tu Numero de Empleado Para Accesar</h4>
                            </div>
                        </center>
                        <form class="form-horizontal" id="formulario_user" action="usuarios/validar.php" method="post" accept-charset="utf-8" name="form_user">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user"><span class="glyphicon glyphicon-user"></span> Usuario:</label>
                                <div class="col-sm-10">

                                    <input type="number" class="form-control" id="user" name="usuario" placeholder="Usuario" required>
                                </div>
                            </div>
                            <input type="hidden" name="empresa" value="" id="input_user">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btncerrar_user2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>  Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- End the Modal usuarios-->

        <!--Modal de Login de ADMINISTRADOR IT-->
        <div id="modalIt" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <!--<input type="button" value="&times;" id='btncerrar'>-->
                        <button type="button" id="btncerrar_it1" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title" align="center"> <img src="img/logo.png"></h2>
                        <center><img src="img/it.png" width="40%"></center>


                        <center>
                            <img class="fa-terminal on fa-square" alt="">
                            <div class="input-group">

                            </div>
                        </center>
                        <form class="form-horizontal" id="formulario_it" action="it/validar.php" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user"><span class="glyphicon glyphicon-user"></span> Usuario:</label>

                                <div class="col-sm-10" aling="center">

                                    <input type="text" class="form-control" id="user" name="user_it" placeholder="Usuario" required>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd"><span class="glyphicon glyphicon-lock"></span> Password:</label>
                                <div class="col-sm-10">

                                    <input type="password" class="form-control" id="pwd" name="pass_it" placeholder="Introducir password" required>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" id="btncerrar_it" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Fin de modal de login de vigilancia-->
    </nav>

    <!--_________________________________________________________________________________________________________________-->

    <section>
        <div class="container ">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-slide-to="0" class="active"></li>
                    <li data-slide-to="1"></li>
                    <li data-slide-to="2"></li>
                    <li data-slide-to="3"></li>
                    <li data-slide-to="4"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/1.jpg" alt="Flower" style="width:100%">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/2.jpg" alt="Flower" style="width:100%">
                    </div>
                    <div class="item">
                        <img src="img/3.jpg" alt="Flower" style="width:100%">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/4.jpg" alt="Flower" style="width:100%">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">

                        <img src="img/5.jpg" alt="Flower" style="width:100%">
                        <div class="carousel-caption">
                        </div>

                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
            </div>
        </div>

    </section>

    <br>


    <!--Parte de pie de pagina-->
    <footer>
        <!--Pie de pagina-->
        <div class="container">
            <div class="row bottom-rule">
                <div class="col-sm-12">
                    <nav class="navbar navbar-inverse ">
                        <ul class="nav navbar-nav">
                            <li><a href="#ModalTYC" data-toggle="modal" data-target="#ModalTYC" id="footertext">Términos y condiciones</a></li>
                            <li><a href="mailto:heat@us.rheinmetall.com?Subject=Hello%20again" target="_top" id="footertext">Reportar un problema</a></li>
                            <li><a href="#ModalAyuda" data-toggle="modal" data-target="#ModalAyuda" id="footertext">Ayuda</a></li>
                            <li><a href="#ModalPoli" data-toggle="modal" data-target="#ModalPoli" id="footertext">Políticas de privacidad</a></li>
                            <li><a href="#ModalContacto" data-toggle="modal" data-target="#ModalContacto" id="footertext">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

    </footer>
    <?php  
if(isset($_GET['error']) && $_GET['error']=="error")
{
	$empresa=$_GET['btn'];
    ?>

    <div class="alert alert-danger" role="alert" style="position:absolute; top:35%; width:100%;">
        <button type="button" class="close" id="btncerra_alert" data-dismiss="alert" aria-label="Close" onclick="funcion_error(<?php echo $empresa; ?>)">
             <span aria-hidden="true">&times;</span>
              </button>

        <strong>Oh Error!</strong> numero de usuario incorrecto.
    </div>


    <?php

}
    
if(isset($_GET['error_it']) && $_GET['error_it']=='error_it')
{
    ?>

        <div class="alert alert-danger" role="alert" style="position:absolute; top:35%; width:100%;">
            <button type="button" class="close" id="btncerra_alert" data-dismiss="alert" aria-label="Close" onclick="funcion_error_it()">
             <span aria-hidden="true">&times;</span>
              </button>

            <strong>Oh Error! </strong>nombre de usuario o contraseña son incorrecto, favor de validar.
        </div>

        <?php

}
if(isset($_GET['error_recu']) && $_GET['error_recu']=='error_recu')
{
	$empresa=$_GET['em'];
    ?>

            <div class="alert alert-danger" role="alert" style="position:absolute; top:35%; width:100%;">
                <button type="button" class="close" id="btncerra_alert" data-dismiss="alert" aria-label="Close" onclick="funcion_error_recupera(<?php echo $empresa; ?>)">
             <span aria-hidden="true">&times;</span>
              </button>

                <strong>Oh Error! </strong>El numero de usuario es incorrecto no exite en la base de datos
            </div>

            <?php

}
?>
</body>

</html>
