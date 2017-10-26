<?php
include ("seguridad_it.php");
$em=$_SESSION['empresa_admin'];
$numero=$_REQUEST['id'];
$sql="delete from ingeniero where id_inge='".$numero."';";
$objeto->m_consulta($sql);
$objeto->m_error();
$objeto->m_cerrarBD();
if($objeto->a_error=="")
{  
    header("location: ingenieros.php?em=".$em."&&valor=s");
}
else
{
    header("location: ingenieros.php?em=".$em."&&valor=e");
}


?>
