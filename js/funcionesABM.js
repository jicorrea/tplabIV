
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


function BorrarImagen(valor)
{
	alert(valor);
	document.getElementById('idBorrar').value = valor;
	document.frmBorrar.submit();
}


function EditarVoto(idParametro)
{
	MostarVotar();
	
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerVoto",
			idVoto:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
										//alert(retorno);
										var voto =JSON.parse(retorno);	

										$("#idVoto").val(voto.idVoto);
										$("#dni").val(voto.dni);
										$("#provincia").val(voto.provincia);
										$("#localidad").val(voto.localidad);
										$("#direccion").val(voto.direccion);																				
										$("#candidato").val(voto.candidato);
										
										var sexo = voto.sexo;


										if(sexo=="Femenino")
										{
											$('input[name=sexo][value="Femenino"]').attr('checked', true); 
										}

										if(sexo=="Masculino")
										{
											$('input[name=sexo][value="Masculino"]').attr('checked', true); 
										}
											//$("#sexo").val(voto.sexo);
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	

}

function ModificarImagen(valor)
{
	//alert(valor);
	document.getElementById('id').value = valor;//ESTABA MAL ESCRITO getE"L"ementById
	document.frmModificar.submit();	

}
	
