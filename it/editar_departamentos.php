<?php
header("Content-Type: text/html;charset=utf-8");
 include ("seguridad_it.php");
$IdOld=$_POST['idOld'];
//$IdNew=$_POST['id'];
$name=$_POST['nombre'];
$gerente=$_POST['gerente'];
$em=$_SESSION['empresa_admin'];
$sql="UPDATE departamento set nom_dpto='".$name."',gerente='".$gerente."' where id_dpto='".$IdOld."';";
$objeto->m_consulta($sql);
$objeto->m_error();
$objeto->m_cerrarBD();
if($objeto->a_error=="")
{  
    header("location: Departamentos.php?em=".$em."&&valor=s");
}
else
{
    header("location: Departamentos.php?em=".$em."&&valor=e");                
}
?>

          

