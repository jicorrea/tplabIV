
function MostarLogin()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){

		$("#principal").html(retorno);
		
		$("#correo").focus();

		//$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
	//	$("#botonesABM").html(":(");
		//$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarRegistro()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarRegistro"}
	});
	funcionAjax.done(function(retorno){

		$("#principal").html(retorno);
		
		$("#correo").focus();

		//$("#informe").html("Correcto Form login!!!");	
	});
	funcionAjax.fail(function(retorno){
	//	$("#botonesABM").html(":(");
		//$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}


function MostarConsulta()
{
	var funcionAjax = $.ajax({
								url:"nexo.php",
								type:"post",
								data:{queHacer:"MostarConsulta"}
								});

	funcionAjax.done(function(retorno){
										$("#principal").html(retorno);
										});
	funcionAjax.fail(function(retorno){
										//muestro el error
										});
}


function MostarSlider()
{
	var funcionAjax = $.ajax({
								url:"nexo.php",
								type:"post",
								data:{queHacer:"MostarSlider"}
								});

	funcionAjax.done(function(retorno){
										$("#fotoUser").hide();
										$("#principal").html(retorno);

										});
	funcionAjax.fail(function(retorno){
										//muestro el error
										});
}

function MostarTabla()
{

	var funcionAjax = $.ajax({
								url:"nexo.php",
								type:"post",
								data:{queHacer:"Mostartabla"}
								});

	funcionAjax.done(function(retorno){
										
										$("#principal").html(retorno);
										});
	funcionAjax.fail(function(retorno){
										//muestro el error
										});
}


function sendMail()
{
var formData = new FormData(document.getElementById("frmContacto")); //capturo todo lo del form

formData.append("queHacer","sendMail"); //agrego una variable y su valor

var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		dataType: "HTML",
		data: formData,
		cache: false,
		contentType: false,
		processData: false	
	});

	funcionAjax.done(function(retorno){
										alert(retorno);	
										if(retorno!="Error")
										{
											MostarSlider();
										}


										});
	funcionAjax.fail(function(retorno){
											alert(retorno);
										//$("#principal").html(retorno);
										//muestro el error
										});
} 

