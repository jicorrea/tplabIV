function GrabarUsuario()
{

	var formData = new FormData(document.getElementById("formRegistro")); //capturo todo lo del form
	formData.append("queHacer","GrabarUsuario"); //agrego una variable y su valor

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
										//$("#principal").html(retorno);
										//deslogear();
										//MostarVotar();
										if(retorno == 0)
										{
											alert("Sin errores!");
											MostarLogin();
										}										
										if(retorno == 1)
										{
											$("#email").focus();	
											$("#informe").addClass("alert alert-danger");	
											$("#informe").html("*Correo Registrado");	
										}
										if(retorno == 2)
										{
											$("#foto").focus();
											$("#informe").addClass("alert alert-danger");	
											$("#informe").html("*Tipo de archivo incorrecto");	
										}
										
										});
	funcionAjax.fail(function(retorno){
										$("#principal").html(retorno);
										});
} 


function GrabarTurno()
{
alert("hoola");
	var formData = new FormData(document.getElementById("formRegistro")); //capturo todo lo del form
	formData.append("queHacer","GrabarTurno"); //agrego una variable y su valor

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
										//$("#principal").html(retorno);
										//deslogear();
										//MostarVotar();
										alert(retorno);
										if(retorno == 0)
										{
											alert("Sin errores!");
											MostarLogin();
										}										
										if(retorno == 1)
										{
											$("#email").focus();	
											$("#informe").addClass("alert alert-danger");	
											$("#informe").html("*Correo Registrado");	
										}
										if(retorno == 2)
										{
											$("#foto").focus();
											$("#informe").addClass("alert alert-danger");	
											$("#informe").html("*Tipo de archivo incorrecto");	
										}
										
										});
	funcionAjax.fail(function(retorno){
										$("#principal").html(retorno);
										});
} 


function GrabarMedico()
{

var formData = new FormData(document.getElementById("formRegistro")); //capturo todo lo del form
formData.append("queHacer","GrabarMedico"); //agrego una variable y su valor

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
										//$("#principal").html(retorno);
										//deslogear();
										//MostarVotar();
											if(retorno == 0)
											{
												alert("Sin errores!");
												MostarGrillaMedicos();

											}										
											if(retorno == 1)
											{
												$("#email").focus();	
												$("#informe").addClass("alert alert-danger");	
												$("#informe").html("*Correo Registrado");	
											}
											if(retorno == 2)
											{
												$("#foto").focus();
												$("#informe").addClass("alert alert-danger");	
												$("#informe").html("*Tipo de archivo incorrecto");	
											}
										});
	funcionAjax.fail(function(retorno){
										alert(retorno);
										$("#principal").html(retorno);
										});
} 

function GrabarSlider()
{
var formData = new FormData(document.getElementById("formRegistro")); //capturo todo lo del form
formData.append("queHacer","GrabarSlider"); //agrego una variable y su valor

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
										//$("#principal").html(retorno);
										//deslogear();
										//MostarVotar();
											if(retorno == 0)
											{
												alert("Sin errores!");
												MostarGrillaSlider();

											}										
											if(retorno == 1)
											{
												$("#email").focus();	
												$("#informe").addClass("alert alert-danger");	
												$("#informe").html("*Correo Registrado");	
											}
											if(retorno == 2)
											{
												$("#foto").focus();
												$("#informe").addClass("alert alert-danger");	
												$("#informe").html("*Tipo de archivo incorrecto");	
											}
										});
	funcionAjax.fail(function(retorno){
										alert(retorno);
										$("#principal").html(retorno);
										});
} 


function BorrarImagen(valor)
{

	document.getElementById('idBorrar').value = valor;
	document.frmBorrar.submit();
}



function ModificarImagen(valor)
{
	//alert(valor);
	document.getElementById('id').value = valor;//ESTABA MAL ESCRITO getE"L"ementById
	document.frmModificar.submit();	

}
	
