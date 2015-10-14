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
		
		if(retorno == 0)
		{
			$("#contrasena").val("");
			$("#informe").html("* Contraseña o usuario no validos");
							
		}

		if(retorno == 1)
		{
			$("#foto").removeClass("imagenNO");
			$("#foto").addClass("imagen");

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
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();

			$("#foto").removeClass("imagen");
			$("#foto").addClass("imagenNO");
			
			//$("#actual").html("");
			
		//	$("#BotonLogin").html("Login<br>-Sesión-");
		//	$("#BotonLogin").removeClass("btn-danger");
		//	$("#BotonLogin").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
