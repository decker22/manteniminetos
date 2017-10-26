<?php
    session_start();
    if(isset($_SESSION['usuario']))//checa si el usuario inicio la sesion, verificando que el session tenga datos.
    {
       
     
         if($_SESSION['empresa']=="ksmx")
              include ("../KSMX/tools_ksmx.php");
    
        if($_SESSION['empresa']=="ksgl")
             include ("../KSGL/tools_ksgl.php");
    
        if($_SESSION['empresa']=="ppt")
             include("../PPT/tools_ppt.php");
      
        $objeto= new tools();
        $objeto->m_conexion();  

        
    }
    else
    {
        header("location: ../index.php"); 
    }
?>