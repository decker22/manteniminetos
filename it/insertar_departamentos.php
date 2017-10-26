<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");
$nombre=$_POST['nombre'];
$gerente=$_POST['gerente'];
$sql="insert into departamento(nom_dpto,gerente) values('".$nombre."','".$gerente."');";
//echo $sql;
$objeto->m_consulta($sql);
$objeto->m_error();
$objeto->m_cerrarBD();
$em=$_SESSION['empresa_admin'];
if($objeto->a_error=="")
{
    header("location: Departamentos.php?em=".$em."&&valor=s");

        //$_SESSION['tipo']=$tupla->tipo;
}
else
{
    header("location: Departamentos.php?em=".$em."&&valor=e");
            //header("location: Empleados.php?em='".$_SESSION['empresa_admin']."'&&valor='e'");
}
?>
