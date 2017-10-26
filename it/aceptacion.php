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
    <html>

    <head>
        <!-- Morris.js library and dependencies -->
        <link href="../morris/morris.css" rel="stylesheet">
        <script src="../morris/raphael/raphael-min.js"></script>
        <script src="../morris/morris.min.js"></script>
        <meta charset=utf-8 />
        <title>Graficas Aceptacion</title>
    </head>

    <body>
        <?php
     // require "graficas_aceptacion.php";
 ?>
            <div id="wrapper">
                <div id="page-wrapper">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h1 class="page-header">
                                  <img src="../img/logo.png" align="left">

                                <?php
                          if($_SESSION['empresa_admin']=='ksmx')
                          echo "<center><b class='text-success'>  NIVEL DE ACEPTACION DE KOLBENSCHMIDT KSPG</b></center>";
                              if($_SESSION['empresa_admin']=='ksgl')
                                  echo "<center><b class='text-info'>  NIVEL DE ACEPTACION DE GLEITLAGER KSPG</b></center>";
                                      if($_SESSION['empresa_admin']=='ppt')
                                          echo "<center><b class='text-danger'>  NIVEL DE ACEPTACION DE PIERBURG KSPG</b></center>";

                          ?>

                                </h1>
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-fw fa-bar-chart-o"></i> <a href="graficas_gerentes.php">Graficas de Aceptacion</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-edit"></i> Preventivos
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <!-- /.row -->
                        <form method="post" id="like_form" >
                            <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="anio">Año:</label>
                                    <div class="col-sm-2">
                                        <?php 
                        $sql="select anio from mantenimiento group by anio";
                        $consulta=$objeto->m_consulta($sql); 
                        echo "<select class='form-control' name='usuario' id='idUser' >";
                        while($arreglo=mysqli_fetch_array($consulta))
                        {
                            echo"<option value='".$arreglo[0]."'>".$arreglo[0]."</option>";    
                        }
                        echo "</select>";
                 ?>
                                    </div>

                                    <label class="control-label col-sm-2" for="period">Periodo:</label>
                                    <div class="col-sm-2">
                                       <select class="form-control" name="idPeriod" id="idPeriod">
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                       </select>
                                        
                                    </div>
                                    <div class="control-label col-sm-2">
                                        <button type="button" onclick="p_grafica()" class="btn btn-primary" value="Graficar">Graficar</button>
                                    </div>
                                </div>
                            </div>
                            <br>                            

                            <div class="modal-footer">
                            </div>

                        </form>
                        <br>
                        <br>

                        <div class="row">


                            <div class="col-lg-4">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Reporte Grafico</h3>
                                    </div>
                                    <div class="panel-body">

                                        <!--Grafica de dona de cada usuario-->
                                        <div id="morris-donut-chart">



                                            <script>
                                                //  $(document).ready(function(){

                                                function grafica(data) {
                                                    //alert(data);
                                                    Morris.Donut({
                                                        element: 'morris-donut-chart',
                                                        data: JSON.parse(data)
                                                    });

                                                }
                                                //   });    
                                                function p_grafica() {


                                                    var valor = document.getElementById('idUser').value;
                                                    var valor2 = document.getElementById('idPeriod').value;
                                                    var xmlhttp = new XMLHttpRequest();
                                                    xmlhttp.onreadystatechange = function() {
                                                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                            //Parte donde vamos a mostra los datos obtenidos de la consulta
                                                            $("#morris-donut-chart").html("");
                                                            var data = xmlhttp.responseText;
                                                            grafica(data);
                                                            p_grafica1(valor,valor2);
                                                        }
                                                    };

                                                    //Se envian los datos a un formulario de php para realizar las consultas y regresar los resultado
                                                    xmlhttp.open("GET", "consulta_graficas.php?valor=" + valor + "&valor2="+valor2, true);
                                                    xmlhttp.send();

                                                }

                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Grafica de barras-->
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Nivel de Aceptacion por año</h3>
                                        </div>
                                        <div class="panel-body">

                                            <div id="area-example">

                                                <script type="text/javascript">
                                                    //data:JSON.parse('<?php //echo json_encode($temp) ?>'),


                                                    function grafica1(data) {
                                                        //alert(data);
                                                        Morris.Area({
                                                            element: 'area-example',
                                                            data: JSON.parse(data),
                                                            xkey: 'ano',
                                                            ykeys: ['No_Contesto', 'Muy_Satisfecho', 'Satisfecho', 'Neutral', 'Insatisfecho', 'Muy_Mal'],
                                                            labels: ['No_Contesto', 'Muy_Satisfecho', 'Satisfecho', 'Neutral', 'Insatisfecho', 'Muy_Mal']
                                                        });

                                                    }

                                                    function p_grafica1(valor, valor2) {
                                                        var xmlhttp = new XMLHttpRequest();
                                                        xmlhttp.onreadystatechange = function() {

                                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                                $("#area-example").html("");
                                                                var data1 = xmlhttp.responseText;

                                                                grafica1(data1);
                                                            }
                                                        };

                                                        xmlhttp.open("GET", "consulta_graficas1.php?valor=" + valor + "&valor2="+valor2, true);
                                                        xmlhttp.send();

                                                    }

                                                </script>


                                            </div>


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->
        </div>

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
