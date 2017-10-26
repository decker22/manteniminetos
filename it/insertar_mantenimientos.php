<?php
header("Content-Type: text/html;charset=utf-8");
include ("seguridad_it.php");
require ("../Classes/PHPExcel/IOFactory.php"); //Agregamos la librería 
$em=$_SESSION['empresa_admin'];

$anio=$_POST['anio'];
$period=$_POST['period'];
$inge=$_POST['inge'];
$fecha =date("Y-m-d");

//ARCHIVO EXCEL
$excel=$_FILES['excel']['name'];//nombre de la foto
$excel_type=$_FILES['excel']['type'];//verifica el tipo del archivo
$excel_ruta= $_FILES['excel']['tmp_name'];//donde fisicamnete esta almecanado el servidor

if (!((strpos($excel_type, "vnd.ms-excel") || strpos($excel_type, "vnd.openxmlformats-officedocument.spreadsheetml.sheet") )))
{
    header("location: mantenimientos.php?em=".$em."&&valor=e");
  
}
else
{
    move_uploaded_file( $excel_ruta,"../temp/".$excel);
    // CARGAR LOS DATOS A MYSQL
    $nombreArchivo = '../temp/'.$excel;
    // Cargo la hoja de cálculo
	$objPHPExcel = PHPExcel_IOFactory::load($nombreArchivo);
    //Asigno la hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
    
    //Obtengo el numero de filas del archivo
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    
    //CONTADOR
    $cont=1;
    for ($i = 2; $i <= $numRows; $i++) {
		
		//$id_user = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
        $fol = $em."".$anio."".$period."-".generaCeros($i)."";
    
        
		$nombre = utf8_encode($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue());
        $numEmp = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
        $correo = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue()."";

		$depto = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
        $stag = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
        $tipo = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        $model = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
        $monitor = $objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue();
        if($cont<=10)
        {
            if ($i==2)
            {
                $fecha = date("Y-m-d",strtotime("next monday"));
                $hora ="8:30:00";
                
            }
            else
            {
                $hora= date('H:i:s',strtotime("+20 minute", strtotime($hora)));
                $fecha2 =date('N', strtotime($fecha));
                if($fecha2>5)
                    $fecha= date("Y-m-d",strtotime($fecha)+259200);
                
            }
            $cont+=1;
        }
        else
        {
            $cont=1;
            $hora ="8:30:00";
            $fecha= date("Y-m-d",strtotime($fecha)+86400);
        }
      
       
            
        //---------------DEPARTAMENTOS------------------------------------------------------------
        $sql = "insert into departamento(nom_dpto) values('".$depto."');";
		$objeto->m_consulta($sql);
        $objeto->m_error();
        
        $sql =" select * from departamento where nom_dpto='".$depto."'";
        $consulta= $objeto->m_consulta($sql);
        $objeto->m_error();
        $arreglo=mysqli_fetch_array($consulta);
       
        //---------------------USUARIOS-----------------------------------------------------------
        $sql = "INSERT INTO usuario (id_user, nombre, id_dpto) VALUES('".$numEmp."','".$nombre."','".$arreglo[0]."')";
		$objeto->m_consulta($sql);
        $objeto->m_error();
        
        //------------------EQUIPOS---------------------------------------------------------------
        $sql = "INSERT INTO equipo (servicetag, tipo, modelo, monitor) VALUES('".$stag."','".$tipo."','".$model."','".$monitor."')";
		$objeto->m_consulta($sql);
        $objeto->m_error();
        
        //-----------------------------TABLA MANTENIMIENTO--------------------------------
        $sql = "INSERT INTO mantenimiento(folio, id_user, id_inge, servicetag, fecha, hora, id_estatus, numperiod,anio, id_acept) values ('".$fol."','".$numEmp."','".$inge."','".$stag."','".$fecha."','".$hora."','1','".$period."','".$anio."','0')";
        $objeto->m_consulta($sql);
        $objeto->m_error();
	}
    $objeto->m_cerrarBD();
    header("location: mantenimientos.php?em=".$em."&&valor=s");
    
}
   

function generaCeros($numero){
 $largo_numero = strlen($numero);
 $largo_maximo = 3;
 $agregar = $largo_maximo - $largo_numero;
 for($i =0; $i<$agregar; $i++){
 $numero = "0".$numero;
 }
 return $numero;
 }

?>
