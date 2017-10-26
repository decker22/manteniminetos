<?php
session_start();
$valor=$_GET['v'];
if($valor=='g')
{
			//$_SESSION['departamento']=$tupla->Id_depto;

	unset( $_SESSION['usuario_gerente']); 
	unset($_SESSION['id_usuario_gerente']);
	unset($_SESSION['empresa_gerente']);
	unset($_SESSION['fotogencia']);
	header ("Location: index.php"); 
}
else
{
		if($valor=='u')
		{
			
			unset( $_SESSION['id_usuario']); 
			unset($_SESSION['usuario']);
			unset($_SESSION['departamento']);
			unset($_SESSION['empresa']);
			unset($_SESSION['fotouser']);	
			header ("Location: index.php"); 

		}
		else
		{
			if($valor=='v')
				{
					unset($_SESSION['usuario_vigilancia']);		//$_SESSION['departamento']=$tupla->Id_depto;
					unset($_SESSION['empresa_vigilancia']);
					header ("Location: index.php"); 
				}
				else
				{
					if($valor=='c')
						{
							unset($_SESSION['usuario_compras']);		//$_SESSION['departamento']=$tupla->Id_depto;
							unset($_SESSION['empresa_compras']);
					
							header ("Location: index.php"); 
						}	
						else
						{
								if($valor=='it')
								{
									unset($_SESSION['it_user']);		//$_SESSION['departamento']=$tupla->Id_depto;
									
									header ("Location: index.php"); 
								}
								else
								{
									if($valor=='a')
									{
										unset($_SESSION['usuario_admin']);
											unset($_SESSION['empresa_admin']);											
											header ("Location: index.php"); 

			

									}
									else
									{
										session_destroy();
 										header ("Location: index.php"); 
 									}
								}//fin de it

						}//fin de compras

				}//fin de vi

		}//fin de usuario

}	//fin de gerente



//	session_destroy();
 //	header ("Location: index.php"); 
?>

<html> 
<head> 
        <title>Fin de la Sesion</title> 
</head> 

