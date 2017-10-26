<?php
 include ("seguridad_it.php");

$sql="SELECT id_user,nombre,correo,nom_dpto,departamento.id_dpto from usuario INNER JOIN departamento on usuario.id_dpto=departamento.id_dpto ORDER BY id_user ASC";
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