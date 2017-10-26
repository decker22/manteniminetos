<?php
session_start();

$user=$_POST['usuario'];
$valor=$_POST['empresa'];

//echo $valor;

if($valor=="ksmx")
	include ("../KSMX/tools_ksmx.php");
	
if($valor=="ksgl")
	include ("../KSGL/tools_ksgl.php");
	
if($valor=="ppt")
	include ("../PPT/tools_ppt.php");

echo $user;
echo $valor;
$objeto= new tools();
$objeto->m_conexion();

 $objeto->m_consulta("select * from usuario where id_user='".mysqli_real_escape_string($objeto->a_conexion,$user)."'");


  $registros=$objeto->m_numeRegistros();

  $objeto->m_cerrarBD();
  if($registros!=0)
  {		//Al realizar la consulta, si esta se realiza correctamente y tiene valores, el numero de registroa 
						//sera diferente a 0, de lo contrario, obtiene un 0, significa que la consulta no devolvio valores.
			$tupla=$objeto->m_traerRegistro();

			$_SESSION['id_usuario']=$tupla->id_user;
			$_SESSION['usuario']=$tupla->nombre;
			$_SESSION['departamento']=$tupla->id_dpto;

			if($tupla->Foto!=null)
			$_SESSION['fotouser']=$tupla->Foto;
		    else
			$_SESSION['fotouser']="sinimagen.png";


			$_SESSION['empresa']=$valor;

		    	header("location: index_user.php");

		//$_SESSION['tipo']=$tupla->tipo;
		}
		else
		{
			header("location: ../index.php?error=error&&btn='".$valor."'");
		}

		
?>