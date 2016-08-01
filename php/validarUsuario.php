

<?php 
	
	require_once("clases/AccesoDatos.php");
	
	require_once("clases/usuario.php");

	session_start();

	$correo=$_POST['correo'];

	$contrasena=md5($_POST['contrasena']);

	$recordar=$_POST['recordarme'];

	$buscado = usuario::validarUsuario($correo,$contrasena);

	$retorno;

	if($buscado !=Null)
	{			
	
		if($recordar=="true")
		{
			
			setcookie("registro",$correo,  time()+36000 , '/');
		
		}else
		{
			
			setcookie("registro",$correo,  time()-36000 , '/');
		
		}

		$_SESSION['registrado']=$correo;
	
		$retorno= 1;

	}else
	{
	
		$retorno= 0;
	
	}

	echo $retorno;
?>