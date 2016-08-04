
function MostarLogin() //Cargo el formLogin
{
		//alert(queMostrar);
	var funcionAjax = $.ajax( {

								url:"nexo.php",
								
								type:"post",
								
								data:{queHacer:"MostarLogin"}
								
								} 
							);

	funcionAjax.done( function(retorno) {

											$("#principal").html(retorno);//Muestro formIngreso
											
											$("#correo").focus();
											
											//$("#informe").html("Correcto Form login!!!");	
										} 
					);

	funcionAjax.fail( function(retorno) {
										//	$("#botonesABM").html(":(");
										//$("#informe").html(retorno.responseText);	
										} 
					);

	funcionAjax.always( function(retorno) {
											//alert("siempre "+retorno.statusText);
										  } 
					  );
}//FIN MostarLogin()


function MostarAcciones()
{
	//alert(queMostrar);
	var funcionAjax=$.ajax({
							
							url:"nexo.php",
							
							type:"post",
							
							data:{
									
									queHacer:"MostarAcciones"
								 
								 }
							});

	funcionAjax.done(function(retorno){
										//alert(retorno);
										$("#principal").html(retorno);
										//$("#informe").html("Correcto Form login!!!");	
    								   }
    				);

	funcionAjax.fail(function(retorno){
										//	$("#botonesABM").html(":(");
										//$("#informe").html(retorno.responseText);	
									  }
					);

	funcionAjax.always(function(retorno){
											//alert("siempre "+retorno.statusText);
										}
					   );
}//FIN MostarAcciones()


function MostarEspecialidades()
{
	
	$("#principal").load("partes/grillaEspecialidades.php");
}


function MostarGrillaMedicos(id)
{

	var idx=id;

	$("#principal").load("partes/grillaMedico.php",{idBorrar:idx});
}//FIN MostarGrillaMedicos()

function MostarGrillaClientes(id)
{

	var idx=id;
	$("#principal").load("partes/grillaCliente.php",{idBorrar:idx});
}//FIN MostarGrillaMedicos()

function MostarGrillaSlider(id)
{

	var idx=id;

	$("#principal").load("partes/grillaSlider.php",{idBorrar:idx});
}// FIN MostarGrillaSlider()

function MostarFormMedico(id)//sacar despues en nexo
{
	var idx=id;

	$("#principal").load("partes/formMedico.php",{id:idx});
}//FIN MostarFormMedico()

function MostarFormRegistro(id)//sacar despues en nexo
{
	var idx=id;

	$("#principal").load("partes/formRegistro.php",{id:idx});
}//FIN MostarFormMedico()

function MostarFormTurno(id,turno)//sacar despues en nexo
{
	alert(turno);
	var idx=id;
	var idx1=turno;
	$("#principal").load("partes/formTurno.php",{id:idx,turno:idx1});
}//FIN MostarFormMedico()

function MostarformCargarImg(id)
{
	var idx=id;

	$("#principal").load("partes/formCargarImg.php",{id:idx});

}//FIN MostarformCargarImg()





function MostarRegistro()
{
	//alert(queMostrar);
	var funcionAjax=$.ajax({
							
							url:"nexo.php",
							
							type:"post",
							
							data:{
									
									queHacer:"MostarRegistro"
								
								 }
    						});

	funcionAjax.done(function(retorno){

										$("#principal").html(retorno);
		
										$("#correo").focus();
										//$("#informe").html("Correcto Form login!!!");	
									  }
					);

	funcionAjax.fail(function(retorno){
										//	$("#botonesABM").html(":(");
										//$("#informe").html(retorno.responseText);	
									  }
				    );

	funcionAjax.always(function(retorno){
											//alert("siempre "+retorno.statusText);

										}
					  );
}//FIN MostarRegistro()


function MostarConsulta()
{
	var funcionAjax = $.ajax({
								
								url:"nexo.php",
								
								type:"post",
								
								data:{queHacer:"MostarConsulta"}
							
							 });

	funcionAjax.done(function(retorno){
										
										$("#principal").html(retorno);
										
									   }
					);

	funcionAjax.fail(function(retorno){
										//muestro el error
									   }
					);
}//FIN MostarConsulta()




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
										
										$("#comments").val("");
											
										}
					);

	funcionAjax.fail(function(retorno){
										
										alert(retorno);
										//$("#principal").html(retorno);
										//muestro el error
									   }
					);
}//FIN sendMail() 

