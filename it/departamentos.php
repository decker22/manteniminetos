<?php
session_start();
$em=$_GET['em'];
if(($em=='ksmx' || $em=='ksgl' || $em=='ppt') and isset($_SESSION['it_user']))
{
    include "menu_it.php";
    $_SESSION['empresa_admin']=$em;
    if($_SESSION['empresa_admin']=="ksmx")
        include ("../KSMX/tools_ksmx.php");
    if($_SESSION['empresa_admin']=="ksgl")
        include ("../KSGL/tools_ksgl.php");
    if($_SESSION['empresa_admin']=="ppt")
        include("../PPT/tools_ppt.php");
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
                ajax: "tabla_departamento.php",
                columns: [{
                        data: "id_dpto"
                    },
                    {
                        data: "nom_dpto"
                    },
                    {
                        data: "gerente"
                    },
                    {
                        defaultContent: "<button type='button' class='detalle btn btn-warning'><i class='fa fa-pencil-square-o'></i></button> <button type='button' class='eliminar btn btn-danger'><i class='glyphicon glyphicon-remove-sign'> </i></button>"
                    }
                ],
                select: true,

                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            });
            datos(table);
            datos2(table);
        });
        var datos = function(table) {
            tbody = "#example";
            $(tbody).on("click", "button.detalle", function() {
                var data = table.row($(this).parents("tr")).data();
                document.getElementById('idOld').value = data.id_dpto;
                document.getElementById('idnombre').value = data.nom_dpto;
                document.getElementById('idgerente').value = data.gerente;
                $("#modalEditar").modal();
            });
        }
        var datos2 = function(table) {
            tbody = "#example";
            $(tbody).on("click", "button.eliminar", function() {
                var data = table.row($(this).parents("tr")).data();
                if (confirm("Esta seguro en eliminar el siguiente departamento" + " " + data.Nom_depto)) {
                    window.location = 'eliminar_departamentos.php?id=' + data.id_dpto;
                } else {

                }
            });
        }
        //Limpiar formulario de administrador 
        $(document).ready(function() {
            $('#btncerrar_empleados1').click(function(event) {
                $('#formulario_depto').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#btncerrar_emleados2').click(function(event) {
                $('#formulario_depto').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready
        //fin de limpiar formulario de administrador
    </script>
    <body>
        <!--Modal de DE INSERTAR USUARIO -->
        <div id="modalDepto" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<input type="button" value="&times;" id='btncerrar'>-->
                        <button type="button" id="btncerrar_empleados1" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <?php
        if($_SESSION['empresa_admin']=="ksmx")
        echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-success">REGISTRAR DEPARTAMENTO DE KOLBENSCHMIDT KSPG</b></h4>';
    
        if($_SESSION['empresa_admin']=="ksgl")
           echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-info">REGISTRAR DEPARTAMENTO DE GLEITLAGER KSPG</b></h4>';
    
        if($_SESSION['empresa_admin']=="ppt")
          echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-danger">REGISTRAR DEPARTAMENTO DE PIERBURG KSPG</b></h4>';
     ?>
                    </div>
                    <div class="modal-body">
                        <center>
                            <!-- <img src="../imagenes/icon_employed.png" alt="">-->
                            <div class="input-group">
                                <h4><b>Para registrar un nuevo departamento favor de llenar los siguientes campos</b></h4>
                            </div>
                        </center>
                        <form class="form-horizontal" id="formulario_depto" action="insertar_departamentos.php" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del departamento" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Gerente:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="gerente" placeholder="Nombre del Gerente a cargo del Departamento" required>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btncerrar_emleados2" data-dismiss="modal">Cancelar</button>
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
                        <button type="button" id="btncerrar_empleadosEdit1" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <?php
        if($_SESSION['empresa_admin']=="ksmx")
        echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-success">EDITAR DEPARTAMENTO DE KOLBENSCHMIDT KSPG </b></h4>';
    
        if($_SESSION['empresa_admin']=="ksgl")
           echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-info">EDITAR DEPARTAMENTO DE GLEITLAGER KSPG </b></h4>';
    
        if($_SESSION['empresa_admin']=="ppt")
          echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-danger">EDITAR DEPARTAMENTO DE PIERBURG KSPG </b></h4>';
     ?>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <center>
                                <img src="../img/edit.png" alt="">
                                <br>
                            </center>
                        </div>
                        <form class="form-horizontal" action="editar_departamentos.php" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="user">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id='idnombre' name="nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Departamento:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id='idgerente' name="gerente" required>
                                </div>
                            </div>
                    </div>
                    <input type="hidden" class="form-control" id="idOld" name="idOld">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="btncerrar_empleadosEdit2" data-dismiss="modal">Cancelar</button>
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
                          echo "<center><b class='text-success'>  DEPARTAMENTOS DE KOLBENSCHMIDT KSPG</b></center>";
                              if($_SESSION['empresa_admin']=='ksgl')
                                  echo "<center><b class='text-info'>  DEPARTAMENTOS DE GLEITLAGER KSPG</b></center>";
                                      if($_SESSION['empresa_admin']=='ppt')
                                          echo "<center><b class='text-danger'>  DEPARTAMENTOS DE PIERBURG KSPG</b></center>";

                          ?>

                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i> <a href="Departamentos.php?em=<?php echo $_SESSION['empresa_admin'];?>">Departamentos</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-edit"></i> Preventivos
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->






                    <!--ALERTS DE ERROR O DE EXITO AL REALIZAR MODIFICACIONES O INSERCIONES AL IGUAL QUE ELIMINACIONES-->


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
                                <button type="button" class="form-control  btn btn-success " data-toggle="modal" data-target="#modalDepto"><b> Nuevo Departamento</b></button>

                            </div>
                            <br>
                            <br>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Numero de departamento</th>
                                        <th>Nombre</th>
                                        <th>Gerente</th>
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
