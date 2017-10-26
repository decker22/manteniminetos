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
<html lang="">
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
                ajax: "tabla_mantenimientos.php",
                columns: [{
                        data: "folio"
                    },
                    {
                        data: "fecha"
                        
                    },
                    {
                        data: "hora"
                       
                    },
                    {
                        data: "user"
                    },
                    {
                         data: "nom_dpto"     
                    },
                    {
                        data: "ing"
                    },
                    {
                        data: "estatus"
                    },
                    {
                        data: "id_acept"
                    },
                    {
                        data: "comentarios"
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
                
                document.getElementById('idOld').value = data.Id_depto;
                document.getElementById('idnombre').value = data.Nom_depto;
                $("#idgerente").val(data.Id_gerente).change();
                $("#modalEditar").modal();
                //window.location='editar_empleados.php?folio='+data.Id_empleado;  

            });
        }

        //Limpiar formulario de administrador 
        $(document).ready(function() {
            $('#btncerrar_empleados1').click(function(event) {
                $('#formulario_manten').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        $(document).ready(function() {
            $('#btncerrar_emleados2').click(function(event) {
                $('#formulario_manten').trigger('reset');
            }); //del clic sobre "nuevo"
        }); //de la funcion ready

        //fin de limpiar formulario de administrador

    </script>

    <body>

        <!--Modal de DE INSERTAR USUARIO -->
        <div id="modalManten" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">


                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<input type="button" value="&times;" id='btncerrar'>-->
                        <button type="button" id="btncerrar_empleados1" class="btn btn-danger close" data-dismiss="modal">&times;</button>
                        <?php
        if($_SESSION['empresa_admin']=="ksmx")
        echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-success">MANTENIMIENTOS PREVENTIVOS DE KOLBENSCHMIDT KSPG</b></h4>';
    
        if($_SESSION['empresa_admin']=="ksgl")
           echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-info">MANTENIMIENTOS PREVENTIVOS DE GLEITLAGER KSPG</b></h4>';
    
        if($_SESSION['empresa_admin']=="ppt")
          echo '<h4 class="modal-title" align="left"> <img src="../img/logo.png" > <b class="text-danger">MANTENIMIENTOS PREVENTIVOS DE PIERBURG KSPG</b></h4>';

     ?>
  </div>
<div class="modal-body">
   <center>
               <!-- <img src="../imagenes/icon_employed.png" alt="">-->
                <div class="input-group">
                    <h4><b>Para registrar un nuevo departamento favor de llenar los siguientes campos</b></h4>
                 </div>
            </center>
            <br>
             <form class="form-horizontal" id="formulario_depto" action="insertar_mantenimientos.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                 
             <div class="form-group">
                <label class="control-label col-sm-2" for="user">Archivo Excel:</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="excel" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="anio">Año:</label>
                <div class="col-sm-3">
                  <input type="number" value="<?php echo date("Y");?>" class="form-control" name="anio" required> 
                </div>
                <label class="control-label col-sm-2" for="period">Periodo:</label>
                 <div class="col-sm-3">
                  <input type="number" min="1" max="2" step="1" value="1" class="form-control" name="period" required> 
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="user">Ingeniero a Cargo:</label>
                <div class="col-sm-10">
                                    <?php 
                                        $sql="select * from ingeniero";
                                        $consulta=$objeto->m_consulta($sql); 
                                         echo "<select class='form-control' name='inge'>";
                                         while($arreglo=mysqli_fetch_array($consulta))
                                         {
                                             echo"<option value='".$arreglo[0]."'>".$arreglo[1]."</option>";    
                                         }
                                         echo "</select>";
                                 ?>
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
  <!--FIN MODAL CARGA MANTENIMIENTOS-->
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
                          echo "<center><b class='text-success'> MANTENIMIENTOS PREVENTIVOS DE KOLBENSCHMIDT</b></center>";
                              if($_SESSION['empresa_admin']=='ksgl')
                                  echo "<center><b class='text-info'>  MANTENIMIENTOS PREVENTIVOS DE GLEITLAGER</b></center>";
                                      if($_SESSION['empresa_admin']=='ppt')
                                          echo "<center><b class='text-danger'>  MANTENIMIENTOS PREVENTIVOS DE PIERBURG</b></center>";
                        ?>
                          </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="mantenimientos.php?em=<?php echo $_SESSION['empresa_admin'];?>">Mantenimientos</a>
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

    <div class="alert alert-danger" role="alert"  >
         <button type="button" class="close" id="btncerra_alert"  data-dismiss="alert" aria-label="Close" >
             <span aria-hidden="true">&times;</span>
              </button>
              <strong>Oh Error! </strong>Se detecto un error en la ejecucion.
    </div>
<?php
}
if(isset($_GET['valor']) && $_GET['valor']=='s')
{

?>
    <div class="alert alert-success" role="alert"  >
         <button type="button" class="close" id="btncerra_alert"  data-dismiss="alert" aria-label="Close" >
             <span aria-hidden="true">&times;</span>
              </button>
              <strong>Exito..! </strong>Se realizaron los cambios con exito.
    </div>
<?php
}
?>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                              <button type="button" class="form-control  btn btn-primary " data-toggle="modal" data-target="#modalManten"><b> Nuevos Mantenimientos</b></button>          
                           
                             </div>
<br>
  <br>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Usuario</th>
                <th>Departamento</th>
                <th>Ingeniero</th>
                <th>Estatus</th>
                <th>Nivel Satisfaccion</th>
                <th>Comentario</th>
               
               
               
           
               
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
