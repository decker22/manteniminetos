<?php
session_start();
     if(isset($_SESSION['it_user']))
     {
       include "menu_it.php";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    </head>

    <body>
        <div id="wrapper">
            <div id="page-wrapper">



                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="row">
                        <div class="col-lg-12">

                            <h1 class="page-header" align="center">
                                <img src="../img/logo.png" align="left">
                                <b class='text-primary'>Mantenimientos Preventivos</b>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i> <a href="index.php">Index</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-edit"></i> Preventivos
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->


                    <div class="panel panel-default table-responsive">

                        <div class="panel-heading">

                            <center>
                                <h1>Bienvenido Administrador IT.</h1>
                            </center>
                        </div>

                        <div class="panel-body">

                            <div class="row">

                                <section>


                                    <div class="container">
                                        <br>
                                        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
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
                                                    <img src="../img/1.jpg" alt="Chania" width="80%" height="20%">
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>

                                                <div class="item">
                                                    <img src="../img/2.jpg" alt="Chania" width="80%" height="20%">
                                                </div>

                                                <div class="item">
                                                    <img src="../img/3.jpg" alt="Flower" width="80%" height="20%">
                                                    <div class="carousel-caption">

                                                    </div>
                                                </div>

                                                <div class="item">
                                                    <img src="../img/4.jpg" alt="Flower" width="80%" height="20%">
                                                    <div class="carousel-caption">

                                                    </div>
                                                    </div>
                                                    <div class="item">

                                                        <img src="../img/5.jpg" alt="Flower" width="80%" height="20%">
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
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>

    </body>

    </html>
    <?php
}
else{
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
