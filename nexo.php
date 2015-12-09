<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");

$queHago=$_POST['queHacer'];


switch ($queHago) {

	case 'VerEnMapa':
			include("partes/formMapa.php");
		break;
	case 'MostarRegistro':
			include("partes/formRegistro.php");
		break;		
	case 'MostarLogin':
			include("partes/formIngreso.php");
		break;
	case 'MostarBotones':
			include("partes/botonesUsuario.php");
		break;	
	case 'MostarImagen':
			include("partes/formImagen.php");
		break;			
	case 'Mostartabla':
			include("partes/formTabla.php");
		break;
	case 'MostarSlider':
			include("partes/slider.php");
		break;			
	case 'ValidarLogin':
			include("php/validarUsuario.php");
		break;		
	case 'GrabarUsuario':

			$var = usuario::TraerUnUsuario($_POST['correo']);//verifica que exista

			if($var !=NULL && $_POST['estado']=="modificar")
			{
				//$var->idVoto = $_POST['idVoto'];
				$var->contrasena = $_POST['contrasena'];
				$var->apellido = $_POST['apellido'];
				$var->nombre = $_POST['nombre'];
				$var->telefono = $_POST['telefono'];								
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];								
				$var->direccion = $_POST['direccion'];

				$var->foto = $_POST['foto'];

				$devuelve = $var->ModificarUsuario();				
				//echo "<h1>Voto exitoso.</h1>"; 
				//include("php/deslogearUsuario.php");

			}

			if($var !=NULL && $_POST['estado']=="cargar")
			{
				$retorno = 1;//mail repetido
			}
			else
			{
				$var = new usuario();

				$var->correo = $_POST['correo'];
				$var->contrasena = $_POST['contrasena'];
				$var->apellido = $_POST['apellido'];
				$var->nombre = $_POST['nombre'];
				$var->telefono = $_POST['telefono'];								
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];								
				$var->direccion = $_POST['direccion'];

				$var->foto = $_POST['foto'];
				$var->InsertarUsuario();

				$retorno = 0; //todo ok
				
			}	
			echo $retorno;	
				
		break;

			case 'TraerVoto':
			$var = new voto();
			$var1 = $var->validarDni($_POST['idVoto']);		
			
			echo json_encode($var1) ;
		break;		
			case 'EliminarVoto':
			voto::eliminarVoto($_POST['idVoto']);
					
		
		break;		
	default:
		# code...
		break;
}

 ?>