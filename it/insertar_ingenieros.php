<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");
$em=$_SESSION['empresa_admin'];

$numero=$_POST['iduser'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$sql="insert into ingeniero(id_inge,nombre,correo) values('".$numero."','".$nombre."','".$correo."');";
  $objeto->m_consulta($sql);
  $objeto->m_error();
  $objeto->m_cerrarBD();
  if($objeto->a_error=="")
  {
      header("location: ingenieros.php?em=".$em."&&valor=s");
        //$_SESSION['tipo']=$tupla->tipo;
  }else
  {
      header("location: ingenieros.php?em=".$em."&&valor=e");
  }


?>
