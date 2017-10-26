<?php
    session_start();
    $em=$_GET['em'];
    if(($em=='ksmx' || $em=='ksgl' || $em=='ppt') and isset($_SESSION['it_user']))
    {
        include "menu_it.php";
        $_SESSION['empresa_admin']=$em;
        if($_SESSION['empresa_admin']=="ksmx")
              include ("../KSMX/tools_ksmx.php");
        $objeto= new tools();
        $objeto->m_conexion();  
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <!-- Estilo de los botones de mas detalles y minimisar detalles-->
        <style type="text/css">
            td.details-control {
                background: url('../img/details_open.png') no-repeat center center;
                cursor: pointer;
            }

            tr.shown td.details-control {
                background: url('../img/details_close.png') no-repeat center center;
            }

        </style>
    </head>
    <script type="text/javascript" charset="utf-8" async defer>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                ajax: "tabla_ingenieros.php",
                columns: [{
                        data: "id_inge"
                    },
                    {
                        data: "nombre"
                    },
                    {
                        data: "correo"
                    },
                    {
                        defaultContent: "<button type='button' class='detalle btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> <button type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'> </i></button>"
                    }

                ],
                select: true,

                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print']
            });
            datos(table);
            datos2(table);
        });


        var datos = function(table) {
            tbody = "#example";
            $(tbody).on("click", "button.detalle", function() {
                var data = table.row($(this).parents("tr")).data();
                // console.log(data.code);
                //alert(data.Folio);
                document.getElementById('userEditar').value = data.nombre;
                document.getElementById('iduserEditar').value = data.id_inge;
                document.getElementById('iduserold').value = data.id_inge;
                document.getElementById('correoEditar').value = data.correo;
                $("#modalEditar").modal();
                //window.location='editar_empleados.php?folio='+data.Id_empleado;  
            });
        }
        var datos2 = function(table) {
            tbody = "#example";
            $(tbody).on("click", "button.eliminar", function() {
                var data = table.row($(this).parents("tr")).data();
                // console.log(data.code);
                //alert(data.Folio);
                if (confirm("Esta seguro en eliminar el siguiente Ingeniero" + " " + data.nombre)) {
                    window.location = 'eliminar_ingenieros.php?id=' + data.id_inge;
                } else {}
            });
        }
        //Limpiar formulario de administrador 
        $(document).ready(function() {
            $('#btncerrar_usuarios1').click(function(event) {
                $('#formulario_usuarios').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#btncerrar_usuarios2').click(function(event) {
                $('#formulario_usuarios').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready
        //fin de limpiar formulario de administrador

    </script>
    <body>
        <!--Modal de DE INSERTAR USUARIO -->
        <div id="modalUsuario" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<input type="button" value="&times;" id='btncerrar'>-->
                        <button type="button" id="btncerrar_usuarios1" class="btn btn-danger close" data-dismiss="modal">&times;</button>

                        <?php
        if($_SESSION['empresa_admin']=="ksmx")
        echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-success">REGISTRAR INGENIERO DE KOLBENSCHMIDT </b></h4>';
     ?>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img src="../img/icon_employed.png" alt="">
                            <div class="input-group">
                                <h4>Para registrar un nuevo Ingeniero favor de llenar los siguientes campos</h4>
                            </div>
                        </center>
                        <form class="form-horizontal" id="formulario_usuarios" action="insertar_ingenieros.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Numero de Empleado:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="iduser" name="iduser" placeholder="# Empleado" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Usuario" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="correo">Correo:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@mx.rheinmetall.com" required>
                                </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btncerrar_usuarios2" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success" value="Registrar">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Fin de modal de INSERCION DE USUARIOS-->
        <!-- ---------------------------------------------------------------------------------------------- -->
        <!--Modal de DE EDITAR USUARIO -->
        <div id="modalEditar" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<input type="button" value="&times;" id='btncerrar'>-->
                        <button type="button" id="btncerrar_usuariosEdit1" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <?php
        if($_SESSION['empresa_admin']=="ksmx")
        echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-success">EDITAR INGENIERO DE KOLBENSCHMIDT </b></h4>';

     ?>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="formulario_usuarios" action="editar_ingenieros.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Numero de empleado:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="iduserEditar" name="idnew" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userEditar" name="usernew" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="correo">Correo:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="correoEditar" name="correonew" required>
                                </div>
                            </div>
                            
                    </div>
                    <input type="hidden" class="form-control" id="iduserold" name="idOld">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btncerrar_usuariosEdit2" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-info" value="Editar">
                    </div>
                    </form>
                </div>


            </div>
        </div>

        <!--Fin de modal de editar empleados-->


        <div id="wrapper">
            <div id="page-wrapper">

                <div class="container-fluid table-responsive">

                    <!-- Page Heading -->

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <img src="../img/logo.png" align="left">

                                <?php
                          if($_SESSION['empresa_admin']=='ksmx')
                          echo "<center><b class='text-success'>  INGENIEROS DE KOLBENSCHMIDT </b></center>";
                          ?>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="glyphicon glyphicon-level-up"></i> <a href="ingenieros.php?em=<?php echo $_SESSION['empresa_admin']; ?>">Ingenieros</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-edit"></i> Preventivos
                                </li>
                            </ol>
                        </div>
                    </div>

                    <?php
   if(isset($_GET['valor']) && $_GET['valor']=='e')
{
    ?>

                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" id="btncerra_alert" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
              </button>
                            <strong>Oh Error! </strong>Se detecto un error en la ejecuion.
                        </div>
                        <?php
}
if(isset($_GET['valor']) && $_GET['valor']=='s')
{

?>
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" id="btncerra_alert" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
              </button>
                                <strong>Exito..! </strong>Se realizaron los cambios con exito.
                            </div>

                            <?php
}
?>

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <button type="button" class="form-control  btn btn-info" data-toggle="modal" data-target="#modalUsuario">Nuevo Ingeniero</button>

                            </div>
                            <br>
                            <br>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th>Numero Usuario</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th width="80"></th>

                                    </tr>
                                </thead>
                            </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </body>
    </html>
    <?php
  }
  else
  {
    ?>
        <HEAD>
            <SCRIPT language="JavaScript1.1">
                location.replace('../cerrar.php');
                //-->
            </SCRIPT>
        </HEAD>
        <?php
  }
 ?>
