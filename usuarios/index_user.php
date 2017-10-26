<?php
include "seguridad.php";
include "menu_user.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" charset="utf-8" async defer>
            $(function() {
                //Array para dar formato en español
                $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: 'Previo',
                    nextText: 'Próximo',

                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                    ],
                    monthStatus: 'Ver otro mes',
                    yearStatus: 'Ver otro año',
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
                    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    dateFormat: 'yy/mm/dd',
                    firstDay: 0,
                    initStatus: 'Selecciona la fecha',
                    isRTL: false
                };
                $.datepicker.setDefaults($.datepicker.regional['es']);

                //miDate: fecha de comienzo D=días | M=mes | Y=año
                //maxDate: fecha tope D=días | M=mes | Y=año
                $("#fecha_regreso").datepicker({
                    minDate: "+1D",
                    maxDate: "+1M"
                });
            });



        </script>
    </head>

    <body>




        <div id="wrapper">
            <div id="page-wrapper">

                <div class="container-fluid">
                    <div class="table-responsive">

                        <!-- Page Heading -->

                        <div class="row">
                            <div class="col-lg-12">


                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-dashboard"></i> <a href="index_user.php">Programar Mantenimineto</a>
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
                                <strong>Oh Error! </strong>La orden fue guardada exitosamente, el correo no fue enviado debido a un error con el servidor de correos. POR FAVOR INFORMA A CONTRALORIA PARA QUE REVISE EL PRECIO DEL PRODUCTO !!!.
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
                                    <strong>Exito..! </strong>Se envio el correo, solo falta esperar que sea autorizado por algún gerente de la planta.
                                </div>

                                <?php
}
?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <img src="../img/logo-rm.png" align="left" width="15%">
                                        <center>
                                            <h3 class="text-primary">Datos Generales del Usuario</h3>
                                        </center>
                                    </div>

                                    <div class="panel-body">

                                        <div class="row">


                                                <div class="col-xs-8 col-sm-6 col-md-3 col-lg-3">
                                                    <label>Usuario:</label>
                                                    <input class="form-control" type="text" value="<?php echo $_SESSION['usuario'];?>" name="fecha_salida" readonly>
                                                </div>
                                                <?php
                                $objeto->m_consulta("select correo from usuario WHERE id_user='".$_SESSION['id_usuario']."'");
                               $tupla=$objeto->m_traerRegistro();
                               $nombre_departamento=$tupla->correo;
                            ?>
                                                    <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                        <label>Correo:</label>
                                                        <input class="form-control" type="text" value="<?php echo $nombre_departamento;?>" name="nom_dpto" readonly>
                                                    </div>
                                                    <?php
                                $objeto->m_consulta("select nom_dpto from departamento where id_dpto='".$_SESSION['departamento']."'");
                               $tupla=$objeto->m_traerRegistro();
                               $nombre_departamento=$tupla->nom_dpto;
                            ?>
                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Departamento:</label>
                                                            <input class="form-control" type="text" value="<?php echo $nombre_departamento;?>" name="nom_dptp" readonly>
                                                        </div>
                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Modelo:</label>
                                                            <?php
                                $objeto->m_consulta("SELECT e.modelo from mantenimiento m INNER JOIN equipo e on m.servicetag=e.servicetag WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $modelo=$tupla->modelo;
                            ?>
                                                                <input class="form-control" type="text" value="<?php echo $modelo;?>" name="modelo" readonly>
                                                        </div>
                                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Tipo:</label>
                                                            <?php
                                $objeto->m_consulta("SELECT e.tipo from mantenimiento m INNER JOIN equipo e on m.servicetag=e.servicetag WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $tipo=$tupla->tipo;
                            ?>
                                                                <input class="form-control" type="text" value="<?php echo $tipo; ?>" id="tipo" name="tipo" readonly>
                                                        </div>

                                                        <div class="col-xs-7 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Service Tag: </label>
                                                            <?php
                                $objeto->m_consulta("SELECT e.servicetag from mantenimiento m INNER JOIN equipo e on m.servicetag=e.servicetag WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $stag=$tupla->servicetag;
                            ?>
                                                                <input class="form-control" value="<?php echo $stag;?>" name="stag" readonly>
                                                        </div>

                                                        <div class="col-xs-5 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Monitor:</label>
                                                            <?php
                                $objeto->m_consulta("SELECT e.monitor from mantenimiento m INNER JOIN equipo e on m.servicetag=e.servicetag WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $monitor=$tupla->monitor;
                          
                            ?>
                                                                <input class="form-control" value="<?php echo $monitor;?>" name="monitor" readonly>
                                                        </div>
                                                        <div class="panel-heading col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <center>
                                                                <h3 class="text-primary">Datos del Mantenimiento.</h3>
                                                            </center>
                                                        </div>
                                                        
                                                        
                                                        
                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Folio:</label>
                                                            <?php
                                $objeto->m_consulta("SELECT m.folio from mantenimiento m WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $folio=$tupla->folio;
                                                            
                                ?>
                                                            <input class="form-control" value="<?php echo $folio;?>" name="folio" readonly>
                                                        </div>


                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Fecha :</label>
                                                            <?php
                                $objeto->m_consulta("SELECT m.fecha from mantenimiento m WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY Fecha DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $fecha=$tupla->fecha;
                                                             
                                ?>
                                                             <input class="form-control" value="<?php echo $fecha;?>" name="fecha" readonly>
                                                        </div>


                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Hora:</label>
                                                              <?php
                                $objeto->m_consulta("SELECT m.hora from mantenimiento m WHERE id_user='".$_SESSION['id_usuario']."' ORDER BY hora DESC LIMIT 1 ");
                               $tupla=$objeto->m_traerRegistro();
                               $hora=$tupla->hora;
                                                              
                                ?>
                                                            <input class="form-control" value="<?php echo $hora;?>" name="hora" readonly>
                                                        </div>

                                                        <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Ingeniero a Cargo: </label>
                                                            <?php
                                $objeto->m_consulta("SELECT i.nombre from mantenimiento m inner JOIN ingeniero i on m.id_inge=i.id_inge WHERE m.folio='".$folio."';");
                               $tupla=$objeto->m_traerRegistro();
                               $nombre=$tupla->nombre;
                                                             
                                ?>
                                                           <input class="form-control" value="<?php echo $nombre;?>" name="nombreIng" readonly>
                                                        </div>
                                                       
                                                            <div class="col-xs-4 col-sm-6 col-md-3 col-lg-3">
                                                            <label>Estatus: </label>
                                                            <?php
                                $objeto->m_consulta("SELECT e.descripcion from mantenimiento m inner JOIN estatus e on m.id_estatus=e.id_status WHERE m.folio='".$folio."';");
                               $tupla=$objeto->m_traerRegistro();
                               $estatus=$tupla->descripcion;
                                                              $objeto-> m_cerrarBD();
                                ?>
                                                           <input class="form-control" value="<?php echo $estatus;?>" name="nombreIng" readonly>
                                                        </div>
<div class="panel-heading col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <center>
                                                                
                                                            </center>
                                                        </div>
                                                        
                                                        <!--Area de botones del formulario-->
                                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                                            <br>
                                                            <input type="button" class="form-control add-row btn btn-primary" value="Aceptar Fecha del Mantenimiento">
                                                        </div>

                                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                                            <br>
                                                            <input type="submit" id="btn_enviar"  data-toggle="modal" class="form-control btn btn-success" value="Generar Salida">

                                                        </div>

                                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                                            <br>
                                                            <button type="button" id="btn_eliminar" disabled="true" class="form-control delete-row btn btn-warning">Eliminar Registros Seleccionados</button>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                                            <br>
                                                            <button type="button" id="btn_eliminarTodos" disabled="true" class="form-control delete-row1 btn btn-danger">Eliminar Todos Los Registros</button>
                                                        </div>

                    <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        </div>




        <!-- load modal -->
        <div id="modalCarga" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <p class="text-center"><br>
                        <img src="../imagenes/procesando.gif"><br> Procesando...
                    </p>

                </div>
            </div>
        </div>



        <script type="text/javascript">
            $(document).ready(function() {
                $("form").submit(function(event) {
                    $('#modalCarga').modal();
                });
            });

        </script>
        <!--Fin del modal de cargar-->




    </body>

    </html>
