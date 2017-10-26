<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");

$IdOld=$_POST['idOld'];
$IdNew=$_POST['idnew'];
$name=$_POST['usernew'];
$email=$_POST['correonew'];
$idDepto=$_POST['departamentonew'];
$em=$_SESSION['empresa_admin'];

if($IdOld!=$IdNew)
{
    $sql="select * from usuario where id_user='".$IdNew."';";
    $objeto->m_consulta($sql);
    $numero=$objeto->m_numeRegistros();
    if($numero==0)
    {
        $sql="UPDATE mantenimiento set id_user='".$IdNew."' where id_user='".$IdOld."';";
        $objeto->m_consulta($sql);
        $objeto->m_error();
        if($objeto->a_error=="")
        {   
            $sql="UPDATE usuario set id_user='".$IdNew."',nombre='".$name."',correo='".$email."',id_dpto='".$idDepto."' where id_user='".$IdOld."';";
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
        }
        else
        {
            header("location: Empleados.php?em=".$em."&&valor=e");
        }
  }
  else
  {
         header("location: Empleados.php?em=".$em."&&valor=e");
  }
 }
 else
 {
     $sql="UPDATE usuario set id_user='".$IdNew."',nombre='".$name."',correo='".$email."',id_dpto='".$idDepto."' where id_user='".$IdOld."';";
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
 } 
//fin si existe foto

  if($IdOld!=$IdNew)
{
  $sql="select * from usuario where id_user='".$IdNew."';";
  $objeto->m_consulta($sql);
  $numero=$objeto->m_numeRegistros();
if($numero==0)
{
      $sql="UPDATE mantenimiento set id_user='".$IdNew."' where id_user='".$IdOld."';";
      $objeto->m_consulta($sql);
      $objeto->m_error();
  if($objeto->a_error=="")
  {  
      $sql="UPDATE usuario set id_user='".$IdNew."',nombre='".$name."',correo='".$email."',id_dpto='".$idDepto."' where id_user='".$IdOld."';";
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
  }
    else
    {
        header("location: Empleados.php?em=".$em."&&valor=e");
    }
  }
  else
  {
         header("location: Empleados.php?em=".$em."&&valor=e");
  }
 }
 else
 {
     $sql="UPDATE usuario set id_user='".$IdNew."',nombre='".$name."',correo='".$email."',id_dpto='".$idDepto."' where id_user='".$IdOld."';";
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

 } 
?>