<?php
    include ("seguridad_it.php");
    $numero=$_REQUEST['id'];
    $sql="delete from departamento where id_dpto='".$numero."';";
    $objeto->m_consulta($sql);
    $objeto->m_error();
    $objeto->m_cerrarBD();
    $em=$_SESSION['empresa_admin'];
    if($objeto->a_error=="")
    { 
        header("location: Departamentos.php?em=".$em."&&valor=s");
    }
    else
    {
        header("location: Departamentos.php?em=".$em."&&valor=e");
    }


?>