<?php
include ("seguridad_it.php");
$em=$_SESSION['empresa_admin'];
$numero=$_REQUEST['id'];
$sql="delete from usuario where id_user='".$numero."';";
$objeto->m_consulta($sql);
$objeto->m_error();
$objeto->m_cerrarBD();
if($objeto->a_error=="")
{  
    header("location: Empleados.php?em=".$em."&&valor=s");
}
else
{
    header("location: Empleados.php?em=".$em."&&valor=e");
}


?>
