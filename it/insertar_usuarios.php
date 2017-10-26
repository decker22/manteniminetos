<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");
$em=$_SESSION['empresa_admin'];

$numero=$_POST['iduser'];
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$idDepto=$_POST['departamento'];
$sql="insert into usuario(id_user,nombre,correo,id_dpto) values('".$numero."','".$nombre."','".$correo."','".$idDepto."');";
  $objeto->m_consulta($sql);
  $objeto->m_error();
  $objeto->m_cerrarBD();
  if($objeto->a_error=="")
  {
      header("location: Empleados.php?em=".$em."&&valor=s");
        //$_SESSION['tipo']=$tupla->tipo;
  }else
  {
      header("location: Empleados.php?em=".$em."&&valor=e");
  }


?>
