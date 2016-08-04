<?php 

require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
require_once("clases/medico.php");
require_once("clases/noticia.php");
require_once("clases/imagen.php");
require_once("clases/turno.php");

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
	
					case 'MostarConsulta':
											include("partes/FormConsulta.php");
											break;						
	
					case 'ValidarLogin':
											include("php/validarUsuario.php");
											break;		
	
					case 'MostarAcciones':
											include("php/acciones.php");
											break;	
		
					case 'GrabarSlider':
										$var=imagen::TraerUnaImagen($_POST['id']);

	 									$error = 0;
	 									
	 									if(($_POST['estado']=="guardar" && !empty($var)) || ($_POST['estado']=="modificar" && empty($var)))
	 									{
	 										$error=1;
	 									}else{

	 											if($_POST['estado']=="guardar")
	 											{
	 												$var = new imagen();
	 											}

										      	$var->titulo =$_POST['titulo'];
										      	$var->descr =$_POST['descr'];
										      	//var->imagen
										      	$var->dia=getdate();

										   		if($_FILES['imagen']['name'] !="") //valido imagen
										        {
										          $nombreArchivo = $_FILES['imagen']['name'];
										          //Filtro anti-XSS
										          $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/","@",".");
										          $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;","","");
										          
										          $titulo = $_POST['titulo'];
										          //$titulo = str_replace($caracteres_malos, $caracteres_buenos, $titulo);
										          //echo $nombreArchivo;

										          $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
										          $extension = strtolower(end(explode('.', $nombreArchivo)));
										      
										            if(!in_array($extension, $extensiones)) 
										            {
										              
										              //die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
										            } 
										            else{
										                //redimenciono la imagen
										                        $ruta_imagen =$_FILES['imagen']['tmp_name'];

										                                        $miniatura_ancho_maximo = 600;
										                                        $miniatura_alto_maximo = 400;
										                                        $info_imagen = getimagesize($ruta_imagen);
										                                        $imagen_ancho = $info_imagen[0];
										                                        $imagen_alto = $info_imagen[1];
										                                        $imagen_tipo = $info_imagen['mime'];

										                                        $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
										                                         
										                                             switch ( $extension){
										                                                case "jpg":
										                                                case "jpeg":
										                                                    $imagen = imagecreatefromjpeg( $ruta_imagen ); 
										                                                    break;
										                                                case "png":
										                                                    $imagen = imagecreatefrompng( $ruta_imagen );
										                                                    break;
										                                                case "gif":
										                                                    $imagen = imagecreatefromgif( $ruta_imagen );
										                                                    break;
										                                            }

										                            imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
										                
										                //Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
										                //Y definimos el máximo que se puede subir
										                //Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

										                $tamañoArchivo = $lienzo; //Obtenemos el tamaño del archivo en Bytes
										                $tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

										                $tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
										                $tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

										                //Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
											                if($tamañoArchivo > $tamañoMaximoBytes) 
											                {
											                  $error=1;
											                } 
											                else
											                {
											                    $var->imagen = $titulo.".".$extension;
											                    
											                    //Si el tamaño es correcto, subimos los datos
											                    imagejpeg( $lienzo, 'img2/' . $titulo.".".$extension, 90 );
											                }
										                }
										        
										        	}//FIN if
										    }//FIN else

										
											if($error==0)
											{
												$var->GuardarImagen();	
											}
											
											echo $error;		
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
													}else{
															$var->especialidad = "Clinico";
										   				 }

													$var->telefono = $_POST['telefono'];

													if($_POST['dia'] !="")	
													{
														$var->dia = $_POST['dia'];	
													}else{
															$var->dia = "Lunes";
														 }

													if($_POST['estado1'] !="")	
													{
														$var->estado = $_POST['estado1'];	
													}else{
															$var->estado = "Disponible";
														 }
												}

											if($error==0)
											{
												$var->GuardarMedico();	
											}
											
											echo $error;		
											break;		

					case 'GrabarTurno':
											//$turno=turno::TraerUnTurno($_POST['id']);
	 										$error = 0;

	 										if(($_POST['estado']!="guardar") || ($_POST['estado']!="modificar"))
	 										{
	 											$error=1;
	 										}else{
	 												if($_POST['estado']=="guardar")
	 												{
	 													$var = new turno();
	 												}
	 												
	 												$doc= medico::TraerUnMedico($_POST['nomDoctor']);

													$var->uCorreo = $_POST['uCorreo'];
													
													$var->nomDoctor = $doc->nomDoctor;

													$var->especialidad = $doc->especialidad;

													$var->fecha = $_POST['fecha'];

													$var->horario="ahora";
													
													$var->estado ="liberado";

												}

											if($error==0)
											{
												$var->GuardarTurno();	
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
													}else{
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
														}else{
																//redimenciono la imagen
									        					$ruta_imagen =$_FILES['foto']['tmp_name'];
						                                        $miniatura_ancho_maximo = 200;
						                                        $miniatura_alto_maximo = 200;
						                                        $info_imagen = getimagesize($ruta_imagen);
						                                        $imagen_ancho = $info_imagen[0];
						                                        $imagen_alto = $info_imagen[1];
						                                        $imagen_tipo = $info_imagen['mime'];

	                                        					$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

	                                             				switch ( $imagen_tipo ){
	                                                									 case "image/jpg":
	                                                									 case "image/jpeg":
	                                                    													$imagen = imagecreatefromjpeg( $ruta_imagen );
	                                                    													break;
	                                               										 case "image/png":
	                                                    													$imagen = imagecreatefrompng( $ruta_imagen );
	                                                   														break;
	                                                									 case "image/gif":
	                                                    													$imagen = imagecreatefromgif( $ruta_imagen );
	                                                    													break;
	                                            										}

	                            								imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
									
																//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
																//Y definimos el máximo que se puede subir
																//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

																$tamañoArchivo = $lienzo; //Obtenemos el tamaño del archivo en Bytes
																$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB
																$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
																$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

																//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
																if($tamañoArchivo > $tamañoMaximoBytes) 
																{
																	$error=1;
																}else{
																		$var->foto = $titulo.".".$extension;
																		//Si el tamaño es correcto, subimos los datos
																		imagejpeg( $lienzo, 'imagenes/' . $titulo.".".$extension, 90 );
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
																		if( !isset($_POST['first_name']) ||
																			   !isset($_POST['last_name']) ||
																					!isset($_POST['email']) ||
																						!isset($_POST['telephone']) ||
																							!isset($_POST['comments'])) {																																echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
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
																		}else{
																				echo "Error";
																			 }
			                                                           }
											break;
							
						default:
									# code...
									break;
					}

 ?>