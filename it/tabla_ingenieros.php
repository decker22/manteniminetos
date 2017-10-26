<?php
 include ("seguridad_it.php");

$sql="SELECT * from ingeniero;";
//echo $sql;

        try {
         
                    // Ejecutar sentencia preparada
                               
                    $result=$objeto->m_consulta($sql);

                    $objeto-> m_numeRegistros();
                    $temp = array();
                  
                    for ($i=0; $i <$objeto->a_numeRegistros; $i++) { 
                        $arre=mysqli_fetch_assoc($objeto->a_bloque);
                    	$temp[]=array_map("utf8_encode", $arre);	
                    }


 
        echo'{"data":'.json_encode($temp).'}';



        $objeto->m_cerrarBD();

        } catch (PDOException $e) 
        {
            return false;
        }


?>