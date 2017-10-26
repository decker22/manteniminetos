<?php
//header('Content-Type: text/html; charset=UTF-8'); 


class tools 
    {//Inicio de la clase
    var $a_numeRegistros;
    var $a_error;
    var $a_bloque;
    var $a_conexion;
    // metodo de conexion


function m_valiDato($p_variable)

{
    if(isset ($_GET[$p_variable]))
        return true;
    else return false;
}//Fin de m_valiDato

    
    function m_conexion($p_Servidor="localhost",$p_usuario="p_ppt",$p_password="54143celaya34145",$p_BD='preventivos_ppt')
    {
        
          $this->a_conexion=mysqli_connect($p_Servidor,$p_usuario,$p_password,$p_BD);
        if( $this->a_conexion)
            {
                if($resuBD=mysqli_select_db($this->a_conexion,$p_BD))
                     $this->a_error="";
                else 
                     $this->a_error="Nombre de Base de Datos es INCORRECTO!!";
            }
           else
                 $this->a_error="No se realizo la conexión con el servidor.";
       
    }
    
    //Metodo de Consulta
    function m_consulta ($p_consulta)
    {
        $this->a_bloque=$this->a_conexion->query($p_consulta);
        return $this->a_bloque;
        
    }
    
    function m_numeRegistros()
    {//Inicio numero de registros
        $this->a_numeRegistros=mysqli_num_rows($this->a_bloque);
        return $this->a_numeRegistros;
    }//Fin numero de registros

    function m_error()  
    {
        if(mysqli_error($this->a_conexion)>"")
            $this->a_error =mysqli_error($this->a_conexion);
        else
            $this->a_error="";
    }
        
    //Metodo para cerrar BD
    function m_cerrarBD()
    {//inicio cerrar Conexion
        mysqli_close($this->a_conexion);
    }//Fin cerrar conexion
    
    
   
//Metodo que regresa un registro del bloque obtenido

  function m_traerRegistro()
    {
        return mysqli_fetch_object($this->a_bloque);
    }//Fin m_Registro



function fecha_actual($date) {
    $dia = explode("-", $date, 3);
    $year = $dia[0];
    $month = (string)(int)$dia[1];
    $day = (string)(int)$dia[2];
    
    $dias = array("Domingo","Lunes","Martes","Mi&eacute;rcoles" ,"Jueves","Viernes","S&aacute;bado");
    $tomadia = $dias[intval((date("w",mktime(0,0,0,$month,$day,$year))))];
 
    $meses = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    
    return $tomadia.", ".$day." de ".$meses[$month]." de ".$year;
}





}//Fin de la clase


?>