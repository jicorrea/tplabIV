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

			$var = usuario::TraerUnUsuario($_POST['email']);//verifica que exista
//MODIFICAR//
			if($var !=NULL && $_POST['estado']=="modificar")
			{
					//$var->idVoto = $_POST['idVoto'];
					$var->contrasena = $_POST['clave'];
					$var->apellido = $_POST['apellido'];
					$var->nombre = $_POST['nombre'];
					$var->telefono = $_POST['telefono'];								
					$var->provincia = $_POST['provincia'];
					$var->localidad = $_POST['localidad'];								
					$var->direccion = $_POST['direccion'];
					//$var->foto = $_POST['foto'];

					$devuelve = $var->ModificarUsuario();			
					//echo "<h1>Voto exitoso.</h1>"; 
					//include("php/deslogearUsuario.php");

			}
//INSERTAR//
			if($var == NULL && $_POST['estado']=="cargar")
			{
				$var = new usuario();

				$var->correo = $_POST['email'];
				$var->contrasena = $_POST['clave'];
				$var->apellido = $_POST['apellido'];
				$var->nombre = $_POST['nombre'];
				$var->telefono = $_POST['telefono'];								
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];								
				$var->direccion = $_POST['direccion'];
				//falta validar que no suba nada y se asigne por defecto la foto
				$nombreArchivo = $_FILES['foto']['name'];

				//Filtro anti-XSS
				$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/","@",".");
				$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;","","");
				$titulo = $var->correo;
				$titulo = str_replace($caracteres_malos, $caracteres_buenos, $titulo);


				$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
				$extension = strtolower(end(explode('.', $nombreArchivo)));
				$var->foto = $titulo.".".$extension;
				
				if(!in_array($extension, $extensiones)) {
					echo 2;
					//die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
				} 
				else {
						//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
						//Y definimos el máximo que se puede subir
						//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

						$tamañoArchivo = $_FILES['foto']['size']; //Obtenemos el tamaño del archivo en Bytes
						$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

						$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
						$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

						//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
						if($tamañoArchivo > $tamañoMaximoBytes) {
							die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
						} 
						else {
								//Si el tamaño es correcto, subimos los datos
									move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/' . $titulo.".".$extension);

								//	$var->foto = $_POST['foto'];
								$var->InsertarUsuario();
								echo  0; //todo ok
							}
					}
									
			}													
			else {

					echo 1;
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