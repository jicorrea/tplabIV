function validarLogin()
{
		var varUsuario=$("#correo").val();

		var varClave=$("#contrasena").val();

		var recordar=$("#recordarme").is(':checked');
		
		//$("#informe").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");
	
		var funcionAjax=$.ajax({
			
								url:"nexo.php",
								
								type:"post",
								
								data:{
										
										queHacer:"ValidarLogin",
										
										recordarme:recordar,
										
										correo:varUsuario,
										
										contrasena:varClave
										
										}
								});

		funcionAjax.done(function(retorno){
											
											//$("#principal").html(retorno);
		
											if(retorno == 0) //fallo el loging
											{
												
												$("#contrasena").val("");
												
												$("#contrasena").focus();	
												
												$("#informe").addClass("alert alert-danger");	
												
												$("#informe").html("* Contraseña o usuario no validos");	
											}
											
											if(retorno == 1) //logeo exitoso
											{
												
												MostarLogin();
											}
		
											});

		funcionAjax.fail(function(retorno){
											
											//	$("#botonesABM").html(":(");
											
											//$("#informe").html(retorno.responseText);	
											
											});
		
		funcionAjax.always(function(retorno){
											
												//alert("siempre "+retorno.statusText);

											});
}//FIN validarLogin()


function deslogear()
{	
	var funcionAjax=$.ajax({
							
							url:"php/deslogearUsuario.php",
							
							type:"post"		
							
							});
	
	funcionAjax.done(function(retorno){
										//MostarBotones();
			
										//$("#foto").removeClass("imagen");
										
										//$("#foto").addClass("imagenNO");
										
										//oculto los botones de usuario
										
										$("#botonesUsuario").hide();
										
										$("#fotoUser").hide();
										
										$("#icon").css("color",'');
										
										MostarLogin();
										
										//$("#actual").html("");
			
										//	$("#BotonLogin").html("Login<br>-Sesión-");
										
										//	$("#BotonLogin").removeClass("btn-danger");
										
										//	$("#BotonLogin").addClass("btn-primary");
			
										});	
} //FIN deslogear()


function MostarBotones()
{		
	//alert(queMostrar);
	
	var funcionAjax=$.ajax({
							
							url:"nexo.php",
							
							type:"post",
							
							data:{
								
									queHacer:"MostarBotones"
								
								}
							});

	funcionAjax.done(function(retorno){
		
										$("#botonesUsuario").show();
			 
			 							$("#icon").css("color",'#00FF15');
										
										$("#botonesUsuario").html(retorno);	

										//$("#foto").removeClass("imagenNO");
										
										//$("#foto").addClass("imagen");	

										//$("#informe").html("Correcto BOTONES!!!");	
										});
}//FIN MostarBotones()


function MostarImagen()
{		
	//alert(queMostrar);
	
	var funcionAjax=$.ajax({
							
							url:"nexo.php",
							
							type:"post",
							
							data:{
								
									queHacer:"MostarImagen"
								
								}
							});

	funcionAjax.done(function(retorno){
										
										//alert(retorno);
										
										$("#fotoUser").show();

										$("#fotoUser").html(retorno);	

										//$("#foto").removeClass("imagenNO");
			
										//$("#foto").addClass("imagen");	

										//$("#informe").html("Correcto BOTONES!!!");	
										});
}//FIN MostarImagen()

