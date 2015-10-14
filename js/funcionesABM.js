
function GrabarVoto()
{

	var varidVoto = $("#idVoto").val();
	var varDni = $("#dni").val();
	var varProvincia = $("#provincia").val();
	var varLocalidad = $("#localidad").val();
	var varDireccion = $("#direccion").val();		
	var varCandidato = $("#candidato").val();
	var varSexo = $('input[name="sexo"]:checked').val();
	//alert(varLocalidad);
	
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"GrabarVoto",
		idVoto:varidVoto,
		dni:varDni,
		provincia:varProvincia,
		localidad:varLocalidad,
		direccion:varDireccion,
		candidato:varCandidato,
		sexo:varSexo}
	});

	funcionAjax.done(function(retorno){
										//$("#principal").html(retorno);
										//deslogear();
										//MostarVotar();
										MostarTabla();
										});
	funcionAjax.fail(function(retorno){
										$("#principal").html(retorno);
										//muestro el error
										});
} 

function EliminarVoto(idParametro)
{

	var varidVoto = idParametro;

	
	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"EliminarVoto",
		idVoto:varidVoto}
	});

	funcionAjax.done(function(retorno){
										//$("#principal").html(retorno);

										MostarTabla();
										});
	funcionAjax.fail(function(retorno){
										$("#principal").html(retorno);
										//muestro el error
										});

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
