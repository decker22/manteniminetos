<?php
include ("seguridad_it.php");
$idanio=$_GET['valor'];
$idperiod=$_GET['valor2'];
$sql="select * from mantenimiento where anio='".$idanio."' and numperiod='".$idperiod."' group by anio,numperiod";
$result=$objeto->m_consulta($sql);
$total=$objeto-> m_numeRegistros();

$sql="select e.descripcion as label,COUNT(*) as value from mantenimiento m INNER JOIN estatus e on m.id_estatus=e.id_status where anio='".$idanio."' and numperiod='".$idperiod."' GROUP BY label ";
  
        try {
            $result=$objeto->m_consulta($sql);
            $numero=$objeto-> m_numeRegistros();
            $temp_Dona = array();
            if($numero!=0)
            {    
                    for ($i=0; $i <$objeto->a_numeRegistros; $i++) { 
                        $arre=mysqli_fetch_assoc($objeto->a_bloque);
                    	$temp_Dona[]=array_map("utf8_encode", $arre);	
                    }
                        $data= json_encode($temp_Dona);
                        echo $data;
               }
                else
                {
                    $data='[{"label":"Sin Registros","value":"0"}]';
                    echo $data;

                }

                $objeto->m_cerrarBD();

                        } catch (PDOException $e) 
                        {
                            return false;
                        }
?>