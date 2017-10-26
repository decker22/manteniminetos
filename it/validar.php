<?php
session_start();
	include ("../KSMX/tools_ksmx.php");

		$user=$_POST['user_it'];
		$pass=$_POST['pass_it'];


$objeto= new tools();
$objeto->m_conexion();

$sql="select * from ti where usuario='".mysqli_real_escape_string($objeto->a_conexion,$user)."' and pass='".mysqli_real_escape_string($objeto->a_conexion,$pass)."';";
 $objeto->m_consulta($sql);


  $registros=$objeto->m_numeRegistros();

  $objeto->m_cerrarBD();
  if($registros!=0)
  {		//Al realizar la consulta, si esta se realiza correctamente y tiene valores, el numero de registroa 
						//sera diferente a 0, de lo contrario, obtiene un 0, significa que la consulta no devolvio valores.
			$tupla=$objeto->m_traerRegistro();

			$_SESSION['it_user']=$tupla->usuario;
		

		    	header("location: principal_it.php");

		//$_SESSION['tipo']=$tupla->tipo;
		}
		else
		{
     		header("location: ../index.php?error_it=error_it");
		}

		
?>