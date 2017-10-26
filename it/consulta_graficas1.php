<?php
include ("seguridad_it.php");
$anio=$_GET['valor'];
$idperiod=$_GET['valor2'];
$sql="select * from mantenimiento where anio='".$anio."' and numperiod='".$idperiod."' group by anio,numperiod";
$result=$objeto->m_consulta($sql);
$total=$objeto-> m_numeRegistros();


  
        try {
$sql="select anio as ano, (select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='No Contesto'    and anio=ano) as No_Contesto,(select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='Muy Satisfecho'   and anio=ano) as Muy_Satisfecho, 
    (select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='Satisfecho'  and anio=ano) as Satisfecho,
    (select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='Neutral'   and anio=ano) as Neutral,
    (select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='Insatisfecho' and anio=ano) as Insatisfecho,
    (select count(*) from mantenimiento m inner JOIN aceptacion a on m.id_acept=a.id_acept WHERE a.descripcion='Muy Mal' and  anio=ano) as Muy_Mal,
    (select count(*) from mantenimiento m where anio=ano) as Total from mantenimiento m    group by  ano,No_Contesto,Muy_Satisfecho,Satisfecho,Neutral,Insatisfecho,Muy_Mal";
 $result=$objeto->m_consulta($sql);

            $objeto-> m_numeRegistros();
             $objeto->m_error();
            $temp = array();


            for ($i=0; $i <$objeto->a_numeRegistros; $i++) { 
                $arre=mysqli_fetch_assoc($objeto->a_bloque);
                $temp[]=array_map("utf8_encode", $arre);    
            }

            $data=json_encode($temp);
            echo $data;
//echo "<pre>";
//print_r($temp);
//echo json_encode($temp);*/
                $objeto->m_cerrarBD();

                        } catch (PDOException $e) 
                        {
                            return false;
                        }
?>