<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
require_once("clases/medico.php");
require_once("clases/noticia.php");


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
	case 'MostarConsulta':
			include("partes/FormConsulta.php");
		break;			
	case 'MostarSlider':
			include("partes/slider.php");
		break;			
	case 'ValidarLogin':
			include("php/validarUsuario.php");
		break;		
	case 'MostarAcciones':
			include("php/acciones.php");
		break;	
	case 'MostarGrillaMedicos':
			include("partes/grillaMedico.php");
		break;
	case 'MostarFormMedico':
			include("partes/formMedico.php");
		break;		

	case 'GrabarMedico':

 $var=medico::TraerUnMedico($_POST['email']);
	 $error = 0;

	 if(($_POST['estado']=="guardar" && !empty($var)) || ($_POST['estado']=="modificar" && empty($var)))
	 {
	 	$error=1;
	 }else{
	 			if($_POST['estado']=="guardar")
	 			{
	 				$var = new medico();
	 			}
	 			
				$var->correo = $_POST['email'];

				$var->nomDoctor = $_POST['nombre'];

				if($_POST['especialidad'] !="")	
				{
					$var->especialidad = $_POST['especialidad'];	
				}
				else
				{
					$var->especialidad = "Clinico";
				}

				$var->telefono = $_POST['telefono'];

				if($_POST['dia'] !="")	
				{
					$var->dia = $_POST['dia'];	
				}
				else
				{
					$var->dia = "Lunes";
				}

				if($_POST['estado'] !="")	
				{
					$var->estado = $_POST['estado'];	
				}
				else
				{
					$var->estado = "Disponible";
				}


						
			}

					if($error==0)
					{
						$var->GuardarMedico();	
					}
					

				echo $error;		

		break;		


	case 'GrabarUsuario':

	 $var=usuario::TraerUnUsuario($_POST['email']);
	 $error = 0;

	 if(($_POST['estado']=="guardar" && !empty($var)) || ($_POST['estado']=="modificar" && empty($var)))
	 {
	 	$error=1;
	 }else{
	 			if($_POST['estado']=="guardar")
	 			{
	 				$var = new usuario();
	 				$var->foto = "porDefecto.jpg";
	 				$var->contrasena = md5($_POST['clave']);
	 			}
	 			
				$var->correo = $_POST['email'];

				$var->apellido = $_POST['apellido'];
				$var->nombre = $_POST['nombre'];
				$var->telefono = $_POST['telefono'];
				if($_POST['obra_soc'] !="")	
				{
					$var->obra_soc = $_POST['obra_soc'];	
				}
				else
				{
					$var->obra_soc = "Particular";
				}
				$var->provincia = $_POST['provincia'];
				$var->localidad = $_POST['localidad'];								
				$var->direccion = $_POST['direccion'];

				if($_FILES['foto']['name'] !="")
				{
					$nombreArchivo = $_FILES['foto']['name'];
					//Filtro anti-XSS
					$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/","@",".");
					$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;","","");
					$titulo = $var->correo;
					$titulo = str_replace($caracteres_malos, $caracteres_buenos, $titulo);
					//echo $nombreArchivo;

					$extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
					$extension = strtolower(end(explode('.', $nombreArchivo)));
			
						if(!in_array($extension, $extensiones)) 
						{
							$error=2;
							//die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
						} 
						else{
								//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
								//Y definimos el máximo que se puede subir
								//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

								$tamañoArchivo = $_FILES['foto']['size']; //Obtenemos el tamaño del archivo en Bytes
								$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

								$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
								$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

								//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
								if($tamañoArchivo > $tamañoMaximoBytes) 
								{
									$error=1;
								} 
								else{
										$var->foto = $titulo.".".$extension;
										//Si el tamaño es correcto, subimos los datos
										move_uploaded_file($_FILES['foto']['tmp_name'], 'imagenes/' . $titulo.".".$extension);
									}
							}
				

				}
						
			}

					if($error==0)
					{
						$var->GuardarUsuario();	
					}
					

				echo $error;															
		break;

			//case 'TraerVoto':
			//$var = new voto();
			//$var1 = $var->validarDni($_POST['idVoto']);		
			
			//echo json_encode($var1) ;
		//break;		
		//	case 'EliminarVoto':
		//	voto::eliminarVoto($_POST['idVoto']);
		//break;	
			case 'sendMail':

		if(isset($_POST['email'])) {


			$email_to = "adm@correajuan.tuars.com";
			$email_subject = "Contacto desde el sitio web";

			// Aquí se deberían validar los datos ingresados por el usuario
			if(!isset($_POST['first_name']) ||
			!isset($_POST['last_name']) ||
			!isset($_POST['email']) ||
			!isset($_POST['telephone']) ||
			!isset($_POST['comments'])) {

			echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
			echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
			die();
			}

			$email_message = "Detalles del formulario de contacto:\n\n";
			$email_message .= "Nombre: " . $_POST['first_name'] . "\n";
			$email_message .= "Apellido: " . $_POST['last_name'] . "\n";
			$email_message .= "E-mail: " . $_POST['email'] . "\n";
			$email_message .= "Teléfono: " . $_POST['telephone'] . "\n";
			$email_message .= "Comentarios: " . $_POST['comments'] . "\n\n";


			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$_POST['email']."\r\n".
			'Reply-To: '.$_POST['email']."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			if(@mail($email_to, $email_subject, $email_message, $headers))
			{
				echo "¡El formulario se ha enviado con éxito!";
			}
			else
			{
				echo "Error";
			}
		}
			break;	

	default:
		# code...
		break;
}

 ?>