<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");

$IdOld=$_POST['idOld'];
$IdNew=$_POST['idnew'];
$name=$_POST['usernew'];
$email=$_POST['correonew'];
$em=$_SESSION['empresa_admin'];

if($IdOld!=$IdNew)
{
    $sql="select * from ingeniero where id_inge='".$IdNew."';";
    $objeto->m_consulta($sql);
    $numero=$objeto->m_numeRegistros();
    if($numero==0)
    {
        $sql="UPDATE mantenimiento set id_inge='".$IdNew."' where id_inge='".$IdOld."';";
        $objeto->m_consulta($sql);
        $objeto->m_error();
        if($objeto->a_error=="")
        {   
            $sql="UPDATE ingeniero set id_inge='".$IdNew."',nombre='".$name."',correo='".$email."' where id_inge='".$IdOld."';";
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
        }
        else
        {
            header("location: ingenieros.php?em=".$em."&&valor=e");
        }
  }
  else
  {
         header("location: ingenieros.php?em=".$em."&&valor=e");
  }
 }
 else
 {
     $sql="UPDATE ingeniero set id_inge='".$IdNew."',nombre='".$name."',correo='".$email."' where id_inge='".$IdOld."';";
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
 } 
//fin si existe foto

  if($IdOld!=$IdNew)
{
  $sql="select * from ingeniero where id_inge='".$IdNew."';";
  $objeto->m_consulta($sql);
  $numero=$objeto->m_numeRegistros();
if($numero==0)
{
      $sql="UPDATE mantenimiento set id_inge='".$IdNew."' where id_inge='".$IdOld."';";
      $objeto->m_consulta($sql);
      $objeto->m_error();
  if($objeto->a_error=="")
  {  
      $sql="UPDATE ingeniero set id_inge='".$IdNew."',nombre='".$name."',correo='".$email."' where id_user='".$IdOld."';";
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
  }
    else
    {
        header("location: ingenieros.php?em=".$em."&&valor=e");
    }
  }
  else
  {
         header("location: ingenieros.php?em=".$em."&&valor=e");
  }
 }
 else
 {
     $sql="UPDATE ingeniero set id_inge='".$IdNew."',nombre='".$name."',correo='".$email."' where id_user='".$IdOld."';";
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

 } 
?>