<?php
    session_start();
    if(isset($_SESSION['empresa_admin']))//checa si el usuario inicio la sesion, verificando que el session tenga datos.
    {
       
     
         if($_SESSION['empresa_admin']=="ksmx")
              include ("../ksmx/tools_ksmx.php");
    
        if($_SESSION['empresa_admin']=="ksgl")
             include ("../KSGL/tools_ksgl.php");
    
        if($_SESSION['empresa_admin']=="ppt")
             include("../PPT/tools_ppt.php");
      
        $objeto= new tools();
        $objeto->m_conexion();  
    }
    else
    {
        header("location: ../index.php"); 
    }
?>