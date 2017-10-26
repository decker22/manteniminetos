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

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_user.php">Mantenimientos Preventivos</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
              
         
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../cerrar.php?v=u"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <li >
                <br>
                <center><img src="../img/lg.png" class="img-rounded"  width="70%" height="70%">
                      <p><font color="white"><br><?php echo $_SESSION['usuario'];?></font></p>
                      </center>
                    </li>
                    <li class="active">
                        <a href="prog_mttos.php" ><i class="fa fa-fw fa-edit"></i> Mantenimiento</a>
                    </li>
                    <li class>
                        <a href="#ModalContacto" data-toggle="modal" data-target="#ModalContacto" id="footertext"><i class="fa fa-fw fa-wrench"></i> Contactar</a>
                    </li>
                    <li class>
                      <a href="#ModalAyuda" data-toggle="modal" data-target="#ModalAyuda"><i class="fa fa-fw fa-file-pdf-o"></i> Manual de ayuda </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    </div><!--Fin del div wrapper-->




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

<!-- Modal Ayuda-->
<div id="ModalAyuda" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ayuda</h4>
      </div>
      <div class="modal-body">
        <object height="950" data="../manuales/Manual de usuario.pdf" type="application/pdf" width="860">
  <pre id="politicas">Parece que no tiene el complemento para éste explorador.
   <a href="../manuales/Manual de usuario.pdf"> de click aquí para descargar el archivo PDF.</a>
  </pre>
</object><p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal Ayudaa-->
    </body>

 </html>