<?php
 include ("seguridad_it.php");

$sql="SELECT m.folio, u.nombre as user, d.nom_dpto, i.nombre as ing,m.servicetag, m.fecha,m.hora, e.descripcion as estatus, a.id_acept,m.comentarios from mantenimiento m INNER JOIN usuario u on m.id_user=u.id_user INNER JOIN ingeniero i on m.id_inge=i.id_inge INNER JOIN aceptacion a on m.id_acept=a.id_acept INNER JOIN departamento d on u.id_dpto=d.id_dpto INNER JOIN estatus e ON m.id_estatus=e.id_status; ";
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