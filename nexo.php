<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");

$queHago=$_POST['queHacer'];



switch ($queHago) {

	case 'VerEnMapa':
			include("partes/formMapa.php");
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
	case 'MostarVotar':
			include("partes/formVotacion.php");
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
	case 'GrabarVoto':

			$var = new voto();
			//$var->idVoto = $_POST['idVoto'];	
			if($_POST['idVoto'] == "")
			{
				//$var->idVoto = $_POST['idVoto'];
				$var->dni = $_POST['dni'];
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];
				$var->direccion = $_POST['direccion'];								
				$var->candidato = $_POST['candidato'];
				$var->sexo = $_POST['sexo'];
				$devuelve = $var->InsertarVoto();				
				//echo "<h1>Voto exitoso.</h1>"; 
				//include("php/deslogearUsuario.php");

			}
			else
			{
				$var->idVoto = $_POST['idVoto'];
				//$var->dni = $_POST['dni'];
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];
				$var->direccion = $_POST['direccion'];				
				$var->candidato = $_POST['candidato'];
				$var->sexo = $_POST['sexo'];
				$var->ModificarVoto();
				
			}			
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